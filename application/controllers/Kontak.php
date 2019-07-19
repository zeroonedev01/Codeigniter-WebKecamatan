<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */

class Kontak extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('m_kontak');
		$this->load->model('m_identitas');
		$this->load->model('m_waktu');
		$this->load->model('m_pengunjung');
		$this->load->model('m_instagram');
		$this->load->model('m_identitas');
		$this->m_pengunjung->count_visitor();
	}
	function index() {
		$x['identitas'] = $this->m_identitas->get_all_identitas();

		$x['waktu'] = $this->m_waktu->get_all_waktu();
		$x['ig'] = $this->m_instagram->get_all_instagram();
		$x['iden'] = $this->m_identitas->get_all_identitas();
		$this->load->view('kontak', $x);
	}

	function kirim_pesan() {
		$nama = htmlspecialchars($this->input->post('xnama', TRUE), ENT_QUOTES);
		$email = htmlspecialchars($this->input->post('xemail', TRUE), ENT_QUOTES);
		$kontak = htmlspecialchars($this->input->post('xtelp', TRUE), ENT_QUOTES);
		$pesan = htmlspecialchars($this->input->post('xpesan', TRUE), ENT_QUOTES);
		$this->m_kontak->kirim_pesan($nama, $email, $kontak, $pesan);
		echo $this->session->set_flashdata('msg', '<p><strong> NB: </strong> Terima Kasih Telah Menghubungi Kami.</p>');
		redirect('beranda');
	}

	function kirim_pesanloveandtruth() {
		$nama = htmlspecialchars($this->input->post('xnama', TRUE), ENT_QUOTES);
		$email = htmlspecialchars($this->input->post('xemail', TRUE), ENT_QUOTES);
		$kontak = htmlspecialchars($this->input->post('xtelp', TRUE), ENT_QUOTES);
		$pesan = htmlspecialchars($this->input->post('xpesan', TRUE), ENT_QUOTES);
		$this->m_kontak->kirim_pesan($nama, $email, $kontak, $pesan);
		echo $this->session->set_flashdata('msg', '<p><strong> NB: </strong> Terima Kasih Telah Menghubungi Kami.</p>');
		redirect('kontak');
	}
}
