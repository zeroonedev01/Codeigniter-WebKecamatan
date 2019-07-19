<?php
class M_berita extends CI_Model {
	function get_all_berita() {
		$hsl = $this->db->query("SELECT tb_berita.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_berita ORDER BY tanggal DESC");
		return $hsl;
	}
	function tampil_berita() {
		$hsl = $this->db->query("SELECT tb_berita.id, tb_berita.judul, tb_berita.tanggal, tb_berita.isi, tb_berita.tayang,tb_berita.slug,tb_berita.gambar,tb_kategori.nama as kategori ,tb_user.nama AS author, DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_berita INNER JOIN tb_kategori on tb_berita.kategoriid = tb_kategori.id INNER join tb_user on tb_berita.userid = tb_user.id ORDER BY tanggal DESC");
		return $hsl;
	}

	function simpan_berita($judul, $isi, $kategoriid, $userid, $gambar, $slug, $tanggal) {
		$hsl = $this->db->query("insert into tb_berita(judul,isi,kategoriid,userid,gambar,slug,tanggal) values ('$judul','$isi','$kategoriid','$userid','$gambar','$slug','$tanggal')");
		return $hsl;
	}
	function get_berita_by_kode($kode) {
		$hsl = $this->db->query("SELECT tb_berita.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_berita where id='$kode'");
		return $hsl;
	}
	function update_berita($id, $judul, $isi, $kategoriid, $userid, $gambar, $slug, $tanggal) {
		$hsl = $this->db->query("update tb_berita set judul='$judul',isi='$isi',kategoriid='$kategoriid',userid='$userid',gambar='$gambar',slug='$slug', tanggal='$tanggal' where id='$id'");
		return $hsl;
	}
	function update_berita_tanpa_img($id, $judul, $isi, $kategoriid, $userid, $slug, $tanggal) {
		$hsl = $this->db->query("update tb_berita set judul='$judul',isi='$isi',kategoriid='$kategoriid',userid='$userid',slug='$slug', tanggal='$tanggal' where id='$id'");
		return $hsl;
	}
	function hapus_berita($kode) {
		$hsl = $this->db->query("delete from tb_berita where id='$kode'");
		return $hsl;
	}

	//Front-End
	function get_berita_home() {
		$this->db->select('*,DATE_FORMAT(tanggal,"%d %M %Y") AS tanggal1');
		$this->db->from('tb_berita');
		$this->db->join('tb_user', 'tb_user.id = tb_berita.userid', 'INNER');
		$this->db->order_by('tanggal', 'DESC');
		$this->db->limit(4, 1);
		$hsl = $this->db->get();
		return $hsl;
		// $hsl = $this->db->query("SELECT tb_berita.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tb_berita ORDER BY id DESC limit 1,4");
		// return $hsl;
	}
	function get_berita_pertama() {
		$this->db->select('*,DATE_FORMAT(tanggal,"%d %M %Y") AS tanggal1');
		$this->db->from('tb_berita');
		$this->db->join('tb_user', 'tb_user.id = tb_berita.userid', 'INNER');
		$this->db->order_by('tanggal', 'DESC');
		$this->db->limit(1);
		$hsl = $this->db->get();

		return $hsl;
	}
	function get_berita_populer() {
		$this->db->select('*,DATE_FORMAT(tanggal,"%d %M %Y %h:%i") AS tanggal1');
		$this->db->from('tb_berita');
		$this->db->join('tb_user', 'tb_user.id = tb_berita.userid', 'INNER');
		$this->db->order_by('tayang', 'DESC');
		$this->db->limit(3);
		$hsl = $this->db->get();

		return $hsl;
	}
	function get_berita_terbaru() {
		$this->db->select('*,DATE_FORMAT(tanggal,"%d %M %Y %h:%i") AS tanggal1');
		$this->db->from('tb_berita');
		$this->db->join('tb_user', 'tb_user.id = tb_berita.userid', 'INNER');
		$this->db->order_by('tanggal', 'DESC');
		$this->db->limit(3);
		$hsl = $this->db->get();

		return $hsl;
	}

	function berita_perpage($offset, $limit) {
		$hsl = $this->db->query("SELECT tb_berita.id, tb_berita.judul, tb_berita.tanggal, tb_berita.isi, tb_berita.tayang,tb_berita.slug,tb_berita.gambar,tb_kategori.nama as kategori ,tb_user.nama AS author, DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_berita INNER JOIN tb_kategori on tb_berita.kategoriid = tb_kategori.id INNER join tb_user on tb_berita.userid = tb_user.id ORDER BY tanggal DESC limit $offset,$limit");
		return $hsl;
	}

	function berita() {
		$hsl = $this->db->query("SELECT tb_berita.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_berita ORDER BY tanggal DESC");
		return $hsl;
		// $hsl = $this->db->query("SELECT tb_berita.id, tb_berita.judul, tb_berita.tanggal, tb_berita.isi, tb_berita.tayang,tb_berita.slug,tb_berita.gambar,tb_kategori.nama as kategori ,tb_user.nama AS author, DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tb_berita INNER JOIN tb_kategori on tb_berita.kategoriid = tb_kategori.id INNER join tb_user on tb_berita.userid = tb_user.id ORDER BY id DESC");
		// return $hsl;
	}
	function get_berita1_by_kode($kode) {
		$hsl = $this->db->get_where('vw_berita', array('id' => $kode));
		return $hsl;
	}

	function cari_berita($keyword) {
		$hsl = $this->db->query("SELECT tb_berita.id, tb_berita.judul, tb_berita.tanggal, tb_berita.isi, tb_berita.tayang,tb_berita.slug,tb_berita.gambar,tb_kategori.nama as kategori ,tb_user.nama AS author, DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal1 FROM tb_berita INNER JOIN tb_kategori on tb_berita.kategoriid = tb_kategori.id INNER join tb_user on tb_berita.userid = tb_user.id WHERE judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

	function show_komentar_by_id($kode) {
		$hsl = $this->db->query("SELECT * FROM tb_komentar WHERE beritaid='$kode' AND status='1' AND parent='0'");
		return $hsl;
	}

}
