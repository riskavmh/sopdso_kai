<?php

class Obat_m extends CI_Model {

	public function get() {
		$this->db->select('*');
		$this->db->from('tb_obat');
		$query = $this->db->get();
		return $query;
	}
	public function tambah($data,$table) {
		$this->db->insert($table,$data);
	}
	public function import($data){
		$insert = $this->db->insert_batch('tb_obat', $data);
		if($insert){
			return true;
		}
	}
	public function ubah($data,$table) {
		return $this->db->get_where($table,$data);
	}
	public function edit($where,$data,$table) {
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function delete($where,$table) {
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function getSatuan() {
		$this->db->select('*');
		$this->db->from('tb_stn_kcl');
		$this->db->order_by("stn_kcl", "asc");
		$query = $this->db->get();
		return $query;
	}

}

?>