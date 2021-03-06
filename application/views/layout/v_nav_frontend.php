<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?= base_url()?>" class="navbar-brand">
<img src="<?= base_url() ?>assets/gambar/Picture.png" width="140">
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?= base_url() ?>" class="nav-link">Home</a>
          </li>

          <?php $kategori = $this->m_home->get_all_data_kategori(); ?>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

              <?php foreach ($kategori as $key => $value) { ?>
              <li><a href="<?= base_url('home/kategori/' . $value->id_kategori) ?>" class="dropdown-item"><?= $value->nama_kategori ?></a></li>
              <?php } ?>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('home/artikel') ?>" class="nav-link">Artikel</a>
          </li>

          <div class="row">
            <div class="col">
              <form accept="" method="post">
                
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Cari Produk" name="keyword">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
<!-- 
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Some action </a></li>
              <li><a href="#" class="dropdown-item">Some other action</a></li>
            </ul>
          </li> -->
        </ul>
      </div>

    
<!-- Right navbar links -->
<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
<li class="nav-item">
    <?php if ($this->session->userdata('email')=='') { ?>
        <a class="nav-link" href="<?= base_url('pelanggan') ?>">
        <span class="brand-text font-weight-light">Login </span>
        <img src="<?= base_url() ?>assets/gambar/user.png" alt="User Avatar" class="brand-image img-circle elevation-2"
        style="opacity: .5">
        </a>
    <?php }else{ ?>
        <a class="nav-link" data-toggle="dropdown" href="#">
        <span class="brand-text font-weight-light"><?= $this->session->userdata('nama_pelanggan') ?> </span>
        <img src="<?= base_url('assets/foto/'. $this->session->userdata('foto')) ?>" alt="User Avatar" class="brand-image img-circle elevation-2"
        style="opacity: .5">
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('pelanggan/akun') ?>" class="dropdown-item">
                <i class="fas fa-user-alt mr-2"></i> Akun Saya
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('pesanan_saya') ?>" class="dropdown-item">
            <i class="fas fa-shopping-bag mr-2"></i> Pesanan Saya
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('pelanggan/logout') ?>" class="dropdown-item dropdown-footer">Log Out</a>
        </div>
    <?php } ?>
</li>

        <?php 
        $keranjang = $this->cart->contents();
        $jml_item = 0;
        foreach ($keranjang as $key => $value) {
           $jml_item = $jml_item + $value['qty'];
         } 
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-shopping-cart"></i>
            <span class="badge badge-danger navbar-badge"><?= $jml_item ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <?php if (empty($keranjang)) { ?>
              <a href="#" class="dropdown-item">
                Keranjang Belanja Kosong
              </a>
            <?php } else{
               foreach ($keranjang as $key => $value) { 
                $produk = $this->m_home->detail_produk($value['id']);
                ?>              
            <a href="#" class="dropdown-item">
              <div class="media">
                <img src="<?= base_url('assets/gambar/' . $produk->gambar) ?>" alt="User Avatar" class="img-size-50 mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    <?= $value['name'] ?>
                  </h3>
                  <p class="text-sm"><?= $value['qty'] ?> x Rp. <?= number_format($value['price'], 0)  ?></p>
                  <p class="text-sm text-muted">Total =  Rp. <?= $this->cart->format_number($value['subtotal']); ?>
                  </p>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <?php } ?>
            <!-- Produk Start --> 
              <a href="#" class="dropdown-item">
              <div class="media">
                <div class="media-body">
                  <tr>
                    <td colspan="2"> </td>
                    <td class="right">Jumlah Total = </td>
                    <td class="right">Rp. <?= $this->cart->format_number($this->cart->total()); ?></td>
                  </tr>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('belanja') ?>" class="dropdown-item dropdown-footer">View Cart</a>
            <a href="<?= base_url('belanja/checkout') ?>" class="dropdown-item dropdown-footer">Check Out</a>
          <?php } ?>
              <!-- Produk End -->            
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Toko Istana</a></li>
              <li class="breadcrumb-item"><a href="#"><?= $title ?></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">