<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
	$this->load->library('form_validation','url');
    $this->load->model('m_kategori');
      
	}

    // List all your items
    public function index( $offset = 0 )
    {
     
        $data = array(
            'title' => 'Kategori',
            'kategori' => $this->m_kategori->get_all_data(), 
            'isi' => 'v_kategori',
        );
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }
    
    // tambah data user
    public function add()
    {
        $data= array(
            
            'nama_kategori' =>$this->input->post('nama_kategori'),
            'tgl_update' =>date('Y-m-d').$this->input->post('tanggal_update'),
           
        );
        $this->db->insert('kategori', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Data Berhasil Ditambahkan</h6>
        </div>');
        redirect('kategori/index');
    
    }

    //Update one item
    public function edit( $id_kategori )
    {
        $data= array(
            
            'id_kategori' =>$id_kategori,
            'nama_kategori' =>$this->input->post('nama_kategori'),
            'tgl_update' =>date('Y-m-d').$this->input->post('tanggal_update'),
        );
        $this->m_kategori->edit($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Data Berhasil Diedit</h6>
        </div>');
        redirect('kategori/index');
    }
    //Delete one item
    public function delete($id_kategori = NULL)
    {
        $data= array('id_kategori'=>$id_kategori);
        $this->m_kategori->delete($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Data Berhasil Dihapus</h6>
        </div>');
        redirect('kategori/index');
    }
}

/* End of file User.php */

