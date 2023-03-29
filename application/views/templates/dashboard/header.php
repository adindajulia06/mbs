<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <title><?php echo $title; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome/css/all.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jquery-selectric/selectric.css">

    <!-- DataTables -->
    <link href="<?php echo base_url(); ?>assets/css/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?php echo base_url(); ?>assets/css/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>

                </form>
                <ul class="navbar-nav navbar-right">


                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->nama; ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?php echo base_url(); ?>user/setting" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo base_url(); ?>auth/signout" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?php echo base_url(); ?>"><?php echo $logotext ?></a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?php echo base_url(); ?>"><?php echo $logotext ?></a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li><a class="nav-link" href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> <span>Halaman Utama</span></a></li>

                        <li class="menu-header">Services</li>


                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-wifi"></i> <span>Hotpsot</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?php echo base_url(); ?>voucher/hotspot/active">Hotspot Active</a></li>
                                <li><a class="nav-link" href="<?php echo base_url(); ?>voucher/hotspot/generate">Generate Voucher</a></li>
                                <li><a class="nav-link" href="<?php echo base_url(); ?>voucher/hotspot/list">List Voucher</a></li>
                                <li><a class="nav-link" href="<?php echo base_url(); ?>voucher/hotspot/adduser">Add User</a></li>


                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i> <span>Users</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?php echo base_url(); ?>voucher/hotspot/profile">Profile List</a></li>
                                <li><a class="nav-link" href="<?php echo base_url(); ?>voucher/hotspot/profile/add">Add Profile</a></li>
                            </ul>
                        </li>


                        <li><a class="nav-link" href="<?php echo base_url(); ?>pages/report"><i class="fas fa-money-check"></i> <span>Report</span></a></li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-server"></i> <span>Menu Router</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?php echo base_url(); ?>router/hotspot/profile">Hotspot Profile</a></li>
                                <li><a class="nav-link" href="<?php echo base_url(); ?>router/reboot">Restart Router</a></li>
                                <li><a class="nav-link" href="<?php echo base_url(); ?>router/setting">Pengaturan Router</a></li>

                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i> <span>Pengaturan</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?php echo base_url(); ?>account/setting">Pengaturan Akun</a></li>
                                <li><a class="nav-link" href="<?php echo base_url(); ?>website/setting">Pengaturan Website</a></li>

                            </ul>
                        </li>


                    </ul>

                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="<?php echo base_url(); ?>changelogs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <i class="fas fa-info-circle"></i> Changelogs
                        </a>
                    </div>
                </aside>
            </div>