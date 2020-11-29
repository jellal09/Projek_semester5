<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Toko Istana | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url()?>template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Toko</b>Istana</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
     <p class="login-box-msg"> Silahkan Login</p>
      <?= $this->session->flashdata('error');?>
      <?= $this->session->flashdata('pesan');?>
    <?php
     echo form_open('auth/login_user')
    ?>
        <div class="input-group mb-2">
        <input type="text" name= "username" class="form-control" placeholder="Username">
          <div class="input-group-append"> 
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?= form_error('username', '<small class="text-danger pl-2">', '</small>');  ?>

        <div class="input-group mb-1">
        <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?= form_error('password', '<small class="text-danger pl-2">', '</small>');  ?>
        
        <p class="mb-2" >
        <a href="<?= base_url('auth/lupapwd')?>"><small>Lupa Password?</small></a>
        </p>
    

      <div class="social-auth-links text-center mb-2">
      <button type="submit" class="btn btn-primary btn-block">Log In</button>
      </div>
      <!-- /.social-auth-links -->
      <?php echo form_close()?>
     
     
    </div>
  </div>
</div>


<!-- jQuery -->
<script src=".<?= base_url()?>template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>template/dist/js/adminlte.min.js"></script>

</body>
</html>
