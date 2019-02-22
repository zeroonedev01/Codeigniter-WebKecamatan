<?php
class Pengumuman extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_pengumuman');
		$this->load->library('upload');
	}

	function index() {
		$x['data'] = $this->m_pengumuman->get_all_pengumuman();
		$this->load->view('admin/v_pengumuman', $x);
	}

	function simpan_pengumuman() {
		$judul = strip_tags($this->input->post('xjudul'));
		$string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
		$trim = trim($string);
		$slug = strtolower(str_replace(" ", "-", $trim));
		$deskripsi = $this->input->post('xisi');
		$this->m_pengumuman->simpan_pengumuman($judul, $deskripsi, $slug);
		echo $this->session->set_flashdata('msg', 'success', '$slug');
		redirect('admin/pengumuman');
	}

	function update_pengumuman() {
		$kode = strip_tags($this->input->post('kode'));
		$judul = strip_tags($this->input->post('xjudul'));
		$string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
		$trim = trim($string);
		$slug = strtolower(str_replace(" ", "-", $trim));
		$deskripsi = $this->input->post('xisi');
		$this->m_pengumuman->update_pengumuman($kode, $judul, $deskripsi, $slug);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('admin/pengumuman');
	}
	function hapus_pengumuman() {
		$kode = strip_tags($this->input->post('kode'));
		$this->m_pengumuman->hapus_pengumuman($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('admin/pengumuman');
	}

}