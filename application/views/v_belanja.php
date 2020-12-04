<div class="card card-solid">
	<div class="card-body pb-0">
		<div class="row d-flex align-items-stretch">
			<div class="col-sm-12">

		<?php echo form_open('belanja/update'); ?>
			<table class="table" cellpadding="6" cellspacing="1" style="width:100%">
			<tr>
       			<th width="100px">QTY</th>
       			<th>Nama Produk</th>
       			<th class="text-center" style="text-align:right">Harga</th>
       			<th class="text-center" style="text-align:right">Sub-Total</th>
       			<th class="text-center">Action</th>
			</tr>
			<?php $i = 1; ?>
			<?php foreach ($this->cart->contents() as $items): ?>
				<tr>
				<td>
					<?php echo form_input(array(
						'name' => $i.'[qty]',
						'value' => $items['qty'], 
						'maxlength' => '3', 
						'min' => '0',
						'size' => '5', 
						'type' => 'number',
						'class' => 'form-control'
					)); 
					?>	
				</td>
				<td><?php echo $items['name']; ?></td>
				<td class="text-center" style="text-align:right">Rp. <?php echo number_format($items['price'], 0); ?></td>
				<td class="text-center" style="text-align:right">Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
				<td class="text-center">
				<a href="<?= base_url('belanja/delete/'.$items['rowid']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
				</td>
				</tr>
				<?php $i++; ?>
				<?php endforeach; ?>
				<tr>
					<td colspan="2"> </td>
					<td class="text-right"><strong>Total</strong></td>
					<td class="text-right"><strong>Rp. <?php echo number_format($this->cart->total(),0); ?></strong></td>
				</tr>
			</table>
			<button type="submit" class=" btn btn-primary btn-flat"><i class="fa fa-save"></i> Update Keranjang</button>
			 <a href="<?= base_url('belanja/clear')?>" class=" btn btn-danger btn-flat"><i class="fa fa-recycle"></i> Clear Cart</a>
			 <a href="<?= base_url('belanja/cekout')?>" class=" btn btn-success btn-flat"><i class="fa fa-check-square"></i> Checkout</a>
			<?php echo form_close(); ?>
			<br>
			</div>
		</div>
	</div>
</div>
