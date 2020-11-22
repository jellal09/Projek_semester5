<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
	$this->load->library('form_validation','url');
    $this->load->model('m_berita');
      
    }
    
    public function index( $offset = 0 )
    {
     
        $data = array(
            'title' => 'Berita',
            'isi' => 'v_berita',
            'berita' => $this->m_berita->get_all_data(), 
        );
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }
    
    public function edit( $id_berita)
    {
        $data= array(
            
            'id_berita' =>$id_berita,
            'jenis_berita' =>$this->input->post('jenis_berita'),
            'judul_berita' =>$this->input->post('judul_berita'),
            'keterangan' =>$this->input->post('keterangan'),
            'gambar' =>$this->input->post('gambar'),
            'tgl_post' =>date('Y-m-d').$this->input->post('tgl_post'),
            'tgl_update'=>date('Y-m-d').$this->input->post('tgl_update'),
            
        );
        $this->m_berita->edit($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Data Berhasil Diedit</h6>
        </div>');
        redirect('berita/index');
        
    }
}

/* End of file Home.php */
