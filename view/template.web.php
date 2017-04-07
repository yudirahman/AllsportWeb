<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="id">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $title_page ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon
		============================================ -->
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.jpg">
		
		<!-- Fonts
		============================================ -->
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,700,600,500,300,800,900' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,300,300italic,500italic,700' rel='stylesheet' type='text/css'>

 		<!-- CSS  -->
		
		<!-- Bootstrap CSS
		============================================ -->      
        <link rel="stylesheet" href="<?php echo ASSETS ?>frontend/css/bootstrap.min.css">
        
		<!-- font-awesome.min CSS
		============================================ -->      
        <link rel="stylesheet" href="<?php echo ASSETS ?>frontend/css/font-awesome.min.css">
		
		<!-- Mean Menu CSS
		============================================ -->      
        <link rel="stylesheet" href="<?php echo ASSETS ?>frontend/css/meanmenu.min.css">
        
		<!-- owl.carousel CSS
		============================================ -->      
        <link rel="stylesheet" href="<?php echo ASSETS ?>frontend/css/owl.carousel.css">
        
		<!-- owl.theme CSS
		============================================ -->      
        <link rel="stylesheet" href="<?php echo ASSETS ?>frontend/css/owl.theme.css">
  	
		<!-- owl.transitions CSS
		============================================ -->      
        <link rel="stylesheet" href="<?php echo ASSETS ?>frontend/css/owl.transitions.css">
		
		<!-- Price Filter CSS
		============================================ --> 
        <link rel="stylesheet" href="<?php echo ASSETS ?>frontend/css/jquery-ui.min.css">	

		<!-- nivo-slider css
		============================================ --> 
		<link rel="stylesheet" href="<?php echo ASSETS ?>frontend/css/nivo-slider.css">
        
 		<!-- animate CSS
		============================================ -->         
        <link rel="stylesheet" href="<?php echo ASSETS ?>frontend/css/animate.css">
		
		<!-- jquery-ui-slider CSS
		============================================ --> 
		<link rel="stylesheet" href="<?php echo ASSETS ?>frontend/css/jquery-ui-slider.css">
        
 		<!-- normalize CSS
		============================================ -->        
        <link rel="stylesheet" href="<?php echo ASSETS ?>frontend/css/normalize.css">
   
        <!-- main CSS
		============================================ -->          
        <link rel="stylesheet" href="<?php echo ASSETS ?>frontend/css/main.css">
        
        <!-- style CSS
		============================================ -->          
        <link rel="stylesheet" href="<?php echo ASSETS ?>frontend/style.css">
        <link rel="stylesheet" href="<?php echo ASSETS ?>frontend/mystyle.css">
        
        <!-- responsive CSS
		============================================ -->          
        <link rel="stylesheet" href="<?php echo ASSETS ?>frontend/css/responsive.css">
        
        <script src="<?php echo ASSETS ?>frontend/js/vendor/modernizr-2.8.3.min.js"></script>
        <?php cutter('css') ?>
    </head>
    <body class="home-2">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
               
        <!-- HEADER AREA -->
        <div class="header-area">
			<div class="header-top-bar">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="header-top-left">
								<div class="header-top-menu">
								</div>
								<p>Selamat Datang <?php echo (empty($session)) ? 'Pengunjung' : $_SESSION['namapelanggan'] ?> </p>
							</div>
						</div>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<div class="header-top-right">
								<ul class="list-inline">
									<?php if ($session): ?>
									<li><a href="<?php echo SITEURL.'home/pelanggan'?>"><i class="fa fa-user"></i>Akun Ku</a></li>
