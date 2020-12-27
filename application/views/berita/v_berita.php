<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Data Artikel</h3>

      <div class="card-tools">
          <a href="<?= base_url('berita/add')?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add </a>
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
                  <th>Jenis Artikel</th>
                  <th>Judul Artikel</th>
                  <th>Gambar</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                  
                  
                  
                </tr>
                 </thead>
                <!--body-->   
                <tbody>
                  <?php $no = 1;
                  foreach ($berita as $key => $value) { ?>
                    <tr>
                      <td class=""><?= $no++; ?></td>
                      <td class=""><?= $value->jenis_berita ?></td>
                      <td class="text-center"><?= $value->judul_berita ?></td>
                      <td class="text-center"><img src="<?= base_url('assets/gambar_konfigurasi/'.$value->gambar)?>" width="120px" hight="100px"></td>
                      <td class="text-justify"><?= $value->keterangan ?></td>
                      <td class="text-center py=0 ">
                      <div class="btn-group btn-group-sm">
                      <a href="<?= base_url('berita/edit/'.$value->id_berita)?>" class="btn btn-warning btn-sm" ><i class="fa fa-edit"></i></a>
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?=$value->id_berita?>"><i class="fas fa-trash"></i></button>
                      </div>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </div>

<!-- Modal hapus -->
<?php foreach ($berita as $key => $value) { ?>
                      
                      <div class="modal fade" id="hapus<?=$value->id_berita?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Hapus <?=$value->judul_berita?></h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                      
                            <div class="modal-body">
                              Apakah anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                              <a href="<?= base_url('berita/delete/'.$value->id_berita)?>" class="btn btn-success"> Iya </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                      <!-- end Modal hapus -->
