<?php
class M_socmed extends CI_Model {

	function get_all_socmed() {
		$hsl = $this->db->query("select * from tb_socmed");
		return $hsl;
	}
	function simpan_socmed($nama, $url, $icon) {
		$hsl = $this->db->query("insert into tb_socmed(nama,url,icon) values('$nama','$url','$icon')");
		return $hsl;
	}
	function update_socmed($kode, $nama, $url, $icon) {
		$hsl = $this->db->query("update tb_socmed set nama='$nama', url='$url', icon = '$icon' where id='$kode'");
		return $hsl;
	}
	function hapus_socmed($kode) {
		$hsl = $this->db->query("delete from tb_socmed where id='$kode'");
		return $hsl;
	}

	function get_socmed_byid($socmed_id) {
		$hsl = $this->db->query("select * from tb_socmed where id='$id'");
		return $hsl;
	}

}