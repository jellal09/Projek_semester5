<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
  public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_auth');
	}

    public function login_user()
    {
      $this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Harap Isi data terlebih daulu !'));
      $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Harap Isi data terlebih daulu !'));
     
      
      if ($this->form_validation->run() == TRUE) {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->user_login->login($username, $password);
      } 
         
      $data = array(
          'title'=> 'Login User',
      );
      $this->load->view('v_login_user', $data, FALSE);
      
    }

    public function lupapwd()
    {
      $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email',
      [  
        'required' => 'Harap Isi data terlebih daulu !',
        'valid_email' => 'Harap menggunakan email yang valid',
      ]
      );
      
      if ($this->form_validation->run() == false) {
       
        $this->load->view('v_lupapwd_admin');
    
      } else {
           //$this->_login();
           $email = $this->input->post('email');	
           $cek = $this->m_auth->lupapwd($email);
           
      if ($cek==FALSE){
      
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Email anda belum terdaftar!
             </div>');
           redirect('auth/lupapwd');
           }else{
              $this->session->set_userdata('id_user', $cek->id_user);
              $this->resetpwd(); 
              }
        }
    }
    //reset pwd pada admin setelah verifikasi password pada email
    public function resetpwd()
    {
      $this->form_validation->set_rules(
        'password',
        'password',
        'required|trim|min_length[4]|max_length[10]|alpha_numeric|matches[password2]',
        [
          'required' => 'Harap Isi data terlebih daulu !',
          'matches' => 'Password tidak cocok, periksa kembali',
          'min_length' => 'Password terdiri atas 4 sampai 6 digit',
          'max_length' => 'Password terdiri atas 4 sampai 6 digit',
          'alpha_numerik' => 'Password terdiri atas angka dan abjad',
          'trim' => 'Harap tidak menggunakan spasi',
        ]
      );
      $this->form_validation->set_rules(
        'password2',
        'confirm password',
        'required|trim|min_length[4]|max_length[10]|alpha_numeric|matches[password]',
        [
          'required' => 'Harap Isi data terlebih daulu !',
          'matches' => 'Password tidak cocok, periksa kembali',
          'min_length' => 'Password terdiri atas 4 sampai 6 digit',
          'max_length' => 'Password terdiri atas 4 sampai 6 digit',
          'alpha_numerik' => 'Password terdiri atas angka dan abjad',
          'trim' => 'Harap tidak menggunakan spasi',
        ]
        );
        $password= $this->input->post('password');
        $password2 = $this->input->post('password2');
      
        //cek form validasi
        if ($this->form_validation->run()== FALSE){
          $this->load->view('v_resetpwdadmin'); 
        }else{
           $id= array('id_user' =>$this->session->userdata('id_user'));
           $data= array('password' =>md5($this->input->post('password')));
           $this->m_auth->gantipwd($id,$data);
           
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
           Password berhasil di update! Silahkan login
           </div>');
           redirect('auth/login_user');
        }    
     }  
   
    public function logout_user()
    {
        $this->user_login->logout();
    }
}

/* End of file Auth.php */
