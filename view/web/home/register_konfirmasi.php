<?php cutter_start('content') ?>
<div class="login-area">
<div class="container">
    	<div class="row">
				<div class="col-md-9 col-sm-9">
					<div class="product-items-area">
						<h2 class="header-title">Konfirmasi Register</h2>
						<div class="col-md-12">
							<p style="color:orange"><?php echo $_SESSION['session_message'] ?></p> 
							
						</div>
					</div>
				</div> 
				<div class="col-md-3 col-sm-3">
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
		</div>
	</div>
</div>
<?php cutter_end() ?>

<?php cutter_start('js') ?>
	
<?php cutter_end() ?>