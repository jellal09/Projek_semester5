<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Data Detail Gambar Produk</h3>

      <div class="card-tools">
         
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
                  <th>Nama Barang</th>
                  <th>Gambar</th>
                  <th>Jumlah Detail Gambar</th>
                  <th>Action</th>
                </tr>
                 </thead>
                <!--body-->   
                <tbody>
                <?php $no = 1;
                  foreach ($gambar_produk as $key => $value) { ?>
                    <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $value->nama_produk?></td>
                    <td class="text-center"><img src="<?=base_url('assets/gambar/'.$value->gambar)?>" width="120px"></td>
                    <td class="text-center"><span class="badge bg-primary"><h6><?= $value->total_gambar?></h6></span></td>
                    <td class="text-center">
                      <div class="btn-group btn-group-sm">
                      <a href="<?= base_url('gambar_produk/add/'.$value->id_produk)?>" type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-plus"></i> Tambah Gambar </a>
                      
                     
                      </div>
                      </td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
            <!-- /.card -->
    