<!-- 									<li><a href="<?php //echo SITEURL.'home/pelangganck'?>"><i class="fa fa-cart-arrow-down"></i>Checkout</a></li>	
 -->										
 									<li><a href="<?php echo SITEURL.'home/konfirmasick'?>"><i class="fa fa-check-square-o"></i>Konfirmasi Pembayaran</a></li>	
 									<li><a href="<?php echo SITEURL.'home/histori'?>"><i class="fa fa-history"></i>Riwayat Order </a></li>
									<li><a href="javascript:void(0)" onclick="logout()"><i class="fa fa-unlock"></i>Logout</a></li>
									<?php elseif(!$session) :?>
									<li><a href="<?php echo SITEURL.'home/login'?>"><i class="fa fa-lock"></i>Login / Register</a></li>
									<?php endif ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-bottom">
				<div class="container">
					<div class="row">
						<div class="col-md-2 col-sm-2 col-xs-12">
							<div class="header-logo">
								<a href="<?php echo SITEURL.'home' ?>"><img src="<?php echo ASSETS ?>frontend/img/logo4.png" alt="logo"></a>
							</div>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="search-chart-list">
								<div class="catagori-menu">
									<ul class="list-inline">
										<li><i class="fa fa-search"></i></li>
										<li>
											<form method="POST" action="<?php echo SITEURL.'produk/cari' ?>" id="fm_cari">
												<select name="k" required>
														<option value="">Pilih Kategori</option>
														<?php foreach ($masterkategori as $row): ?>
															<option value="<?php echo $row['id_kategori_produk'] ?>" ><?php echo ucwords($row['nama_kategori']) ?></option>
														<?php endforeach ?>
												</select>
											<!-- </form> -->
										</li>
									</ul>
								</div>
								<div class="header-search">
									<!-- <form action=""> -->
										<input type="text" name="q" placeholder="Pencarian"/>
										<button type="submit" form='fm_cari' id="cariProduks"><i class="fa fa-search"></i></button>
									</form>
								</div>
								<div class="header-chart">
									<ul class="list-inline">
										<li><a href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
										<li class="chart-li"><a href="#">My cart</a>
											
											<ul>
                                                <li>
                                                    <div class="header-chart-dropdown">
                                               	<?php
												if(!empty($items)){
													$total = 0;
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
														<div class="header-chart-dropdown-list">
                                                            <div class="dropdown-chart-left floatleft">
                                                                <a href="javascript:void(0)"><img src='.FILES."image/produk/thumb/".$product['image'].' alt="list"></a>
                                                            </div>
                                                            <div class="dropdown-chart-right">
                                                                <h2><a href="javascript:void(0)">'.$product['nama_produk'].'</a></h2>
                                                                <h3>Qty '.$qty.'</h3>
                                                                <h4>Rp. '.number_format($harganya,2).'</h4>
                                                            </div>
                                                        </div>';
														
														$total += $product['harga_produk'] * $qty;
													}
													echo '
													<div class="chart-checkout">
															<p>subtotal<span>Rp. '.number_format($total,2).'</span></p>
															<button type="button" class="btn btn-default" onclick="location.href=\''.SITEURL.'addcart/checkout\'" >Checkout</button>
														</div></div> ';
												}
												else{
													echo 'Cart Kosong';
												}
											?>
                                                        
                                                    
                                                </li> 
                                            </ul> 
										</li>
										<li><a href="javascript:void(0)"><span id="jumlahItem"><?php echo count($items) ?> Items</span></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
        <!-- MAIN MENU AREA -->
		<div class="main-menu-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="main-menu hidden-xs">
							<nav>
								<ul>
									<li><a href="<?php echo SITEURL.'home' ?>">Home</a></li>
									<li><a href="<?php echo SITEURL.'produk' ?>">Produk</a></li>
									<li><a href="<?php echo SITEURL.'profil' ?>">Profil</a></li>
									<li><a href="<?php echo SITEURL.'profil/kebijakan' ?>">Bantuan</a></li>
									<li><a href="<?php echo SITEURL.'hubungi' ?>">Hubungi Kami</a></li>
								</ul>
							</nav>
						</div>
						<!-- Mobile MENU AREA -->
						<div class="mobile-menu hidden-sm hidden-md hidden-lg">
							<nav>
								<ul>
									<li><a href="<?php echo SITEURL.'home' ?>">Home</a></li>
									<li><a href="<?php echo SITEURL.'profil' ?>">Profil</a></li>
									<li><a href="<?php echo SITEURL.'profil/kebijakan' ?>">Bantuan</a></li>
									<li><a href="<?php echo SITEURL.'hubungi' ?>">Hubungi Kami</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php cutter('content') ?>
		<!-- Footer AREA -->
		<div class="footer-area">
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="copyright">
								Sistem Informasi Pemesanan Pakaian Olahraga
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="footer-social-icon">
								
								<ul class="list-inline">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<!-- <li><a href="#"><i class="fa fa-linkedin"></i></a></li> -->
									<!-- <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li> -->
