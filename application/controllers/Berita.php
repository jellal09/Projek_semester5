<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
	$this->load->library('form_validation','url');
    $this->load->model('m_berita');
      
    }
    
    public function index( $offset = 0 )
    {
     
        $data = array(
            'title' => 'Artikel',
            'isi' => 'berita/v_berita',
            'berita' => $this->m_berita->get_all_data(), 
        );
        $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }
    public function delete($id_berita=NULL)
    {   //hapus gambar
        $berita = $this->m_berita->delete($id_berita);
        if( $berita->gambar !=""){
            unlink('./assets/gambar_konfigurasi/'.$berita->gambar);
        }//end hapus gambar

        $data= array('id_berita'=>$id_berita);
        $this->m_berita->delete($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Data Berhasil Dihapus</h6>
        </div>');
        redirect('berita/index');
    }

    public function add()
    {
        //form validasi
        $this->form_validation->set_rules(
            'judul_berita',
            'judul web',
            'required|trim|max_length[100]',
            [
                'required' => 'Harap Isi data terlebih daulu !',
                'trim' => 'Harap tidak menggunakan spasi',
                'max_length' => 'Maksimal 100 karakter'
            ]
        );
        $this->form_validation->set_rules(
            'jenis_berita',
            'jenis berita',
            'required|trim|max_length[20]',
            [
                'required' => 'Harap Isi data terlebih daulu !',
                'trim' => 'Harap tidak menggunakan spasi',
                'max_length' => 'Maksimal 20 karakter'
            ]
        );
        $this->form_validation->set_rules(
            'keterangan',
            'keterangan',
            'required|trim|max_length[300]',
            [
                'required' => 'Harap Isi data terlebih daulu !',
                'trim' => 'Harap tidak menggunakan spasi',
                'valid_email' => 'Harap mengisi data dengan benar',
                'max_length' => 'Maksimal 300 karakter',
            ]
        );
        
    //validasi upload foto
    if($this->form_validation->run()==TRUE){
        $config['upload_path']='./assets/gambar_konfigurasi/';
        $config['allowed_types']='jpg|png|jpeg|jfif';
        $config['max_size']='3000';
        $this->upload->initialize($config);
        $field_name="gambar";
       
        if(!$this->upload->do_upload($field_name)){
            $data = array(
                'title' => 'Artikel',
                'isi' => 'berita/v_addberita',
                'berita' => $this->m_berita->get_all_data(), 
                'error_upload' => $this->upload->display_errors(),
            );
            $this->load->view('layout/v_wrapper_admin', $data, FALSE);  
            }else{

            $upload_data    = array('uploads'=>$this->upload->data());
            $config['image_library']    = 'gd2';
            $config['source_image']    ='./assets/gambar_konfigurasi/'. $upload_data['uploads']['file_name'];
            $this->load->library('image_lib',$config);
            $data= array(
            
                'id_berita' =>$id_berita,
                'judul_berita' =>$this->input->post('judul_berita'),
                'jenis_berita' =>$this->input->post('jenis_berita'),
                'gambar'=> $upload_data['uploads']['file_name'],
                 'keterangan' =>htmlspecialchars($this->input->post('keterangan', true)),
                 'tgl_post' =>date('Y-m-d').$this->input->post('tanggal_post'),
                 'tgl_update' =>date('Y-m-d').$this->input->post('tanggal_update'),
               
                
            );
            $this->m_berita->add($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            <h6> <i class="icon fas fa-check"></i>Data Berhasil Disimpan</h6>
            </div>');
            redirect('berita/index');
        }
        //end form validasi
        $data= array(
            
            'id_berita' =>$id_berita,
            'judul_berita' =>$this->input->post('judul_berita'),
            'jenis_berita' =>$this->input->post('jenis_berita'),
            'keterangan' =>$this->input->post('keterangan'),
             'tgl_post' =>date('Y-m-d').$this->input->post('tanggal_post'),
             'tgl_update' =>date('Y-m-d').$this->input->post('tanggal_update'),
           
           
            
        );
        $this->m_berita->add($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Data Berhasil Disimpan</h6>
        </div>');
        redirect('berita/index');
        
    }//end upload foto
    $data = array(
        'title' => 'Artikel',
        'isi' => 'berita/v_addberita',
        'berita' => $this->m_berita->get_all_data(), 
    );
    $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }
   
    
    public function edit($id_berita)
    {
        //form validasi
        $this->form_validation->set_rules(
            'judul_berita',
            'judul web',
            'required|trim|max_length[100]',
            [
                'required' => 'Harap Isi data terlebih daulu !',
                'trim' => 'Harap tidak menggunakan spasi',
                'max_length' => 'Maksimal 100 karakter'
            ]
        );
        $this->form_validation->set_rules(
            'jenis_berita',
            'jenis berita',
            'required|trim|max_length[20]',
            [
                'required' => 'Harap Isi data terlebih daulu !',
                'trim' => 'Harap tidak menggunakan spasi',
                'max_length' => 'Maksimal 20 karakter'
            ]
        );
        $this->form_validation->set_rules(
            'keterangan',
            'keterangan',
            'required|trim|max_length[300]',
            [
                'required' => 'Harap Isi data terlebih daulu !',
                'trim' => 'Harap tidak menggunakan spasi',
                'valid_email' => 'Harap mengisi data dengan benar',
                'max_length' => 'Maksimal 300 karakter',
            ]
        );
        
    //validasi upload foto
    if($this->form_validation->run()==TRUE){
        $config['upload_path']='./assets/gambar_konfigurasi/';
        $config['allowed_types']='jpg|png|jpeg|jfif';
        $config['max_size']='3000';
        $this->upload->initialize($config);
        $field_name="gambar";
       
        if(!$this->upload->do_upload($field_name)){
            $data = array(
                'title' => 'Artikel',
                'isi' => 'berita/v_editberita',
                'berita' => $this->m_berita->get_all_data(), 
                'error_upload' => $this->upload->display_errors(),
            );
            $this->load->view('layout/v_wrapper_admin', $data, FALSE);  
            }else{

            $upload_data    = array('uploads'=>$this->upload->data());
            $config['image_library']    = 'gd2';
            $config['source_image']    ='./assets/gambar_konfigurasi/'. $upload_data['uploads']['file_name'];
            $this->load->library('image_lib',$config);
            $data= array(
            
                'id_berita' =>$id_berita,
                'judul_berita' =>$this->input->post('judul_berita'),
                'jenis_berita' =>$this->input->post('jenis_berita'),
                'gambar'=> $upload_data['uploads']['file_name'],
                 'keterangan' =>htmlspecialchars($this->input->post('keterangan', true)),
                 'tgl_post' =>date('Y-m-d').$this->input->post('tanggal_post'),
                 'tgl_update' =>date('Y-m-d').$this->input->post('tanggal_update'),
               
                
            );
            $this->m_berita->edit($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            <h6> <i class="icon fas fa-check"></i>Data Berhasil Diedit</h6>
            </div>');
            redirect('berita/index');
        }
        //end form validasi
        $data= array(
            
            'id_berita' =>$id_berita,
            'judul_berita' =>$this->input->post('judul_berita'),
            'jenis_berita' =>$this->input->post('jenis_berita'),
            'keterangan' =>$this->input->post('keterangan'),
             'tgl_post' =>date('Y-m-d').$this->input->post('tanggal_post'),
             'tgl_update' =>date('Y-m-d').$this->input->post('tanggal_update'),
           
           
            
        );
        $this->m_berita->edit($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Data Berhasil Diedit</h6>
        </div>');
        redirect('berita/index');
        
    }//end upload foto
    $data = array(
        'title' => 'Artikel',
        'isi' => 'berita/v_editberita',
        'berita' => $this->m_berita->get_all_data(), 
    );
    $this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }
}

/* End of file Home.php */
