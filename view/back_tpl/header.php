<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $namatoko.' | '.$title_page ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo ASSETS ?>backend/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo ASSETS ?>backend/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo ASSETS ?>backend/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
  <!-- the fixed layout is not compatible with sidebar-mini -->
  <body class="hold-transition skin-yellow fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><?php echo substr($namatoko,0,3) ?></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><?php echo $namatoko ?></b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo ASSETS ?>backend/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Operator Toko</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo ASSETS ?>backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      Operator Toko - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="?url=adminmode&act=logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo ASSETS ?>backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Operator Toko</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="?url=adminmode">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            </li>
            <li class="treeview <?php echo (isset($_GET['act'])) ? ($_GET['act']=='kategoriproduk') ? 'active' :'' : ''; ?>">
              <a href="?url=adminmode&act=kategoriproduk">
                <i class="fa fa-files-o"></i> <span>Kategori Produk</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-futbol-o"></i> <span>Produk</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i> <span>Pemesanan</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Pelanggan</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Laporan</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-truck"></i> <span>Biaya Pengiriman</span> 
              </a>
            </li>
            <li class="header">CONFIG</li>
            <li class="threeview <?php echo (isset($_GET['act'])) ? ($_GET['act']=='profil') ? 'active' :'' : ''; ?>">
              <a href="?url=adminmode&act=profil">
                <i class="fa fa-file-text-o"></i> <span>Profil</span>
              </a>
            </li>
            <li class="threeview <?php echo (isset($_GET['act'])) ? ($_GET['act']=='infokebijakan') ? 'active' :'' : ''; ?>">
              <a href="?url=adminmode&act=infokebijakan">
                <i class="fa fa-paperclip"></i> <span>Informasi & Kebijakan</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>