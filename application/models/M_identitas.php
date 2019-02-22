<?php
class M_identitas extends CI_Model {

	function get_all_identitas() {

		$hsl = $this->db->get_where('tb_identitas', array('id' => '1'));

		return $hsl;
	}

	//UPDATE identitas //
	function update_idn($data) {
		return $this->db->update('tb_identitas', $data, 'id=1');
	}
	function update_identitas($kode, $email, $nohp, $alamat, $peta, $brand, $favicon) {
		$hsl = $this->db->query("UPDATE tb_identitas set email='$email',telepon='$nohp',alamat='$alamat',maps ='$peta',brand='$brand', favicon = '$favicon' where id='$kode'");
		return $hsl;
	}
	function update_identitas_tanpa_gambar($kode, $email, $nohp, $alamat, $peta) {
		$hsl = $this->db->query("UPDATE tb_identitas set email='$email',telepon='$nohp',alamat='$alamat',maps ='$peta' where id='$kode'");
		return $hsl;
	}
	function update_identitas_tanpa_brand($kode, $email, $nohp, $alamat, $peta, $brand) {
		$hsl = $this->db->query("UPDATE tb_identitas set email='$email',telepon='$nohp',alamat='$alamat',maps ='$peta',brand='$brand' where id='$kode'");
		return $hsl;
	}
	function update_identitas_tanpa_favion($kode, $email, $nohp, $alamat, $peta, $favicon) {
		$hsl = $this->db->query("UPDATE tb_identitas set email='$email',telepon='$nohp',alamat='$alamat',maps ='$peta',favicon = '$favicon' where id='$kode'");
		return $hsl;
	}
	//END UPDATE identitas//
}