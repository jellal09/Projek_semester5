<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gambarbarang extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_gambar');
        $this->load->model('m_produk');
        
        
    }
    

    public function index()
    {
       $data = array('title' => 'Gambar Barang' , 
                    'gambarbarang' => $this->m_gambar->get_all_data(),
                    'isi' => 'gambarbarang/v_gambar',
                );
            $this->load->view('layout/v_wrapper_admin', $data, FALSE);
            
    }

    public function tambah($id_produk)
    {
        $this->form_validation->set_rules('judul_gambar', 'Keterangan','required',
        array('required' => '%s Harus Diisi')
        );

       

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambarbarang/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array('title' => 'Tambah Gambar Barang' , 
                                'error_upload' => $this->upload->display_errors(),
                                'barang' => $this->m_barang->get_data($id_produk),
                                'gambar' => $this->m_gambar->get_gambar($id_produk),
                                'isi' => 'gambarbarang/v_tambah',
                        );
                    $this->load->view('layout/v_wrapper_admin', $data, FALSE);
            }else {
                $upload_data  = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambarbarang/'. $upload_data['uploads']['file_name'];
                $this->load->library('image_lib' , $config);

                $data = array(
                  'id_produk' =>$id_produk,
                  'judul_gambar' => $this->input->post('judul_gambar'),
                  'gambar' => $upload_data['uploads']['file_name'],    
                );
                $this->m_gambar->tambah($data);
                $this->session->set_flashdata('pesan', 'Gambar Berhasil ditambahkan');
                redirect('gambarbarang/tambah/'.$id_produk);
            }

        } 
    
        $data = array(
            'title' => 'Tambah Gambar Barang' , 
            'barang' => $this->m_produk->get_data($id_produk),
            'gambar' => $this->m_gambar->get_gambar($id_produk),
            'isi' => 'gambarbarang/v_tambah',
    );
$this->load->view('layout/v_wrapper_admin', $data, FALSE);
    }

     //Delete one item
     public function delete( $id_produk, $id_gambar = NULL )
     {
         //hapus gambar
         $gambar = $this->m_gambar->get_data($id_gambar);
         if ($gambar->gambar != "") {
             unlink('./assets/gambarbarang/'. $gambar->gambar);
         }
         //end hapus gamvar
         $data = array('id_gambar' => $id_gambar);
         $this->m_gambar->delete($data);
         $this->session->set_flashdata('pesan', 'Gambar Berhasil dihapus');
         redirect('gambarbarang/tambah/'. $id_produk);
     }

}

/* End of file Home.php */
