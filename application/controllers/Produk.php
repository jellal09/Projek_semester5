<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
	$this->load->library('form_validation','url');
    $this->load->model('m_produk');
    $this->load->model('m_kategori');
      
    }
    
    public function index( $offset = 0 )
    {
     
        $data = array(
            'title' => 'Produk',
            'isi' => 'produk/v_produk',
            'produk' => $this->m_produk->get_all_data(), 
        );
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }

    //Delete one item
    public function delete($id_produk=NULL)
    {   //hapus gambar
        $produk  = $this->m_produk->get_data($id_produk);
        if( $produk->gambar !=""){
            unlink('./assets/gambar/'.$produk->gambar);
        }//end hapus gambar

        $data= array('id_produk'=>$id_produk);
        $this->m_produk->delete($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Data Berhasil Dihapus</h6>
        </div>');
        redirect('produk/index');
    }
    //menambahkan data produk
    public function add()
    {   $this->form_validation->set_rules(
        'nama_produk',
        'nama produk',
        'required|trim|max_length[100]',
        [
            'required' => 'Harap Isi data terlebih daulu !',
            'trim' => 'Harap tidak menggunakan spasi',
            'max_length' => 'Maksimal 50 karakter'
        ]
    );
    $this->form_validation->set_rules(
        'harga',
        'harga',
        'required|trim|numeric|max_length[10]',
        [
            'required' => 'Harap Isi data terlebih daulu !',
            'trim' => 'Harap tidak menggunakan spasi',
            'numeric' => 'Harap mengisi data dengan benar (Tanpa titik)',
            'max_length' => 'Maksimal 10 digit',
        ]
    );
    $this->form_validation->set_rules(
        'stok',
        'stok',
        'required|trim|numeric|max_length[10]',
        [
            'required' => 'Harap Isi data terlebih daulu !',
            'trim' => 'Harap tidak menggunakan spasi',
            'numeric' => 'Harap mengisi data dengan benar',
            'max_length' => 'Maksimal 10 digit',
        ]
    );
    $this->form_validation->set_rules(
        'berat',
        'berat',
        'required|trim|numeric|max_length[10]',
        [
            'required' => 'Harap Isi data terlebih daulu !',
            'trim' => 'Harap tidak menggunakan spasi',
            'numeric' => 'Harap mengisi data dengan benar',
            'max_length' => 'Maksimal 10 digit',
        ]
    );
    $this->form_validation->set_rules(
        'id_kategori',
        'id_kategori',
        'required|trim',
        [
            'required' => 'Harap Isi data terlebih daulu !',
            'trim' => 'Harap tidak menggunakan spasi', 
        ]
    );
    $this->form_validation->set_rules(
        'keterangan',
        'keterangan',
        'required|trim',
        [
            'required' => 'Harap Isi data terlebih daulu !',
            'trim' => 'Harap tidak menggunakan spasi', 
        ]
    );

    //upload foto
    if($this->form_validation->run()==TRUE){
       $config['upload_path']='./assets/gambar/';
       $config['allowed_types']='jpg|png|jpeg|jfif';
       $config['max_size']='3000';
       $this->upload->initialize($config);
       $field_name="gambar";
       if(!$this->upload->do_upload($field_name)){
        $data = array(
            'title' => 'Tambah Produk',
            'isi' => 'produk/v_add',
            'error_upload' => $this->upload->display_errors(),
            'kategori' => $this->m_kategori->get_all_data(), 
        );
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);  
       }else{
        $upload_data    = array('uploads'=>$this->upload->data());
        $config['image_library']    = 'gd2';
        $config['source_image']    ='./assets/gambar/'. $upload_data['uploads']['file_name'];
        $this->load->library('image_lib',$config);
       //memasukkan data kedatabase
        $data = array(
            'nama_produk'=> $this->input->post('nama_produk'),
            'id_kategori'=> $this->input->post('id_kategori'),
            'harga'=> $this->input->post('harga'),
            'stok'=> $this->input->post('stok'),
            'keterangan'=> $this->input->post('keterangan'),
            'berat'=> $this->input->post('berat'),
            'gambar'=> $upload_data['uploads']['file_name'],
        );
        $this->m_produk->add($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Data Berhasil Ditambahkan</h6>
        </div>');
        redirect('produk/index');
       }
       
    }
    //end upload foto
        $data = array(
            'title' => 'Tambah Produk',
            'isi' => 'produk/v_add',
            'kategori' => $this->m_kategori->get_all_data(), 
        );
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }



    //edit data produk
    public function edit($id_produk)
    {   $this->form_validation->set_rules(
        'nama_produk',
        'nama produk',
        'required|trim|max_length[100]',
        [
            'required' => 'Harap Isi data terlebih daulu !',
            'trim' => 'Harap tidak menggunakan spasi',
            'max_length' => 'Maksimal 50 karakter'
        ]
    );
    $this->form_validation->set_rules(
        'harga',
        'harga',
        'required|trim|numeric|max_length[10]',
        [
            'required' => 'Harap Isi data terlebih daulu !',
            'trim' => 'Harap tidak menggunakan spasi',
            'numeric' => 'Harap mengisi data dengan benar (Tanpa titik)',
            'max_length' => 'Maksimal 10 digit',
        ]
    );
    $this->form_validation->set_rules(
        'stok',
        'stok',
        'required|trim|numeric|max_length[10]',
        [
            'required' => 'Harap Isi data terlebih daulu !',
            'trim' => 'Harap tidak menggunakan spasi',
            'numeric' => 'Harap mengisi data dengan benar',
            'max_length' => 'Maksimal 10 digit',
        ]
    );
    $this->form_validation->set_rules(
        'berat',
        'berat',
        'required|trim|numeric|max_length[10]',
        [
            'required' => 'Harap Isi data terlebih daulu !',
            'trim' => 'Harap tidak menggunakan spasi',
            'numeric' => 'Harap mengisi data dengan benar',
            'max_length' => 'Maksimal 10 digit',
        ]
    );
    $this->form_validation->set_rules(
        'id_kategori',
        'id_kategori',
        'required|trim',
        [
            'required' => 'Harap Isi data terlebih daulu !',
            'trim' => 'Harap tidak menggunakan spasi', 
        ]
    );
    $this->form_validation->set_rules(
        'keterangan',
        'keterangan',
        'required|trim',
        [
            'required' => 'Harap Isi data terlebih daulu !',
            'trim' => 'Harap tidak menggunakan spasi', 
        ]
    );

    //upload foto
    if($this->form_validation->run()==TRUE){
       $config['upload_path']='./assets/gambar/';
       $config['allowed_types']='jpg|png|jpeg|jfif';
       $config['max_size']='2000';
       $this->upload->initialize($config);
       $field_name="gambar";
       if(!$this->upload->do_upload($field_name)){
        $data = array(
            'title' => 'Edit Produk',
            'isi' => 'produk/v_edit',
            'error_upload' => $this->upload->display_errors(),
            'kategori' => $this->m_kategori->get_all_data(), 
            'produk'=> $this->m_produk->get_data($id_produk),
        );
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);  
       }else{
        $upload_data    = array('uploads'=>$this->upload->data());
        $config['image_library']    = 'gd2';
        $config['source_image']    ='./assets/gambar/'. $upload_data['uploads']['file_name'];
        $this->load->library('image_lib',$config);
       //memasukkan data kedatabase
        $data = array(
            'id_produk'=> $id_produk,
            'nama_produk'=> $this->input->post('nama_produk'),
            'id_kategori'=> $this->input->post('id_kategori'),
            'harga'=> $this->input->post('harga'),
            'stok'=> $this->input->post('stok'),
            'keterangan'=> $this->input->post('keterangan'),
            'berat'=> $this->input->post('berat'),
            'gambar'=> $upload_data['uploads']['file_name'],
        );
        $this->m_produk->edit($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Data Berhasil Diedit</h6>
        </div>');
        redirect('produk/index');
       }
       //jika tanpa ganti gambar
       $data = array(
        'id_produk'=> $id_produk,
        'nama_produk'=> $this->input->post('nama_produk'),
        'id_kategori'=> $this->input->post('id_kategori'),
        'harga'=> $this->input->post('harga'),
        'stok'=> $this->input->post('stok'),
        'keterangan'=> $this->input->post('keterangan'),
        'berat'=> $this->input->post('berat'),
        
    );
    $this->m_produk->edit($data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    <h6> <i class="icon fas fa-check"></i>Data Berhasil Diedit</h6>
    </div>');
    redirect('produk/index');
    }
    //end upload foto
        $data = array(
            'title' => 'Edit Produk',
            'isi' => 'produk/v_edit',
            'kategori' => $this->m_kategori->get_all_data(), 
            'produk'=> $this->m_produk->get_data($id_produk),
        );
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }
}