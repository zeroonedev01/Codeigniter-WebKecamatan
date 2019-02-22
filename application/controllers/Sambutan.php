<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */

class Sambutan extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('m_berita');
		$this->load->model('m_statis');
		$this->load->model('m_kategori');

		$this->load->model('m_pengumuman');
		$this->load->model('m_agenda');
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index() {
		$x['agendaterbaru'] = $this->m_agenda->get_agenda_terbaru();
		$x['allkate'] = $this->m_kategori->get_all_kategori();
		$x['pengumumanterbaru'] = $this->m_pengumuman->get_pengumuman_terbaru();
		$x['populer'] = $this->m_berita->get_berita_populer();
		$x['beritaterbaru'] = $this->m_berita->get_berita_terbaru();
		$x['statis'] = $this->m_statis->get_all_sambutan();
		$this->load->view('sambutan', $x);
	}

}
