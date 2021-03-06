 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin')?>" class="brand-link">
     <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">-->
     
      <span class="brand-text font-weight-bold my-2" >Toko Istana</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>assets/gambar/useradmin.png" class="img-circle elevation-2" alt="User Image" width="50px">
        </div>
        <div class="info">
          <a href="#" class="d-block"> WeLcome <?php echo $this->session->userdata('username')?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="<?= base_url('admin') ?>" class="nav-link <?php if($this->uri->segment(1)=='admin' and $this->uri->segment(2)=="" ){echo "active";} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Dashboard </p>
            </a>
          </li>
            
              <li class="nav-item">
          <a href="<?= base_url('admin/pesanan_masuk')?>" class="nav-link <?php if($this->uri->segment(2)== 'pesanan_masuk' and $this->uri->segment(1) == 'admin' ){echo "active";} ?>">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p> Pesanan Masuk </p>
            </a>
          </li>

              <!--nav sub bab produk-->
              <li class="nav-item has-treeview menu-open">
              <a href="" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
                  <p>Produk</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
              <!--sub bab-->
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="<?= base_url('produk')?>" class="nav-link <?php if($this->uri->segment(1)=='produk' ){echo "active";} ?>">
                  <i class="nav-icon  fas fa-list"></i>
                    <p> Data Produk</p>
                  </a>
                </li>
              <li class="nav-item">
              <a href="<?= base_url('gambar_produk')?>" class="nav-link <?php if($this->uri->segment(1)=='gambar_produk' ){echo "active";} ?>">
                  <i class="nav-icon fas fa-image"></i>
                  <p>Gambar Produk</p>
                  </a>
              </li>
            </ul>
          </li>
              <!--end nav sub bab produk-->
              <li class="nav-item">
                <a href="<?= base_url('kategori')?>" class="nav-link <?php if($this->uri->segment(1)=='kategori' ){echo "active";} ?>">
                <i class="nav-icon fas fa-clipboard-list"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?= base_url('laporan')?>" class="nav-link <?php if($this->uri->segment(1)=='laporan' ){echo "active";} ?>">
                <i class="nav-icon fas fa-file"></i>
                  <p>Laporan Penjualan</p>
                </a>
              </li>

            </li>
             
             <!--nav artikel-->
             <li class="nav-item">
             <a href="<?= base_url('berita')?>" class="nav-link <?php if($this->uri->segment(1)=='berita' ){echo "active";} ?>">
             <i class=" nav-icon far fa-newspaper"></i>
                  <p> Artikel</p>
                  </a>
            </li>
            <!--nav konfigurasi-->
            <li class="nav-item">
            <a href="<?= base_url('konfigurasi')?>" class="nav-link <?php if($this->uri->segment(1)=='konfigurasi' ){echo "active";} ?>">
                <i class="nav-icon fas fa-cog"></i>
                  <p>Konfigurasi Web</p>
                </a>
            </li>
              

               <!-- end nav konfigurasi-->
              
              <li class="nav-item">
                <a href="<?= base_url('ubahpwd')?>" class="nav-link <?php if($this->uri->segment(1)=='ubahpwd' ){echo "active";} ?>">
                <i class="nav-icon fas fa-unlock-alt"></i>
                  <p>Ubah Password</p>
                </a>
              </li>
            
          <li class="nav-item">
          <a data-toggle='modal' data-target='#logout' class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i> <p> Logout</p> </a>
            <!-- <a href="<?= base_url('auth/logout_user')?>" class="nav-link">
              <i class="nav-icon fas fa-sign"></i>
              <p> Logout</p>
            </a>-->
          </li>
       
      </nav>
      <!-- /.sidebar-menu -->
    </div>  
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $title?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 <!-- Main content -->
 <div class="content">
      <div class="container-fluid">
        <div class="row">

        <!-- Modal -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5>Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin Keluar?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <a href="<?= base_url('auth/logout_user')?>" class="btn btn-success"> Iya </a>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->