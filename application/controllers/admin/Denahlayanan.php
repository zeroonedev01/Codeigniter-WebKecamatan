<?php
class Denahlayanan extends CI_Controller {
	private $kode = 7, $data;
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
		$this->load->model('m_identitas');
		$this->load->model('m_statis');
		$this->load->library('upload');
	}

	function index() {
		$x['iden'] = $this->m_identitas->get_all_identitas();
		$x['data'] = $this->m_statis->get_all_denahlayanan();
		$this->load->view('admin/v_denahlayanan', $x);
	}

	function update_denahlayanan() {
		// var_dump($this->data);
		// var_dump($this->kode);
		$this->m_statis->update_denahlayanan($this->data, $this->kode);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('admin/denahlayanan');
	}

}
