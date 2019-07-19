<?php
class Sambutan extends CI_Controller {
	private $kode = 1;
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->model('m_statis');
		$this->load->library('upload');
	}

	function index() {
		$x['iden'] = $this->m_identitas->get_all_identitas();
		$x['data'] = $this->m_statis->get_all_sambutan();
		$this->load->view('admin/v_sambutan', $x);
	}

	function update_sambutan() {
		$config['upload_path'] = './assets/images/sambutan/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if ($this->upload->do_upload('filefoto')) {
			$gbr = $this->upload->data();
			//Compress Image
			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/images/sambutan/' . $gbr['file_name'];
			$config['create_thumb'] = FALSE;
			$config['quality'] = '60%';
			$config['width'] = 500;
			$config['height'] = '1';
			$config['maintain_ratio'] = TRUE;
			$config['master_dim'] = 'width';
			$config['new_image'] = './assets/images/sambutan/' . $gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$data['gambar'] = $gbr['file_name'];
			$data['judul'] = $this->input->post('xjudul');
			$data['isi'] = $this->input->post('xisi');
			$images = $this->input->post('gambar');
			$path = './assets/images/sambutan/' . $images;
			if (file_exists($path)) {
				unlink($path);
			}
			// var_dump($data);
			// var_dump($this->kode);
			$this->m_statis->update_sambutan($data, $this->kode);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('admin/sambutan');

		} else {

			$data['judul'] = $this->input->post('xjudul');
			$data['isi'] = $this->input->post('xisi');
			// var_dump($data);
			// var_dump($this->kode);
			$this->m_statis->update_sambutan($data, $this->kode);
			echo $this->session->set_flashdata('msg', 'info1');
			redirect('admin/sambutan');
		}

	}
}