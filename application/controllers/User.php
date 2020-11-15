<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
	$this->load->library('form_validation','url');
    $this->load->model('m_user');
      
	}

    // List all your items
    public function index( $offset = 0 )
    {
        $data = array(
            'title' => 'User',
            'user' => $this->m_user->get_all_data(), 
            'isi' => 'v_user',
        );
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }
    
    // tambah data user
    public function add()
    {
        $data= array(
            'username'=> $this->input->post('username'),
            'password' =>$this->input->post('password'),
            'nama' =>$this->input->post('nama'),
            'email' =>$this->input->post('email'),
            'tanggal_update' =>$this->input->post('tanggal_update'),
            'akses_level' =>$this->input->post('akses_level')
        );
        $this->db->insert('user', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data User Berhasil Ditambahkan
        </div>');
        redirect('auth/login_user');
    
    }

    //Update one item
    public function update( $id = NULL )
    {

    }
    //Delete one item
    public function delete( $id = NULL )
    {

    }
}

/* End of file User.php */

