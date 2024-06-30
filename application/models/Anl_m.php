<?php

class Anl_m extends CI_Model {
	public function get() {
		$this->db->select('*');
		$this->db->from('tb_analisis');
		$this->db->order_by("tb_analisis.nm_obat", "asc");
		$query = $this->db->get();
		return $query;
	}
	public function import($data){
		$insert = $this->db->insert_batch('tb_analisis', $data);
		if($insert){
			return true;
		}
	}
	public function tambah($data,$table) {
		$this->db->insert($table,$data);
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
}
?>