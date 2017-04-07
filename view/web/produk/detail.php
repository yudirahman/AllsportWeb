<?php cutter_start('content') ?>
<!-- produk area -->
<div class="product-area">
	<div class="breadcurb-area">
			<div class="container">
				<ul class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li>Produk</li>
				</ul>
			</div>
		</div>
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-4">
				<div class="product-item-categori">
							<div class="product-type">
								<h2>Kategori Produk</h2>
								<ul>
									<li><a href="<?php echo SITEURL.'produk' ?>" class="active"><i class="fa fa-angle-right"></i>All Produk</a></li>	
									<li><a href="<?php echo SITEURL.'produk/kategori/diskon' ?>" class=""><i class="fa fa-angle-right"></i>Produk Diskon</a></li>	
									<?php foreach ($masterkategori as $row): ?>
									<?php //$katproduk = strtolower($row['nama_kategori']) ; $final = preg_replace('#[ -]+#', '_', $katproduk); ?>
									<li><a href="<?php echo SITEURL. 'produk/kategori/'.$row['id_kategori_produk'] ?>"><i class="fa fa-angle-right"></i><?php echo ucwords($row['nama_kategori'])  ?></a></li>	
									<?php endforeach ?>
								</ul>
							</div>
						</div>
			</div>
			<!-- =============== -->
			<div class="col-md-9 col-sm-8">
						<div class="row">
							<?php foreach ($masterprodukbyid as $row): ?>
							<div class="col-md-5 col-sm-5">
								<div class="product-item-tab">
									<!-- Tab panes -->
									<div class="single-tab-content">
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane active" id="img-one"><img src="<?php echo FILES. 'image/produk/'.$row['image'] ?>" alt="tab-img"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-7 col-sm-7">
								<div class="product-tab-content">
									<div class="product-tab-header">
										<h1><?php echo $row['nama_produk'] ?></h1>
										<?php if ($row['diskon'] > 0) { ?>
											<h3><?php echo "<span  style=\"text-decoration:line-through;\"> Rp. ".number_format($row['harga_produk'],2)."</span> <span style=\"color:orange;\" class=\"blink_me\"> Diskon ".$row['diskon']. "%</span>" ?> </h3>
											<h3><?php echo "Rp. ".number_format($row['harga_diskon'],2) ?></h3>
										<?php } else { ?>
											<h3><?php echo "Rp. ".number_format($row['harga_produk'],2) ?></h3>
										<?php }
										 ?>
									</div>
									<div class="product-item-code">
										<p>Kode Produk  :   <?php echo $row['kd_produk'] ?></p>
										<p>Stok <?php echo ($row['stok'] > 0 ) ? 'Ready' : 'Habis' ?></p>
									</div>
									<div class="product-item-details">
										<p>Keterangan : </p>
										<?php echo $row['keterangan'] ?>
									</div>
									<div class="">
										<br>
										<button <?php echo ($row['stok'] > 0 ) ? '' : 'disabled' ?> type="submit" class="btn btn-warning" onclick="addTocart(<?php echo $row['id_produk'] ?>)"><i class="fa fa-shopping-cart"></i> Tambah Ke Cart</button>										
									</div>									
								</div>
							</div>
							<?php endforeach ?>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="single-product-slider similar-product">
									<div class="product-items">
										<h2 class="product-header">Produk Lainnya</h2>
										<div class="row">
											<div id="singleproduct-slider" class="owl-carousel">
												<?php foreach ($serupa as $row): ?>
													<div class="col-md-4">
													<div class="single-product">
														<div class="single-product-img">
															<a href="<?php echo SITEURL.'produk/detail/'.$row['id_produk'] ?>">
																<img class="primary-img" src="<?php echo FILES.'image/produk/'.$row['image'] ?>" alt="product">
															</a>
															<div class="single-product-action">
																<a href="<?php echo SITEURL.'produk/detail/'.$row['id_produk'] ?>"><i class="fa fa-external-link"></i></a>
																<!-- <a href="#"><i class="fa fa-shopping-cart"></i></a> -->
															</div>
														</div>
														<div class="single-product-content">
															<div class="product-content-left">
																<h2><a href="<?php echo SITEURL.'produk/detail/'.$row['id_produk'] ?>"><?php echo $row['nama_produk'] ?></a></h2>
																<p>Stok <?php echo ($row['stok'] > 0 ) ? 'Ready' : 'Habis' ?></p>
															</div>
															<div class="product-content-right">
																<h3><?php echo "Rp. ".number_format($row['harga_produk'],2) ?></h3>
															</div>
														</div>
													</div>
												</div>
												<?php endforeach ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
	</div>
</div>


<?php cutter_end() ?>

<?php cutter_start('css') ?>
	<style>
		.product-item-img img {
   			 width: 100%;
   			 max-height: 245px !important;
		}
		.single-item-content {
		    padding: 20px 15px 0;
		    min-height: 100px;
		}
		
	</style>
<?php cutter_end() ?>

<?php cutter_start('js') ?>
<?php cutter_end() ?>
