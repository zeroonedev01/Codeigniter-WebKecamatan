<?php
class M_pengumuman extends CI_Model {

	function get_all_pengumuman() {
		$hsl = $this->db->query("SELECT tb_pengumuman.id, tb_pengumuman.judul, tb_pengumuman.isi, DATE_FORMAT(tb_pengumuman.tanggal,'%d/%m/%Y') AS tanggal1, tb_pengumuman.slug, tb_user.nama as author from tb_pengumuman inner join tb_user on tb_pengumuman.userid = tb_user.id  order by tb_pengumuman.tanggal DESC");
		return $hsl;
	}
	function simpan_pengumuman($judul, $deskripsi, $slug) {
		$author = $this->session->userdata('idadmin');
		$hsl = $this->db->query("INSERT INTO tb_pengumuman(judul,isi,userid,slug) VALUES ('$judul','$deskripsi','$author','$slug')");
		return $hsl;
	}
	function update_pengumuman($kode, $judul, $deskripsi, $slug) {
		$author = $this->session->userdata('idadmin');
		$hsl = $this->db->query("UPDATE tb_pengumuman SET judul='$judul',isi='$deskripsi',userid='$author', slug = '$slug' where id='$kode'");
		return $hsl;
	}
	function hapus_pengumuman($kode) {
		$hsl = $this->db->query("DELETE FROM tb_pengumuman WHERE id='$kode'");
		return $hsl;
	}

	//Front-end
	function get_pengumuman_home() {
		$this->db->select('*,DATE_FORMAT(tanggal,"%d %M %Y") AS tanggal1');
		$this->db->from('tb_pengumuman');
		$this->db->order_by('tanggal', 'DESC');
		$this->db->limit(4);
		$hsl = $this->db->get();
		return $hsl;
	}
	function get_pengumuman_terbaru() {
		$this->db->select('*,DATE_FORMAT(tanggal,"%d %M %Y %h:%i") AS tanggal1');
		$this->db->from('tb_pengumuman');
		$this->db->order_by('tanggal', 'DESC');
		$this->db->limit(3);
		$hsl = $this->db->get();

		return $hsl;
	}
	function pengumuman() {
		$hsl = $this->db->query("SELECT tb_pengumuman.id, tb_pengumuman.judul, tb_pengumuman.isi, DATE_FORMAT(tb_pengumuman.tanggal,'%d %M %Y %h:%i') AS tanggal1, tb_pengumuman.slug, tb_user.nama as author from tb_pengumuman inner join tb_user on tb_pengumuman.userid = tb_user.id  order by tb_pengumuman.tanggal DESC");
		return $hsl;
	}
	function pengumuman_perpage($offset, $limit) {
		$hsl = $this->db->query("SELECT tb_pengumuman.id, tb_pengumuman.judul, tb_pengumuman.isi, DATE_FORMAT(tb_pengumuman.tanggal,'%d %M %Y %h:%i') AS tanggal1, tb_pengumuman.slug, tb_user.nama as author from tb_pengumuman inner join tb_user on tb_pengumuman.userid = tb_user.id  order by tb_pengumuman.tanggal DESC limit $offset,$limit");
		return $hsl;
	}
	function get_pengumuman_by_kode($kode) {
		$hsl = $this->db->query("SELECT tb_pengumuman.id, tb_pengumuman.judul, tb_pengumuman.isi, DATE_FORMAT(tb_pengumuman.tanggal,'%d %M %Y %h:%i') AS tanggal1, tb_pengumuman.slug, tb_user.nama as author from tb_pengumuman inner join tb_user on tb_pengumuman.userid = tb_user.id  where tb_pengumuman.id = '$kode'");
		return $hsl;
	}
}
