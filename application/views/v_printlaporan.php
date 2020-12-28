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
                  
                  <th>Metode Pembayaran</th>
                  <th>Expedisi</th>
                  <th>Ongkir</th>
                  <th>Total Bayar</th>
                  
                  
                  
                </tr>

                <?php $no = 1;                                              
                                        foreach ($detail_transaksi as $key=> $value)
                                        
                                        {?>
                    <tr>
                      <td style='width: 10px;'><?= $no++; ?></td>
                      <td style='width: 80px;'><?= date('d-m-Y', strtotime($value->tgl_transaksi)) ?></td>
                      <td><?= $value->nama_pelanggan ?></td>
                     
                      <td><?= $value->name?> (<?= $value->qty?> X Rp.<?= number_format($value->price,0)?>) </td>
                     
                      <td  style='width: 90px;'><?= $value->nama_bank?> - <?= $value->no_rek?>. An: <?= $value->atas_nama?></td>
                      <td><?= $value->expedisi?> - <?= $value->paket?>. No Resi: <?= $value->no_resi?>
                      <td>Rp.<?= $value->ongkir?></td>
                      <td  style='width: 90px;'>Rp.<?= number_format($value->total_bayar,0)?></td>
                      
                    </tr>
                    <?php } ?>
                    
  </table>
  
</body></html>