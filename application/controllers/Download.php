<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */

class Download extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('m_files');
		$this->load->helper('download');
		$this->load->model('m_pengunjung');
		$this->load->model('m_instagram');
		$this->load->model('m_identitas');
		$this->m_pengunjung->count_visitor();
	}
	function index() {
		$x['data'] = $this->m_files->get_all_files();
		$x['ig'] = $this->m_instagram->get_all_instagram();
		$x['iden'] = $this->m_identitas->get_all_identitas();
		$this->load->view('download', $x);
	}

	function get_file() {
		$id = $this->uri->segment(3);
		$get_db = $this->m_files->get_file_byid($id);
		$q = $get_db->row_array();
		$file = $q['data'];
		$path = './assets/files/' . $file;
		$data = file_get_contents($path);
		$name = $file;
		force_download($name, $data);
	}

}
