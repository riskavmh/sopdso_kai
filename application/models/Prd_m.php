<?php

class Prd_m extends CI_Model {
	public function get() {
		$this->db->select('*');
		$this->db->from('tb_prediksi');
		$this->db->order_by("tb_prediksi.id_prd", "asc");
		// $this->db->order_by("tb_prediksi.bulan_tahun", "asc");
		$query = $this->db->get();
		return $query;
	}
	public function import($data){
		$insert = $this->db->insert_batch('tb_prediksi', $data);
		if($insert){
			return true;
		}
	}
	public function getHitung()
	{

		$this->db->select('GROUP_CONCAT(butuh_lalu ORDER BY id_prd DESC limit 6) grouped_data');
		$this->db->from('tb_prediksi');
		$this->db->GROUP_BY('nm_obat');
		$query = $this->db->get();

		return $query;
	}

	public function getNameData()
	{
		$this->db->select('*');
		$this->db->from('tb_prediksi');
		$this->db->GROUP_BY('nm_obat');
		$query = $this->db->get();

		return $query;
	}

	public function detail($data,$table) {
		return $this->db->get_where($table,$data);
	}

	public function getRincian()
	{

		$this->db->select('GROUP_CONCAT(bulan_tahun ORDER BY id_prd DESC limit 6) bulan,GROUP_CONCAT(butuh_lalu ORDER BY id_prd DESC limit 6) datanya');
		$this->db->from('tb_prediksi');
		$this->db->GROUP_BY('nm_obat');
		$query = $this->db->get();

		return $query;
	}

	public function tambah($data,$table) {
		$this->db->insert($table,$data);
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