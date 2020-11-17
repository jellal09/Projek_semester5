<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_auth');
               
    }
    public function register()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Full Name', 'required',
            array('required'  => '%s Harus Diisi',
                  'is_unique' => '%s Email Sudah Terdaftar !'));
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[pelanggan.email]',
            array('required' => '%s Harus Diisi'));
        $this->form_validation->set_rules('password', 'Password', 'required',
            array('required' => '%s Harus Diisi'));
        $this->form_validation->set_rules('ulangi', 'Ulangi Password','required|matches[password]',
            array('required' => '%s Harus Diisi',
                  'matches'  => '%s Password Salah !'));
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required',
            array('required' => '%s Harus Diisi'));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required',
            array('required' => '%s Harus Diisi'));    

        if($this->form_validation->run() == FALSE){
        $data = array (
            'title'  => 'Register',
            'isi'    => 'v_register',
        );
        $this->load->view('layout/wrapper', $data, FALSE);
        }else{
        $data = array(  'nama_pelanggan'  => $this->input->post('nama_pelanggan'),          
                        'email'           => $this->input->post('email'),
                        'password'        => $this->input->post('password'),
                        'no_telepon'      => $this->input->post('no_telepon'),
                        'alamat'          => $this->input->post('alamat'),             
        );
        $this->m_pelanggan->register($data);
        $this->session->set_flashdata('pesan', 'Register Berhasil !');
        redirect('pelanggan/register');    
        }
    }
    
    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => '%s Harus Diisi !'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi !'
        ));

        if($this->form_validation->run()== TRUE){
            $email      = $this->input->post('email');
            $password   = $this->input->post('password');
            $this->pelanggan_login->login($email,$password);
        }
       
        $data = array (
            'title'  => 'Login Pelanggan',
            'isi'    => 'v_login_pelanggan',
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
    
    public function logout()
    {
        $this->pelanggan_login->logout();
    }
    public function akun()
    {
        $id_pelanggan = $this->session->userdata('id_pelanggan');

        //proteksi halaman
        $this->pelanggan_login->proteksi_halaman();

        $pelanggan 	  = $this->m_pelanggan->detail($id_pelanggan);
        
		// validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan', 'Nama lengkap', 'required',
			array( 'required'	=> '%s harus diisi'));
		$valid->set_rules('alamat', 'Alamat', 'required',
			array( 'required'	=> '%s harus diisi'));
		$valid->set_rules('no_telepon', 'no_telepon', 'required',
			array( 'required'	=> '%s harus diisi'));

		if ($valid->run()===FALSE) {

		$data = array(		'title'				=> 'Profile Saya',		
							'pelanggan'			=> $pelanggan,
							'isi'				=> 'v_akun_saya'
							);
		//end validasi

		$this->load->view('layout/wrapper', $data, FALSE);
		//masuk databse
		}else{
			$i= $this->input;
			//kalau password lebih dari 6 karakter maka ubah password
			if (strlen($i->post('password')) >= 6 ) {
		
			$data= array(	'id_pelanggan'		=> $id_pelanggan,
							'nama_pelanggan'	=> $i->post('nama_pelanggan'),
							'password' 			=> SHA1($i->post('password')),
							'no_telepon' 		=> $i->post('no_telepon'),
							'alamat' 			=> $i->post('alamat')
							);
			//jjika tidak maka password tetap
		}else{
			$data= array(	'id_pelanggan'		=> $id_pelanggan,
							'nama_pelanggan'	=> $i->post('nama_pelanggan'),
							'no_telepon' 		=> $i->post('no_telepon'),
							'alamat' 			=> $i->post('alamat')
							);
		}
			$this->m_pelanggan->edit($data);
            $this->session->set_flashdata('sukses', 'Update Profie Berhasil');
			redirect(base_url('pelanggan/akun'),'refresh');		
		}
    }
    public function edit_foto()
    {
        $id_pelanggan = $this->session->userdata('id_pelanggan');

        //proteksi halaman
        	// validasi input
        $pelanggan 	  = $this->m_pelanggan->detail($id_pelanggan);

        $config['upload_path'] = './assets/foto/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '2000';
        $this->upload->initialize($config);
        $field_name = "gambar";
        if(!$this->upload->do_upload($field_name)) {
        $data = array (
                        'title'          => 'Profil',
                        'pelanggan'      => $pelanggan,
                        'error_upload'   => $this->upload->display_errors(),
                        'isi'            => 'v_edit_foto_profil',
        );
        $this->load->view('layout/wrapper', $data, FALSE);
        }else{
        $upload_data    = array(  'uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/foto/' . $upload_data['uploads']['file_name'];
        $this->load->library('image_lib', $config);
        $data = array(  'id_pelanggan'   => $id_pelanggan,
                        'gambar'         => $upload_data['uploads']['file_name'],
        );
        $this->m_pelanggan->edit($data);
        $this->session->set_flashdata('pesan', 'Gambar Berhasil Ditambahkan');
        redirect('pelanggan/edit_foto');    
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
}


/* End of file Pelanggan.php */
