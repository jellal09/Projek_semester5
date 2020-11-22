<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
  

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

    public function lupa_pwd()
    {
      $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email',
      [  
        'required' => 'Harap Isi data terlebih daulu !',
        'valid_email' => 'Harap menggunakan email yang valid'
      ]
      );
      
      if ($this->form_validation->run() == false) {
       
        $this->load->view('v_lupapwd');
    
      } else {
           //$this->_login();
           $email = $this->input->post('email');	
           $cek = $this->m_auth->lupapwd($email);
           
      if ($cek==FALSE){
      
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email anda belum terdaftar!
             </div>');
           redirect('auth/_lupa_pwd');
           }else{
              $this->session->set_userdata('id_penyewa', $cek->id_penyewa);
              $this->resetpwd(); 
              }
        }
    }

    public function logout_user()
    {
        $this->user_login->logout();
    }
}

/* End of file Auth.php */
