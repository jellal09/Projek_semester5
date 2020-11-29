<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Password</h3>
                <div class="card-tools">
                 <button data-toggle='modal' data-target='#add' type="button" class="btn btn-primary btn-sm"></button>
                </div>
        
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <!-- /.card-body -->
             
              <div class="card-body">
              <?php foreach ($user as $key => $value) { ?>
              <?php
                echo form_open('ubahpwd/pwd/'.$value->id_user)?>
             
                
             
                <div class="col-md-12">

                <div class="form-group">
                      <label for="exampleInputEmail1">Password Baru</label>
                      <input type="password" class="form-control" id="password"  name="password" placeholder="Masukkan password baru anda" required>
                      <?= form_error('password', '<small class="text-danger pl-2">', '</small>');  ?>
                      </div>
                <!--<div class="form-group">
                      <label for="exampleInputPassword1">Konfirmasi password</label>
                      <input type="password" class="form-control" id="password2"  name="password2" placeholder="konfirmasi password" required>
                      <?= form_error('password2', '<small class="text-danger pl-2">', '</small>');  ?>
                      </div>-->
            
              </div>
              </div>
          
            <div class="modal-footer Right-content-between">
              
              <button type="submit" class="btn btn-primary">Simpan</button>
              <?php
                echo form_close();?>
            </div>
        

          </div>   </div>
        
          <?php } ?>
        <!--end layout-->
     
              