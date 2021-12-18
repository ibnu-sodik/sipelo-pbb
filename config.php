<?php 

$host	= "localhost";
$user	= "root";
$pass	= "";
$db		= "gemilang_sma_pmd";

$mysqli = new mysqli($host, $user, $pass, $db);
$config = mysqli_connect($host,$user,$pass,$db) or die(mysqli_error($config));

date_default_timezone_set('Asia/Jakarta');

 ?>