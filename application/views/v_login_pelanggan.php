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
      <form action="<?= base_url('pelanggan')?>" method="post">
        <div class="col-sm-12 mb-3">
          <input type="email" class="form-control" value="<?= set_value('email') ?>" name="email" placeholder="Email"> <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="col-sm-12 mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password"> <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block text-center">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
     <br>
      <a href="<?= base_url('pelanggan/register'); ?>" class="text-center"><h6 class="text-center">Belum Punya Akun ? Daftar Disini</h6></a>
      <br>
      <a href="<?= base_url('pelanggan/lupaPassword'); ?>" class="text-center"><h6 class="text-center">Lupa Password ?</h6></a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
</div>
<div class="col-sm-4"></div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>