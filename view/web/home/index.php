<?php cutter_start('content') ?>
<!-- SLIDER AREA -->
<div class="slider-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<!-- Main Slider -->
				<div class="main-slider">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
						  <!-- Indicators -->
						  <ol class="carousel-indicators">
						    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						    <li data-target="#myCarousel" data-slide-to="1"></li>
						    <li data-target="#myCarousel" data-slide-to="2"></li>
						  </ol>

						  <!-- Wrapper for slides -->
						  <div class="carousel-inner" role="listbox">
						    <div class="item active">
						      <img src="<?php echo ASSETS ?>frontend/img/banner/banner3.jpg" alt="Banner Pertama">
						    </div>

						    <div class="item">
						      <img src="<?php echo ASSETS ?>frontend/img/banner/banner2.jpg" alt="Allsport">
						    </div>

						    <div class="item">
						      <img src="<?php echo ASSETS ?>frontend/img/banner/banner4.jpg" alt="Allsport">
						    </div>

						  </div>

						  <!-- Left and right controls -->
						  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- SUPPORT AREA -->
<div class="support-area">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-4 col-xs-12">
				<div class="single-support">
					<div class="sigle-support-icon">
						<p><i class="fa fa-truck"></i></p>
					</div>
					<div class="sigle-support-content">
						<h2>PENGIRIMAN</h2>
						<p>Banyak Pilihan Pengiriman</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-4 col-xs-12">
				<div class="single-support">
					<div class="sigle-support-icon">
						<p><i class="fa fa-soccer-ball-o"></i></p>
					</div>
					<div class="sigle-support-content">
						<h2>PRODUK PILIHAN</h2>
						<p>Banyak Produk Pilihan</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-4col-xs-12">
				<div class="single-support">
					<div class="sigle-support-icon">
						<p><i class="fa fa-clock-o"></i></p>
					</div>
					<div class="sigle-support-content">
						<h2>24/7 SUPPORT</h2>
						<p>Konsultasi Gratis</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 hidden-sm col-xs-12">
				<div class="single-support">
					<div class="sigle-support-icon">
						<p><i class="fa fa-umbrella"></i></p>
					</div>
					<div class="sigle-support-content">
						<h2>BELANJA AMAN</h2>
						<p>Garansi Belanja Aman</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- produk area -->
<div class="product-area">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-4">
			<div class="product-catagori-area">
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
				<div class="add-kids single-add">
					<a href="#"><img src="<?php echo ASSETS ?>frontend/img/banner/kids-ad.jpg" alt="add"></a>
				</div>
				
				<!-- <div class="testmonial-area fix">
					<h2 class="header-title">Testimonial</h2>
					<div id="owl-testmonial" class="owl-carousel">
						<div class="testmonial fix">
							<span><i class="fa fa-quote-left"></i></span>
							<p>Lorem ipsum dolor consetetuer adipiscing elit. Aenean commdo ligula eget dolor. Aenean massa.</p>
							<h3>-MatthE Jensen</h3>
							<img src="<?php echo ASSETS ?>frontend/img/testmonial.jpg" alt="">
						</div>
						<div class="testmonial fix">
							<span><i class="fa fa-quote-left"></i></span>
							<p>Lorem ipsum dolor consetetuer adipiscing elit. Aenean commdo ligula eget dolor. Aenean massa.</p>
							<h3>-MatthE Jensen</h3>
							<img src="<?php echo ASSETS ?>frontend/img/testmonial.jpg" alt="">
						</div>
					</div>
				</div> -->
				<!-- <div class="subscribe-area">
					<h2>Subscribe Letter</h2>
					<form action="#">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Enter your E-mail">
							<button type="button" class="btn"><i class="fa fa-envelope-o"></i></button>
						</div>
					</form>
				</div> -->
				</div>
			</div>
			<!-- =============== -->
			<div class="col-md-9 col-sm-8">
				<div class="product-items-area">
					<div class="product-items">
						<h2 class="product-header">sepatu bola</h2>
						<div class="row">
							<div id="product-slider" class="owl-carousel">
								<?php foreach ($sepatu_bola as $row): ?>
									<div class="col-md-4">
										<div class="single-product">
											<div class="single-product-img">
												<a href="<?php echo SITEURL.'produk/detail/'.$row['id_produk'] ?>">
													<img class="primary-img" src="<?php echo FILES.'image/produk/'.$row['image'] ?>" alt="<?php echo $row['nama_produk'] ?>">
												</a>
												<div class="single-product-action">
													<a href="<?php echo SITEURL.'produk/detail/'.$row['id_produk'] ?>"><i class="fa fa-external-link"></i></a>
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
				<!-- ========= end sepatu bola ======== -->
				<div class="arrivals-area single-add">
					<a href="<?php echo SITEURL.'produk/kategori/18' ?>"> <img src="<?php echo ASSETS ?>frontend/img/banner/arrivals.jpg" alt="arrivals"> </a>
				</div>
				<!-- ================ end banner iklan ======== -->
				<div class="product-items-area">
					<div class="product-items">
						<h2 class="product-header">jersey olahraga</h2>
						<div class="row">
							<div id="product-slider" class="owl-carousel">
								<?php foreach ($jersey as $row): ?>
									<div class="col-md-4">
										<div class="single-product">
											<div class="single-product-img">
												<a href="<?php echo SITEURL.'produk/detail/'.$row['id_produk'] ?>">
													<img class="primary-img" src="<?php echo FILES.'image/produk/'.$row['image'] ?>" alt="<?php echo $row['nama_produk'] ?>">
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
				<!-- ============ jersey olahraga =========== -->
				<div class="product-items-area">
					<div class="product-items">
						<h2 class="product-header">sepatu futsal</h2>
						<div class="row">
							<div id="product-slider" class="owl-carousel">
								<?php foreach ($produk_futsal as $row): ?>
									<div class="col-md-4">
										<div class="single-product">
											<div class="single-product-img">
												<a href="<?php echo SITEURL.'produk/detail/'.$row['id_produk'] ?>">
													<img class="primary-img" src="<?php echo FILES.'image/produk/'.$row['image'] ?>" alt="<?php echo $row['nama_produk'] ?>">
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


<?php cutter_end() ?>

<?php cutter_start('css') ?>
	<style>
	.single-product-content{
		min-height: 130px;
	}
	</style>
<?php cutter_end() ?>

<?php cutter_start('js') ?>
<?php cutter_end() ?>