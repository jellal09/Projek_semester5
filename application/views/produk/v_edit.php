<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Produk</h3>
     </div>
     <!--card body-->
     <div class="card-body">
     <?php
     if(isset($error_upload)){
       echo '<div class="alert alert-danger alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <h5> <i class="icon fas fa-ban"></i>'. $error_upload. '</h5></div>';
     }
     echo form_open_multipart('produk/edit/'.$produk->id_produk)?>
     <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk"  name="nama_produk"  placeholder="Masukkan nama produk" value="<?= $produk->nama_produk?>" >
                        <?= form_error('nama_produk', '<small class="text-danger pl-2">', '</small>');  ?>
                      </div>
                    </div>
                  </div>
    <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Kategori</label>
                        <select  class="form-control" name="id_kategori" placeholder="id_kategori">
                         <!-- Memanggil value kategori-->
                         <option value="<?=$produk->id_produk?>"><?=$produk->nama_kategori?></option>
                         <?php foreach ($kategori as $key => $value) { ?>
                            <option value="<?=$value->id_kategori?>"><?=$value->nama_kategori?></option>
                        <?php } ?>
                        </select>
                      </div>
                      </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" id="stok"  name="stok" placeholder="stok" value="<?= $produk->stok?>" >
                        <?= form_error('stok', '<small class="text-danger pl-2">', '</small>');  ?>
                      </div>
                    </div>
                  </div>
    <div class="row">
                <div class="col-sm-6">
                      <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" id="harga"  name="harga" placeholder="harga" value="<?=$produk->harga?>"  >
                        <?= form_error('harga', '<small class="text-danger pl-2">', '</small>');  ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Berat</label>
                        <input name="berat" type="number" class="form-control" min="0" placeholder="Berat Dalam Satuan Gram" value="<?= set_value('berat') ?>">
                        <?= form_error('berat', '<small class="text-danger pl-2">', '</small>');  ?>
                      </div>
                    </div>
                    
                  </div>
    <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Deskripsi Produk</label>
                        <textarea class="form-control" rows="5" id="keterangan"  name="keterangan" placeholder="deskripsikan produk anda"><?= $produk->keterangan?></textarea>
                        <?= form_error('keterangan', '<small class="text-danger pl-2">', '</small>');  ?>
                      </div>
                    </div>
                    </div>
    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Ganti Gambar</label>
                        <input type="file" class="form-control" name="gambar"  id="preview_gambar" >
                        <p class="small">*maksimum file 3 Mb, berformat jpg/jpeg/png/jfif</p>
                      </div>

                    </div> 
                    <div class="col-sm-6">
                      <div class="form-group">
                        <img src="<?=base_url('assets/gambar/'.$produk->gambar)?>" id="gambar_load" width="90px" height="120px">
                      </div>
                    </div> 
                </div> 
     <!--div button-->
     <div class="row">
     <div class="form-group">
        <a href="<?=base_url('produk')?>" class="btn btn-success"> Kembali</a>
        <button type="submit" class="btn btn-primary ">Simpan</button>
    </div> </div> 
     <?= form_close()?>
     </div>
      <!--end card body-->
    </div >
</div >
 <!--end div halaman add-->

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