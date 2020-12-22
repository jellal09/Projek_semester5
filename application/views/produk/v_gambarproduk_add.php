<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Tambah Detail Gambar Produk <?= $produk->nama_produk?></h3>
     </div>
     <!--card body-->
     <div class="card-body">
     <?php echo $this->session->flashdata('pesan');?>
     <?php
     if(isset($error_upload)){
       echo '<div class="alert alert-danger alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <h5> <i class="icon fas fa-ban"></i>'. $error_upload. '</h5></div>';
     }
     echo form_open_multipart('gambar_produk/add/'. $produk->id_produk)?>

     <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Keterangan Gambar</label>
                        <input type="text" class="form-control" id="judul_gambar"  name="judul_gambar"  placeholder="Masukkan Keterangan gambar secara singkat " value="<?= set_value('judul_gambar')?>" >
                        <?= form_error('judul_gambar', '<small class="text-danger pl-2">', '</small>');  ?>
                      </div>
                    </div>
                  </div>

    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" name="gambar"  id="preview_gambar" required>
                        <p class="small">*maksimum file 3 Mb, berformat jpg/jpeg/png/jfif</p>
                      </div>

                    </div> 
                    <div class="col-sm-6">
                      <div class="form-group">
                        <img src="<?=base_url('assets/gambar/nofoto.jpg')?>" id="gambar_load" width="90px" height="120px">
                      </div>
                    </div> 
                </div> 
     <!--div button-->
     <div class="row">
     <div class="form-group">
        <a href="<?=base_url('gambar_produk')?>" class="btn btn-success"> Kembali</a>
        <button type="submit" class="btn btn-primary ">Simpan</button>
    </div> </div> 
     <?=form_close()?>
      
      <hr><!--menghapus gambar set value gambar produk-->
      <div class="row">
        <?php foreach ($gambar as $key => $value) { ?>
        <div class="col-sm-3">
          <div class="form-group text-center">
              <img src="<?=base_url('assets/detail_gambar/'.$value->gambar)?>" id="gambar_load" width="100px" height="120px">
           </div>
           <p class="text-sm">Keterangan : <?=$value->judul_gambar?></p>
                 <!--div button-->
                 <button class="btn btn-danger btn-sm btn-xs btn-block" data-toggle="modal" data-target="#hapus<?=$value->id_gambar?>"><i class="fas fa-trash"></i> Hapus Gambar </button>
 
            </div> 
            <?php } ?>
          </div>
      </hr>  <!--menghapus gambar set value gambar produk-->
     </div> <!--end card body-->
  </div >
</div ><!--end div halaman add-->
 

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

<!-- Modal hapus detail gambar -->
<?php foreach ($gambar as $key => $value) { ?>
                      
                      <div class="modal fade" id="hapus<?=$value->id_gambar?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Hapus <?=$value->judul_gambar?></h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                      
                            <div class="text-center">
                            <img src="<?=base_url('assets/detail_gambar/'.$value->gambar)?>" width="90px" >
                             <p> Apakah anda yakin ingin menghapus gambar ini?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                              <a href="<?= base_url('gambar_produk/delete/'.$value->id_gambar.'/'.$value->id_produk)?>" class="btn btn-success"> Iya </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                      <!-- end Modal hapus -->