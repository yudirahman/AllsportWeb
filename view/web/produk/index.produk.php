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
				<div class="product-item-list">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="product-item-heading">
								<div class="item-heading-title">
									<h2>All Produk</h2>
								</div>
								<div class="result-short-view">
									<div class="result-short">
										<p><?php echo $pageinfo ?></p>
										<!-- <div class="result-short-selection">
											<select>
												<option>Default sorting</option>
												<option>Sort by popularity</option>
												<option>Sort by average rating</option>
												<option>Sort by newness</option>
												<option>Sort by price: low to high</option>
												<option>Sort by price: high to low</option> 
											</select>
											<i class="fa fa-sort-alpha-asc"></i>
										</div> -->
									</div>
									<div class="view-mode">
										<a href="javascript:void(0)" class=""><i class="fa fa-th-large"></i></a>
										<!-- <a href="single-shop.html"><i class="fa fa-th-list"></i></a> -->
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
							<?php foreach ($results as $row): ?>
							<div class="col-md-4 col-sm-6">
							<div class="single-item-area">
								<div class="single-item" style="border-bottom: 1px solid #e1e1e1">
									<div class="product-item-img">
										<a href="<?php echo SITEURL.'produk/detail/'.$row['id_produk'] ?>">
											<img class="primary-img" src="<?php echo FILES.'image/produk/'.$row['image'] ?>" alt="<?php echo $row['nama_produk'] ?>" />
										</a>
										<div class="product-item-action">
											<a href="<?php echo SITEURL.'produk/detail/'.$row['id_produk'] ?>"><i class="fa fa-external-link"></i></a>
											<!-- <a href="javascript:void(0)" onclick="addTocart(<?php echo $row['id_produk'] ?>)"><i class="fa fa-shopping-cart"></i></a> -->
										</div>
									</div>
									<div class="single-item-content">
										<h2><a href="<?php echo SITEURL.'produk/detail/'.$row['id_produk'] ?>"><?php echo $row['nama_produk'] ?></a></h2>
										<?php if ($row['diskon'] > 0) { ?>
											<h3><?php echo "<span  style=\"text-decoration:line-through;\"> Rp. ".number_format($row['harga_produk'],2)."</span> <span style=\"color:orange;float:right\" class=\"blink_me\"> Diskon ".$row['diskon']. "%</span>" ?> </h3>
											<h3><?php echo "Rp. ".number_format($row['harga_diskon'],2) ?></h3>
										<?php } else { ?>
											<h3><?php echo "Rp. ".number_format($row['harga_produk'],2) ?></h3>
										<?php }
										 ?>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
				<div class="shop-pagination floatright">
					<ul class="pagination">
						<li><?php echo $pages ?></li>
					</ul>
				</div>
				<!-- ========= end sepatu bola ======== -->
				<div class="arrivals-area single-add">
					<a href="<?php echo SITEURL.'produk/kategori/18' ?>"> <img src="<?php echo ASSETS ?>frontend/img/banner/arrivals.jpg" alt="arrivals"> </a>
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