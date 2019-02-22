<?php
class M_slider extends CI_Model {

	function get_all_slider() {
		$hsl = $this->db->query("SELECT * FROM tb_slider");
		return $hsl;
	}

	function update_slider($gambar, $kode) {
		$hsl = $this->db->query("UPDATE tb_slider set gambar='$gambar' where id='$kode'");
		return $hsl;
	}
	//front end
	function get_slider() {
		return $this->db->get('tb_slider');

	}

}