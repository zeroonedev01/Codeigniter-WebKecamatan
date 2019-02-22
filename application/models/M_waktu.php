<?php
class M_waktu extends CI_Model {

	function get_all_waktu() {
		$hsl = $this->db->query("select * from tb_buka");
		return $hsl;
	}
	function simpan_waktu($hari, $jam) {
		$hsl = $this->db->query("insert into tb_buka(hari,jam) values('$hari','$jam')");
		return $hsl;
	}
	function update_waktu($kode, $hari, $jam) {
		$hsl = $this->db->query("update tb_buka set hari='$hari', jam='$jam' where id='$kode'");
		return $hsl;
	}
	function hapus_waktu($kode) {
		$hsl = $this->db->query("delete from tb_buka where id='$kode'");
		return $hsl;
	}

	function get_waktu_byid($buka_id) {
		$hsl = $this->db->query("select * from tb_buka where id='$id'");
		return $hsl;
	}

}