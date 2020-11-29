
<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Konfigurasi Artikel</h3>
                <div class="card-tools">
                 <button data-toggle='modal' data-target='#add' type="button" class="btn btn-primary btn-sm"></button>
                </div>
        
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <!-- /.card-body -->
              <?php foreach ($berita as $key => $value) { ?>
              <div class="card-body">
              <?php echo $this->session->flashdata('pesan');?>
                <?php
                echo form_open('berita/edit/'.$value->id_berita)?>
                 
             
                <div class="col-md-12">

                <div class="form-group">
                      <label for="exampleInputEmail1">Jenis artikel</label>
                      <input type="text" class="form-control" id="jenis_berita"  name="jenis_berita" placeholder="Masukkan jenis berita" value="<?=$value->jenis_berita?>" required>
                      </div>
                <div class="form-group">
                      <label for="exampleInputPassword1">Judul artiklel</label>
                      <input type="text" class="form-control" id="judul_berita"  name="judul_berita" placeholder="judul berita" value="<?=$value->judul_berita?>" required>
                      </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Isi artikel</label>
                    <textarea type="text"  rows="10" class="form-control" id="keterangan"  name="keterangan" placeholder="keterangan" value="<?=$value->keterangan?>" required></textarea>
                    </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Gambar</label>
                    <input type="text" class="form-control" id="gambar"  name="gambar"  value="<?=$value->gambar?>" required>
                    </div>
              </div>
              </div>
          
            <div class="modal-footer Right-content-between">
              
              <button type="submit" class="btn btn-primary">Simpan</button>
              <?php
                echo form_close();?>
            </div>
            <?php } ?>
          </div>   </div>
        
      
        <!--end layout-->
     
              