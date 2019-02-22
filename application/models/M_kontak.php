<?php
class M_kontak extends CI_Model {
	function kirim_pesan($nama, $email, $kontak, $pesan) {
		$hsl = $this->db->query("INSERT INTO tb_inbox(nama,email,kontak,pesan) VALUES ('$nama','$email','$kontak','$pesan')");
		return $hsl;
	}

	function get_all_inbox() {
		$hsl = $this->db->query("SELECT tb_inbox.*,DATE_FORMAT(tanggal,'%d %M %Y') AS tanggal FROM tb_inbox ORDER BY id DESC");
		return $hsl;
	}

	function hapus_kontak($kode) {
		$hsl = $this->db->query("DELETE FROM tb_inbox WHERE id='$kode'");
		return $hsl;
	}

	function update_status_kontak() {
		$hsl = $this->db->query("UPDATE tb_inbox SET status='0'");
		return $hsl;
	}
}