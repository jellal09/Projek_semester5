
<div class="col-sm-12">
    <div class="card ">
    
    <div class="card-body">

    <div class="form-group">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th Widht="20%">Kode Transaksi</th>
                    <th>: <?= $detail_pesanan->no_order ?></th>
                </tr>
                <tr>
                    <th Widht="20%">Nama Pemesan</th>
                    <th>: <?= $detail_pesanan->nama_pelanggan ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tanggal Transaksi</td>
                    <td>: <?= $detail_pesanan->tgl_transaksi ?></td>
                </tr>
                <tr>
                    <td>Total Bayar</td>
                    <td>: <b><?= number_format($detail_pesanan->total_bayar ,0)?></b></td>
                </tr>
            </tbody>
        </table>

<table class="table table-bordered" width="100%">
 <thead>
     <tr class="bg-secondary">
         <th>Nama Produk</th>
         <th>Jumlah</th>
         <th>Harga </th>
     </tr>
 </thead>
 <tbody>
        
        <?php foreach ($detail_transaksi as $key => $value) { ?>
        <tr>
            <td><?= $value->name ?></td>
            <td><?= $value->qty ?></td>
            <td>Rp. <?= number_format($value->price,0) ?></td>   
        </tr>
       <?php } ?> 
       

    </table>

    </div>
    </div>
    </div>
  <?php echo form_close() ?>
</div>
 </div>
 
</div>