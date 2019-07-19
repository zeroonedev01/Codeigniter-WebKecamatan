<?php
class Agenda extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->model('m_identitas');
		$this->load->model('m_agenda');
		$this->load->model('m_identitas');
		$this->load->library('upload');
	}

	function index() {
		$x['iden'] = $this->m_identitas->get_all_identitas();
		$x['data'] = $this->m_agenda->get_all_agenda();
		$this->load->view('admin/v_agenda', $x);
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
	function simpan_agenda() {
		$nama_agenda = strip_tags($this->input->post('xnama_agenda'));
		$slug = $this->slugify($nama_agenda);
		$deskripsi = $this->input->post('xdeskripsi');
		$mulai = $this->input->post('xmulai');
		$selesai = $this->input->post('xselesai');
		$tempat = $this->input->post('xtempat');
		$color = $this->input->post('xcolor');
		$keterangan = $this->input->post('xketerangan');
		$this->m_agenda->simpan_agenda($nama_agenda, $deskripsi, $mulai, $selesai, $tempat, $color, $keterangan, $slug);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('admin/agenda');
	}

	function update_agenda() {
		$kode = strip_tags($this->input->post('kode'));
		$nama_agenda = strip_tags($this->input->post('xnama_agenda'));
		$slug = $this->slugify($nama_agenda);
		$deskripsi = $this->input->post('xdeskripsi');
		$mulai = $this->input->post('xmulai');
		$selesai = $this->input->post('xselesai');
		$tempat = $this->input->post('xtempat');
		$color = $this->input->post('xcolor');
		$keterangan = $this->input->post('xketerangan');
		$this->m_agenda->update_agenda($kode, $nama_agenda, $deskripsi, $mulai, $selesai, $tempat, $color, $keterangan, $slug);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('admin/agenda');
	}
	function hapus_agenda() {
		$kode = strip_tags($this->input->post('kode'));
		$this->m_agenda->hapus_agenda($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('admin/agenda');
	}

}