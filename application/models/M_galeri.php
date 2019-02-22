<?php
class M_galeri extends CI_Model {

	function get_all_galeri() {
		$hsl = $this->db->query("SELECT tb_gallery.*,DATE_FORMAT(tb_gallery.tanggal,'%d/%m/%Y') AS tanggal, tb_album.nama as album, tb_user.nama as author FROM tb_gallery join tb_album on albumid=tb_album.id inner join tb_user on tb_gallery.userid = tb_user.id ORDER BY tb_gallery.id DESC");
		return $hsl;
	}
	function simpan_galeri($judul, $album, $user_id, $gambar) {
		$this->db->trans_start();
		$this->db->query("insert into tb_gallery(judul,albumid,userid,gambar) values ('$judul','$album','$user_id','$gambar')");
		$this->db->query("update tb_album set count=count+1 where id='$album'");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true) {
			return true;
		} else {
			return false;
		}

	}

	function update_galeri($galeri_id, $judul, $album, $user_id, $gambar) {
		$hsl = $this->db->query("update tb_gallery set judul='$judul',albumid='$album',userid='$user_id',gambar='$gambar' where id='$galeri_id'");
		return $hsl;
	}
	function update_galeri_tanpa_img($galeri_id, $judul, $album, $user_id) {
		$hsl = $this->db->query("update tb_gallery set judul='$judul',albumid='$album',userid='$user_id' where id='$galeri_id'");
		return $hsl;
	}
	function hapus_galeri($kode, $album) {
		$this->db->trans_start();
		$this->db->query("delete from tb_gallery where id='$kode'");
		$this->db->query("update tb_album set count=count-1 where id='$album'");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true) {
			return true;
		} else {
			return false;
		}

	}

	//Front-End
	function ambil_album() {
		$hsl = $this->db->get('tb_album');
		return $hsl;
	}
	function ambil_gallery() {
		$hsl = $this->db->get('tb_gallery');
		return $hsl;
	}
	function ambil_gambar($idalbum) {
		$this->db->from('tb_gallery');
		$this->db->where('albumid', $idalbum);
		$this->db->order_by('tanggal', 'DESC');
		$query = $this->db->get();
		return $query->result_array();

	}

	function get_galeri_home() {
		$hsl = $this->db->query("SELECT tb_gallery.*,DATE_FORMAT(tb_gallery.tanggal,'%d/%m/%Y') AS tanggal, tb_album.nama as album, tb_user.nama as author FROM tb_gallery join tb_album on albumid=tb_album.id inner join tb_user on tb_gallery.userid = tb_user.id ORDER BY tb_gallery.id DESC limit 6");
		return $hsl;
	}

	function get_galeri_by_album_id($idalbum) {
		$hsl = $this->db->query("SELECT tb_gallery.*,DATE_FORMAT(tb_gallery.tanggal,'%d/%m/%Y') AS tanggal, tb_album.nama as album, tb_user.nama as author FROM tb_gallery join tb_album on albumid=tb_album.id inner join tb_user on tb_gallery.userid = tb_user.id where albumid = '$idalbum'ORDER BY tb_gallery.id DESC");
		return $hsl;
	}

}