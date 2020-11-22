<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
	$this->load->library('form_validation','url');
    $this->load->model('m_konfigurasi');
      
    }
    
    public function index( $offset = 0 )
    {
     
        $data = array(
            'title' => 'Konfigurasi',
            'isi' => 'v_konfigurasi',
            'setting' => $this->m_konfigurasi->get_all_data(), 
        );
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }
    
    public function edit( $id_konfigurasi)
    {
        $data= array(
            
            'id_konfigurasi' =>$id_konfigurasi,
            'nama_web' =>$this->input->post('nama_web'),
            'email' =>$this->input->post('email'),
            'telepon' =>$this->input->post('telepon'),
            'alamat' =>$this->input->post('alamat'),
            'facebook' =>$this->input->post('facebook'),
            'instagram' =>$this->input->post('instagram'),
            'deskripsi' =>$this->input->post('deskripsi'),
            'logo' =>$this->input->post('logo'),
            'icon' =>$this->input->post('icon'),
        );
        $this->m_konfigurasi->edit($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Data Berhasil Diedit</h6>
        </div>');
        redirect('konfigurasi/index');
        
    }
}

/* End of file Home.php */
