<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/defaultTheme.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/skins/_all-skins.min.css">
    <script src="<?php echo base_url();?>js/jquery.js"></script>
    <script src="<?php echo base_url();?>js/jquery.fixedheadertable.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/library.js"></script>
    <script src="<?php echo base_url();?>js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap-typeahead/bootstrap-typeahead.js" type="text/javascript"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
  <!-- the fixed layout is not compatible with sidebar-mini -->
  <body class="hold-transition sidebar-mini skin-blue fixed">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>GoodJob</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Administrasi</b></span>
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
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              
            </div>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <!--<li class="user user-menu"><?php echo $this->session->userdata('nama_user');?></li>-->
              <li class="user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <?php
                  if ($this->session->userdata("foto")==""){
                    echo img(array("src"=>"assets/dist/img/avatar5.png","class"=>"user-image"));
                   } else {
                     echo img(array("src"=>"img/foto/user/".$this->session->userdata("foto"),"class"=>"user-image"));
                   }
                  ?>
                  <span class="hidden-xs"><?php echo $this->session->userdata('nama_user');?></span>
                </a>
              </li>
              <li class="user user-menu">
                <?php echo anchor("login/logout/","<i class='fa fa-sign-out'></i> Logout"); ?>
              </li>
              
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
              <!-- <img src="<?php echo base_url();?>img/avatar5.png" class="img-circle" alt="User Image"> -->
              <?php
              if ($this->session->userdata("foto")==""){
                echo img(array("src"=>"assets/dist/img/avatar5.png","class"=>"img-circle"));
               } else {
                 echo img(array("src"=>"img/foto/user/".$this->session->userdata("foto"),"class"=>"img-circle"));
               }
              ?>
            </div>
            <div class="pull-left info">
              <p><a href="<?php echo site_url('profil');?>"><?php echo $this->session->userdata('nama_user');?></a></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
        <li class="treeview <?php echo ($menu=="home" ? "active" : "");?>">
          <a href="<?php echo site_url('home');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview <?php echo ($menu=="mahasiswa" ? "active" : "");?>">
          <a href="<?php echo site_url('mahasiswa');?>">
            <i class="fa fa-graduation-cap"></i> <span>Mahasiswa</span>
          </a>
        </li>
        <li class="treeview <?php echo ($menu=="matakuliah" ? "active" : "");?>">
          <a href="<?php echo site_url('matakuliah');?>">
            <i class="fa fa-book"></i> <span>Matakuliah</span>
          </a>
        </li>
        <li class="treeview <?php echo ($menu=="nilai" ? "active" : "");?>">
          <a href="<?php echo site_url('nilai');?>">
            <i class="fa fa-calendar-check-o"></i> <span>Nilai</span>
          </a>
        </li>
        <li class="treeview <?php echo ($menu=="laporan" ? "active" : "");?>">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('laporan/laporanmahasiswa');?>"><i class="fa fa-circle-o"></i> Laporan Mahasiswa</a></li>
            <li><a href="<?php echo site_url('laporan');?>"><i class="fa fa-circle-o"></i> Laporan Nilai</a></li>
          </ul>
        </li>
        
            
            
            <!--<li class="treeview <?php echo ($menu=="warga" ? "active" : "");?>">
            <a href="<?php echo site_url('warga');?>">
              <i class="fa fa-users"></i>
              <span>Warga</span>
            </a>
            </li>
            <li class="treeview <?php echo ($menu=="transaksi" ? "active" : "");?>">
              <a href="<?php echo site_url('transaksi');?>">
                <i class="fa fa-exchange"></i>
                <span>Transaksi Perumahan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo site_url('transaksi');?>"><i class="fa fa-angle-double-right"></i> Setting Kewajiban</a>
                  <a href="<?php echo site_url('transaksi/pilih');?>"><i class="fa fa-angle-double-right"></i> Transaksi Kewajiban</a>
                  <a href="<?php echo site_url('transaksi/listbayar');?>"><i class="fa fa-angle-double-right"></i> List Detail</a>
                </li>
              </ul>
            </li> -->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <?php echo $judul; ?>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $breadcrumb; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <?php $this->load->view($content); ?>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
        <strong>Copyright &copy; 2018 UMC</strong> Teknik Informatika
      </footer>


      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
   
    <!-- FastClick -->
    <script src="<?php echo base_url();?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>js/demo.js"></script>
  </body>
</html>
