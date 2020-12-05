<?php

use PhpParser\Node\Stmt\Return_;

defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function total_barang()
    {
        return $this->db->get('produk')->num_rows();
    }
    public function total_kategori()
    {
        return $this->db->get('kategori')->num_rows();
    }
    public function total_pesanan()
   {
        return $this->db->get('transaksi')->num_rows();
    }
    public function total_member()
    {
        return $this->db->get('pelanggan')->num_rows();
    }
    public function data_setting()
    {
        $this->db->select('*');
        $this->db->from('konfigurasi');   
        $this->db->where('id', 1);     
        return $this->db->get()->row();        
    }
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('konfigurasi', $data);  
    }
}

/* End of file M_admin.php */
