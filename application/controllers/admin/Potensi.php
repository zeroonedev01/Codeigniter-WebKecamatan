<?php
class Potensi extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_potensi');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}

	function index() {
		$x['data'] = $this->m_potensi->tampil_potensi();
		$this->load->view('admin/v_potensi', $x);
	}
	function add_potensi() {
		$this->load->view('admin/v_add_potensi');
	}
	function get_edit() {
		$kode = $this->uri->segment(4);
		$x['data'] = $this->m_potensi->get_potensi_by_kode($kode);
		$this->load->view('admin/v_edit_potensi', $x);
	}
	function simpan_potensi() {
		$config['upload_path'] = './assets/images/potensi/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/potensi/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 710;
				$config['height'] = 460;
				$config['new_image'] = './assets/images/potensi/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$judul = strip_tags($this->input->post('xjudul'));
				$isi = $this->input->post('xisi');
				$string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
				$trim = trim($string);
				$slug = strtolower(str_replace(" ", "-", $trim));
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$userid = $p['id'];
				$this->m_potensi->simpan_potensi($judul, $isi, $userid, $gambar, $slug);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('admin/potensi');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('admin/potensi');
			}

		} else {
			redirect('admin/potensi');
		}

	}

	function update_potensi() {

		$config['upload_path'] = './assets/images/potensi/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/potensi/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 710;
				$config['height'] = 460;
				$config['new_image'] = './assets/images/potensi/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$isi = $this->input->post('xisi');
				$string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
				$trim = trim($string);
				$slug = strtolower(str_replace(" ", "-", $trim));
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$userid = $p['id'];
				$images = $this->input->post('gambar');
				$path = './assets/images/potensi/' . $images;
				if (file_exists($path)) {
					unlink($path);
				}

				$this->m_potensi->update_potensi($id, $judul, $isi, $userid, $gambar, $slug);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('admin/potensi');

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
			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$userid = $p['id'];
			$this->m_potensi->update_potensi_tanpa_img($id, $judul, $isi, $userid, $slug);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('admin/potensi');
		}

	}

	function hapus_potensi() {
		$kode = $this->input->post('kode');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/potensi/' . $gambar;
		unlink($path);
		$this->m_potensi->hapus_potensi($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('admin/potensi');
	}

}
