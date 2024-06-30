<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    function __construct(){
        parent::__construct();
        // $this->load->model(['Main_model'/*, 'user_m', 'Obat_m', 'Prd_m'*/]);
    }

    public function index()
    {

        $data['page'] = 'BERANDA';
        $data['active'] = 'main';
        date_default_timezone_set('Asia/Jakarta');
        $this->template->views('Main/beranda', $data);
    
    }

    public function login(){
        if ($_POST) {
            $result = $this->Main_model->login();
            if (!empty($result)) {
                $data = array(
                    'username'=>$result->username,
                    'password'=>$result->password
                );
                $this->session->set_userdata($data);
                redirect('Main');
            } else {
                $this->session->set_flashdata('error','Username atau password salah.');
                redirect('Main/login');
            }
        }

        $this->load->view('Main/login');
    }

    public function logout(){
        $data = array('username','password');
        $this->session->unset_userdata($data);

        redirect('Main/login');
    }

    public function confirm() {
        if ($_POST) {
            $result = $this->Main_model->confirm();
            if (!empty($result)) {
                $data = array(
                    'password'=>$result->password
                );
                redirect('Main/ubah');
            } else {
                $this->session->set_flashdata('error','Password salah.');
                redirect('Main/confirm');
            }
        }

        $data['active'] = '';
        $this->template->views('Main/confirm_pass', $data);
    }

    public function ubah($id_user=1) {
        $data['active'] = '';
        $where = array ('id_user' => $id_user);
        $data['ubah'] = $this->Main_model->ubah($where,'tb_user')->result();

        $this->template->views('Main/edit_pass',$data);
    }
    public function edit($id_user=1) {
        $username = $this->input->post('username');
        $password = sha1($this->input->post('password'));

        $data = array(
            'username' => $username,
            'password' => $password
        );

        $where = array('id_user' => $id_user);
        $this->Main_model->edit($where,$data,'tb_user');
        $this->session->set_flashdata('success','Data berhasil diubah.');
        redirect('Main');
    }
    
}

?>