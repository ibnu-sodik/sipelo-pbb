<?php
require_once '../../library/config.php';
require_once '../../library/f_function.php';
require_once '../../library/f_sweetalert.php';
require_once '../../library/f_baseUrl.php';
// var_dump($_POST);die();
?>

<link href="<?= base_url() ?>/assets/css/sweetalert.css" rel="stylesheet" />
<script src="<?= base_url() ?>/assets/js/sweetalert.min.js"></script>

<?php

// if (isset($_POST['simpan2'])) {
$id				= sanitize($_POST['id']);
$no_peserta 	= sanitize($_POST['no_peserta2']);
$nama_peserta 	= sanitize($_POST['nama_peserta2']);
$kelas 			= sanitize($_POST['kelas']);

	// validasi
$errors = array();
if (trim($no_peserta)=="" OR ! is_numeric(trim($no_peserta))) {
	$errors[] = "Nomor Peserta Belum Diisi Atau Harus Dengan Angka.!";
}
if (trim($nama_peserta)=="") {
	$errors[] = "Nama Peserta Belum Diisi.!";
}
if (trim($kelas)=="") {
	$errors[] = "Kelas Belum Diisi.!";
}

$SQL2 = $mysqli->query("SELECT * FROM tb_peserta WHERE
	nama_peserta = '$nama_peserta' and
	kelas = '$kelas' and id != '$id'
	");
if (mysqli_num_rows($SQL2) == 1) {
	$errors[] = "Maaf, Peserta Yang Sama Dengan Data Persis ".$nama_peserta." Suda Ada.!";
}

if (!empty($errors)) {
	echo display_errors($errors);
	echo "<meta http-equiv='refresh' content='3;url=../?page=peserta' />";
}else{
	$mysqli->query("UPDATE tb_peserta SET
		no_peserta 		= '$no_peserta',
		nama_peserta 	= '$nama_peserta',
		kelas 			= '$kelas' WHERE id = '$id'");
	$text = "Berhasil Mengupdate Data ".$nama_peserta;
	echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '../?page=peserta');
}
// }