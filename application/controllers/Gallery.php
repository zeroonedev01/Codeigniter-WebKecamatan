<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */

class Gallery extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('m_galeri');
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index() {
		$x['albumda'] = $this->m_galeri->ambil_album();
		// var_dump($data->result());
		$this->load->view('gallery', $x);
	}
	function get_subkategori() {
		$id = $this->input->post('id');
		if ($id != 0) {
			$data = $this->m_galeri->ambil_gambar($id);
			echo json_encode($data);
		} else {
			$data = $this->m_galeri->ambil_gallery()->result_array();
			echo json_encode($data);
		}

	}

}
