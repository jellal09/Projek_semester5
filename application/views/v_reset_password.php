<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4">
<div class="register-box">
  <div class="register-logo">
  <img src="<?= base_url() ?>assets/gambar/logo.png" class="text-center" width="360px">
  </div>
  <?= $this->session->flashdata('message');?>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg"><?= $title ?></p>
      <b><h6 class= "text-center"><?= $this->session->userdata('reset_email') ?></h6></b>
      <br>
      <form action="<?= base_url('pelanggan/ubahPassword')?>" method="post">
        <div class="col-sm-12 mb-3">
          <input type="password"  id="password1" class="form-control" name="password1" placeholder="Masukan passsword baru"> <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="col-sm-12 mb-3">
          <input type="password"  id="password2" class="form-control" name="password2" placeholder="Ulangi passsword"> <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block text-center">Ubah Password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
</div>
</div>
</div>