<?php

class Kdl_m extends CI_Model {
	public function get() {
		$this->db->select('*');
		$this->db->from('tb_kdl');
		$this->db->order_by("tb_kdl.tgl_kdl", "asc");
		$this->db->query("DELETE FROM tb_kdl WHERE tgl_kdl < NOW() - INTERVAL 1 DAY ");
		$query = $this->db->get();
		return $query;
	}
	public function tambah($data,$table) {
		$this->db->insert($table,$data);
	}

	public function import($data){
		$insert = $this->db->insert_batch('tb_kdl', $data);
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
	public function delete_all($checked_id) {
		$this->db->where_in('id_kdl', $checked_id);
		return $this->db->delete('tb_kdl');
	}
}
?>