<?php
class Berita extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_kategori');
		$this->load->model('m_berita');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}

	function index() {
		$x['data'] = $this->m_berita->tampil_berita();
		$this->load->view('admin/v_berita', $x);
	}
	function add_berita() {
		$x['kat'] = $this->m_kategori->get_all_kategori();
		$this->load->view('admin/v_add_berita', $x);
	}
	function get_edit() {
		$kode = $this->uri->segment(4);
		$x['data'] = $this->m_berita->get_berita_by_kode($kode);
		$x['kat'] = $this->m_kategori->get_all_kategori();
		$this->load->view('admin/v_edit_berita', $x);
	}
	function simpan_berita() {
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 710;
				$config['height'] = 460;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$judul = strip_tags($this->input->post('xjudul'));
				$isi = $this->input->post('xisi');
				$string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
				$trim = trim($string);
				$slug = strtolower(str_replace(" ", "-", $trim));
				$kategoriid = strip_tags($this->input->post('xkategori'));
				$data = $this->m_kategori->get_kategori_byid($kategori_id);
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$userid = $p['id'];
				$this->m_berita->simpan_berita($judul, $isi, $kategoriid, $userid, $gambar, $slug);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('admin/berita');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('admin/berita');
			}

		} else {
			redirect('admin/berita');
		}

	}

	function update_berita() {

		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 710;
				$config['height'] = 460;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$isi = $this->input->post('xisi');
				$string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
				$trim = trim($string);
				$slug = strtolower(str_replace(" ", "-", $trim));
				$kategoriid = strip_tags($this->input->post('xkategori'));
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$userid = $p['id'];

				$this->m_berita->update_berita($id, $judul, $isi, $kategoriid, $userid, $gambar, $slug);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('admin/berita');

			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('admin/pengguna');
			}

		} else {
			$id = $this->input->post('kode');
			$judul = strip_tags($this->input->post('xjudul'));
			$isi = $this->input->post('xisi');
			$string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
			$trim = trim($string);
			$slug = strtolower(str_replace(" ", "-", $trim));
			$kategoriid = strip_tags($this->input->post('xkategori'));
			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$userid = $p['id'];
			$this->m_berita->update_berita_tanpa_img($id, $judul, $isi, $kategoriid, $userid, $slug);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('admin/berita');
		}

	}

	function hapus_berita() {
		$kode = $this->input->post('kode');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_berita->hapus_berita($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('admin/berita');
	}

}
