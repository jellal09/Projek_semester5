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
      <form action="<?= base_url('pelanggan/lupaPassword')?>" method="post">
        <div class="col-sm-12 mb-3">
          <input type="email" class="form-control" value="<?= set_value('email') ?>" name="email" placeholder="Email"> <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block text-center">Reset Password </button>
          </div>
          <!-- /.col -->
        </div>
      </form>
     <br>
      <a href="<?= base_url('pelanggan'); ?>" ><h6 class="text-center">Login ?</h6></a>
      <br>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
</div>
</div>
</div>