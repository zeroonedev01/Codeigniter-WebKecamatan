<?php
class Dashboard extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->model('m_pengunjung');
	}
	function index() {
		if ($this->session->userdata('akses') == '1') {
			$x['iden'] = $this->m_identitas->get_all_identitas();
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
			$this->load->view('admin/v_dashboard', $x);
		} else {
			redirect('administrator');
		}

	}
	// public function get_unread_message($count) {
	// 	$data = $this->m_pengunjung->where()->num_rows();
	// 	echo json_encode($data);
	// }

}