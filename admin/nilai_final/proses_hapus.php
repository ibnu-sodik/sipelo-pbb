<?php 
require_once '../../library/config.php';
require_once '../../library/f_baseUrl.php';
require_once '../../library/f_sweetalert.php';
?>
<link href="<?= base_url() ?>/assets/css/sweetalert.css" rel="stylesheet" />
<script src="<?= base_url() ?>/assets/js/sweetalert.min.js"></script>
<?php
$id = $_GET['id'];
$hapus = $mysqli->query("DELETE FROM nilai_final WHERE id_nf='$id'");
if ($hapus) {
	$text = "Berhasil Menghapus Data.!";
	echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '../?page=nilai_final');
}

?>