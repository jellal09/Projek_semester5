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
    $this->form_validation->set_rules(
        'password',
        'password',
        'required|trim|min_length[4] && alpha_numeric|max_length[10]&& alpha_numeric|matches[password2]',
        [
            'required' => 'Harap Isi data terlebih daulu !',
            'matches' => 'Password tidak cocok, periksa kembali',
            'min_length[4] && alpha_numeric' => 'Password terdiri angka dan huruf mulai 4 sampai 10 digit',
            'max_length[10]&&alpha_numeric' => 'Password terdiri angka dan huruf mulai 4 sampai 10 digit',
            'trim' => 'Harap tidak menggunakan spasi',

        ]
    );
    $this->form_validation->set_rules(
        'password2',
        'confirm password',
        'required|trim|min_length[4] && alpha_numeric|max_length[10]&& alpha_numeric|matches[password]',
        [
            'required' => 'Harap Isi data terlebih daulu !',
            'matches' => 'Password tidak cocok, periksa kembali',
            'min_length[4] && alpha_numeric' => 'Password terdiri angka dan huruf mulai 4 sampai 10 digit',
            'max_length[10]&& alpha_numeric' => 'Password terdiri angka dan huruf mulai 4 sampai 10 digit',
            'trim' => 'Harap tidak menggunakan spasi',
        ]
    ); 
    //untuk menyimpan variabel
        $password=  $this->input->post('password');
		$password2 = $this->input->post('password2');
    
    if ($this->form_validation->run()== FALSE){
        $data = array(
            'title' => 'Ubah Password',
            'user' => $this->m_user->get_all_data(), 
            'isi' => 'v_ubahpwdadmin',
                                        
        );
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
     }else{
        $data= array(
            
            'id_user' =>$id_user,
            'password'         =>md5($password),
        );
         
        $this->m_user->ubahpwd($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Password berhasil diubah, silahkan login terlebih dahulu</h6>
        </div>');
        redirect('ubahpwd/index'); 
     }
    
   }
}

