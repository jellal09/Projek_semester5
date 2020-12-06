<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Data Produk</h3>

      <div class="card-tools">
          <a href="<?= base_url('produk/add')?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add </a>
      </div>
          <!-- /.card-tools -->
     </div>
              <!-- /.card-header -->
      <div class="card-body">
         <?php echo $this->session->flashdata('pesan');?>
            <table class="table table-bordered" id="example1">
              <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th>Deskripsi Produk</th>
                  <th>Stok</th>
                  <th>Harga</th>
                  <th>Gambar</th>
                  <th>Action</th>
                  
                  
                </tr>
                 </thead>
                <!--body-->   
                <tbody>
                <?php $no = 1;
                        foreach ($produk as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $value->nama_produk ?><br>
                            Berat : <?= $value->berat ?> Gr
                            </td>
                            <td class="text-center"><?= $value->nama_kategori ?></td>
                            <td class="text-center"><?= $value->keterangan?></td>  
                            <td  class="text-center"><?= $value->stok ?></td>
                            <td  class="text-center">Rp. <?= number_format($value->harga, 0)?></td>
                            <td  class="text-center"><img src="<?= base_url('assets/gambar/'.$value->gambar) ?>" width="120px"></td>
                         
                           
                            
                            <td  class="text-center">
                                <a href="<?= base_url('barang/edit/'. $value->id_produk) ?>" class="btn btn-warning btn-sm" ><i class="fa fa-edit"></i></a>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_produk?>"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                         <?php } ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card --
    </div>

<!-- Modal hapus -->
<?php foreach ($produk as $key => $value) { ?>
                      
                      <div class="modal fade" id="hapus<?=$value->id_produk?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Hapus <?=$value->nama_produk?></h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                      
                            <div class="modal-body">
                              Apakah anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                              <a href="<?= base_url('produk/delete/'.$value->id_produk)?>" class="btn btn-success"> Iya </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                      <!-- end Modal hapus -->
