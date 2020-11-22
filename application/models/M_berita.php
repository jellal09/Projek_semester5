<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->order_by('id_berita', 'desc');
        return $this->db->get()->result();   
        
    }
    public function edit($data)
    {
        $this->db->where('id_berita',$data['id_berita']);
        $this->db->update('berita',$data);
       
    }

}

/* End of file M_user.php */
