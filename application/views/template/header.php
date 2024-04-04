<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mekar Jaya</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo base_url()?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/summernote/summernote-bs4.min.css">
    <!-- Data Table css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- datepicker -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/datepicker/css/jquery-ui.css">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/sweetAlert/sweetalert2.min.css">
    <!-- Sweet Alert Animate Css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/sweetAlert/animate.min.css">
    <!--  Select live search -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/select2/css/select2-bootstrap.min.css">
  

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url()?>assets/dist/img/AdminLTELogo.png"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light mt-3">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Sistem Inventory Stok Barang Mekar Jaya</a>
                </li>

            </ul>

            <div class="navbar-nav flex-row order-md-last mr-5 mb-3">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-toggle="dropdown">
                        <span class="avatar avatar-sm bg-dark" style="background-image: url(./static/avatars/000m.jpg); width:30px; "><i class="fa fa-user ml-2 mt-2" ></i></span>
                        <div class="d-noe d-xl-block pl-2">
                            <div><h5><b><?php echo $this->session->userdata('nama_lengkap'); ?></b></h5> </div>
                            <?php if($this->session->userdata('level')=="administrator"){ ?>
                                 
                                <div class="mb-1 small text-muted">Kepala Toko</div>
                            
                            <?php }else{ ?>
                            <div class="mb-1 small text-muted"><?php echo $this->session->userdata('level'); ?></div>
                            <?php } ?>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <!-- <a href="#" class="dropdown-item">Set status</a>
                        <a href="#" class="dropdown-item">Profile & account</a>
                        <a href="#" class="dropdown-item">Feedback</a> -->
                        <div class="dropdown-divider"></div>
                        <!-- <a href="#" class="dropdown-item">Settings</a> -->
                        <a href="<?php echo base_url(); ?>auth/logout" class="dropdown-item">Logout</a>
                    </div>
                </div>

            </div>

            <ul class="navbar-nav ml-auto">

    </div>
    </li>

    </li>
    </ul>

    </ul>
    </nav>