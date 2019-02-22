<?php
class M_files extends CI_Model {

	function get_all_files() {
		$hsl = $this->db->query("SELECT id,judul,deskripsi,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal,oleh,download,data FROM tb_files ORDER BY id DESC");
		return $hsl;
	}
	function simpan_file($judul, $deskripsi, $oleh, $file) {
		$hsl = $this->db->query("INSERT INTO tb_files(judul,deskripsi,oleh,data) VALUES ('$judul','$deskripsi','$oleh','$file')");
		return $hsl;
	}
	function update_file($kode, $judul, $deskripsi, $oleh, $file) {
		$hsl = $this->db->query("UPDATE tb_files SET judul='$judul',deskripsi='$deskripsi',oleh='$oleh',data='$file' WHERE id='$kode'");
		return $hsl;
	}
	function update_file_tanpa_file($kode, $judul, $deskripsi, $oleh) {
		$hsl = $this->db->query("UPDATE tb_files SET judul='$judul',deskripsi='$deskripsi',oleh='$oleh' WHERE id='$kode'");
		return $hsl;
	}
	function hapus_file($kode) {
		$hsl = $this->db->query("DELETE FROM tb_files WHERE id='$kode'");
		return $hsl;
	}

	function get_file_byid($id) {
		$hsl = $this->db->query("SELECT id,judul,deskripsi,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal,oleh,download,data FROM tb_files WHERE id='$id'");
		return $hsl;
	}

	//Front-end
	function get_files_home() {
		$hsl = $this->db->query("SELECT id,judul,deskripsi,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal,oleh,download,data FROM tb_files ORDER BY id DESC limit 7");
		return $hsl;
	}

}