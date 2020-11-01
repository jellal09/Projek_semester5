<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($username, $password)
    {
        $cek = $this->ci->m_auth->login_user($username, $password);
        if ($cek) {
            $nama = $cek->nama;
            $username = $cek->username;
            $akses_level = $cek->akses_level;

            //buat session
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('nama', $nama);
            $this->ci->session->set_userdata('akses_level', $akses_level);
            redirect('admin');
        }else{
            //jika salah
          $this->ci->session->set_flashdata('error', 'Username atau Password Salah');
          redirect('auth/login_user');
            
        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('username') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login');
            redirect('auth/login_user');
        }
        // else{
        //     redirect('admin');
        // }
    }
   public function logout()
   {
    $this->ci->session->unset_userdata('username');
    $this->ci->session->unset_userdata('nama');
    $this->ci->session->unset_userdata('akses_level'); 
    $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout');
    redirect('auth/login_user');
   } 

}

/* End of file User_login.php */
