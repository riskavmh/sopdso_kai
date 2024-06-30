<?php

class Template {
	public $_sopdso;

	function __construct() {
		$this->_sopdso = &get_instance();
		$this->_sopdso->load->model(['Main_model', 'Obat_m', 'Kdl_m', 'Anl_m', 'Prd_m']);
	}

	function views($template = NULL, $data = NULL) {
		if ($template != NULL) {
			if (empty($this->_sopdso->session->userdata('username'))) {
	            $this->_sopdso->session->set_flashdata('error','Anda harus login dulu.');
	            redirect('Main/login');
	        }
	        $data['user'] = $this->_sopdso->Main_model->get()->result();
			$data['date'] = $this->_sopdso->load->view('convertDate');
			$data['kdl'] = $this->_sopdso->Kdl_m->get()->result();
			$data['obat'] = $this->_sopdso->Obat_m->get()->result();
			$data['anl'] = $this->_sopdso->Anl_m->get()->result();
			$data['prd'] = $this->_sopdso->Prd_m->get()->result();
			
			$data['head'] = $this->_sopdso->load->view('Template/_Template/header', $data, TRUE);
			$data['topbar'] = $this->_sopdso->load->view('Template/_Template/topbar', $data, TRUE);
			$data['sidebar'] = $this->_sopdso->load->view('Template/_Template/sidebar', $data, TRUE);
			$data['main'] = $this->_sopdso->load->view($template, $data, TRUE);
			$data['content'] = $this->_sopdso->load->view('Template/_Template/content', $data, TRUE);
			$data['footer'] = $this->_sopdso->load->view('Template/_Template/footer', $data, TRUE);
			$data['required'] = $this->_sopdso->load->view('Template/_Template/required', $data, TRUE);
			$data['spec_script'] = $this->_sopdso->load->view('Template/_Template/spec_script', $data, TRUE);
			echo $data['Template'] = $this->_sopdso->load->view('Template/_Template/template', $data, TRUE);
		}
	}
}


?>