<?php 

$host	= "localhost";
$user	= "root";
$pass	= "my laragon db";
$db		= "gemilang_sma_pmd";

$mysqli = new mysqli($host, $user, $pass, $db);
$config = mysqli_connect($host,$user,$pass,$db) or die(mysqli_error($config));

date_default_timezone_set('Asia/Jakarta');

// $host	= "localhost";
// $user	= "id14660957_user_pbbgemilangpmd";
// $pass	= "g3mil4n9_Pbb";
// $db		= "id14660957_pbbgemilangpmd";

// $mysqli = new mysqli($host, $user, $pass, $db);
// $config = mysqli_connect($host,$user,$pass,$db) or die(mysqli_error($config));

// date_default_timezone_set('Asia/Jakarta');

 ?>