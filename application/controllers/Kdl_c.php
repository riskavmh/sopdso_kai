<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kdl_c extends CI_Controller
{
    function __construct(){
        parent::__construct();
        // $this->load->model(['Kdl_m', 'Obat_m']);
    }

    public function index() {
        $data['page'] = 'KEDALUWARSA OBAT';
        $data['active'] = 'kdl';
        $data['stn'] = $this->Obat_m->getSatuan();
        $this->template->views('Data_obat/kedaluwarsa',$data);
    }

    public function tambah() {

        $data['page'] = 'DATA KEDALUWARSA';
        $data['active'] = 'kdl';
        $data['stn'] = $this->Obat_m->getSatuan();
        $this->template->views('Data_obat/kdl_tambah',$data);
    }

    public function add() {
        $nm_obat = $this->input->post('nm_obat');
        $stn_kcl = $this->input->post('stn_kcl');
        $no_batch = $this->input->post('no_batch');
        $tgl_kdl = $this->input->post('tgl_kdl');

        $data = array(
            'nm_obat' => $nm_obat,
            'stn_kcl' => $stn_kcl,
            'no_batch' => $no_batch,
            'tgl_kdl' => date('Y-m-d', strtotime($tgl_kdl))
        );

        $this->Kdl_m->tambah($data,'tb_kdl');
        $this->session->set_flashdata('success','Data berhasil ditambahkan.');
        redirect('Kdl_c');
    }

    public function import_excel(){
        if (isset($_FILES["im_kdl"]["name"])) {
            $path = $_FILES["im_kdl"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=3; $row<=$highestRow; $row++)
                {
                    $nm_obat = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $stn_kcl = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $no_batch = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $tgl_kdl = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $temp_data[] = array(
                        'nm_obat' => $nm_obat,
                        'stn_kcl' => $stn_kcl,
                        'no_batch' => $no_batch,
                        'tgl_kdl' => date('Y-m-d', strtotime($tgl_kdl))
                    );
                }
            }
            $import = $this->Kdl_m->import($temp_data);
           
            if($import) {
                $this->session->set_flashdata('success','Data berhasil di-<i>import</i>.');
                redirect('Kdl_c');
            } else {
                $this->session->set_flashdata('error','Terjadi kesalahan.');
                redirect('Kdl_c');
            }
        } else {
            $this->session->set_flashdata('warning','Tidak ada file masuk.');
        } 
    }

    public function ubah($id_kdl) {
        $data['page'] = 'DATA KEDALUWARSA';
        $data['active'] = 'kdl';
        $where = array ('id_kdl' => $id_kdl);
        $data['stn'] = $this->Obat_m->getSatuan();
        $data['ubah'] = $this->Kdl_m->ubah($where,'tb_kdl')->result();
        $this->template->views('Data_obat/kdl_edit',$data);
    }
    public function edit($id_kdl) {
        $nm_obat = $this->input->post('nm_obat');
        $stn_kcl = $this->input->post('stn_kcl');
        $no_batch = $this->input->post('no_batch');
        $tgl_kdl = $this->input->post('tgl_kdl');
        $up_date = $this->input->post('up_date');

        $data = array(
            'nm_obat' => $nm_obat,
            'stn_kcl' => $stn_kcl,
            'no_batch' => $no_batch,
            'tgl_kdl' => date('Y-m-d', strtotime($tgl_kdl)),
            'up_date' => date('Y-m-d H:i:s', strtotime($up_date))
        );
 
        $where = array('id_kdl' => $id_kdl);
        $this->Kdl_m->edit($where,$data,'tb_kdl');
        $this->session->set_flashdata('success','Data berhasil diubah.');
        redirect('Kdl_c');
    }

    public function delete($id_kdl) {
        $where = array ('id_kdl' => $id_kdl);
        $this->Kdl_m->delete($where,'tb_kdl');
        $this->session->set_flashdata('success','Data berhasil dihapus.');
        redirect('Kdl_c');
    }
}

?>