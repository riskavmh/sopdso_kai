<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prd_c extends CI_Controller
{
    function __construct(){
        parent::__construct();
        // $this->load->model(['Prd_m', 'Anl_m', 'Obat_m']);
    }

    public function index() {
        $data['page'] = 'PREDIKSI KEBUTUHAN';
        $data['active'] = 'prd';
        $tampil_bulan = $this->input->post('tampil_bulan');
        $data['tampil'] = array(
            'tampil_bulan' => $tampil_bulan
        );
        $this->template->views('Prediksi/prediksi', $data);

    }

    public function prediksi() {
        date_default_timezone_set("Asia/Jakarta");
        $now = date('m-Y');

        $data['anl'] = $this->Anl_m->get()->result();

        $kurang = [];
        // $rincian = [];
        foreach ($data['anl'] as $item) {

            $butuh_lalu = array($item->kurang);
            $implode = implode('',$butuh_lalu);
            $explode = explode(',',$implode);
            $intval = array_map('intval',$explode);

            for ($i=0; $i < count($intval); $i++) {
                if ($item->bulan_tahun == $now) {
                    $a_row = array(
                        'bulan_tahun' => $item->bulan_tahun,
                        'nm_obat' => $item->nm_obat,
                        'stn_kcl' => $item->stn_kcl,
                        'butuh_lalu' => $intval[$i]
                    );
                    array_push($kurang, $a_row);
                }

                // if ($item->bulan_tahun == $now) {
                /*$r_row = array(
                    'bulan_tahun' => $item->bulan_tahun,
                    'nm_obat' => $item->nm_obat,
                    'stn_kcl' => $item->stn_kcl,
                    'rincian' => $intval[$i]
                );
                array_push($rincian, $r_row);*/
                // }
            }
        }

        $data['kurang'] = $kurang;
        // $data['rinci'] = $rincian;
        // print_r($rincian);

         /*------------------------------------- TAMBAH DATA KE FITUR PREDIKSI ---------------------------------------*/

        // ============== DATA 6 BULAN YANG DITOTAL

        $data['hitung'] = $this->Prd_m->getHitung()->result_array();
        
        $hasil = [];
        // $rincian = [];
        foreach ($data['hitung'] as $item) {
            sort($item);
            $implode = implode('',$item);
            $explode = explode(',',$implode);
            $intval = array_map('intval',$explode);
            if (count($intval) >= 6) {
                $sum = array_sum($intval);
                array_push($hasil, $sum);
                // array_push($rincian, $intval);
            } else if (count($intval) < 6) {
                $sum = 0;
                array_push($hasil, $sum);
            }            
        }

        $data['sum'] = $hasil;
        // $data['rinci'] = $rincian;
        

        // =============== DATA NAMA OBAT

        $data['nama'] = $this->Prd_m->getNameData()->result();

        $nama = [];
        foreach ($data['nama'] as $item) {
            array_push($nama, $item->nm_obat);
        }
        $data['name'] = $nama;

        // =============== START PERHITUNGAN PREDIKSI

        $result = [];
        for ($j=0; $j < count($nama); $j++) {
            for ($k=0; $k < count($hasil); $k++) {
                // for ($l=0; $l < count($rincian); $l++) {
                    $p_row = [
                        'nm_obat' => $nama[$j],
                        'hasil' => $hasil[$k],
                        // 'rincian' => $rincian[$l]
                    ];
                    array_push($result, $p_row);
                    unset($nama[$j]);
                    $nama = array_values($nama);
                    // unset($hasil[$k]);
                    // $hasil = array_values($hasil);
                // }
            }
        }

        $sma = [];

        for ($i=0; $i < count($kurang); $i++) {
        // for ($l=0; $l < count($rincian); $l++) {
            $status = TRUE;
            for ($j=0; $j < count($result); $j++) { 
                if ($kurang[$i]['nm_obat'] == $result[$j]['nm_obat']) {

                    $status = FALSE;
                    
                    $data['prd'] = [
                        'bulan_tahun' => $bulan_tahun = $kurang[$i]['bulan_tahun'],
                        'nm_obat' => $nm_obat = $kurang[$i]['nm_obat'],
                        'stn_kcl' => $stn_kcl = $kurang[$i]['stn_kcl'],
                        // 'rincian' => $rincian = abs($rincian[$l]['rincian']),
                        'butuh_lalu' => $butuh_lalu = round(abs($kurang[$i]['butuh_lalu']), 2),
                        'butuh_skrg' => $butuh_skrg =  round(abs($result[$j]['hasil'] / 6), 2) ,
                        'mad' => $mad = ($butuh_skrg == null || 0) ? null : round(abs(($butuh_lalu - $butuh_skrg) / 6), 2)
                    ];

                    // var_dump($rincian);
                    array_push($sma, $data['prd']);
                    // unset($rincian[$l]);
                    // $rincian = array_values($rincian);
                    unset($result[$j]);
                    $result = array_values($result);
                    break;
                }
            }

            if ($status) {
                $data['prd'] = [
                    'bulan_tahun' => $bulan_tahun = $kurang[$i]['bulan_tahun'],
                    'nm_obat' => $kurang[$i]['nm_obat'],
                    'stn_kcl' => $kurang[$i]['stn_kcl'],
                    // 'rincian' => $rincian = 0,
                    'butuh_lalu' => $butuh_lalu = round(abs($kurang[$i]['butuh_lalu']), 2),
                    'butuh_skrg' => $butuh_skrg = 0,
                    'mad' => $mad = null
                ];

                array_push($sma, $data['prd']);

            }
        // }
        }


        $data['prediksi'] = $sma;
        $data['kurang'] = $kurang;
        // $this->load->view('tes/tes3m', $data);

        // ============= SAVING TO DB ===============

        if (!empty($kurang)) {
            $this->Prd_m->import($sma);
            $this->session->set_flashdata('success','Data berhasil diprediksi.');
            redirect('Prd_c');
            // $this->load->view('tes/tes3m', $data);
        } else {
            $this->session->set_flashdata('warning','Tidak ada data yang dapat diprediksi.');
            redirect('Prd_c');
        }

        // ======================= END SAVING DATA (to DB) ===================================

    }

    public function detail($id_prd) {
        $data['page'] = 'DETAIL PREDIKSI';
        $data['active'] = 'prd';
        $where = array ('id_prd' => $id_prd);
        $data['detail'] = $this->Prd_m->detail($where,'tb_prediksi')->result();
        
        $data['kebutuhan'] = $this->Prd_m->getRincian()->result();
        // var_dump($data['kebutuhan']);


        $this->template->views('Prediksi/detail_prediksi', $data);
    }

    public function delete($id_prd) {
        $where = array ('id_prd' => $id_prd);
        $this->Anl_m->delete($where,'tb_prediksi');
        $this->session->set_flashdata('success','Data berhasil dihapus.');
        redirect('prd_c');
    }

    public function delete_bulan($tampil_bulan) {
        $this->Prd_m->delete($where = ['bulan_tahun' => $tampil_bulan],'tb_prediksi');
        $this->session->set_flashdata('success','Data berhasil dihapus.');
        redirect('Prd_c');
    }

    
}

?>