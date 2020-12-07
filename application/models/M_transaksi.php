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
}