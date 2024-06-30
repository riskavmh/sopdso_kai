<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Obat_c extends CI_Controller
{
    function __construct(){
        parent::__construct();
        // $this->load->model('Obat_m');
    }

    public function index() {
        $data['page'] = 'DATA OBAT';
        $data['active'] = 'obat';
        $data['stn'] = $this->Obat_m->getSatuan();
        $this->template->views('Data_obat/obat_tambah',$data);
        }
        
    public function tambah() {
        $nm_obat = $this->input->post('nm_obat');
        $stn_kcl = $this->input->post('stn_kcl');

        $data = array(
            'nm_obat' => $nm_obat,
            'stn_kcl' => $stn_kcl );
        
        $this->Obat_m->tambah($data,'tb_obat');
        $this->session->set_flashdata('success','Data berhasil ditambahkan.');
        redirect('Obat_c');
        }

    // public function tambah() {
    //     $nm_obat = $this->input->post('nm_obat');
    //     $stn_kcl = $this->input->post('stn_kcl');

    //     $nama_obat = [];
    //     $data = array(
    //         'nm_obat' => $nm_obat,
    //         'stn_kcl' => $stn_kcl );

    //     array_push($nama_obat, $data);
    //     // var_dump(!isset($nama_obat));

    //     if (!isset($nama_obat)) {
    //         // $this->Obat_m->tambah($data,'tb_obat');
    //         $this->session->set_flashdata('success','Data berhasil ditambahkan.');
    //         redirect('Obat_c');
    //     } else {
    //         // $this->Obat_m->tambah($data,'tb_obat');
    //         $this->session->set_flashdata('warning','Data sudah ada.');
    //         redirect('Obat_c');
    //     }
        
    //     /*$this->Obat_m->tambah($data,'tb_obat');
    //     $this->session->set_flashdata('success','Data berhasil ditambahkan.');
    //     redirect('Obat_c');*/
    //     }

    public function import_excel(){
        if (isset($_FILES["im_obat"]["name"])) {
            $path = $_FILES["im_obat"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=1; $row<=$highestRow; $row++)
                {
                    $nm_obat = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $stn_kcl = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $temp_data[] = array(
                        'nm_obat' => $nm_obat,
                        'stn_kcl' => $stn_kcl
                    );
                }
            }
            
            $import = $this->Obat_m->import($temp_data);
            if($import) {
                $this->session->set_flashdata('success','Data berhasil di-<i>import</i>.');
                redirect('Obat_c');
            } else {
                $this->session->set_flashdata('error','Terjadi kesalahan.');
                redirect('Obat_c');
            }
        } else {
            $this->session->set_flashdata('warning','Tidak ada file masuk.');
        }
    }

    public function ubah($id_obat) {
        $data['page'] = 'DATA OBAT';
        $data['active'] = 'obat';
        $where = array ('id_obat' => $id_obat);
        $data['stn'] = $this->Obat_m->getSatuan();
        $data['ubah'] = $this->Obat_m->ubah($where,'tb_obat')->result();
        $this->template->views('Data_obat/obat_edit',$data);
    }
    public function edit($id_obat) {
        $nm_obat = $this->input->post('nm_obat');
        $stn_kcl = $this->input->post('stn_kcl');

        $data = array(
            'nm_obat' => $nm_obat,
            'stn_kcl' => $stn_kcl );

        $where = array('id_obat' => $id_obat);
        $this->Obat_m->edit($where,$data,'tb_obat');
        $this->session->set_flashdata('success','Data berhasil diubah.');
        redirect('Obat_c');
    }

    public function delete($id_obat) {
        $where = array ('id_obat' => $id_obat);
        $this->Obat_m->delete($where,'tb_obat');
        $this->session->set_flashdata('success','Data berhasil dihapus.');
        redirect('Obat_c');
    }
}
?>