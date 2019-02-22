<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */

class Instagram_gal extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index() {
		// $x['ber_pertama'] = $this->m_berita->get_berita_pertama();
		// $x['berita'] = $this->m_berita->get_berita_home();
		// $x['statis'] = $this->m_statis->get_all_Gallery();
		// $x['pengumuman'] = $this->m_pengumuman->get_pengumuman_home();
		// $x['agenda'] = $this->m_agenda->get_agenda_home();
		$this->load->view('instagram_feed');
	}

}
