<?php 
require_once '../../library/config.php';
require_once '../../library/f_baseUrl.php';
require_once '../../library/f_sweetalert.php';
?>
<link href="<?= base_url() ?>/assets/css/sweetalert.css" rel="stylesheet" />
<script src="<?= base_url() ?>/assets/js/sweetalert.min.js"></script>
<?php
$id = $_GET['id'];
$hapus = $mysqli->query("DELETE FROM tb_peserta WHERE id='$_GET[id]'");
$hapus = $mysqli->query("DELETE FROM nilai_juri WHERE id_peserta='$_GET[id]'");
$hapus = $mysqli->query("DELETE FROM nilai_formasi WHERE id_peserta='$_GET[id]'");
$hapus = $mysqli->query("DELETE FROM nilai_kreasi WHERE id_peserta='$_GET[id]'");
$hapus = $mysqli->query("DELETE FROM nilai_variasi WHERE id_peserta='$_GET[id]'");
$hapus = $mysqli->query("DELETE FROM nilai_gerakan WHERE id_peserta='$_GET[id]'");
$hapus = $mysqli->query("DELETE FROM nilai_danton WHERE id_peserta='$_GET[id]'");
$hapus = $mysqli->query("DELETE FROM nilai_supporter WHERE id_peserta='$_GET[id]'");
$hapus = $mysqli->query("DELETE FROM nilai_final WHERE id_peserta='$_GET[id]'");
if ($hapus) {
	$text = "Berhasil Menghapus Data.!";
	echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '../?page=peserta');
}

?>