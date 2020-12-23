<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model 
{
	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->where('produk.stok != 0');
		
		$this->db->order_by('produk.id_produk', 'desc');
		return $this->db->get()->result();
	}

	public function get_all_data_kategori()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->order_by('id_kategori', 'desc');
		return $this->db->get()->result();
	}

	public function detail_produk($id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->where('id_produk', $id_produk);
		return $this->db->get()->row();
	}

	public function gambar_produk($id_produk)
	{
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_produk', $id_produk);
		return $this->db->get()->result();
	}

	public function kategori($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('id_kategori', $id_kategori);
		return $this->db->get()->row();
	}

	public function get_all_data_produk($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->where('produk.id_kategori', $id_kategori);
		return $this->db->get()->result();
	}

	public function get_all_data_artikel()
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->order_by('id_berita', 'desc');
		return $this->db->get()->result();
	}

	public function detail_berita($id_berita)
	{
		$this->db->select('*');
		$this->db->from('berita');
		//$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->where('id_berita', $id_berita);
		return $this->db->get()->row();
	}

	public function cariProduk()
	{
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$keyword = $this->input->post('keyword', true);
		$this->db->like('nama_produk', $keyword);
		return $this->db->get('produk')->result();
	}

	
}