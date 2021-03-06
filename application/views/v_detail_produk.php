<!-- Default box -->
<div class="card card-solid">
<div class="card-body">
<div class="row">
<div class="col-12 col-sm-6">

<h3 class="d-inline-block d-sm-none"><?= $produk->nama_produk ?></h3>
<div class="col-12">
  <img src="<?= base_url('assets/gambar/'.$produk->gambar) ?>" class="product-image" alt="Product Image">
</div>
<div class="col-12 product-image-thumbs">
  <div class="product-image-thumb active"><img src="<?= base_url('assets/gambar/'.$produk->gambar) ?>" alt="Product Image"></div>
  <?php foreach ($gambar as $key => $value) { ?>
    <div class="product-image-thumb" ><img src="<?= base_url('assets/detail_gambar/'.$value->gambar) ?>"></div>
 <?php } ?>

</div>

</div>
<div class="col-12 col-sm-6">
<h3 class="my-3"><?= $produk->nama_produk ?></h3>
<hr>
<p> <b> Stok : </b> <?= $produk->stok ?></p>
<hr>
<b> Deskripsi : </b> 
<?= $produk->keterangan ?>
<hr>
<div class="bg-gray py-2 px-3 mt-4">
  <h2 class="mb-0">
    Rp. <?= number_format($produk->harga,0) ?>
  </h2>
</div>
<hr>
<?php
 echo form_open('belanja/add');
 echo form_hidden('id', $produk->id_produk);
 echo form_hidden('price', $produk->harga);
 echo form_hidden('name', $produk->nama_produk);
 echo form_hidden('redirect_page', str_replace('index.php/','', current_url()));
?>
<div class="mt-4">
 <div class="row">
 <div class="col-sm-2">
   <input type="number" name="qty" class="form-control" value="1" min="1" max="<?= $produk->stok ?>">
 </div>
    <div class="col-sm-8">
    <button type="submit" class="btn btn-primary btn-flat swalDefaultSuccess">
    <i class="fas fa-cart-plus fa-lg mr-2"></i> 
    Masukkan Ke Keranjang
  </button>
    </div>
 </div>
  </div>
    <?php form_close(); ?>

</div>
</div>
</div>
<!-- /.card-body -->
</div>
<br>
<br>
</br>
</br>
<!-- /.card -->
<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>template/dist/js/demo.js"></script>

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
        title: 'produk Berhasil Ditambahkan Ke Keranjang'
      })
    });
  });
   </script>