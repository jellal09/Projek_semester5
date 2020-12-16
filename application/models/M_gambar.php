<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_gambar extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('produk.*,COUNT(gambar.id_produk) as total_gambar');
        $this->db->from('produk');
        $this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('produk.id_produk', 'desc');
        
        return $this->db->get()->result();    
    }

    public function get_data($id_gambar)
    {
        $this->db->select('*');
        $this->db->from('gambar');
        $this->db->where('id_gambar', $id_gambar);
        return $this->db->get()->row();   
    }

    public function get_gambar($id_produk)
    {
        $this->db->select('*');
        $this->db->from('gambar');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->result();   
    }

    public function tambah($data)
    {
        $this->db->insert('gambar', $data);
        
    }

    public function delete($data)
    {
        $this->db->where('id_gambar', $data['id_gambar']);
        $this->db->delete('gambar', $data);  
    }
}