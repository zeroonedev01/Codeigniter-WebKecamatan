<?php
class M_kategori extends CI_Model {

	function get_all_kategori() {
		$hsl = $this->db->query("select * from tb_kategori");
		return $hsl;
	}
	function simpan_kategori($kategori) {
		$hsl = $this->db->query("insert into tb_kategori(nama) values('$kategori')");
		return $hsl;
	}
	function update_kategori($kode, $kategori) {
		$hsl = $this->db->query("update tb_kategori set nama='$kategori' where id='$kode'");
		return $hsl;
	}
	function hapus_kategori($kode) {
		$hsl = $this->db->query("delete from tb_kategori where id='$kode'");
		return $hsl;
	}

	function get_kategori_byid($kategori_id) {
		$hsl = $this->db->query("select * from tb_kategori where id='$id'");
		return $hsl;
	}

}