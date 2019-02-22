<?php
class M_statis extends CI_Model {

	function get_all_sambutan() {
		return $hsl = $this->db->get_where('tb_statis', array('id' => '1'));
	}
	function update_sambutan($data, $kode) {
		$this->db->where('id', $kode);
		return $this->db->update('tb_statis', $data);
	}
	function get_all_visimisi() {
		return $hsl = $this->db->get_where('tb_statis', array('id' => '2'));
	}
	function update_visimisi($data, $kode) {
		$this->db->where('id', $kode);
		return $this->db->update('tb_statis', $data);
	}
	function get_all_struktur() {
		return $hsl = $this->db->get_where('tb_statis', array('id' => '3'));
	}
	function update_struktur($data, $kode) {
		$this->db->where('id', $kode);
		return $this->db->update('tb_statis', $data);
	}
	function get_all_pegawai() {
		return $hsl = $this->db->get_where('tb_statis', array('id' => '4'));
	}
	function update_pegawai($data, $kode) {
		$this->db->where('id', $kode);
		return $this->db->update('tb_statis', $data);
	}
	function get_all_desa() {
		return $hsl = $this->db->get_where('tb_statis', array('id' => '5'));
	}
	function update_desa($data, $kode) {
		$this->db->where('id', $kode);
		return $this->db->update('tb_statis', $data);
	}
	function get_all_alurlayanan() {
		return $hsl = $this->db->get_where('tb_statis', array('id' => '6'));
	}
	function update_alurlayanan($data, $kode) {
		$this->db->where('id', $kode);
		return $this->db->update('tb_statis', $data);
	}
	function get_all_denahlayanan() {
		return $hsl = $this->db->get_where('tb_statis', array('id' => '7'));
	}
	function update_denahlayanan($data, $kode) {
		$this->db->where('id', $kode);
		return $this->db->update('tb_statis', $data);
	}

	//Front-end

}
