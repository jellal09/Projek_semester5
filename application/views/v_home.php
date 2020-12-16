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
        <div class="row ">

<?php foreach ($produk as $key => $value) { ?>
        <div class="col-sm-4 ">

        <?php
        echo form_open('belanja/add');
        echo form_hidden('id', $value->id_produk);
        echo form_hidden('qty', 1);
        echo form_hidden('price', $value->harga);
        echo form_hidden('name', $value->nama_produk);
        echo form_hidden('redirect_page', str_replace('index.php/','', current_url()));
       
        ?>
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
              <div class="col-12 text-center">
                    <img src="<?= base_url('assets/gambar/'.$value->gambar)?>"  width="300px" height="250px">
                  </div>
              <h2 class="lead"><b><?= $value->nama_produk ?></b></h2>
              <p class="text-muted text-sm"><b>Stok: </b> <?= $value->stok ?>
              <?php
              if ($value->stok == 0) {
                echo '<span class="btn btn-danger">Stok Habis</span>';
              }else{
                echo '<span class="btn btn-primary">Stok tersedia</span>';
              }

              ?>
              </p>
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
                  <a href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>" class="btn btn-sm btn-success">
                    <i class="fas fa-eye"></i>
                  </a>
                  <button type="submit" class="btn btn-sm btn-primary swalDefaultSuccess">
                    <i class="fas fa-cart-plus"> Add</i> 
                  </button>
                </div>
                </div>
                </div>
                
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
<?php } ?>



        </div>
      </div>
</div>

<!-- SweetAlert2 -->
<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Barang Berhasil Ditambahkan Ke Keranjang'
      })
    });
  });
   </script>