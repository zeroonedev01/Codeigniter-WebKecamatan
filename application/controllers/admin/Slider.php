<?php
class slider extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_slider');
		$this->load->library('upload');
	}

	function index() {
		$kode = $this->session->userdata('idadmin');
		$x['data'] = $this->m_slider->get_all_slider();
		$this->load->view('admin/v_slider', $x);
	}
	function update_slider() {

		$config['upload_path'] = './assets/images/slider/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/slider/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '90%';
				$config['width'] = 1100;
				$config['height'] = 500;
				$config['new_image'] = './assets/images/slider/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$album_id = $this->input->post('kode');
				$images = $this->input->post('gambar');
				$path = './assets/images/slider/' . $images;
				unlink($path);
				$this->m_slider->update_slider($gambar, $album_id);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('admin/slider');

			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('admin/slider');
			}

		} else {

		}

	}

}