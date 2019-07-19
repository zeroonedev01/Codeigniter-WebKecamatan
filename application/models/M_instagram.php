<?php
class M_instagram extends CI_Model {

	function get_all_instagram() {

		$hsl = $this->db->get_where('tb_igfeed', array('id' => '1'));

		return $hsl;
	}

	//UPDATE instagram //
	function update_idn($data) {
		return $this->db->update('tb_igfeed', $data, 'id=1');
	}
	//END UPDATE instagram//
}