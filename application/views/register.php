<div class="row">
<div class="col-sm-2"></div>
<div class="col-md-8">
  <div class="register-logo">
  <img src="<?= base_url() ?>assets/gambar/logo.png" class="text-center" width="360px">
  </div>

  <div class="card">
    <div class="card-body register-card-body">
     <form action="<?= base_url('pelanggan/register')?>" method="post">
       <div class="col-sm-12 mb-3">
          <input type="text" class="form-control" value="<?= set_value('nama_pelanggan') ?>" name="nama_pelanggan" placeholder="Full Name"> <?= form_error('nama_pelanggan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="col-sm-12 mb-3">
          <input type="email" class="form-control" value="<?= set_value('email') ?>" name="email" placeholder="Email"> <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
        </div>        
        <div class="form-group row">
            <div class="col-sm-6">
            <input type="password" class="form-control" name="password" value="<?= set_value('password') ?>" placeholder="Password"> <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="col-sm-6">
            <input type="password" class="form-control" name="ulangi" value="<?= set_value('password') ?>" placeholder="Ulangi password">
            </div>
        </div>
        <div class="col-sm-12 mb-3">
          <input type="text" class="form-control" value="<?= set_value('no_telepon') ?>" name="no_telepon" placeholder="Masukan Nomer Telepon"><?= form_error('no_telepon', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="col-sm-12 mb-3">
          <input type="text" class="form-control" value="<?= set_value('alamat') ?>" name="alamat" placeholder="Masukan Alamat Lengkap"><?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
        </div>
        <br>
        <div class="row"><div class="col-sm-3"></div>
          <!-- /.col -->
          <div class="col-md-6 text-center">
            <button type="submit" class="btn btn-primary btn-block text-center">Register</button>
          </div>
         
          <!-- /.col -->
        </div>
      </form>
      <br>
      <div class="row">
      <div class="col-sm-4"></div>

       <a href="<?= base_url('pelanggan') ?>" class="text-center">Sudah Punya Akun ? Login Disini</a></div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
