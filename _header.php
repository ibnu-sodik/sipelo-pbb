<?php 
include 'library/f_baseUrl.php';
include 'library/config.php';

$page = $_SERVER['PHP_SELF'];

$sec = "30";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- <meta http-equiv="refresh" content="<?php //echo $sec?>;URL='<?php //echo $page?>'"> -->

  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Aplikasi Sistem Penilaian Lomba Berbasis Web" />
  <meta name="author" content="IBNU SODIK" />
  <meta name="email" content="ibnusodik049@gmail.com" />
  <meta http-equiv="refresh" content="600" >
  <link href="<?=base_url()?>/assets2/font-roboto.css" rel="stylesheet">

  <title>GEMILANG SMA POMOSDA</title>
  <link rel="icon" type="image/gif" href="<?=base_url('assets/images/logo.png')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets2/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets2/css/templatemo-art-factory.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets2/css/owl-carousel.css">
  
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <!-- <script src="https://code.highcharts.com/highcharts-3d.js"></script> -->
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>

<body>

    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    
    
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="<?=base_url()?>" class="logo">PBB Gemilang</a>
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#welcome" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">Tentang</a></li>
                            <li class="scroll-to-section"><a href="#kategori_juara">Kejuaraan</a></li>
                            <li class="scroll-to-section"><a href="#grafik">Grafik Nilai</a></li>
                            <li class="scroll-to-section"><a href="#contact-us">Lokasi</a></li>
                            <li class="scroll-to-section"><a href="admin" target="_blank">Login</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
