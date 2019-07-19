<?php
class Pengumuman extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->model('m_pengumuman');
		$this->load->library('upload');
	}

	function index() {
		$x['iden'] = $this->m_identitas->get_all_identitas();
		$x['data'] = $this->m_pengumuman->get_all_pengumuman();
		$this->load->view('admin/v_pengumuman', $x);
	}
public function slugify($string) {
		//remove prepositions
		$preps = array('in', 'at', 'on', 'by', 'into', 'off', 'onto', 'from', 'to', 'with', 'a', 'an', 'the');
		$pattern = '/\b(?:' . join('|', $preps) . ')\b/i';
		$string = preg_replace($pattern, '', $string);

		// replace non letter or digits by -
		$string = preg_replace('~[^\\pL\d]+~u', '-', $string);

		// trim
		$string = trim($string, '-');

		// transliterate
		//$string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);

		// lowercase
		$string = strtolower($string);

		// remove unwanted characters
		$string = preg_replace('~[^-\w]+~', '', $string);

		if (empty($string)) {
			return 'n-a';
		}

		return $string;
	}
	function simpan_pengumuman() {
		$judul = strip_tags($this->input->post('xjudul'));
		$slug = $this->slugify($judul);
		$deskripsi = $this->input->post('xisi');
		$this->m_pengumuman->simpan_pengumuman($judul, $deskripsi, $slug);
		echo $this->session->set_flashdata('msg', 'success', '$slug');
		redirect('admin/pengumuman');
	}

	function update_pengumuman() {
		$kode = strip_tags($this->input->post('kode'));
		$judul = strip_tags($this->input->post('xjudul'));
		$slug = $this->slugify($judul);
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