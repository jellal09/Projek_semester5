

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="https://placehold.it/900x500/39CCCC/ffffff&text=I+Love+Bootstrap" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="https://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="https://placehold.it/900x500/f39c12/ffffff&text=I+Love+Bootstrap" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
<div class="card card-solid">
      <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">


<?php foreach ($produk as $key => $value) { ?>


        <div class="col-sm-4 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
              <div class="col-12 text-center">
                    <img src="<?= base_url('assets/gambar/'.$value->gambar)?>"  width="300px" height="300px">
                  </div>
              <h2 class="lead"><b><?= $value->nama_produk ?></b></h2>
              <p class="text-muted text-sm"><b>Stok: </b> <?= $value->stok ?></p>
              </div>
              <div class="card-body pt-0">
                <div class="row">
                  
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                <div class="col-sm-6">
                <div class="text-left">
                   <h4><?= number_format($value->harga, 0) ?></h4>
              </div>
                </div>
                <div class="col-sm-6">
                <div class="text-right">
                  <a href="<?= base_url('home/detail_produk/' . $value->id_produk) ?>" class="btn btn-sm btn-success">
                    <i class="fas fa-eye"></i>
                  </a>
                  <button type="submit" class="btn btn-sm btn-primary swalDefaultSuccess">
                      <i class="fas fa-cart-plus"></i> Beli
                  </button>
                  </a>
                </div>
                </div>
                </div>
                
              </div>
            </div>
          </div>
<?php } ?>



        </div>
      </div>
</div>