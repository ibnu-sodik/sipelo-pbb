<?php 
require_once '../library/config.php';
require_once '../library/f_login.php';
require_once '../library/f_baseUrl.php';
require_once '../library/f_sweetalert.php';
?>
<link href="<?= base_url() ?>/assets/css/sweetalert.css" rel="stylesheet" />
<script src="<?= base_url() ?>/assets/js/sweetalert.min.js"></script>
<?php
session_destroy();
unset($_SESSION['SPUser']);
$text = "Anda Berhasil Logout.!";
echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', 'login.php');
?>
