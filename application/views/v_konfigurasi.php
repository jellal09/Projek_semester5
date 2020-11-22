
<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Konfigurasi Web Toko Istana</h3>
                <div class="card-tools">
                 <button data-toggle='modal' data-target='#add' type="button" class="btn btn-primary btn-sm"></button>
                </div>
        
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <!-- /.card-body -->
              <?php foreach ($setting as $key => $value) { ?>
              <div class="card-body">
              <?php echo $this->session->flashdata('pesan');?>
                <?php
                echo form_open('konfigurasi/edit/'.$value->id_konfigurasi)?>
                 
              <div class="form-row">
                <div class="col-md-6">

                <div class="form-group">
                      <label for="exampleInputEmail1">Nama Web</label>
                      <input type="text" class="form-control" id="nama_web"  name="nama_web" placeholder="Masukkan nama web" value="<?=$value->nama_web?>" required>
                      </div>
                <div class="form-group">
                      <label for="exampleInputPassword1">Email</label>
                      <input type="text" class="form-control" id="email"  name="email" placeholder="email" value="<?=$value->email?>" required>
                      </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Telepon</label>
                    <input type="text" class="form-control" id="telepon"  name="telepon" placeholder="telepon" value="<?=$value->telepon?>" required>
                    </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" class="form-control" id="alamat"  name="alamat" placeholder="alamat" value="<?=$value->alamat?>" required>
                    </div>
              </div>
            <!--end div class col md6-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Facebook</label>
                        <input type="text" class="form-control" id="facebook"  name="facebook" placeholder="facebook" value="<?=$value->facebook?>"required>
                        </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Instagram</label>
                        <input type="text" class="form-control" id="intagram"  name="instagram" placeholder="instagram" value="<?=$value->instagram?>" required>
                        </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">icon</label>
                        <input type="text" class="form-control" id="icon"  name="icon" placeholder="icon" value="<?=$value->icon?>" required>
                        </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Logo</label>
                        <input type="text" class="form-control" id="logo"  name="logo" placeholder="logo" value="<?=$value->logo?>" required>
                        </div>
                    </div>
                <!--end div class col md6-->
                <!--div class col md12-->
                     <div class="col-md-12">
                      <label for="exampleInputPassword1">Deskripsi Web</label>
                      <input type="text" class="form-control" id="deskripsi"  name="deskripsi" placeholder="toko istana adalah ..." value="<?=$value->deskripsi?>" required>
                      </div>
                 <!--end div class col md12-->
            </div>
          </div>
            <div class="modal-footer Right-content-between">
              
              <button type="submit" class="btn btn-primary">Simpan</button>
              <?php
                echo form_close();?>
            </div>
            
          </div>
        </div>
        <?php } ?>
        <!--end layout-->
     
              