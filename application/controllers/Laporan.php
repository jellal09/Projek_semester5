<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    public function __construct()
	{
	parent::__construct();
	$this->load->library('form_validation','url');
    $this->load->model('m_laporan');
      
    }
    //delete laporan
    public function delete($id_detail_transaksi = NULL)
    {
        $data= array('id_detail_transaksi'=>$id_detail_transaksi);
        $this->m_laporan->delete($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Data Berhasil Dihapus</h6>
        </div>');
        redirect('laporan/index');
    }

    //cara filering laporan penjualan berdasarkan data 
        public function index(){        
            $tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)        
            $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)        
            if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :            
                $detail_transaksi = $this->m_laporan->get_all_data();  // Panggil fungsi view_all yang ada di TransaksiModel            
                $url_cetak = 'laporan/cetak';            
                $label = 'Semua Data Transaksi';        
            }else{ // Jika terisi            
                $detail_transaksi = $this->m_laporan->view_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di TransaksiModel            
                $url_cetak = 'laporan/cetak?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;            
                $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy            
                $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy            
                $label = 'Periode Tanggal  : ' .$tgl_awal.'  hingga  '.$tgl_akhir;        
            } 
            $data = array(
                'title' => 'Laporan Penjualan',
                'isi' => 'v_laporan',
                'detail_transaksi' => $detail_transaksi, 
                'url_cetak' => base_url('index.php/'.$url_cetak), 
                'label' => $label,      
            );
            $this->load->view('layout/v_wrapper_admin', $data, FALSE);    
           
        } 
        
        public function cetak()
        {    $tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)        
             $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)        
             if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :            
                $detail_transaksi =$this->m_laporan->get_all_data();  // Panggil fungsi view_all yang ada di TransaksiModel            
                $label = 'Semua Data Transaksi';        
            }else{ // Jika terisi            
                $detail_transaksi = $this->m_laporan->view_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di TransaksiModel            
                $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy            
                $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy            
                $label = 'Periode Tanggal  : ' .$tgl_awal.'  hingga  '.$tgl_akhir;       
            } 
            
              //cara pertama :
              $this->load->library ('dompdf_gen');
              $data['label'] = $label;
              $data['detail_transaksi'] = $detail_transaksi;
              $this->load->view('v_printlaporan', $data); 
             
              $paper_size='A4';
              $orientation= 'landscape';
              $html =$this->output->get_output();
              $this->dompdf->load_html($html);
              $this->dompdf->render();
              $this->dompdf->stream("Laporan Penjualan.pdf",array('Attachment'=>0));
            
           //cara kedua :
           // $data['label'] = $label;        
           // $data['detail_transaksi'] = $detail_transaksi;    
           // ob_start();    
           // $this->load->view('v_printlaporan', $data);    
            //  $html = ob_get_contents();        
           // ob_end_clean();    
            //require_once './assets/latihan_pdf/assets/libraries/html2pdf/autoload.php'; // Load plugin html2pdfnya    
           // $pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en','UTF-8',' array(4, 3, 3, 3)','TRUE');  // Settingan PDFnya    
           // $pdf->WriteHTML($html);    
           // $pdf->Output('Data Transaksi.pdf', 'D'); 
        }
}

/* End of file Home.php */