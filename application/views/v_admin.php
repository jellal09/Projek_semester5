<div class="col-lg-12">
<div class="row">
<div class="col-lg-3 col-6">
<!-- small box -->
<div class="small-box bg-info">
    <div class="inner">
    <h3><?= $pesanan ?></h3>

    <p>Pesanan Saya</p>
    </div>
    <div class="icon">
    <i class="nav-icon fas fa-shopping-bag"></i>
    </div>
    <a href="<?= base_url('admin/pesanan_masuk')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
<div class="col-lg-3 col-6">
<!-- small box -->
<div class="small-box bg-success">
    <div class="inner">
    <h3><?= $total_barang ?></h3>

    <p>Produk</p>
    </div>
    <div class="icon">
    <i class=" fas fa-clipboard-list"></i>
    </div>
    <a href="<?= base_url('produk') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
<div class="col-lg-3 col-6">
<!-- small box -->
<div class="small-box bg-warning">
    <div class="inner">
    <h3><?= $total_kategori ?></h3>

    <p>Kategori</p>
    </div>
    <div class="icon">
    <i class=" fas fa-clipboard-list"></i>
    </div>
    <a href="<?= base_url('kategori') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
<div class="col-lg-3 col-6">
<!-- small box -->
<div class="small-box bg-purple">
    <div class="inner">
    <h3><?= $total_artikel ?></h3>

    <p>Artikel</p>
    </div>
    <div class="icon">
    <i class=" nav-icon far fa-newspaper"></i>
    </div>
    <a href="<?= base_url('berita')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
<div class="col-lg-3 col-6">
<!-- small box -->
<div class="small-box bg-danger">
    <div class="inner">
    <h3><?= $total_member ?></h3>

    <p>Member</p>
    </div>
    <div class="icon">
    <i class="fas fa-users"></i>
    </div>
    <a href="#" class="small-box-footer">Private info</a>
</div>
</div>
</div>
<!-- /.col-md-6 -->
<!-- /.col-md-6 -->
</div>
<!-- /.row -->

<!-- /.content -->
