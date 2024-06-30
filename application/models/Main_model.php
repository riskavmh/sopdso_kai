<?php

class Main_model extends CI_Model {
	public function get(){
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->order_by("id_user", "asc");
		$query = $this->db->get();
		return $query;
	}

	public function login(){
		$username = $this->input->post('username');
		$password = sha1($this->input->post('password'));
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get('tb_user')->row();
	}

	public function confirm(){
		$password = sha1($this->input->post('password'));
		$this->db->where('password',$password);
		return $this->db->get('tb_user')->row();
	}

	public function ubah($data,$table) {
		return $this->db->get_where($table,$data);
	}
	public function edit($where,$data,$table) {
		$this->db->where($where);
		$this->db->update($table,$data);
	}

}

?>