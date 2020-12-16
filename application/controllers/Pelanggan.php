<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_auth');
               
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
           redirect('home');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', array(
            'required' => '%s  harus diisi !'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required', array(
            'required' => '%s harus diisi !'));

        if($this->form_validation->run() == FALSE){
            $data = array (
                'title'  => 'Login Pelanggan',
                'isi'    => 'v_login_pelanggan',
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        }else{
            //validasi sukses
            $this->_login();
        }
    }
    private function _login()
    {
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        $pelanggan = $this->db->get_where('pelanggan', ['email' => $email])->row_array();
        //jika usernya ada
        if($pelanggan) {
           //jika usernya aktif
           if($pelanggan['is_active'] == 1){
               if (password_verify($password, $pelanggan['password'])) {
                  $data = [
                      'id_pelanggan'    => $pelanggan['id_pelanggan'],
                      'email'           => $pelanggan['email'],
                      'nama_pelanggan'  => $pelanggan['nama_pelanggan'],
                      'no_telepon'      => $pelanggan['no_telepon'],
                      'foto'            => $pelanggan['foto'],
                  ];
                  $this->session->set_userdata($data);
                  redirect('home');
               }else {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Salah</div>'); 
                redirect('pelanggan');
               }               
           }else{
             $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email Belum Diaktivasi</div>'); 
             redirect('pelanggan');
           }
       }else{
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email Tidak Terdaftar</div>'); 
        redirect('pelanggan');
       }
    }
    public function register()
    {
        if ($this->session->userdata('email')) {
            redirect('home');
        }
        $this->form_validation->set_rules('nama_pelanggan', 'Nama lengkap', 'required|trim',
        array('required'  => 'Harus Diisi'));
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[pelanggan.email]|trim|valid_email',
        array('required'  => ' Harus Diisi',
              'is_unique' => ' Sudah Terdaftar'));
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[ulangi]',
        array('required'  => ' harus diisi',
              'min_length' => 'Isi Password Minimal 6 Karakter '));
        $this->form_validation->set_rules('ulangi', 'Ulangi Password','required|trim|matches[password]',
        array('required'  => ' harus diisi',
              'matches' => 'Tidak sama'));
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required|trim|max_length[13]', 
        array('required'   => 'harus diisi',
              'min_length' => 'Isi Nomer Telepon/HP Maksimal 13 Karakter'));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',
        array('required'  => ' harus diisi'));  

        if($this->form_validation->run() == FALSE){
        $data = array (
            'title'  => 'Register Pelanggan',
            'isi'    => 'register',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
         }else{   
         $email = $this->input->post('email', true);
         $data = array(  'nama_pelanggan'  => htmlspecialchars($this->input->post('nama_pelanggan', true)),          
                         'email'           => htmlspecialchars($email),
                         'password'        => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                         'no_telepon'      => $this->input->post('no_telepon'),
                         'alamat'          => $this->input->post('alamat'), 
                         'foto'            => 'user.png',     
                         'is_active'       => 0,
         );
         //siapkan token
         $token = base64_encode(random_bytes(32));
         $user_token = [
            'email'  => $email,
            'token'  => $token,
            'date_created' => time()
         ];
         $this->m_pelanggan->register($data);
         $this->db->insert('pelanggan_token', $user_token);
         $this->_sendEmail($token, 'verify');
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Register Berhasil ! Silahkan Aktivasi Akun Anda</div>');
         redirect('pelanggan');    
        }
    }  
    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host'=> 'ssl://smtp.googlemail.com',
            'smtp_user'=> 'tokoistana8@gmail.com',
            'smtp_pass'=> 'istana2810',
            'smtp_port'=> 465,
            'mailtype' => 'html',
            'charset'  => 'utf-8',
            'newline'  => "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->from('tokoistana8@gmail.com', 'Toko Istana');
        $this->email->to($this->input->post('email'));
        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik link ini untuk memverifikasi akun Anda : <a href="'. base_url() . 'pelanggan/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifasi</a>'); 
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik link ini untuk mereset password Anda : <a href="'. base_url() . 'pelanggan/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>'); 
        }
     

        if($this->email->send()){
            return true;
        }else{
             echo $this->email->print_debugger();
             die;
        }
        
    }  
    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $pelanggan = $this->db->get_where('pelanggan', ['email' => $email])->row_array();

        if ($pelanggan) {
            $pelanggan_token = $this->db->get_where('pelanggan_token', ['token' => $token])->row_array();
            if ($pelanggan_token) {
                if (time() - $pelanggan_token['date_created'] < (60*60*24)) {
                   $this->db->set('is_active', 1);
                   $this->db->where('email', $email);           
                   $this->db->update('pelanggan');
                   $this->db->delete('pelanggan_token', ['email' => $email]);
                   $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">'. $email .' Sudah Diaktivasi</div>'); 
                   redirect('pelanggan');

                }else {
                    $this->db->delete('pelanggan', ['email' => $email]);
                    $this->db->delete('pelanggan_token', ['email' => $email]);

                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Token Kadaluarsa</div>'); 
                    redirect('pelanggan');
                }
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Aktifasi Akun Gagal ! Token Invalid</div>'); 
                redirect('pelanggan');
            }
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Aktifasi Akun Gagal ! Email Salah</div>'); 
            redirect('pelanggan');
        }
    }
    public function logout()
    {
        $this->pelanggan_login->logout();
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Anda Sudah Logout</div>'); 
        redirect('pelanggan');
    }
     public function akun()
    {
        // $data['pelanggan'] = $this->db->get_where('pelanggan', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'Selamat Datang' . $data['pelanggan']['nama_pelanggan'];
        $id_pelanggan = $this->session->userdata('id_pelanggan');

        //proteksi halaman
        $this->pelanggan_login->proteksi_halaman();

        $pelanggan    = $this->m_pelanggan->detail($id_pelanggan);
        $data['pelanggan'] = $this->db->get_where('pelanggan', ['email' => $this->session->userdata('email')])->row_array();
        
        //validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_pelanggan', 'Nama lengkap', 'required',
            array( 'required'   => '%s harus diisi'));
        $valid->set_rules('alamat', 'Alamat', 'required',
            array( 'required'   => '%s harus diisi'));
        $valid->set_rules('no_telepon', 'no_telepon', 'required|trim|max_length[13]', 
            array('required'   => 'Nomer Telepon Harus Diisi',
                  'min_length' => 'Isi Nomer Telepon/Hp Maksimal 13 Karakter'));


        if ($valid->run() == FALSE) {

        $data = array(      'title'             => 'Profile Saya',      
                            'pelanggan'         => $pelanggan,
                            'isi'               => 'v_akun_saya'
        );
        //end validasi

        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        //masuk databse
        }else{
            $i= $this->input;
            $data= array(   'id_pelanggan'      => $id_pelanggan,
                            'nama_pelanggan'    => $i->post('nama_pelanggan'),
                            'no_telepon'        => $i->post('no_telepon'),
                            'alamat'            => $i->post('alamat')
                            );
            //jika ada gambar di upload 
            $upload_image = $_FILES['foto']['name'];
            if($upload_image){
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/foto/';                
                $this->upload->initialize($config);
                if($this->upload->do_upload('foto')) {
                    $new_image = $this->upload->data('file_name');
                    $upload_data  = array( 'uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/' . $upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);
                    $data = array(  'id_pelanggan'   => $id_pelanggan,
                                    'foto'           => $upload_data['uploads']['file_name'],
                                    'nama_pelanggan' => $i->post('nama_pelanggan'),
                                    'no_telepon'     => $i->post('no_telepon'),
                                    'alamat'         => $i->post('alamat')
                    );
                    $this->db->set('foto', $new_image);
                    $this->session->set_flashdata('message', 'Update Profile Berhasil');
                }else{
                     $this->session->set_flashdata('error', $this->upload->display_errors());
                }
            }
            $this->session->set_userdata($data); 
            $this->m_pelanggan->edit($data);
            redirect(base_url('pelanggan/akun'),'refresh');     
        }
    }
    public function lupaPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $data = array(     'title'              => 'Lupa Password',     
                                'isi'               => 'v_lupa_password'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            $email  = $this->input->post('email');
            $pelanggan = $this->db->get_where('pelanggan', ['email' => $email, 'is_active' => 1])->row_array();
            
            if ($pelanggan) {
                $token = base64_encode(random_bytes(32));
                $pelanggan_token =[
                    'email'     => $email,
                    'token'     => $token,
                    'date_created' => time()
                ];
                $this->db->insert('pelanggan_token', $pelanggan_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Cek Email Anda</div>'); 
                redirect('pelanggan');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email Tidak Terdaftar Atau Belum Diaktivasi</div>'); 
                redirect('pelanggan/lupaPassword');
            }
        }
       
    }
    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $pelanggan = $this->db->get_where('pelanggan', ['email' => $email])->row_array();

        if ($pelanggan) {

           $pelanggan_token = $this->db->get_where('pelanggan_token', ['token' => $token])->row_array();

           if ($pelanggan_token) {
              $this->session->set_userdata('reset_email', $email);
              $this->ubahPassword();
           }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Reset Password Gagal. Token Salah!</div>'); 
            redirect('pelanggan');
           }
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Reset Password Gagal. Email Salah!</div>'); 
                redirect('pelanggan');
        }
    }
    public function ubahPassword()
    {
        if (!$this->session->userdata('reset_email')) {      
           redirect('pelanggan');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]',
        array('required' => '%s Harus Diisi !',
        'matches'   => '%s tidak sama !',
        'min_length' => '%s minimal 6 karakter !'));
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'trim|required|min_length[6]|matches[password1]',
        array('required' => '%s Harus Diisi !',
        'matches'   => '%s tidak sama !',
        'min_length' => '%s minimal 6 karakter ! '));

       if($this->form_validation->run() == FALSE){
           $data = array(  'title'              => 'Ubah Password',     
                           'isi'                => 'v_reset_password'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }else{
        $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
        $email    = $this->session->userdata('reset_email');
        
        $this->db->set('password', $password);    
        $this->db->where('email', $email);
        $this->db->update('pelanggan');
        
        $this->session->unset_userdata('reset_email');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password Berhasil Diubah ! Silahkan Login</div>'); 
        redirect('pelanggan');
            
    }
    }
    public function ubah_password()
    {
        // $id_pelanggan = $this->session->userdata('id_pelanggan');
        //proteksi halaman
        $pelanggan['pelanggan'] = $this->db->get_where('pelanggan', ['email' => $this->session->userdata('email')])->row_array();
            // validasi input
        $valid = $this->form_validation;

        $valid->set_rules('current_password', 'Password', 'required|trim',
            array( 'required'   => '%s harus diisi'));
        $valid->set_rules('password1', 'Password Baru', 'required|trim|min_length[6]|matches[password2]',
        array( 'required'   => '%s harus diisi',
               'matches'    => '%s Tidak Sama',
               'min_length' => '%s  Minimal 6 Karakter'));
        $valid->set_rules('password2', 'Ulangi Password',  'required|trim|min_length[6]|matches[password1]',
            array('required'   => '%s harus diisi',
                   'matches'    => '%s  Tidak Sama',
                   'min_length' => '%s  Minimal 6 Karakter'));

        if($valid->run() == FALSE){
            $data = array (
                'title'          => 'Ubah Password',
                'pelanggan'      => $pelanggan,
                'isi'            => 'ubah_password',
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        }else{
            $current_password  = $this->input->post('current_password');
            $new_password      = $this->input->post('password1');
            if (!password_verify($current_password, $pelanggan['pelanggan']['password'])) {
                $this->session->set_flashdata('sukses','<div class="alert alert-danger" role="alert">Password Salah !</div>'); 
                redirect('pelanggan/ubah_password');    
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('sukses','<div class="alert alert-danger" role="alert">Password Baru Tidak Boleh Sama !</div>'); 
                    redirect('pelanggan/ubah_password');    
                }else{
                    //password valid
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('pelanggan');

                    $this->session->set_flashdata('sukses','<div class="alert alert-success" role="alert">Password telah Diubah !</div>'); 
                    redirect('pelanggan/ubah_password');    
                }
            }
        }
}
}


/* End of file Pelanggan.php */
