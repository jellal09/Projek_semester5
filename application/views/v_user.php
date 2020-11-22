<div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data User</h3>

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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Action</th>
                  </tr>
                  </thead>

                  <!-- body user-->
                  <tbody>
                  <?php $no = 1;
                  foreach ($user as $key => $value) { ?>
                    <tr>
                      <td class="text-center"><?= $no++; ?></td>
                      <td class="text-center"><?= $value->nama ?></td>
                      <td class="text-center"><?= $value->email ?></td>
                      <td class="text-center"><?= $value->username ?></td>
                      <td  class="text-center"><?php
                        if ($value->akses_level ==1) {
                               echo '<span class="badge bg-primary">Admin</span>';
                        }else{
                                echo '<span class="badge bg-success">User</span>';
                             }
                        ?></td>
                      <td  class="text-center">
                        <!--<button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>-->
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?=$value->id_user?>"><i class="fas fa-trash"></i></button>
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
              <h4 class="modal-title">Tambah Data User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
            <?php
                echo form_open('user/add');?>
                
            <!--isi dari modal penmabhan data baru-->
            <div class="form-row">
            <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" id="nama"  name="nama" placeholder="Masukkan nama" required>
            </div>
            <div class="form-group">
                 <label for="exampleInputPassword1">Username</label>
                 <input type="text" class="form-control" id="username"  name="username" placeholder="username" required>
            </div>
            </div>
                  <!--end div class col md6-->
            <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputPassword1">Akses Level</label>
                    <select id="akses_level" name="akses_level" class="custom-select form-control-user" size="-2" value="<?= set_value('akses_level'); ?> required">
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                    </select>
                  </div>
            <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password"  name="password" placeholder="password" required>
            </div>
            
            </div>
                     <!--end div class col md6-->
            <div class="col-md-12">
                 <label for="exampleInputPassword1">Email</label>
                 <input type="text" class="form-control" id="email"  name="email" placeholder="email" required>
            </div>
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
<?php foreach ($user as $key => $value) { ?>
                        
<div class="modal fade" id="hapus<?=$value->id_user?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Hapus <?=$value->nama?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        Apakah anda yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <a href="<?= base_url('user/delete/'.$value->id_user)?>" class="btn btn-success"> Iya </a>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- Modal -->