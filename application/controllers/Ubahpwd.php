<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ubahpwd extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
	$this->load->library('form_validation','url');
    $this->load->model('m_user');
      
    }
    
    public function index( $offset = 0 )
    {
     
        $data = array(
            'title' => 'Ubah Password',
            'user' => $this->m_user->get_all_data(), 
            'isi' => 'v_ubahpwdadmin',
                                        
        );
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }
//ubah pwd pada admin berfungsi untu mengganti pwd
    public function pwd($id_user)
   {
    $data= array(
            
        'id_user' =>$id_user,
        'password' =>md5($this->input->post('password')),
        
    );
    $this->m_user->ubahpwd($data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <h6> <i class="icon fas fa-check"></i>Password berhasil diubah, silahkan login terlebih dahulu</h6>
    </div>');
    redirect('auth/login_user'); 
   }
}

