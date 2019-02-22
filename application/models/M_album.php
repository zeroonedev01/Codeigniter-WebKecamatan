<?php
class M_album extends CI_Model {
	function get_all_album() {
		$hsl = $this->db->query("SELECT tb_album.id, tb_album.nama,tb_album.count, tb_album.cover, tb_user.nama as author,DATE_FORMAT(tb_album.tanggal,'%d/%m/%Y') AS tanggal FROM tb_album inner join tb_user on tb_album.userid = tb_user.id ORDER BY tb_album.id DESC");
		return $hsl;
	}
	function simpan_album($album, $user_id, $gambar) {
		$hsl = $this->db->query("insert into tb_album(nama,userid,cover) values ('$album','$user_id','$gambar')");
		return $hsl;
	}
	function get_berita_by_kode($kode) {
		$hsl = $this->db->query("SELECT tb_berita.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tb_berita where id='$kode'");
		return $hsl;
	}
	function update_album($album_id, $album_nama, $user_id, $gambar) {
		$hsl = $this->db->query("update tb_album set nama='$album_nama',userid='$user_id',cover='$gambar' where id='$album_id'");
		return $hsl;
	}
	function update_album_tanpa_img($album_id, $album_nama, $user_id) {
		$hsl = $this->db->query("update tb_album set nama='$album_nama',userid='$user_id' where id='$album_id'");
		return $hsl;
	}
	function hapus_album($kode) {
		$hsl = $this->db->query("delete from tb_album where id='$kode'");
		return $hsl;
	}

}