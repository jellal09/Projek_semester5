<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model // function CRUD detail gambar
{
    // mengambil data pada tabel transaksi dan detail transaksi
public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('detail_transaksi');
        $this->db->join('transaksi','detail_transaksi.id_transaksi = transaksi.id_transaksi','inner');
        $query = $this->db->get()->result();
        return $query;   
       
        
    }
    //function untuk melihat tgl awal- akhir untuk proses filtering)
    public function view_by_date($tgl_awal, $tgl_akhir)
    {        $tgl_awal = $this->db->escape($tgl_awal);       
             $tgl_akhir = $this->db->escape($tgl_akhir);  
             $this->db->select('*');
             $this->db->from('detail_transaksi');
             $this->db->join('transaksi','detail_transaksi.id_transaksi = transaksi.id_transaksi','inner');      
             
             $this->db->where('DATE(tgl_transaksi) BETWEEN '.$tgl_awal.' AND '.$tgl_akhir); // Tambahkan where tanggal nya 

             $query = $this->db->get()->result();
             return $query;   
             //return $this->db->get('transaksi')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
    }
    
    public function delete($data)
    {
        $this->db->where('id_detail_transaksi',$data['id_detail_transaksi']);
        $this->db->delete('detail_transaksi',$data);
    }
}