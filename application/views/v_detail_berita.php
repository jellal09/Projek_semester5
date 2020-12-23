      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?= $berita->judul_berita ?></h3>
              <div class="col-12">
                <img src="<?= base_url('assets/gambar_konfigurasi/' . $berita->gambar) ?>" class="product-image" alt="Product Image">
              </div>
              
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?= $berita->judul_berita ?></h3>
              
              <hr>
              <p><?= $berita->keterangan ?></p>
              <hr>

              <?php echo form_close(); ?>

            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <br>
<br>
</br>
</br>
<!-- SCRIPT -->
<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url() ?>/template/dist/js/demo.js"></script>
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
        title: 'Barang Berhasil Ditambahkan ke Keranjang'
      })
    });
  });
</script>