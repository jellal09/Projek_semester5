<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_konfigurasi extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('setting');
        $this->db->order_by('id_konfigurasi', 'desc');
        return $this->db->get()->result();   
        
    }
    public function edit($data)
    {
        $this->db->where('id_konfigurasi',$data['id_konfigurasi']);
        $this->db->update('setting',$data);
       
    }

}

/* End of file M_user.php */
