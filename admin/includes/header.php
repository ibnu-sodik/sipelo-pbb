<?php 

require_once '../library/config.php';
require_once '../library/f_baseUrl.php';
require_once '../library/f_sweetalert.php';
require_once '../library/f_login.php';
require_once '../library/f_function.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Aplikasi Sistem Penilaian Lomba Berbasis Web" />
    <meta name="author" content="IBNU SODIK" />
    <meta name="email" content="ibnusodik049@gmail.com" />
    <title>SP GEMILANG</title>
    <link rel="icon" type="image/gif" href="<?=base_url('assets/images/logo.png')?>">
    <link href="<?= base_url() ?>/assets/css/styles.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/css/sweetalert.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/css/responsive.bootstrap4.min.css" rel="stylesheet" />
    
    <script src="<?= base_url() ?>/assets/js/all.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery-3.5.1.min.js"></script>

</head>
<body class="sb-nav-fixed">    
    <?php include 'navbar.php'; ?>

    <div id="layoutSidenav">

        <?php include 'sidebar.php'; ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
