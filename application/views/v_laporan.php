<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Data Transaksi</h3>
    
      <div class="card-tools">
      </div>
          <!-- /.card-tools -->
     </div>

     <!--Script link-->
      
     <link href="<?php echo base_url('assets/latihan_pdf/assets/libraries/bootstrap-datepicker/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet">
     <script src="<?php echo base_url('assets/latihan_pdf/assets/js/jquery.min.js') ?>"></script>
     <!--Script link-->
      
      
    <!-- /.card-header -->
      <div class="card-body">
         <?php echo $this->session->flashdata('pesan');?>
         <div class="table-responsive" style="margin-top: 10px;">
            <table class="table table-bordered" id="example1">
              <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>Tanggal Transaksi</th>
                  <th>Data Diri Pelanggan </th>
                  
                  <th>Produk yang di beli</th>
                 <!-- <th>Harga</th>
                  <th>jumlah</th>-->
                  <th>Metode Pembayaran</th>
                  <th>Expedisi</th>
                  <th>Total Bayar</th>
                  <th>Action</th>
                  
                  
                </tr>
                 </thead>
                <!--body-->   
                <tbody>
                <!--Layout Filtering-->
                <form method="get" action="<?php echo base_url('laporan/index') ?>">            
                <div class="row">                
                  <div class="col-sm-6 col-md-4">                    
                    <div class="form-group">                        
                       <label>Filter Tanggal</label>                        
                          <div class="input-group">                            
                          <input type="text" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal btn-sm" placeholder="Tanggal Awal" autocomplete="off">                            
                          <span class="input-group-addon"> - </span>                            
                          <input type="text" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir btn-sm" placeholder="Tanggal Akhir" autocomplete="off">                        
                          </div>                    
                          </div>                
                          </div>            
                          </div>            
                          <button type="submit" name="filter" value="true" class="btn btn-outline-primary btn-sm">Tampilkan</button>            <?php            
                          if(isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter                
                          echo '<a href="'.base_url('laporan/index').'" class="btn btn-danger btn-sm"> Reset </a>';?>        
                          </form><hr />        
                          
                          <div class="text-left">
                          <p> <?php echo $label ?></p>                  
                          <p><?php if(empty($detail_transaksi)){ // Jika data tidak ada ?>
                            <a class="btn btn-danger btn-sm" href=""> Tidak Dapat Export PDF</a>
                            <?php } else { //jika data ada ?>
                            <a href="<?php echo $url_cetak ?>" class="btn btn-warning btn-sm"><i class="fas fa-file-pdf"></i> Export PDF</a></p>
                            <?php } ?></p>
                          </div>      
                          
                          
                <!--End Layout Filtering-->
                  <?php $no = 1;
                                      if(empty($detail_transaksi)){ // Jika data tidak ada                        
                                        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";                   
                                       }else{ // Jika jumlah data lebih dari 0 (Berarti jika data ada)                                                
                                        foreach ($detail_transaksi as $key=> $value) {?>
                                        
                                        
                    <tr>
                      <td class="text-center"><?= $no++; ?></td>
                      <td><?=date('d-m-Y', strtotime($value->tgl_transaksi)) ?></td>
                      <td class="text"><p>Nama: <?= $value->nama_pelanggan ?></p>
                                               <p>Hp: <?= $value->no_telepon ?></p>
                                               <p>Alamat: <?= $value->alamat?>, <?= $value->kota?>, <?= $value->provinsi?><br class="text-bold"><?= $value->kode_pos?></p></td>
                      <td class="text-center"><?= $value->name?>
                                              (Rp.<?= $value->price?></p> X <?= $value->qty?> = Rp.<?=$value->grand_total?>)</td>
                      
                      <td class="text-center"><?= $value->nama_bank?>-<?= $value->no_rek?><p> An: <?= $value->atas_nama?></p></td>
                      <td class="text-center"><?= $value->expedisi?> - <?= $value->paket?><p> No Resi: <?= $value->no_resi?></p></p>
                                  <p>Ongkir: Rp.<?= $value->ongkir?></p></td>
                      <td class="text"><b>Rp.<?= number_format($value->total_bayar,0)?></b></td>
                      <td class="text-center py=0 ">
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?=$value->id_detail_transaksi?>"><i class="fas fa-trash"></i></button>
                     
                      </td>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                    
                  </tbody>
                </table>
              </div></div> 
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    
            </div>

<!-- Include File JS Bootstrap -->   
<script src="<?php echo base_url('assets/latihan_pdf/assets/js/bootstrap.min.js') ?>"></script>    <!-- Include library Bootstrap Datepicker -->    
    <script src="<?php echo base_url('assets/latihan_pdf/assets/libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>    <!-- Include File JS Custom (untuk fungsi Datepicker) -->    
    <script src="<?php echo base_url('assets/latihan_pdf/assets/js/custom.js') ?>"></script>    
    <script>    $(document).ready(function(){        setDateRangePicker(".tgl_awal", ".tgl_akhir")    })</script>


<!-- Modal hapus -->
<?php foreach ($detail_transaksi as $key => $value) { ?>
                      
                      <div class="modal fade" id="hapus<?=$value->id_detail_transaksi?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Hapus nomor order: <?=$value->no_order?></h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                      
                            <div class="modal-body">
                              Apakah anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                              <a href="<?= base_url('laporan/delete/'.$value->id_detail_transaksi)?>" class="btn btn-success"> Iya </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                      <!-- end Modal hapus -->

    

