<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('m_transaksi');
        $this->load->model('m_pelanggan');
	}

	public function index()
	{
		if (empty($this->cart->contents())) {
            redirect('home');
        }
        $data = array(
            'title' => 'Keranjang Belanja' , 
            'isi' => 'v_belanja',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function add()
	{
		$redirect_page = $this->input->post('redirect_page');
		$data = array(
        	'id'      => $this->input->post('id'),
        	'qty'     => $this->input->post('qty'),
        	'price'   => $this->input->post('price'),
        	'name'    => $this->input->post('name'),
        ); 
       
		$this->cart->insert($data);
		redirect($redirect_page, 'refresh');
    
}

	public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('belanja');
	}
	
	public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' => $items['rowid'],
                'qty'   => $this->input->post($i. '[qty]'),
                
        );

        // $val = $this->input->post('val');
        // $stok = $data['qty'];

        // if ($val > $stok) {
        //   $this->session->set_flashdata('pesan', 'error');   
        // }else {
        
        $this->cart->update($data);
        $i++;
        }
        redirect('belanja');
    }
	// }
	public function clear()
    {
        $this->cart->destroy();
        redirect('belanja');
    }
 public function checkout()
    {
        //proteksi halaman
       $this->pelanggan_login->proteksi_halaman();

        // validasi input
        $valid = $this->form_validation;

        $valid->set_rules('provinsi', 'Provinsi', 'required',
                            array('required' => '%s Harus Diisi'));
        $valid->set_rules('kota', 'Kota', 'required',
                            array('required' => '%s Harus Diisi'));
        $valid->set_rules('expedisi', 'Expedisi', 'required',
                            array('required' => '%s Harus Diisi'));
        $this->form_validation->set_rules('paket', 'Paket', 'required',
                             array('required' => '%s Harus Diisi'));
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|max_length[8]',
                             array('required' => '%s Harus Diisi',
                                'max_length' => 'Maksimal 8 Karakter'));
        $this->form_validation->set_rules('nama_pelanggan', 'Nama lengkap', 'required|trim|max_length[100]',
        array('required'  => 'Harus Diisi',
          'max_length' => 'Terlalu Panjang'));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required',
        array('required'  => 'Harus Diisi'));
      $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required|trim|max_length[13]', 
        array('required'   => 'Harus diisi',
              'max_length' => 'Isi Nomer Telepon dengan benar'));
        if ($valid->run()===FALSE) {
            $data = array (
                'title'     => 'Checkout Belanja',
                'pelanggan' => $this->m_pelanggan->sudah_login(),
                'isi'       => 'v_checkout',
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {

        //simpan transaksi ke table transaksi
        $i = 1;
        date_default_timezone_get('Asia/Jakarta');
          $data = array('id_pelanggan'      => $this->session->userdata('id_pelanggan'),
                        'no_order'          => $this->input->post('no_order'),
                        'tgl_transaksi'     => date('Y-m-d H:i:s'),
                        'batas_bayar'       => date('Y-m-d H:i:s', mktime( date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y')) ),
                        'nama_pelanggan'    => $this->input->post('nama_pelanggan'),
                        'no_telepon'        => $this->input->post('no_telepon'),
                        'provinsi'          => $this->input->post('provinsi'),
                        'kota'              => $this->input->post('kota'),
                        'alamat'            => $this->input->post('alamat'),
                        'kode_pos'          => $this->input->post('kode_pos'),
                        'expedisi'          => $this->input->post('expedisi'),
                        'paket'             => $this->input->post('paket'),
                        'estimasi'          => $this->input->post('estimasi'),
                        'ongkir'            => $this->input->post('ongkir'),
                        'berat'             => $this->input->post('berat'),
                        'grand_total'       => $this->input->post('grand_total'),
                        'total_bayar'       => $this->input->post('total_bayar'),
                        'status_bayar'      => '0',
                        'status_order'      => '0',
        );
        $this->m_transaksi->simpan_transaksi($data);
        //simpan ke tabel detail transaksi
        $i = 1;
        $id_transaksi = $this->db->insert_id();
        foreach ($this->cart->contents() as $items) {
            $detail_data = array('no_order'    => $this->input->post('no_order'),
                                 'id_transaksi'=> $id_transaksi,
                                 'id_produk'   => $items['id'],
                                 'name'        => $items['name'],
                                 'price'       => $items['price'],
                                 'qty'         => $this->input->post('qty'.$i++),
        
        );
        $this->m_transaksi->simpan_detail_transaksi($detail_data);
        
        }
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Proses !');
        $this->cart->destroy();
        redirect('pesanan_saya');
        
        }
      
    }

}