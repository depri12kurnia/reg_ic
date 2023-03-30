<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('dasbor') ?>" class="brand-link">
        <img src="<?php echo $this->website->icon() ?>" alt="<?php echo $this->website->namaweb(); ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo $this->konfigurasi_model->listing()->singkatan; ?></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="<?php echo base_url('akun') ?>" class="d-block"><?php echo $this->session->userdata('nama'); ?>
                    (<?php echo $this->session->userdata('akses_level'); ?>)
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- DASBOR -->
                <li class="nav-item">
                    <a href="<?php echo base_url('dasbor') ?>" class="nav-link">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            DASHBOARD
                        </p>
                    </a>
                </li>
                <!-- Akun Verifikator -->
                <?php if ($this->session->userdata('akses_level') == "Verifikator") { ?>
                    <!-- Verifikasi -->
                    <li class="nav-item">
                        <a href="<?php echo base_url('verifikasi') ?>" class="nav-link">
                            <i class="nav-icon fa fa-check"></i>
                            <p>VERIFY</p>
                        </a>
                    </li>

                    <!-- Approved -->
                    <li class="nav-item">
                        <a href="<?php echo base_url('verifikasi/approved') ?>" class="nav-link">
                            <i class="nav-icon fa fa-list"></i>
                            <p>APPROVED</p>
                        </a>
                    </li>

                    <!-- Approved -->
                    <li class="nav-item">
                        <a href="<?php echo base_url('verifikasi/failed') ?>" class="nav-link">
                            <i class="nav-icon fa fa-exclamation-triangle"></i>
                            <p>FAILED</p>
                        </a>
                    </li>

                <?php } ?>

                <!-- Akun Absensi -->
                <?php if ($this->session->userdata('akses_level') == "Absensi") { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('scanbarcode') ?>" class="nav-link">
                            <i class="nav-icon fa fa-scanner"></i>
                            <p>PRESENSI</p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('presensi') ?>" class="nav-link">
                            <i class="nav-icon fa fa-sign-in"></i>
                            <p>LAPORAN PRESENSI</p>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($this->session->userdata('akses_level') == "Admin") { ?>
                    <!-- Registrasi -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>REGISTRASI<i class="right fa fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="<?php echo base_url('registrasi') ?>" class="nav-link"><i class="fa fa-file nav-icon"></i>
                                    <p>Data Registrasi </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Verifikasi -->
                    <li class="nav-item">
                        <a href="<?php echo base_url('verifikasi') ?>" class="nav-link">
                            <i class="nav-icon fa fa-check"></i>
                            <p>VERIFY</p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('verifikasi/sendmailapproved') ?>" class="nav-link">
                            <i class="nav-icon fa fa-envelope"></i>
                            <p>SEND MAIL VERIFY</p>
                        </a>

                    </li>
                    <!-- LAPORAN -->
                    <li class="nav-item">
                        <a href="<?php echo base_url('report') ?>" class="nav-link">
                            <i class="nav-icon fa fa-files-o"></i>
                            <p>LAPORAN</p>
                        </a>

                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('scanbarcode') ?>" class="nav-link">
                            <i class="nav-icon fa fa-barcode"></i>
                            <p>PRESENSI</p>
                        </a>

                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('presensi') ?>" class="nav-link">
                            <i class="nav-icon fa fa-file"></i>
                            <p>LAPORAN PRESENSI</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-list"></i>
                            <p>DATA BAGIAN<i class="right fa fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="<?php echo base_url('bagian') ?>" class="nav-link"><i class="fa fa-circle-o nav-icon"></i>
                                    <p>Data Bagian</p>
                                </a>
                            </li>
                            <li class="nav-item"><a href="<?php echo base_url('bagian/tambah') ?>" class="nav-link"><i class="fa fa-circle-o nav-icon"></i>
                                    <p>Tambah Data</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <!-- MENU USER -->
                    <li class="nav-item">
                        <a href="<?php echo base_url('user') ?>" class="nav-link">
                            <i class="nav-icon fa fa-lock"></i>
                            <p>
                                PENGGUNA SISTEM
                            </p>
                        </a>
                    </li>

                    <!-- KONFIGURASI MENU -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-wrench"></i>
                            <p>KONFIGURASI <i class="right fa fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item"><a href="<?php echo base_url('konfigurasi') ?>" class="nav-link"><i class="fa fa-wrench nav-icon"></i>
                                    <p>Konfigurasi Umum</p>
                                </a>
                            </li>
                            <li class="nav-item"><a href="<?php echo base_url('konfigurasi/icon') ?>" class="nav-link"><i class="fa fa-upload nav-icon"></i>
                                    <p>Ganti Icon</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <!-- Logout -->
                <li class="nav-item">
                    <a href="<?php echo base_url('login/logout') ?>" class="nav-link">
                        <i class="nav-icon fa fa-sign-out"></i>
                        <p>
                            LOGOUT
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('dasbor') ?>">Dashboard</a></li>
                        <!-- <li class="breadcrumb-item"><a href="<?php echo base_url('' . $this->uri->segment(2)) ?>"><?php echo ucfirst(str_replace('_', ' ', $this->uri->segment(2))) ?></a></li> -->
                        <li class="breadcrumb-item active"><?php echo character_limiter($title, 20) ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">