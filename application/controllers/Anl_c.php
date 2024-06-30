<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anl_c extends CI_Controller
{
    function __construct(){
        parent::__construct();
    }

    public function index() {
        
        date_default_timezone_set('Asia/Jakarta');
        $data['page'] = 'ANALISIS RANCANGAN ANGGARAN BIAYA';
        $data['active'] = 'anl';
        $tampil_bulan = $this->input->post('tampil_bulan');
        $data['tampil'] = array(
            'tampil_bulan' => $tampil_bulan
        );
        $this->template->views('Data_analisis/dataanalisis', $data);
    }


    public function import_excel() {

        if (isset($_FILES['im_stok']['name']) && $_FILES['im_guna']['name']) {
            // ===================== START UPLOAD FILE STOK OBAT =====================
            // NO   NAMA OBAT   JENIS OBAT  SATUAN TERKECIL SISA AWAL   PENERIMAAN  JUMLAH  PEMAKAIAN   SISA AKHIR


            $path = $_FILES["im_stok"]["name"];
            $path = $_FILES["im_stok"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            $worksheet = $object->getWorksheetIterator();
            
            $up['excel']['file_stok'] = [];

            foreach ($worksheet as $w) {
                // array_push($up['excel'], $w->getHighestRow());
                $highestRow = $w->getHighestRow();
                $highestColumn = range('A', $w->getHighestColumn());
                
                for ($i=8; $i <= $highestRow; $i++) { 
                    $row = [];
                    for ($j=0; $j <= count($highestColumn); $j++) { 
                        array_push($row, $w->getCellByColumnAndRow($j, $i)->getValue());
                    }
                    array_push($up['excel']['file_stok'], $row);
                }
            }
            // ===================== END UPLOAD FILE STOK OBAT =====================

            // ===================== START UPLOAD FILE PENGGUNAAN OBAT =====================
            // NO  NAMA OBAT   JENIS OBAT  JUMLAH TERCANTUM DALAM RESEP    SATUAN TERKECIL HARGA OBAT (SATUAN) JUMLAH HARGA


            $path = $_FILES["im_guna"]["name"];
            $path = $_FILES["im_guna"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            $worksheet = $object->getWorksheetIterator();
            
            $up['excel']['file_guna'] = [];

            foreach ($worksheet as $w) {
                // array_push($up['excel'], $w->getHighestRow());
                $highestRow = $w->getHighestRow();
                $highestColumn = range('A', $w->getHighestColumn());
                
                for ($i=8; $i <= $highestRow; $i++) { 
                    $row = [];
                    for ($j=0; $j <= count($highestColumn); $j++) { 
                        array_push($row, $w->getCellByColumnAndRow($j, $i)->getValue());
                    }
                    array_push($up['excel']['file_guna'], $row);
                }
            }
            // ===================== END UPLOAD FILE PENGGUNAAN OBAT =====================

        // $data['excel']['file_stok'] = $up['excel']['file_stok']; // untuk ngetes di halaman tes.php
        // $data['excel']['file_guna'] = $up['excel']['file_guna']; // untuk ngetes di halaman tes.php

        // ======================= START FILTER DATA =================================

        $s_length = count($up['excel']['file_stok']); // jumlah baris di file stok obat
        $g_length = count($up['excel']['file_guna']); // jumlah baris di file penggunaan

        $bulan_tahun = $this->input->post('bulan_tahun');
        $angka_buffer = $this->input->post('angka_buffer');

        $save = [];

        for ($i=0; $i < $g_length; $i++) { 
            $status = TRUE;
            for ($j=0; $j < count($up['excel']['file_stok']); $j++) {
                if ($up['excel']['file_guna'][$i][1] == $up['excel']['file_stok'][$j][1]) {
                    $status = FALSE;

                    $x_row = [
                        'bulan_tahun' => $bulan_tahun,
                        'nm_obat' => $up['excel']['file_guna'][$i][1], // import dari file penggunaan
                        'stn_kcl' => $up['excel']['file_guna'][$i][4], // import dari file pengunaan
                        'stok_gdg' => $stok_gdg = ($up['excel']['file_stok'][$j][8] == null) ? 0 : $up['excel']['file_stok'][$j][8], // import dari file stok 
                        'beli1' => $beli1 = ($up['excel']['file_stok'][$j][9] == null) ? null : $up['excel']['file_stok'][$j][9],
                        'beli2' => $beli2 = ($up['excel']['file_stok'][$j][10] == null) ? null : $up['excel']['file_stok'][$j][10],
                        'minta_pb' => $minta_pb = ($up['excel']['file_stok'][$j][11] == null) ? null : $up['excel']['file_stok'][$j][11],
                        'minta_bw' => $minta_bw = ($up['excel']['file_stok'][$j][12] == null) ? null : $up['excel']['file_stok'][$j][12],
                        'minta_jr' => $minta_jr = ($up['excel']['file_stok'][$j][13] == null) ? null : $up['excel']['file_stok'][$j][13],
                        'stok_nyata' => $stok_nyata = $stok_gdg+$beli1+$beli2-$minta_pb-$minta_bw-$minta_jr,
                        'butuh_bln' => $butuh_bln = round(($up['excel']['file_guna'][$i][5] == null) ? 0 : $up['excel']['file_guna'][$i][5],2), //import dari file excel penggunaan
                        'angka_buffer' => $angka_buffer,
                        'butuh_buffer' => $butuh_buffer = round(($butuh_bln*$angka_buffer),2),
                        'kurang' => $kurang = round(($stok_nyata-$butuh_buffer),2),
                        'jml_order' => $jml_order = null
                    ];

                    if ($kurang != 0) {
                        array_push($save, $x_row);
                        unset($up['excel']['file_stok'][$j]);
                        $up['excel']['file_stok'] = array_values($up['excel']['file_stok']);
                    }
                    break;
                }
            }

            if ($status) {
                $x_row = [
                    'bulan_tahun' => $bulan_tahun,
                    'nm_obat' => $up['excel']['file_guna'][$i][1], // import dari file penggunaan
                    'stn_kcl' => $up['excel']['file_guna'][$i][4], // import dari file penggunaan
                    'stok_gdg' => $stok_gdg = 0,
                    'beli1' => $beli1 = null,
                    'beli2' => $beli2 = null,
                    'minta_pb' => $minta_pb = null,
                    'minta_bw' => $minta_bw = null,
                    'minta_jr' => $minta_jr = null,
                    'stok_nyata' => $stok_nyata = $stok_gdg+$beli1+$beli2-$minta_pb-$minta_bw-$minta_jr,
                    'butuh_bln' => $butuh_bln = round(($up['excel']['file_guna'][$i][5] == null) ? 0 : $up['excel']['file_guna'][$i][5],2), //import dari file excel penggunaan
                    'angka_buffer' => $angka_buffer,
                    'butuh_buffer' => $butuh_buffer = round(($butuh_bln*$angka_buffer),2),
                    'kurang' => $kurang = round(($stok_nyata-$butuh_buffer),2),
                    'jml_order' => $jml_order = null
                ];

                if ($kurang != 0) {
                    array_push($save, $x_row);
                }
            }
        }

        foreach ($up['excel']['file_stok'] as $column) {
            $x_row = [
                'bulan_tahun' => $bulan_tahun,
                'nm_obat' => $column[1], // import dari file stok
                'stn_kcl' => $column[3], // import dari file stok
                'stok_gdg' => $stok_gdg = ($column[8] == null) ? 0 : $column[8], // import dari file stok 
                'beli1' => $beli1 = ($column[9] == null) ? null : $column[9],
                'beli2' => $beli2 = ($column[10] == null) ? null : $column[10],
                'minta_pb' => $minta_pb = ($column[11] == null) ? null : $column[11],
                'minta_bw' => $minta_bw = ($column[12] == null) ? null : $column[12],
                'minta_jr' => $minta_jr = ($column[13] == null) ? null : $column[13],
                'stok_nyata' => $stok_nyata = $stok_gdg+$beli1+$beli2-$minta_pb-$minta_bw-$minta_jr,
                'butuh_bln' => $butuh_bln = 0, //import dari file excel penggunaan
                'angka_buffer' => $angka_buffer,
                'butuh_buffer' => $butuh_buffer = round(($butuh_bln*$angka_buffer),2),
                'kurang' => $kurang = round(($stok_nyata-$butuh_buffer),2),
                'jml_order' => $jml_order = null
            ];

            if ($kurang != 0) {
                array_push($save, $x_row);
            }
        }

        $data['merged'] = $save; sort($data['merged']);

        // $this->load->view('tes/tes5', $data); // untuk ngetes

        // ======================= START SAVING DATA (to DB) =================================

        $this->Anl_m->import($save);

        // ======================= END SAVING DATA (to DB) ===================================

        $this->session->set_flashdata('success','Data berhasil di-<i>import</i>.');
        redirect('Anl_c');
        }
    }

    public function tambah() {
        $data['page'] = 'ANALISIS RANCANGAN ANGGARAN BIAYA';
        $data['active'] = 'anl';
        $data['stn'] = $this->Obat_m->getSatuan();
        $this->template->views('Data_analisis/anl_tambah',$data);
    }

    public function add() {
        $bulan_tahun = $this->input->post('bulan_tahun');
        $nm_obat = $this->input->post('nm_obat');
        $stn_kcl = $this->input->post('stn_kcl');
        $stok_gdg = $this->input->post('stok_gdg');
        $beli1 = $this->input->post('beli1');
        $beli2 = $this->input->post('beli2');
        $minta_pb = $this->input->post('minta_pb');
        $minta_bw = $this->input->post('minta_bw');
        $minta_jr = $this->input->post('minta_jr');
        $stok_nyata = $this->input->post('stok_nyata');
        $butuh_bln = $this->input->post('butuh_bln');
        $angka_buffer = $this->input->post('angka_buffer');
        $butuh_buffer = $this->input->post('butuh_buffer');
        $kurang = $this->input->post('kurang');
        $jml_order = $this->input->post('jml_order');

        $data = array(
            'bulan_tahun' => $bulan_tahun,
            'nm_obat' => $nm_obat,
            'stn_kcl' => $stn_kcl,
            'stok_gdg' => $stok_gdg = ($stok_gdg == null) ? 0 : $stok_gdg,
            'beli1' => $beli1 = ($beli1 == null) ? null : $beli1,
            'beli2' => $beli2 = ($beli2 == null) ? null : $beli2,
            'minta_pb' => $minta_pb = ($minta_pb == null) ? null : $minta_pb,
            'minta_bw' => $minta_bw = ($minta_bw == null) ? null : $minta_bw,
            'minta_jr' => $minta_jr = ($minta_jr == null) ? null : $minta_jr,
            'stok_nyata' => $stok_nyata = $stok_gdg+$beli1+$beli2-$minta_pb-$minta_bw-$minta_jr,
            'butuh_bln' => $butuh_bln = ($butuh_bln == null) ? 0 : $butuh_bln,
            'angka_buffer' => $angka_buffer,
            'butuh_buffer' => $butuh_buffer = $butuh_bln*$angka_buffer,
            'kurang' => $kurang = $stok_nyata-$butuh_buffer,
            'jml_order' => ($jml_order == null) ? null : $jml_order
        );

        // ============= SAVING TO DB ===============

        $this->Anl_m->tambah($data,'tb_analisis');
        $this->session->set_flashdata('success','Data berhasil ditambahkan.');
        redirect('Anl_c');
    }

    public function ubah($id_anl) {
        $data['page'] = 'DATA ANALISIS RANCANGAN BIAYA';
        $data['active'] = 'anl';
        $where = array ('id_anl' => $id_anl);
        $data['anl'] = $this->Obat_m->get();
        $data['stn'] = $this->Obat_m->getSatuan();
        $data['ubah'] = $this->Anl_m->ubah($where,'tb_analisis')->result();
        $this->template->views('Data_analisis/anl_edit',$data);
    }

    public function edit($id_anl) {

        $bulan_tahun = $this->input->post('bulan_tahun');
        $nm_obat = $this->input->post('nm_obat');
        $stn_kcl = $this->input->post('stn_kcl');
        $stok_gdg = $this->input->post('stok_gdg');
        $beli1 = $this->input->post('beli1');
        $beli2 = $this->input->post('beli2');
        $minta_pb = $this->input->post('minta_pb');
        $minta_bw = $this->input->post('minta_bw');
        $minta_jr = $this->input->post('minta_jr');
        $stok_nyata = $this->input->post('stok_nyata');
        $butuh_bln = $this->input->post('butuh_bln');
        $angka_buffer = $this->input->post('angka_buffer');
        $butuh_buffer = $this->input->post('butuh_buffer');
        $kurang = $this->input->post('kurang');
        $jml_order = $this->input->post('jml_order');
        $up_date = $this->input->post('up_date');

        $data = array(
            'bulan_tahun' => $bulan_tahun,
            'nm_obat' => $nm_obat,
            'stn_kcl' => $stn_kcl,
            'stok_gdg' => $stok_gdg = ($stok_gdg == null) ? 0 : $stok_gdg,
            'beli1' => $beli1 = ($beli1 == null) ? null : $beli1,
            'beli2' => $beli2 = ($beli2 == null) ? null : $beli2,
            'minta_pb' => $minta_pb = ($minta_pb == null) ? null : $minta_pb,
            'minta_bw' => $minta_bw = ($minta_bw == null) ? null : $minta_bw,
            'minta_jr' => $minta_jr = ($minta_jr == null) ? null : $minta_jr,
            'stok_nyata' => $stok_nyata = $stok_gdg+$beli1+$beli2-$minta_pb-$minta_bw-$minta_jr,
            'butuh_bln' => $butuh_bln = ($butuh_bln == null) ? 0 : $butuh_bln,
            'angka_buffer' => $angka_buffer,
            'butuh_buffer' => $butuh_buffer = $butuh_bln*$angka_buffer,
            'kurang' => $kurang = $stok_nyata-$butuh_buffer,
            'jml_order' => ($jml_order == null) ? null : $jml_order,
            'up_date' => date('Y-m-d H:i:s', strtotime($up_date))
        );

        $where = array('id_anl' => $id_anl);

        $this->Anl_m->edit($where,$data,'tb_analisis');
        $this->session->set_flashdata('success','Data berhasil diubah.');
        redirect('Anl_c');

    }

    public function delete($id_anl) {
        $this->Anl_m->delete($where = ['id_anl' => $id_anl],'tb_analisis');
        $this->session->set_flashdata('success','Data berhasil dihapus.');
        redirect('Anl_c');
    }

    public function delete_bulan($tampil_bulan) {
        $this->Anl_m->delete($where = ['bulan_tahun' => $tampil_bulan],'tb_analisis');
        $this->session->set_flashdata('success','Data berhasil dihapus.');
        redirect('Anl_c');
        // $this->load->view('tes/tes5', $data); // untuk ngetes
    }
}

?>