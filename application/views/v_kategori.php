<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Data Kategori</h3>

      <div class="card-tools">
          <button data-toggle='modal' data-target='#add' type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add </button>
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
                  <th>Nama Kategori</th>
                  <th>Tanggal Update</th>
                  <th>Action</th>
                </tr>
                 </thead>
                <!--body-->   
                <tbody>
                  <?php $no = 1;
                  foreach ($kategori as $key => $value) { ?>
                    <tr>
                      <td class="text-center"><?= $no++; ?></td>
                      <td class="text-center"><?= $value->nama_kategori ?></td>
                      <td class="text-center"><?= $value->tgl_update ?></td>
                      <td  class="text-center">
                      <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?=$value->id_kategori?>"><i class="fa fa-edit"></i></button>    
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?=$value->id_kategori?>"><i class="fas fa-trash"></i></button>
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

<!--modal add -->
    <div class="modal fade" id="add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
            <?php
            echo form_open('kategori/add');?>
                
            <!--isi dari modal penmabhan data baru-->
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Kategori</label>
              <input type="text" class="form-control" id="nama_kategori"  name="nama_kategori" placeholder="Masukkan kategori" required>
            </div>
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <?php echo form_close();?>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
   <!-- end modal add -->  
   
   
   <!-- Modal hapus -->
<?php foreach ($kategori as $key => $value) { ?>
                      
<div class="modal fade" id="hapus<?=$value->id_kategori?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus <?=$value->nama_kategori?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        Apakah anda yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <a href="<?= base_url('kategori/delete/'.$value->id_kategori)?>" class="btn btn-success"> Iya </a>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- end Modal hapus -->

 <!--modal edit -->
 <?php foreach ($kategori as $key => $value) { ?>
 <div class="modal fade" id="edit<?=$value->id_kategori?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header"> 
              <h4 class="modal-title">Edit Data Kategori</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
            <?php echo form_open('kategori/edit/'.$value->id_kategori)?>
            <!--isi dari modal edit data -->
              <div class="form-group">
                      <label for="exampleInputEmail1">Nama Kategori</label>
                      <input type="text" class="form-control" id="nama_kategori"  name="nama_kategori" value="<?=$value->nama_kategori?>" placeholder="nama kategori" required>
                      </div>
              </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Simpan </a>
                
                </div>
                <?php echo form_close();?>
                
              </div>
       
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <?php } ?>
   <!-- end modal edit -->  