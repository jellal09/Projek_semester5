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
            'title' => 'Konfigurasi Web',
            'isi' => 'v_konfigurasi',
            'setting' => $this->m_konfigurasi->get_all_data(), 
        );
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }
    
    public function edit($id_konfigurasi)
    {
        //form validasi
        $this->form_validation->set_rules(
            'nama_web',
            'nama web',
            'required|trim|max_length[25]',
            [
                'required' => 'Harap Isi data terlebih daulu !',
                'trim' => 'Harap tidak menggunakan spasi',
                'max_length' => 'Maksimal 25 karakter'
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'email',
            'required|trim|valid_email|max_length[50]',
            [
                'required' => 'Harap Isi data terlebih daulu !',
                'trim' => 'Harap tidak menggunakan spasi',
                'valid_email' => 'Harap mengisi data dengan benar',
                'max_length' => 'Maksimal 50 karakter',
            ]
        );
        $this->form_validation->set_rules(
            'telepon',
            'telepon',
            'required|trim|numeric|exact_length[12]',
            [
                'required' => 'Harap Isi data terlebih daulu !',
                'trim' => 'Harap tidak menggunakan spasi',
                'numeric' => 'Harap mengisi data dengan benar',
                'exact_length' => 'Harap mengisi data dengan benar',
            ]
        );
        $this->form_validation->set_rules(
            'alamat',
            'alamat',
            'required|trim|max_length[50]',
            [
                'required' => 'Harap Isi data terlebih daulu !',
                'trim' => 'Harap tidak menggunakan spasi',
                'max_length' => 'Maksimal 50 karakter',
            ]
        );
        $this->form_validation->set_rules(
            'facebook',
            'facebook',
            'required|trim|max_length[25]',
            [
                'required' => 'Harap Isi data terlebih daulu !',
                'trim' => 'Harap tidak menggunakan spasi',
                'max_length' => 'Maksimal 25 karakter',
            ]
        );
        $this->form_validation->set_rules(
            'instagram',
            'instagram',
            'required|trim|max_length[25]',
            [
                'required' => 'Harap Isi data terlebih daulu !',
                'trim' => 'Harap tidak menggunakan spasi',
                'max_length' => 'Maksimal 25 karakter',
            ]
        );
        $this->form_validation->set_rules(
            'deskripsi',
            'deskripsi',
            'required|trim|max_length[200]',
            [
                'required' => 'Harap Isi data terlebih daulu !',
                'trim' => 'Harap tidak menggunakan spasi',
                'max_length' => 'Maksimal 200 karakter',
            ]
        );

    //validasi upload foto
    if($this->form_validation->run()==TRUE){
        $config['upload_path']='./assets/gambar_konfigurasi/';
        $config['allowed_types']='jpg|png|jpeg|jfif';
        $config['max_size']='3000';
        $this->upload->initialize($config);
        $field_name="logo";
       
        if(!$this->upload->do_upload($field_name)){
            $data = array(
                'title' => 'Konfigurasi',
                'isi' => 'v_konfigurasi',
                'setting' => $this->m_konfigurasi->get_all_data(), 
                'error_upload' => $this->upload->display_errors(),
            );
            $this->load->view('layout/v_wrapper_admin', $data, FALSE);  
            }else{

            $upload_data    = array('uploads'=>$this->upload->data());
            $config['image_library']    = 'gd2';
            $config['source_image']    ='./assets/gambar_konfigurasi/'. $upload_data['uploads']['file_name'];
            $this->load->library('image_lib',$config);
            $data= array(
            
                'id_konfigurasi' =>$id_konfigurasi,
                'nama_web' =>$this->input->post('nama_web'),
                'logo'=> $upload_data['uploads']['file_name'],
                'email' =>$this->input->post('email'),
                'telepon' =>$this->input->post('telepon'),
                'alamat' =>$this->input->post('alamat'),
                'facebook' =>$this->input->post('facebook'),
                'instagram' =>$this->input->post('instagram'),
                'deskripsi' =>$this->input->post('deskripsi'),
                'lokasi' =>42,
               
                
            );
            $this->m_konfigurasi->edit($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            <h6> <i class="icon fas fa-check"></i>Data Berhasil Diedit</h6>
            </div>');
            redirect('konfigurasi/index');
        }
        //end form validasi
        $data= array(
            
            'id_konfigurasi' =>$id_konfigurasi,
            'nama_web' =>$this->input->post('nama_web'),
            'email' =>$this->input->post('email'),
            'telepon' =>$this->input->post('telepon'),
            'alamat' =>$this->input->post('alamat'),
            'facebook' =>$this->input->post('facebook'),
            'instagram' =>$this->input->post('instagram'),
            'deskripsi' =>$this->input->post('deskripsi'),
            'lokasi' =>42,
            
        );
        $this->m_konfigurasi->edit($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Data Berhasil Diedit</h6>
        </div>');
        redirect('konfigurasi/index');
        
    }//end upload foto
    $data = array(
        'title' => 'Konfigurasi',
        'isi' => 'v_konfigurasi',
        'setting' => $this->m_konfigurasi->get_all_data(), 
    );
    $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }
}

/* End of file Home.php */
