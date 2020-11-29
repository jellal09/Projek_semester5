<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gambar_produk extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->model('m_gambar_produk');
        $this->load->model('m_produk');
	}
    public function index()
    {
       $data = array('title' => 'Gambar Produk' , 
                    'isi' => 'produk/v_gambarproduk',//menampilkan data gambar barang
                    'gambar_produk' => $this->m_gambar_produk->get_all_data(), 
                );
            $this->load->view('layout/v_wrapper_admin', $data, FALSE);
            
    }
    //add detail gambar produk
    public function add ($id_produk)
    {   $this->form_validation->set_rules(
        'judul_gambar',
        'judul gambar',
        'required|trim|max_length[100]',
        [
            'required' => 'Harap Isi data terlebih daulu !',
            'trim' => 'Harap tidak menggunakan spasi',
            'max_length' => 'Maksimal 50 karakter'
        ]
    );

    //upload foto
    if($this->form_validation->run()==TRUE){
       $config['upload_path']='./assets/detail_gambar/';
       $config['allowed_types']='jpg|png|jpeg|jfif';
       $config['max_size']='3000';
       $this->upload->initialize($config);
       $field_name="gambar";
       if(!$this->upload->do_upload($field_name)){
        $data = array(
            'title' => 'Tambah Detail Gambar Produk' , 
            'isi' => 'produk/v_gambarproduk_add',
            'error_upload' => $this->upload->display_errors(),
            'produk'=> $this->m_produk->get_data($id_produk),
            'gambar' => $this->m_gambar_produk->get_gambar($id_produk), 
                );
            $this->load->view('layout/v_wrapper_admin', $data, FALSE);
            
       }else{
        $upload_data    = array('uploads'=>$this->upload->data());
        $config['image_library']    = 'gd2';
        $config['source_image']    ='./assets/detail_gambar/'. $upload_data['uploads']['file_name'];
        $this->load->library('image_lib',$config);
       //memasukkan data kedatabase
        $data = array(
           
            'id_produk'=> $id_produk,
            'judul_gambar'=> $this->input->post('judul_gambar'),
            'gambar'=> $upload_data['uploads']['file_name'],
        );
        $this->m_gambar_produk->add($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Detail Gambar Berhasil Ditambahkan</h6>
        </div>');
        redirect('gambar_produk/add/'.$id_produk);
       }
       
    }
       $data = array(
                    'title' => 'Tambah Detail Gambar Produk' , 
                    'isi' => 'produk/v_gambarproduk_add',//menampilkan data gambar barang
                    'produk'=> $this->m_produk->get_data($id_produk),
                   'gambar' => $this->m_gambar_produk->get_gambar($id_produk), 
                );
            $this->load->view('layout/v_wrapper_admin', $data, FALSE);
            
    }


    //Delete detail gambar
    public function delete($id_gambar,$id_produk)
    {   
       //hapus gambar
       $gambar = $this->m_gambar_produk->get_data($id_gambar);
       if( $gambar->gambar != ""){
           unlink('./assets/detail_gambar/'. $gambar->gambar);
       }//end hapus gambar

       $data= array('id_gambar'=>$id_gambar);
       $this->m_gambar_produk->delete($data);
       $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
       <h6> <i class="icon fas fa-check"></i>Gambar Berhasil Dihapus</h6>
       </div>');
       redirect('gambar_produk/add/'.$id_produk); 
    }
}

/* End of file Home.php */
