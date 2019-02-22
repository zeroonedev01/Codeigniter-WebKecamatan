<?php
class Socmed extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_socmed');
		$this->load->library('upload');
	}

	function index() {
		$x['data'] = $this->m_socmed->get_all_socmed();
		$this->load->view('admin/v_socmed', $x);
	}

	function simpan_socmed() {
		$nama = strip_tags($this->input->post('xnama'));
		$url = strip_tags($this->input->post('xurl'));
		$icon = strip_tags($this->input->post('xicon'));
		$this->m_socmed->simpan_socmed($nama, $url, $icon);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('admin/socmed');
	}

	function update_socmed() {
		$kode = strip_tags($this->input->post('kode'));
		$nama = strip_tags($this->input->post('xnama'));
		$url = strip_tags($this->input->post('xurl'));
		$icon = strip_tags($this->input->post('xicon'));
		$this->m_socmed->update_socmed($kode, $nama, $url, $icon);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('admin/socmed');
	}
	function hapus_socmed() {
		$kode = strip_tags($this->input->post('kode'));
		$this->m_socmed->hapus_socmed($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('admin/socmed');
	}

}
