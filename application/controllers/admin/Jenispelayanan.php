<?php
class Jenispelayanan extends CI_Controller {
	public $data, $kode;
	function __construct() {
		parent::__construct();
		$this->data = array(
			'judul' => $this->input->post('xjudul'),
			'isi' => $this->input->post('xdeskripsi'),
		);
		$this->kode = strip_tags($this->input->post('kode'));
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_jenispelayanan');
		$this->load->library('upload');
	}

	function index() {
		$x['data'] = $this->m_jenispelayanan->get_all_jenispelayanan();
		$this->load->view('admin/v_jenispelayanan', $x);
	}

	function simpan_jenispelayanan() {
		// $data = array(
		// 	'judul' => $this->input->post('xjudul'),
		// 	'deskripsi' => $this->input->post('xdeskripsi'),
		// );
		// print_r($this->data);
		$this->m_jenispelayanan->simpan_jenispelayanan($this->data);
		echo $this->session->set_flashdata('msg', 'success', '$slug');
		redirect('admin/jenispelayanan');
	}

	function update_jenispelayanan() {
		// print_r($this->data, $this->kode);
		$this->m_jenispelayanan->update_jenispelayanan($this->data, $this->kode);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('admin/jenispelayanan');
	}
	function hapus_jenispelayanan() {
		$kode = strip_tags($this->input->post('kode'));
		$this->m_jenispelayanan->hapus_jenispelayanan($this->kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('admin/jenispelayanan');
	}

}