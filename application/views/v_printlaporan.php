<html><head>
 
</head><body>
   
<style>    .table {        border-collapse:collapse;        table-layout:fixed; width: 630px;    }    .table th {        padding: 5px;    }    .table td {        word-wrap:break-word;        width: 20%;        padding: 5px; text-align:center;   }  </style>
<tittle> <h4 style="text-align:center; margin-bottom: 5px;">Data Transaksi Toko Istana</h4>
<?php echo $label ?>
</tittle>
</br> 
<table class="table" border="1" width="100%" style="margin-top: 10px;">
  <tr>
                  <th>No</th>
                  <th>Tanggal Transaksi</th>
                  <th>Nama pelanggan</th>
                  
                  <th>Produk</th>
                  <th>Qty</th>
                  <th>Harga</th>
                  <th>Metode Pembayaran</th>
                  <th>Expedisi</th>
                  <th>Ongkir</th>
                  <th>Total Bayar</th>
                  
                  
                  
                </tr>

                <?php $no = 1;
                                      if(empty($detail_transaksi)){ // Jika data tidak ada                        
                                        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";                   
                                       }else{ // Jika jumlah data lebih dari 0 (Berarti jika data ada)                                                
                                        foreach ($detail_transaksi as $key=> $value)
                                        $tgl_transaksi = date('Y-m-d', strtotime($value->tgl_transaksi)); // Ubah format tanggal jadi dd-mm-yyyy
                                        {?>
                    <tr>
                      <td style='width: 10px;'><?= $no++; ?></td>
                      <td style='width: 80px;'><?= $value->tgl_transaksi ?></td>
                      <td><?= $value->nama_pelanggan ?></td>
                     
                      <td><?= $value->name?></td>
                      <td style='width: 10px;'><?= $value->qty?></td>
                      <td>Rp.<?= number_format($value->price,0)?></td>
                      <td  style='width: 100px;'><?= $value->nama_bank?> - <?= $value->no_rek?>. An: <?= $value->atas_nama?></td>
                      <td><?= $value->expedisi?> - <?= $value->paket?>. No Resi: <?= $value->no_resi?>
                      <td>Rp.<?= $value->ongkir?></td>
                      <td>Rp.<?= number_format($value->total_bayar,0)?></td>
                      
                    </tr>
                    <?php } ?>
                    <?php } ?>
  </table>
  
</body></html>