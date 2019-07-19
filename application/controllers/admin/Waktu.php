<?php
class Waktu extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->model('m_waktu');
		$this->load->library('upload');
	}

	function index() {
		$x['data'] = $this->m_waktu->get_all_waktu();
		$x['iden'] = $this->m_identitas->get_all_identitas();
		$this->load->view('admin/v_waktu', $x);
	}

	function simpan_waktu() {
		$hari = strip_tags($this->input->post('xhari'));
		$jam = strip_tags($this->input->post('xjam'));
		$this->m_waktu->simpan_waktu($hari, $jam);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('admin/waktu');
	}

	function update_waktu() {
		$kode = strip_tags($this->input->post('kode'));
		$hari = strip_tags($this->input->post('xhari'));
		$jam = strip_tags($this->input->post('xjam'));
		$this->m_waktu->update_waktu($kode, $hari, $jam);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('admin/waktu');
	}
	function hapus_waktu() {
		$kode = strip_tags($this->input->post('kode'));
		$this->m_waktu->hapus_waktu($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('admin/waktu');
	}

}
