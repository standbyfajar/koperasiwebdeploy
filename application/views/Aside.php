<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/AdminLTE/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/AdminLTE/dist/css/adminlte.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/AdminLTE/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/AdminLTE/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .main-sidebar {
      position: fixed !important;
    }
  </style>
</head>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('Welcome') ?>" class="brand-link">
      <img src="<?php echo base_url('koperasi.jpg')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Koperasi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('user.png')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          <?= $this->session->flashdata('msg_login'); ?>
          
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Welcome') ?>" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home Screen</p>
                </a>
              </li>
          
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <?php if(!empty($this->session->userdata('userlogin')['hak_akses'])): ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('CAdmin') ?>" class="nav-link">
                    <i class="fas fa-users nav-icon"></i>
                    <!-- <i class="fas fa-users"></i> -->
                    <p>Admin Login</p>
                  </a>
                </li>
              <?php endif; ?>

              <?php if(!empty($this->session->userdata('userlogin')['hak_akses'])): ?>
              <li class="nav-item">
                <a href="<?php echo base_url('CNasabah') ?>" class="nav-link">
                  <i class="far fas fa-user nav-icon"></i>
                  <!-- <i class="far fa-circle nav-icon"></i> -->
                  <p> Nasabah</p>
                </a>
              </li>
              <?php endif; ?>

              <li class="nav-item">
                <a href="<?php echo base_url('CTabungan') ?>" class="nav-link">
                  <i class="far fa-credit-card nav-icon"></i>
                  <!-- <i class="far fa-circle nav-icon"></i> -->
                  <p>Tabungan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('CPengajuan') ?>" class="nav-link">
                  <i class="fas fa-file-contract nav-icon"></i>
                  <!-- <i class="far fa-circle nav-icon"></i> -->
                  <p>Pengajuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('CPeminjaman') ?>" class="nav-link">
                  <i class="fas fa-file-invoice-dollar nav-icon"></i>
                  <!-- <i class="far fa-circle nav-icon"></i> -->
                  <p>Peminjaman</p>
                  <span class="right fas fa-hand-holding-usd"></span>
                  <!-- <span class="right badge badge-danger">Keluar</span> -->

                </a>
              </li>
        
          
          </ul>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-print"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=<?php echo base_url('CLaporan/Laporan_perbln') ?> class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan perbulan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('CLaporan/Laporan_peruser') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan PerUser</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('#') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan PerTransaksi</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
        <li class="nav-item">
            <a href="<?php echo base_url('CLogin/logout') ?>" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>
                Logout
                <span class="right badge badge-danger">Keluar</span>
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>