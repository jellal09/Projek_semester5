<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
	}

	public function index()
	{
	/*	$data = array(
			'title' => 'Home',
			'produk' => $this->m_home->get_all_data(),
			'isi' => 'v_home',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE); */
 		$lama=1;
        $this->db->query("DELETE FROM transaksi WHERE STATUS_BAYAR='0' AND DATEDIFF(CURDATE(), TGL_TRANSAKSI) >= $lama");
		$data['title'] = 'Home';
		$data['produk'] = $this->m_home->get_all_data();
		if ($this->input->post('keyword')) {
			$data['produk'] = $this->m_home->cariProduk();
		}
		$data['isi'] = 'v_home';
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function kategori($id_kategori)
	{
		$kategori = $this->m_home->kategori($id_kategori);
		$data = array(
			'title' => 'Kategori Produk : ' . $kategori->nama_kategori,
			'produk' => $this->m_home->get_all_data_produk($id_kategori),
			'isi' => 'v_kategori_produk',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function detail_produk($id_produk)
	{
		$data = array(
			'title' => 'Detail Produk',
			'gambar' => $this->m_home->gambar_produk($id_produk),
			'produk' => $this->m_home->detail_produk($id_produk),
			'isi' => 'v_detail_produk',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function artikel()
	{
		$data = array(
			'title' => 'Artikel',
			'berita' => $this->m_home->get_all_data_artikel(),
			'isi' => 'v_artikel',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function detail_berita($id_berita)
	{
		$data = array(
			'title' => 'Artikel',
			'berita' => $this->m_home->detail_berita($id_berita),
			'isi' => 'v_detail_berita',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}



}
