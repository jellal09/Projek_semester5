<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesanan_masuk extends CI_Model
{
    public function pesanan()
    {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->order_by('id_transaksi', 'desc');
    $this->db->where('status_order=0');
    
    return $this->db->get()->result();   
}

public function pesanan_diproses()
    {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->order_by('id_transaksi', 'desc');
    $this->db->where('status_order=1');
    
    return $this->db->get()->result();   
}

public function pesanan_dikirim()
    {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->order_by('id_transaksi', 'desc');
    $this->db->where('status_order=2');
    
    return $this->db->get()->result();   
}

public function pesanan_selesai()
    {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->order_by('id_transaksi', 'desc');
    $this->db->where('status_order=3');
    
    return $this->db->get()->result();   
}


public function update_order($data)
{
    $this->db->where('id_transaksi', $data['id_transaksi']);
    $this->db->update('transaksi', $data);   
}

public function detail_pesanan($id_transaksi)
{
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->join('detail_transaksi', 'detail_transaksi.id_transaksi = transaksi.id_transaksi', 'left');
    $this->db->where('transaksi.id_transaksi', $id_transaksi);
    return $this->db->get()->row();      
}

public function detail_transaksi($id_transaksi)
{
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->join('detail_transaksi', 'detail_transaksi.id_transaksi = transaksi.id_transaksi', 'left');
    $this->db->where('transaksi.id_transaksi', $id_transaksi);
    return $this->db->get()->result();      
} 
}