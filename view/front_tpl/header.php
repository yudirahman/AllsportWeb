<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="">
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
        
        <!-- responsive CSS
		============================================ -->          
        <link rel="stylesheet" href="<?php echo ASSETS ?>frontend/css/responsive.css">
        
        <script src="<?php echo ASSETS ?>frontend/js/vendor/modernizr-2.8.3.min.js"></script>
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
								<p>Selamat Datang Pengunjung</p>
							</div>
						</div>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<div class="header-top-right">
								<ul class="list-inline">
									<?php if ($session): ?>
									<li><a href="#"><i class="fa fa-user"></i>My Account</a></li>
									<li><a href="#"><i class="fa fa-heart"></i>Wishlist</a></li>
									<li><a href="checkout.html"><i class="fa fa-check-square-o"></i>Checkout</a></li>	
									<?php endif ?>
									<li><a href="<?php echo SITEURL.'?url=home&act=login'?>"><i class="fa fa-lock"></i>Login</a></li>
									<li><a href="#"><i class="fa fa-pencil-square-o"></i>Register</a></li>
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
								<a href="?url=home"><img src="<?php echo ASSETS ?>frontend/img/logo.png" alt="logo"></a>
							</div>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="search-chart-list">
								<div class="catagori-menu">
									<ul class="list-inline">
										<li><i class="fa fa-search"></i></li>
										<li>
											<select>
												<option value="All Categories">All Categories</option>
												<option value="Categorie One">Categorie One</option>
												<option value="Categorie Two">Categorie Two</option>
												<option value="Categorie Three">Categorie Three</option>
												<option value="Categorie Four">Categorie Four</option>
												<option value="Categorie Five">Categorie Five</option>
											</select>
										</li>
									</ul>
								</div>
								<div class="header-search">
									<form action="#">
										<input type="text" placeholder="My Search"/>
										<button type="button"><i class="fa fa-search"></i></button>
									</form>
								</div>
								<div class="header-chart">
									<ul class="list-inline">
										<li><a href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
										<li class="chart-li"><a href="#">My cart</a>
											<ul>
                                                <li>
                                                    <div class="header-chart-dropdown">
                                                        <div class="header-chart-dropdown-list">
                                                            <div class="dropdown-chart-left floatleft">
                                                                <a href="#"><img src="<?php echo ASSETS ?>frontend/img/product/best-product-1.png" alt="list"></a>
                                                            </div>
                                                            <div class="dropdown-chart-right">
                                                                <h2><a href="#">Feugiat justo lacinia</a></h2>
                                                                <h3>Qty: 1</h3>
                                                                <h4>£80.00</h4>
                                                            </div>
                                                        </div>
                                                        <div class="header-chart-dropdown-list">
                                                            <div class="dropdown-chart-left floatleft">
                                                                <a href="#"><img src="<?php echo ASSETS ?>frontend/img/product/best-product-2.png" alt="list"></a>
                                                            </div>
                                                            <div class="dropdown-chart-right">
                                                                <h2><a href="#">Aenean eu tristique</a></h2>
                                                                <h3>Qty: 1</h3>
                                                                <h4>£70.00</h4>
                                                            </div>
                                                        </div>
														<div class="chart-checkout">
															<p>subtotal<span>£150.00</span></p>
															<button type="button" class="btn btn-default">Chckout</button>
														</div>
                                                    </div> 
                                                </li> 
                                            </ul> 
										</li>
										<li><a href="#">2 items</a></li>
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
									<li><a href="index.html">Home</a></li>
									<li><a href="shop.html">Produk</a></li>
									<li><a href="shop.html">Profil</a></li>
									<li><a href="contact.html">Hubungi Kami</a></li>
								</ul>
							</nav>
						</div>
						<!-- Mobile MENU AREA -->
						<div class="mobile-menu hidden-sm hidden-md hidden-lg">
							<nav>
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><a href="shop.html">Produk</a></li>
									<li><a href="shop.html">Profil</a></li>
									<li><a href="contact.html">Hubungi Kami</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
