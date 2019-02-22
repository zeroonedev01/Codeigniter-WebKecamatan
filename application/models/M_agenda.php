<?php
class M_agenda extends CI_Model {

	function get_all_agenda() {
		$hsl = $this->db->query("SELECT tb_agenda.id, tb_agenda.nama, tb_agenda.tanggal, tb_agenda.deskripsi, tb_agenda.startdate, tb_agenda.enddate, tb_agenda.tempat, tb_agenda.waktu, tb_agenda.ket, tb_user.nama as userid,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tb_agenda INNER JOIN tb_user on tb_agenda.userid = tb_user.id ORDER BY id DESC");
		return $hsl;
	}
	function simpan_agenda($nama_agenda, $deskripsi, $mulai, $selesai, $tempat, $waktu, $keterangan, $slug) {
		$author = $this->session->userdata('idadmin');
		$hsl = $this->db->query("INSERT INTO tb_agenda(nama,deskripsi,startdate,enddate,tempat,waktu,ket,userid,slug) VALUES ('$nama_agenda','$deskripsi','$mulai','$selesai','$tempat','$waktu','$keterangan','$author', '$slug')");
		return $hsl;
	}
	function update_agenda($kode, $nama_agenda, $deskripsi, $mulai, $selesai, $tempat, $waktu, $keterangan, $slug) {
		$author = $this->session->userdata('idadmin');
		$hsl = $this->db->query("UPDATE tb_agenda SET nama='$nama_agenda',deskripsi='$deskripsi',startdate='$mulai',enddate='$selesai',tempat='$tempat',waktu='$waktu',ket='$keterangan',userid='$author', slug= '$slug' where id='$kode'");
		return $hsl;
	}
	function hapus_agenda($kode) {
		$hsl = $this->db->query("DELETE FROM tb_agenda WHERE id='$kode'");
		return $hsl;
	}

	//front-end
	function get_agenda_home() {
		$this->db->select('*,DATE_FORMAT(tanggal,"%d %M %Y %h:%i ") AS tanggal');
		$this->db->from('tb_agenda');
		$this->db->order_by('startdate', 'DESC');
		$this->db->limit(4);
		$hsl = $this->db->get();
		return $hsl;
		// $hsl = $this->db->query("SELECT tb_agenda.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tb_agenda ORDER BY id DESC limit 1,4");
		// return $hsl;
	}
	function get_agenda_terbaru() {
		$this->db->select('*,DATE_FORMAT(tanggal,"%d %M %Y %h:%i ") AS tanggal');
		$this->db->from('tb_agenda');
		$this->db->order_by('startdate', 'DESC');
		$this->db->limit(3);
		$hsl = $this->db->get();
		return $hsl;
		// $hsl = $this->db->query("SELECT tb_agenda.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tb_agenda ORDER BY id DESC limit 1,4");
		// return $hsl;
	}
	// function get_agenda_home() {
	// 	$hsl = $this->db->query("SELECT tb_agenda.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tb_agenda ORDER BY id DESC limit 3");
	// 	return $hsl;
	// }
	function agenda() {
		$hsl = $this->db->query("SELECT tb_agenda.*,DATE_FORMAT(tanggal,'%d %M %Y %h:%i ') AS tanggal FROM tb_agenda ORDER BY id DESC");
		return $hsl;
	}
	function agenda_perpage($offset, $limit) {
		$hsl = $this->db->query("SELECT tb_agenda.id, tb_agenda.nama, tb_agenda.deskripsi, tb_agenda.startdate,tb_agenda.enddate,tb_agenda.tempat,tb_agenda.waktu ,tb_agenda.ket,tb_agenda.slug,tb_user.nama AS author, DATE_FORMAT(tanggal,'%d %M %Y %h:%i ') AS tanggal FROM tb_agenda INNER JOIN tb_user on tb_agenda.userid = tb_user.id ORDER BY id DESC limit $offset,$limit");
		return $hsl;
	}
	function get_agenda_by_kode($kode) {
		$hsl = $this->db->query("SELECT tb_agenda.id, tb_agenda.nama, tb_agenda.deskripsi,DATE_FORMAT(tb_agenda.startdate,'%d %M %Y') AS startdate,DATE_FORMAT(tb_agenda.enddate,'%d %M %Y') AS enddate ,tb_agenda.tempat,tb_agenda.waktu ,tb_agenda.ket,tb_agenda.slug,tb_user.nama AS author, DATE_FORMAT(tanggal,'%d %M %Y %h:%i ') AS tanggal FROM tb_agenda INNER JOIN tb_user on tb_agenda.userid = tb_user.id where tb_agenda.id ='$kode'");
		// $hsl = $this->db->get_where('vw_berita', array('id' => $kode));
		return $hsl;
	}

}