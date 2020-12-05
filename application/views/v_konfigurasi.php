
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
              
              <div class="card-body">
              <?php echo $this->session->flashdata('pesan');?>
              <?php foreach ($setting as $key => $value) { ?>
                <?php
                 if(isset($error_upload)){
                  echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5> <i class="icon fas fa-ban"></i>'. $error_upload . '</h5></div>';
                }
                echo form_open_multipart('konfigurasi/edit/'.$value->id_konfigurasi)?>
                 
              <div class="form-row">
                <div class="col-md-6">

                <div class="form-group">
                      <label for="exampleInputEmail1">Nama Web</label>
                      <input type="text" class="form-control" id="nama_web"  name="nama_web" placeholder="Masukkan nama web" value="<?=$value->nama_web?>" >
                      <?= form_error('nama_web', '<small class="text-danger pl-2">', '</small>');  ?>
                      </div>
                <div class="form-group">
                      <label for="exampleInputPassword1">Email</label>
                      <input type="text" class="form-control" id="email"  name="email" placeholder="email" value="<?=$value->email?>" >
                      <?= form_error('email', '<small class="text-danger pl-2">', '</small>');  ?>
                      </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Telepon</label>
                    <input type="text" class="form-control" id="telepon"  name="telepon" placeholder="telepon" value="<?=$value->telepon?>" >
                    <?= form_error('telepon', '<small class="text-danger pl-2">', '</small>');  ?>
                    </div>
               
              </div>
            <!--end div class col md6-->
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="exampleInputPassword1">Alamat</label>
                      <input type="text" class="form-control" id="alamat"  name="alamat" placeholder="alamat" value="<?=$value->alamat?>">
                      <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>');  ?>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Facebook</label>
                        <input type="text" class="form-control" id="facebook"  name="facebook" placeholder="facebook" value="<?=$value->facebook?>">
                        <?= form_error('facebook', '<small class="text-danger pl-2">', '</small>');  ?>
                        </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Instagram</label>
                        <input type="text" class="form-control" id="intagram"  name="instagram" placeholder="instagram" value="<?=$value->instagram?>">
                        <?= form_error('instagram', '<small class="text-danger pl-2">', '</small>');  ?>
                        </div>
                        </div>
                        </div>
                    
                <!--end div class col md6-->
                <!--div class col md12-->
                <div class="row">
                     <div class="col-md-12">
                      <label for="exampleInputPassword1">Deskripsi Web</label>
                      <textarea type="text" class="form-control" id="deskripsi"  name="deskripsi" placeholder="toko istana adalah ...(secara singkat)"  ><?=$value->deskripsi?></textarea>
                      <?= form_error('deskripsi', '<small class="text-danger pl-2">', '</small>');  ?>
                      </div>
                      </div>
                 <!--end div class col md12-->

                 <!--div class col md6-->
                 <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Gambar Logo</label>
                        <input type="file" class="form-control" name="logo"  id="preview_gambar" >
                        <p class="small">*maksimum file 3 Mb, berformat jpg/jpeg/png/jfif</p>
                      </div>

                    </div> 
                    <div class="col-md-6">
                      <div class="form-group">
                        <img src="<?=base_url('./assets/gambar_konfigurasi/'.$value->logo)?>" id="gambar_load" width="90px" height="120px">
                      </div>
                    </div> 
                </div> 
                 <!--end div class col md6-->

                 <!--<div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Gambar Icon</label>
                        <input type="file" class="form-control" name="icon" >
                        <p class="small">*maksimum file 3 Mb, berformat jpg/jpeg/png/jfif</p>
                      </div>

                    </div> 
                    <div class="col-md-6">
                      <div class="form-group">
                        <img src="<?=base_url('assets/gambar_konfigurasi/nofoto.jpg')?>" width="90px" height="120px">
                      </div>
                    </div> 
                </div> 
                 end div class col md6-->
                  <div class="modal-footer Right-content-between">
                  
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <?php
                    echo form_close();?>
                </div>
            </div>
          </div>
            
            
          </div>
        
       
        <!--end layout-->

<!--script logo-->
<script>
function bacaGambar(input){
  if(input.files && input.files[0]){
    var reader=new FileReader();
    reader.onload=function(e){
      $('#gambar_load').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#preview_gambar").change(function(){
  bacaGambar(this);
});

</script>
<!--end script logo-->
<?php } ?>