<!-- 									<li><a href="#"><i class="fa fa-vimeo"></i></a></li>
 -->								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!-- JS -->
        <!-- Modal -->
		<div id="ModalLogout" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Konfirmasi</h4>
		      </div>
		      <div class="modal-body">
		        <p>Apa anda yakin akan logout ?</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="getOut()">Ok</button>
		        <button type="button" class="btn btn-warning" data-dismiss="modal" >Tidak</button>
		      </div>
		    </div>

		  </div>
		</div>

		<div id="addingToCart" class="modal fade" role="dialog">
		  <button type="hidden" class="close" id="tutupAddingModal" data-dismiss="modal">&times;</button>
		  <div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-body">
		        <p><i class="fa fa-spinner fa-spin"></i> Mohon menunggu.. menambahkan produk ke keranjang belanja ...</p>
		      </div>
		    </div>
		  </div>
		</div>
		<div id="addedToCart" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		    	<div class="modal-header">
		        <button type="button" class="close" onclick="reload()" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Konfirmasi</h4>
		      </div>
		      <div class="modal-body">
		        <p><i class="fa fa-check text-success"></i> Produk berhasil di tambah ke cart. </p>
		      </div>
		    </div>
		  </div>
		</div>
		<div id="addedToCartGagal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		    	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Konfirmasi</h4>
		      </div>
		      <div class="modal-body">
		        <p><i class="fa fa-close text-danger"></i> Produk Gagal di tambah ke cart, coba lagi. </p>
		      </div>
		    </div>
		  </div>
		</div>
 		<!-- jQuery 2.1.4 -->
    <script src="<?php echo ASSETS ?>backend/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        
 		<!-- bootstrap js
		============================================ -->         
        <script src="<?php echo ASSETS ?>frontend/js/bootstrap.min.js"></script>
		
		<!-- nivo slider js
		============================================ --> 
		<script src="<?php echo ASSETS ?>frontend/js/jquery.nivo.slider.pack.js"></script>
        
 		<!-- Mean Menu js
		============================================ -->         
        <script src="<?php echo ASSETS ?>frontend/js/jquery.meanmenu.min.js"></script>
        
   		<!-- owl.carousel.min js
		============================================ -->       
        <script src="<?php echo ASSETS ?>frontend/js/owl.carousel.min.js"></script>
		
		<!-- jquery price slider js
		============================================ --> 		
		<script src="<?php echo ASSETS ?>frontend/js/jquery-price-slider.js"></script>
		
		<!-- wow.js
		============================================ -->
        <script src="<?php echo ASSETS ?>frontend/js/wow.js"></script>		
		<script>
			new WOW().init();
		</script>
        
   		<!-- plugins js
		============================================ -->         
        <script src="<?php echo ASSETS ?>frontend/js/plugins.js"></script>
		
   		<!-- main js
		============================================ -->           
        <script src="<?php echo ASSETS ?>frontend/js/main.js"></script>
        <script type="text/javascript">
        	function logout() {
        		$('#ModalLogout').modal('show')
        	}
        	function getOut(){
        		window.location.href = "<?php echo SITEURL.'home/logout' ?>";
        	}

        	function addTocart(id) {
        		$('#addingToCart').modal({
        			backdrop : 'static',
        			keyboard : false
        		})

        		$.ajax({
        			type : 'post',
        			url : "<?php echo SITEURL.'addcart/add' ?>",
        			data : "item="+id,
        			success: function(res){
        				if (res == 'ok') {
        					$('#tutupAddingModal').click()
        					$('#addedToCart').modal({backdrop : 'static',
        									  keyboard : false
        									})
        					
        				} else{
        					$('#tutupAddingModal').click()
        					$('#addedToCartGagal').modal('show')
        				}
        			}
        		})
        	}
        	
        	function batalCart(id) {
        		$.ajax({
        			type : 'post',
        			url : "<?php echo SITEURL.'addcart/remove' ?>",
        			data : "item="+id,
        			success : function(res) {
        				if (res == 'ok') {
        					reload();
        				}
        			}
        		})
        	}

        	function reload() {
        		window.location.reload();
        	}
        </script>

        <?php cutter('js') ?>

    </body>
</html>