<?php cutter_start('content') ?>
	<div class="breadcurb-area">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="<?php echo SITEURL.'home' ?>">Home</a></li>
				<li><?php echo $title_page; ?></li>
			</ul>
		</div>
	</div>
	<div class="about-header">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="checkout-area">
					<h2 class="header-title">Keranjang Belanja</h2>
					<table class="table table-bordered">
						<thead style="background-color:#ffa726; color:#fff;font-weight:bold">
							<tr>
								<td style="width:5%">No</td>
								<td>Image</td>
								<td>Item</td>
								<td style="width:8%">Qty</td>
								<td>Harga / Item</td>
								<td>#</td>
							</tr>
						</thead>
						<tbody>
							<?php
												if(!empty($items)){
													$total = 0;
													$no=1;
													foreach($items as $id=>$qty) {
														foreach($masterproduk as $product) {
															if($product['id_produk'] == $id)
																break;
														}
														if(!isset($product['nama_produk']))
															continue;
															if ($product['diskon'] > 0) {
																$harganya = $product['harga_diskon'];
															}else{
																$harganya = $product['harga_produk'];
															}
														echo'
														<tr>
															<td>'.$no.'</td>
															<td width="20%"><a href="javascript:void(0)"><img src='.FILES."image/produk/".$product['image'].' alt="list"></a></td>
															<td><a href="javascript:void(0)">'.$product['nama_produk'].'</a></td>
															<td><input type="number" min="1" max="'.$product['stok'].'" name="qty" onchange="updateCart('.$product['id_produk'].',this)" value="'.$qty.'"></td>
															<td>Rp. '.number_format($harganya,2).'</td>
															<td><a href="javascript:void(0)" onclick="batalCart('.$product['id_produk'].')" title="Batalkan" style="color:red"><i class="fa fa-close"></i> Hapus Item</a></td>
														</tr>
															';
														$no++;
														$total += $harganya * $qty;
													}
													echo '
													</tbody>
														<tfoot>
															<tr style="font-weight:bold">
																<td colspan="5">Subtotal</td>
																<td >Rp. '.number_format($total,2).'</td>
															</tr>
														</tfoot>
													';
												}
												else{
													echo '<tr><td colspan="6" class="text-center">Cart Kosong</td></tr>';
												}
											?>
						
					</table>
					<div class="checkout-bottom" style="margin-bottom:20px">
						<div>
							<button class="btn btn-warning pull-left" onclick="location.href='<?php echo SITEURL.'produk' ?>'" >Lanjutkan Belanja</button>
							<?php if (!empty($items)) { ?>
							<button class="btn btn-warning pull-right" onclick="javascript:cekSesi()">Lanjut ke pembayaran</button>
							<?php } ?>
							
						</div>
					</div>
					<div style="clear:both">
						<br>
						<p style="text-decoration: underline"><b>Informasi</b></p>
						* Grand Total pembayaran akan dikalkulasi dengan biaya pengiriman saat anda melanjutkan ke pembayaran.
					</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkout-informasi">
					<div class="best-seller-area">
					<h2 class="header-title">PRODUK DISKON</h2>
					<?php foreach ($masterdiskon as $row): ?>
						<div class="best-sell-product" style="min-height:150px">
						<div class="best-product-img">
							<a href="#"><img src="<?php echo FILES. 'image/produk/thumb/'.$row['image'] ?>" alt="product"></a>
						</div>
						<div class="best-product-content">
							<h2><a href="<?php echo SITEURL.'produk/detail/'.$row['id_produk'] ?>"><?php echo $row['nama_produk'] ?></a></h2>
							<h3><span style="color:orange" class="blink_me"> Diskon <?php echo $row['diskon'] ?> %</span></h3>
							
						</div>
					</div>
					<?php endforeach ?>
					<p class="view-details">
						<a href="<?php echo SITEURL.'produk/kategori/diskon' ?>">Selengkapnya</a>
					</p>
				</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php cutter_end() ?>
<?php cutter_start('js') ?>
	<script>
		$(document).ready(function(){
			$("[type='number']").keypress(function (evt) {
			    evt.preventDefault();
			});
		})
		function updateCart(id,stok) {
			$.ajax({
        			type : 'post',
        			url : "<?php echo SITEURL.'addcart/update' ?>",
        			data : "item="+id+"&qty="+stok.value,
        			success : function(res) {
        				if (res == 'ok') {
        					reload();
        				}
        			}
        		})
		}

		function cekSesi() {
			var session= "<?php echo $session ?>";
			if (session=='') {
				//go to login
				window.location.href="<?php echo SITEURL.'home/login' ?>";
			} else{
				window.location.href="<?php echo SITEURL.'home/pelangganck' ?>";
			}
		}
	</script>
<?php cutter_end() ?>
