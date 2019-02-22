<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */

class Berita extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('m_berita');
		$this->load->model('m_kategori');
		$this->load->model('m_pengumuman');
		$this->load->model('m_agenda');
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index() {
		$jum = $this->m_berita->berita();
		$page = $this->uri->segment(3);
		if (!$page):
			$offset = 0;
		else:
			$offset = $page;
		endif;
		$limit = 5;
		$config['base_url'] = site_url() . 'berita/index/';
		$config['total_rows'] = $jum->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		//Tambahan untuk styling
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close'] = '</span>Next</li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close'] = '</span></li>';
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Next >>';
		$config['prev_link'] = '<< Prev';
		$this->pagination->initialize($config);
		$x['page'] = $this->pagination->create_links();
		$x['data'] = $this->m_berita->berita_perpage($offset, $limit);
		// var_dump($this->m_berita->berita_perpage($offset, $limit)->result_array());
		$x['agendaterbaru'] = $this->m_agenda->get_agenda_terbaru();
		$x['allkate'] = $this->m_kategori->get_all_kategori();
		$x['pengumumanterbaru'] = $this->m_pengumuman->get_pengumuman_terbaru();
		$x['populer'] = $this->m_berita->get_berita_populer();
		$x['beritaterbaru'] = $this->m_berita->get_berita_terbaru();
		$this->load->view('berita', $x);
	}
	function detail($slugs) {
		$slug = htmlspecialchars($slugs, ENT_QUOTES);
		$query = $this->db->get_where('tb_berita', array('slug' => $slug));
		if ($query->num_rows() > 0) {
			$b = $query->row_array();
			$kode = $b['id'];
			$this->db->query("UPDATE tb_berita SET tayang=tayang+1 WHERE id='$kode'");
			$data = $this->m_berita->get_berita1_by_kode($kode);
			$row = $data->row_array();
			// var_dump($data);
			$x['id'] = $row['id'];
			$x['title'] = $row['judul'];
			$x['image'] = $row['gambar'];
			$x['blog'] = $row['isi'];
			$x['tanggal'] = $row['tanggal'];
			$x['author'] = $row['author'];
			$x['kategori'] = $row['kategori'];
			$x['slug'] = $row['slug'];
			$x['show_komentar'] = $this->m_berita->show_komentar_by_id($kode);
			$x['agendaterbaru'] = $this->m_agenda->get_agenda_terbaru();
			$x['allkate'] = $this->m_kategori->get_all_kategori();
			$x['pengumumanterbaru'] = $this->m_pengumuman->get_pengumuman_terbaru();
			$x['populer'] = $this->m_berita->get_berita_populer();
			$x['beritaterbaru'] = $this->m_berita->get_berita_terbaru();
			$this->load->view('berita_detail', $x);
		} else {
			redirect('berita');
		}
	}

	function kategori() {
		$kategori = str_replace("-", " ", $this->uri->segment(3));
		$query = $this->db->query("SELECT tb_berita.id, tb_berita.judul, tb_berita.tanggal, tb_berita.isi, tb_berita.tayang,tb_berita.slug,tb_berita.gambar,tb_kategori.nama as kategori ,tb_user.nama AS author, DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tb_berita INNER JOIN tb_kategori on tb_berita.kategoriid = tb_kategori.id INNER join tb_user on tb_berita.userid = tb_user.id WHERE kategori LIKE '%$kategori%' ORDER BY tayang DESC LIMIT 5");
		if ($query->num_rows() > 0) {
			$x['data'] = $query;
			$x['agendaterbaru'] = $this->m_agenda->get_agenda_terbaru();
			$x['allkate'] = $this->m_kategori->get_all_kategori();
			$x['pengumumanterbaru'] = $this->m_pengumuman->get_pengumuman_terbaru();
			$x['populer'] = $this->m_berita->get_berita_populer();
			$x['beritaterbaru'] = $this->m_berita->get_berita_terbaru();
			$this->load->view('berita', $x);
		} else {
			echo $this->session->set_flashdata('msg', '<div class="alert alert-danger">Tidak Ada berita untuk kategori <b>' . $kategori . '</b></div>');
			redirect('berita');
		}
	}

	function search() {
		$keyword = str_replace("'", "", htmlspecialchars($this->input->get('keyword', TRUE), ENT_QUOTES));
		$query = $this->m_berita->cari_berita($keyword);
		if ($query->num_rows() > 0) {
			$x['data'] = $query;
			$x['agendaterbaru'] = $this->m_agenda->get_agenda_terbaru();
			$x['allkate'] = $this->m_kategori->get_all_kategori();
			$x['pengumumanterbaru'] = $this->m_pengumuman->get_pengumuman_terbaru();
			$x['populer'] = $this->m_berita->get_berita_populer();
			$x['beritaterbaru'] = $this->m_berita->get_berita_terbaru();
		} else {
			echo $this->session->set_flashdata('msg', '<div class="alert alert-danger">Tidak dapat menemukan berita dengan kata kunci <b>' . $keyword . '</b></div>');
			redirect('berita');
		}
	}

	function komentar() {
		$kode = htmlspecialchars($this->input->post('id', TRUE), ENT_QUOTES);
		$data = $this->m_berita->get_berita1_by_kode($kode);
		$row = $data->row_array();
		$slug = $row['slug'];
		$nama = htmlspecialchars($this->input->post('nama', TRUE), ENT_QUOTES);
		$email = htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES);
		$komentar = nl2br(htmlspecialchars($this->input->post('komentar', TRUE), ENT_QUOTES));
		if (empty($nama) || empty($email)) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Masukkan input dengan benar.</div>');
			redirect('berita/vw-' . $slug);
		} else {
			$data = array(
				'nama' => $nama,
				'email' => $email,
				'isi' => $komentar,
				'status' => '0',
				'beritaid' => $kode,
			);

			$this->db->insert('tb_komentar', $data);
			$this->session->set_flashdata('msg', '<div class="alert alert-info">Komentar Anda akan tampil setelah moderasi.</div>');
			redirect('berita/vw-' . $slug);
		}
	}

}
