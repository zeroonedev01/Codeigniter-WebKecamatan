<?php
class Pegawai extends CI_Controller {
	private $kode = 4, $data;
	function __construct() {

		parent::__construct();
		$this->data = array(
			'judul' => $this->input->post('xjudul'),
			'isi' => $this->input->post('xisi'),
		);
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_statis');
		$this->load->library('upload');
	}

	function index() {
		$x['data'] = $this->m_statis->get_all_pegawai();
		$this->load->view('admin/v_pegawai', $x);
	}

	function update_pegawai() {
		// var_dump($this->data);
		// var_dump($this->kode);
		$this->m_statis->update_pegawai($this->data, $this->kode);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('admin/pegawai');
	}

}
