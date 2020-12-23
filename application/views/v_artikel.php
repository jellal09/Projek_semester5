<!--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider1.jpg">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider2.jpg">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider3.jpg">
                  </div>>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
</div>-->
<div class="card card-solid">
      <div class="card-body pb-0">
      
        <div class="row">
     
  

<?php foreach ($berita as $key => $value) { ?>
  
              <!-- /.card-header -->
              <div class="col-sm-4 ">
                <div class="card bg-light">
                  <div class="card-header text-muted border-bottom-0">
                  <div class="col-12 text-center">
                        <img src="<?= base_url('assets/gambar_konfigurasi/'.$value->gambar)?>"  width="300px" height="250px">
                      </div>
                    <div class="ribbon-wrapper ribbon-lg">
                      <div class="ribbon bg-primary text-lg">
                          ARTIKEL
                      </div>
                      </div>
                      <br/>
                      <h5 class="text-center"><a href="<?= base_url('home/detail_berita/'.$value->id_berita) ?>"><?= $value->judul_berita ?></a></h5>
                      
                    </div>
                  </div>
                </div>
                
                <!-- /.card-header --> 
               
                 
                <?php } ?>

</div>            
</div>
</div>
<br>
<br>
</br>
</br>
