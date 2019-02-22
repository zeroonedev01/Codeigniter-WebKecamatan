<?php
class M_jenispelayanan extends CI_Model {

	function get_all_jenispelayanan() {
		return $query = $this->db->get('tb_jenispelayanan');
	}
	function simpan_jenispelayanan($data) {
		return $this->db->insert('tb_jenispelayanan', $data);
	}
	function update_jenispelayanan($data, $kode) {
		$this->db->where('id', $kode);
		return $this->db->update('tb_jenispelayanan', $data);
	}
	function hapus_jenispelayanan($kode) {
		return $this->db->delete('tb_jenispelayanan', array('id' => $kode));
	}

	//Front-end

}
