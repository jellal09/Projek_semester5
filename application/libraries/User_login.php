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
            $password = $cek->password;
            $akses_level = $cek->akses_level;

            //buat session
            $this->ci->session->set_userdata('id_user', $id_user);
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('nama', $nama);
            $this->ci->session->set_userdata('akses_level', $akses_level);
            $this->ci->session->set_userdata('tanggal_update', $tanggal_update);
            redirect('admin');
        }else{
            //jika salah
            $this->ci->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
            Username dan password anda tidak sesuai
          </div>');
               redirect('auth/login_user');
        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('username') == '') {
            $this->ci->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
            Silahkan login terlebih dahulu
            </div>');
            redirect('auth/login_user');
        }
       // else{
            // redirect('admin');
        // }
    }
   public function logout()
   {
    $this->ci->session->unset_userdata('username');
    $this->ci->session->unset_userdata('nama');
    $this->ci->session->unset_userdata('akses_level'); 
    $this->ci->session->set_flashdata('error', '<div class="alert alert-success" role="alert">
    Anda Berhasil Logout, silahkan login kembali
            </div>');
    redirect('auth/login_user');
   } 

}

/* End of file User_login.php */
