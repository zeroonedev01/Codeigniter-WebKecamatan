<?php
class M_pengguna extends CI_Model {

	function get_all_pengguna() {
		$hsl = $this->db->query("SELECT tb_user.*,IF(jenkel='L','Laki-Laki','Perempuan') AS jenkel FROM tb_user");
		return $hsl;
	}

	function simpan_pengguna($nama, $jenkel, $username, $password, $email, $nohp, $level, $gambar) {
		$hsl = $this->db->query("INSERT INTO tb_user (nama,jenkel,username,password,email,nohp,level,photo) VALUES ('$nama','$jenkel','$username',md5('$password'),'$email','$nohp','$level','$gambar')");
		return $hsl;
	}

	function simpan_pengguna_tanpa_gambar($nama, $jenkel, $username, $password, $email, $nohp, $level) {
		$hsl = $this->db->query("INSERT INTO tb_user (nama,jenkel,username,password,email,nohp,level) VALUES ('$nama','$jenkel','$username',md5('$password'),'$email','$nohp','$level')");
		return $hsl;
	}

	//UPDATE PENGGUNA //
	function update_pengguna_tanpa_pass($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level, $gambar) {
		$hsl = $this->db->query("UPDATE tb_user set nama='$nama',jenkel='$jenkel',username='$username',email='$email',nohp='$nohp',level='$level',photo='$gambar' where id='$kode'");
		return $hsl;
	}
	function update_pengguna($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level, $gambar) {
		$hsl = $this->db->query("UPDATE tb_user set nama='$nama',jenkel='$jenkel',username='$username',password=md5('$password'),email='$email',nohp='$nohp',level='$level',photo='$gambar' where id='$kode'");
		return $hsl;
	}

	function update_pengguna_tanpa_pass_dan_gambar($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level) {
		$hsl = $this->db->query("UPDATE tb_user set nama='$nama',jenkel='$jenkel',username='$username',email='$email',nohp='$nohp',level='$level' where id='$kode'");
		return $hsl;
	}
	function update_pengguna_tanpa_gambar($kode, $nama, $jenkel, $username, $password, $email, $nohp, $level) {
		$hsl = $this->db->query("UPDATE tb_user set nama='$nama',jenkel='$jenkel',username='$username',password=md5('$password'),email='$email',nohp='$nohp',level='$level' where id='$kode'");
		return $hsl;
	}
	//END UPDATE PENGGUNA//

	function hapus_pengguna($kode) {
		$hsl = $this->db->query("DELETE FROM tb_user where id='$kode'");
		return $hsl;
	}
	function getusername($id) {
		$hsl = $this->db->query("SELECT * FROM tb_user where id='$id'");
		return $hsl;
	}
	function resetpass($id, $pass) {
		$hsl = $this->db->query("UPDATE tb_user set password=md5('$pass') where id='$id'");
		return $hsl;
	}

	function get_pengguna_login($kode) {
		$hsl = $this->db->query("SELECT * FROM tb_user where id='$kode'");
		return $hsl;
	}

}