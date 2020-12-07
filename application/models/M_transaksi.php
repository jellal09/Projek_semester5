<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

    public function simpan_transaksi($data)
    {
        $this->db->insert('transaksi', $data);      
    }
    public function simpan_detail_transaksi($detail_data)
    {
        $this->db->insert('detail_transaksi', $detail_data);      
    }

    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();    
    }
    public function detail_pesanan($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get()->row();      
    }
    public function rekening()
    {
        $this->db->select('*');
        $this->db->from('rekening');
        return $this->db->get()->result();   
    }
    public function upload_bukti_bayar($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('transaksi', $data);  
    }
   
}