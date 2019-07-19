<?php
class M_potensi extends CI_Model {
	function get_all_potensi() {
		$hsl = $this->db->query("SELECT tb_potensi.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_potensi ORDER BY tanggal DESC");
		return $hsl;
	}
	function tampil_potensi() {
		$hsl = $this->db->query("SELECT tb_potensi.id, tb_potensi.judul, tb_potensi.tanggal, tb_potensi.isi, tb_potensi.slug,tb_potensi.gambar,tb_user.nama AS author, DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_potensi INNER join tb_user on tb_potensi.userid = tb_user.id ORDER BY tb_potensi.tanggal DESC");
		return $hsl;
	}

	function simpan_potensi($judul, $isi, $userid, $gambar, $slug) {
		$hsl = $this->db->query("insert into tb_potensi(judul,isi,userid,gambar,slug) values ('$judul','$isi','$userid','$gambar','$slug')");
		return $hsl;
	}
	function get_potensi_by_kode($kode) {
		$hsl = $this->db->query("SELECT tb_potensi.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tb_potensi where id='$kode'");
		return $hsl;
	}
	function update_potensi($id, $judul, $isi, $userid, $gambar, $slug) {
		$hsl = $this->db->query("update tb_potensi set judul='$judul',isi='$isi',userid='$userid',gambar='$gambar',slug='$slug' where id='$id'");
		return $hsl;
	}
	function update_potensi_tanpa_img($id, $judul, $isi, $userid, $slug) {
		$hsl = $this->db->query("update tb_potensi set judul='$judul',isi='$isi',userid='$userid',slug='$slug' where id='$id'");
		return $hsl;
	}
	function hapus_potensi($kode) {
		$hsl = $this->db->query("delete from tb_potensi where id='$kode'");
		return $hsl;
	}

	//Front-End
	function get_potensi() {
		// $hsl = $this->db->query("SELECT tb_potensi.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tb_potensi ORDER BY id DESC limit 4");
		// return $hsl;
		$this->db->select('*,DATE_FORMAT(tanggal,"%d %M %Y %h:%i ") AS tanggal1');
		$this->db->from('tb_potensi');
		$this->db->order_by('tanggal', 'DESC');
		$this->db->limit(6);
		$hsl = $this->db->get();
		return $hsl;
	}
	function get_potensi1() {
		// $hsl = $this->db->query("SELECT tb_potensi.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tb_potensi ORDER BY id DESC limit 4");
		// return $hsl;
		$this->db->select('*,DATE_FORMAT(tanggal,"%d %M %Y") AS tanggal1');
		$this->db->from('tb_potensi');
		$this->db->order_by('tanggal', 'DESC');
		$this->db->limit(6);
		$hsl = $this->db->get();
		return $hsl;
	}

	function potensi_perpage($offset, $limit) {
		$hsl = $this->db->query("SELECT tb_potensi.*,DATE_FORMAT(tanggal,'%d %M %Y %h:%i') AS tanggal1 FROM tb_potensi ORDER BY tanggal DESC limit $offset,$limit");
		return $hsl;
	}

	function potensi() {
		$hsl = $this->db->query("SELECT tb_potensi.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_potensi ORDER BY tanggal DESC");
		return $hsl;
	}
	function get_potensid_by_kode($kode) {
		$hsl = $this->db->query("SELECT tb_potensi.id, tb_potensi.judul, tb_potensi.tanggal, tb_potensi.isi, tb_potensi.slug,tb_potensi.gambar,tb_user.nama AS author, DATE_FORMAT(tanggal,'%d %M %Y %h:%i') AS tanggal1 FROM tb_potensi INNER join tb_user on tb_potensi.userid = tb_user.id where tb_potensi.id='$kode'");
		return $hsl;
	}

	function cari_potensi($keyword) {
		$hsl = $this->db->query("SELECT tb_potensi.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_potensi WHERE judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

}
