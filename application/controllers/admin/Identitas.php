<?php
class identitas extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_identitas');
		$this->load->library('upload');
	}

	function index() {
		$x['data'] = $this->m_identitas->get_all_identitas();
		$this->load->view('admin/v_identitas', $x);
	}

	function update_identitas() {
		$data = array();

		$config['upload_path'] = './assets/images/identitas/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|ico'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		$this->upload->initialize($config);
		// $this->load->library('upload', $config);
		$data['maps'] = $this->input->post('xmaps');
		$data['email'] = $this->input->post('xemail');
		$data['telepon'] = $this->input->post('xtelepon');
		$data['alamat'] = $this->input->post('xalamat');

		if (!$this->upload->do_upload('brand')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$fileData = $this->upload->data();
			$data['brand'] = $fileData['file_name'];
		}

		if (!$this->upload->do_upload('favicon')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$fileData = $this->upload->data();
			$data['favicon'] = $fileData['file_name'];
		}
		// print_r($data);die;
		$images1 = $this->input->post('ff1');
		$images2 = $this->input->post('ff2');
		$path1 = './assets/images/identitas/' . $images1;
		if (file_exists($path1)) {
			unlink($path1);
		}
		$path2 = './assets/images/identitas/' . $images2;
		if (file_exists($path2)) {
			unlink($path2);
		}

		$result = $this->m_identitas->update_idn($data);
		if ($result) {
			echo $this->session->set_flashdata('msg', 'info');
			redirect('admin/identitas');
		} else {
			echo $this->session->set_flashdata('msg', 'warning');
			redirect('admin/identitas');
		}

	}
}