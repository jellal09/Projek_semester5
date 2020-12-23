<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Artikel</h3>
                <div class="card-tools">
                 <button data-toggle='modal' data-target='#add' type="button" class="btn btn-primary btn-sm"></button>
                </div>
        
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <!-- /.card-body -->
              
              <div class="card-body">
              <?php
     if(isset($error_upload)){
       echo '<div class="alert alert-danger alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <h5> <i class="icon fas fa-ban"></i>'. $error_upload. '</h5></div>';
     }
     echo form_open_multipart('berita/edit/'.$berita->id_berita)?>
     
    <div class="row">
                <div class="col-md-12">

                <div class="form-group">
                      <label for="exampleInputEmail1">Jenis artikel</label>
                      <input type="text" class="form-control" id="jenis_berita"  name="jenis_berita" placeholder="Masukkan jenis berita" value="<?=$berita->jenis_berita?>" >
                      <?= form_error('jenis_berita', '<small class="text-danger pl-2">', '</small>');  ?>
                      </div>
                <div class="form-group">
                      <label for="exampleInputPassword1">Judul artiklel</label>
                      <input type="text" class="form-control" id="judul_berita"  name="judul_berita" placeholder="judul berita" value="<?=$berita->judul_berita?>" required>
                      <?= form_error('judul_berita', '<small class="text-danger pl-2">', '</small>');  ?>
                      </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Isi artikel</label>
                    <textarea type="text"  rows="10" class="form-control" id="keterangan"  name="keterangan" placeholder="keterangan" ><?=$berita->keterangan?></textarea>
                    <?= form_error('keterangan', '<small class="text-danger pl-2">', '</small>');  ?>
                    </div>
                    </div>
                    
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Gambar </label>
                        <input type="file" class="form-control" name="gambar"  id="preview_gambar"  >
                        <p class="small">*maksimum file 3 Mb, berformat jpg/jpeg/png/jfif</p>
                      </div></div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <img src="<?=base_url('/assets/gambar_konfigurasi/'.$berita->gambar)?>" id="gambar_load"  width="90px" height="120px">
                      </div>
                    </div> 
                </div> 

              </div> <!-- /.card-body -->
              
          
            <div class="modal-footer Right-content-between">
              <a href="<?=base_url('berita')?>" class="btn btn-success"> Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <?php
                echo form_close();?>
            </div>
          </div>   
        </div>
        
        </div>
        <!--end layout-->
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


              