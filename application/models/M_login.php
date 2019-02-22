<?php
class M_login extends CI_Model {
	function cekadmin($u, $p) {
		$hasil = $this->db->query("SELECT * FROM tb_user WHERE username='$u' AND password=md5('$p')");
		return $hasil;
	}

}
