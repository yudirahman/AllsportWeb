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
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS ?>backend/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo ASSETS ?>backend/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo ASSETS ?>backend/dist/css/skins/_all-skins.min.css">
    <?php cutter('css') ?>
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
                  <img src="<?php echo FILES. 'image/users/thumb/'.$avatar ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $username ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo FILES. 'image/users/thumb/'.$avatar ?>" class="img-circle" alt="User Image">
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo SITEURL.URL_ADMIN.'/home/logout'?>" class="btn btn-default btn-flat">Sign out</a>
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
              <img src="<?php echo FILES. 'image/users/thumb/'.$avatar ?>" class="img-circle" alt="User Image" style="max-height:50px !important; max-width:50px !important">
            </div>
            <div class="pull-left info">
              <p><?php echo $username ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview <?php echo (!isset($_GET['act'])) ? 'active' :''; ?>">
              <a href="<?php echo SITEURL.URL_ADMIN.'/home' ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            </li>
            <li class="treeview <?php echo (isset($_GET['act'])) ? (in_array($_GET['act'], array('kategori','brand','allproduk'), true)) ? 'active' :'' : ''; ?> ">
              <a href="#" title="">
                <i class="fa fa-th"></i> <span>Master Produk</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="treeview <?php echo (isset($_GET['act'])) ? ($_GET['act']=='kategori') ? 'active' :'' : ''; ?>">
                  <a href="<?php echo SITEURL.URL_ADMIN.'/produk/kategori' ?>">
                    <i class="fa fa-files-o"></i> <span>Kategori Produk</span> 
                  </a>
                </li>
                <li class="treeview <?php echo (isset($_GET['act'])) ? ($_GET['act']=='brand') ? 'active' :'' : ''; ?>">
                  <a href="<?php echo SITEURL.URL_ADMIN.'/produk/brand' ?>">
                    <i class="fa fa-files-o"></i> <span>Brand Produk</span> 
                  </a>
                </li>
                <li class="treeview <?php echo (isset($_GET['act'])) ? ($_GET['act']=='allproduk') ? 'active' :'' : ''; ?>">
                  <a href="<?php echo SITEURL.URL_ADMIN.'/produk/allproduk' ?>">
                    <i class="fa fa-futbol-o"></i> <span>Produk</span> 
                  </a>
                </li>
              </ul>
            </li>
            <li class="treeview <?php echo (isset($_GET['act'])) ? ($_GET['act']=='datapemesanan') ? 'active' :'' : ''; ?>">
              <a href="<?php echo SITEURL.URL_ADMIN.'/pemesanan/datapemesanan' ?>">
                <i class="fa fa-shopping-cart"></i> <span>Order</span> 
              </a>
            </li>
            <!-- <li class="treeview <?php echo (isset($_GET['act'])) ? ($_GET['act']=='datapelanggan') ? 'active' :'' : ''; ?>">
              <a href="<?php echo SITEURL.URL_ADMIN.'/pelanggan/datapelanggan' ?>">
                <i class="fa fa-users"></i> <span>Pelanggan</span> 
              </a>
            </li> -->
            <li class="treeview <?php echo (isset($_GET['act'])) ? ($_GET['act']=='datalaporan') ? 'active' :'' : ''; ?>">
              <a href="<?php echo SITEURL.URL_ADMIN.'/laporan/datalaporan' ?>">
                <i class="fa fa-print"></i> <span>Laporan Penjualan</span> 
              </a>
            </li>
            <li class="treeview <?php echo (isset($_GET['act'])) ? ($_GET['act']=='datapengiriman') ? 'active' :'' : ''; ?>">
              <a href="<?php echo SITEURL.URL_ADMIN.'/pengiriman/datapengiriman' ?>">
                <i class="fa fa-truck"></i> <span>Pengiriman</span> 
              </a>
            </li>
            <li class="header">CONFIG</li>
            <li class="threeview <?php echo (isset($_GET['act'])) ? ($_GET['act']=='alluser') ? 'active' :'' : ''; ?>">
              <a href="<?php echo SITEURL.URL_ADMIN.'/user/alluser' ?>">
                <i class="fa fa-user"></i> <span>User</span>
              </a>
            </li>
            <li class="threeview <?php echo (isset($_GET['act'])) ? ($_GET['act']=='dataprofil') ? 'active' :'' : ''; ?>">
              <a href="<?php echo SITEURL.URL_ADMIN.'/profil/dataprofil' ?>">
                <i class="fa fa-file-text-o"></i> <span>Profil</span>
              </a>
            </li>
            <li class="threeview <?php echo (isset($_GET['act'])) ? ($_GET['act']=='infokebijakan') ? 'active' :'' : ''; ?>">
              <a href="<?php echo SITEURL.URL_ADMIN.'/profil/infokebijakan' ?>">
                <i class="fa fa-paperclip"></i> <span>Informasi Bantaun</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <?php cutter('content') ?>

            <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong><?php echo $namatoko.' '.$tahuntoko ?> All rights reserved.
      </footer>

      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo ASSETS ?>backend/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo ASSETS ?>backend/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo ASSETS ?>backend/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo ASSETS ?>backend/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo ASSETS ?>backend/dist/js/app.min.js"></script>
    <!-- CK Editor -->
    <script src="<?php echo ASSETS ?>backend/plugins/ckeditor/ckeditor.js"></script>
    <!-- Datatable -->
    <script src="<?php echo ASSETS ?>backend/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo ASSETS ?>backend/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo ASSETS ?>backend/plugins/autonumeric.js"></script>
    <script src="<?php echo ASSETS ?>backend/bootstrap/js/bootstrap-filestyle.min.js"></script>
    <?php cutter('js') ?>
    <script>
      $(document).ready(function(){
        /*Activate data table*/
        $('#datatable').DataTable();

        /* Activate CKEDITOR*/
        var editor_config1 = {
                // toolbar: [
                //     {name: 'basicstyles', items: ['Bold', 'Italic']},
                //     {name: 'paragraph', items: ['BulletedList']}
                // ],
                // width: "210px",
                height: "240px"
            };
        window.editor_config2 = {
                toolbar: [
                    {name: 'basicstyles', items: ['Bold', 'Italic']},
                    {name: 'paragraph', items: ['BulletedList']}
                ],
                height: "100px"
        }

        /*Kebijakan dan Profil*/
        CKEDITOR.replace('profil',editor_config1);
        
      });

      /*Unset Session Errmsg*/
        $('#unset_errmsg').on('click',function(){
          $.get("<?php echo SITEURL.URL_ADMIN.'/home/killErrmsg' ?>");
        });
          
        function toRp(angka){
            var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
            var rev2    = '';
            for(var i = 0; i < rev.length; i++){
                rev2  += rev[i];
                if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
                    rev2 += '.';
                }
            }
            return 'Rp. ' + rev2.split('').reverse().join('') + ',00';
        }
        /*END BIAYA PENGIRIMAN*/

    </script> 

  </body>
</html>
