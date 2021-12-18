<?php
require_once '../../library/config.php';
require_once '../../library/f_function.php';
require_once '../../library/f_sweetalert.php';
require_once '../../library/f_baseUrl.php';
?>

<link href="<?= base_url() ?>/assets/css/sweetalert.css" rel="stylesheet" />
<script src="<?= base_url() ?>/assets/js/sweetalert.min.js"></script>
<?php 

if (isset($_POST['simpan'])) {
	$id_d 		= sanitize($_POST['id_d']);
	$id_peserta = sanitize($_POST['id_peserta']);
	$suara 	= sanitize($_POST['suara']);
	$artikulasi 	= sanitize($_POST['artikulasi']);
	$urutan_aba 	= sanitize($_POST['urutan_aba']);
	$expresi 	= sanitize($_POST['expresi']);
	// 2
	$suara2 	= sanitize($_POST['suara2']);
	$artikulasi2 	= sanitize($_POST['artikulasi2']);
	$urutan_aba2 	= sanitize($_POST['urutan_aba2']);
	$expresi2 	= sanitize($_POST['expresi2']);
	// 3
	$suara3 	= sanitize($_POST['suara3']);
	$artikulasi3 	= sanitize($_POST['artikulasi3']);
	$urutan_aba3 	= sanitize($_POST['urutan_aba3']);
	$expresi3 	= sanitize($_POST['expresi3']);
	// 4
	$suara4 	= sanitize($_POST['suara4']);
	$artikulasi4 	= sanitize($_POST['artikulasi4']);
	$urutan_aba4 	= sanitize($_POST['urutan_aba4']);
	$expresi4 	= sanitize($_POST['expresi4']);

	// validasi form tambah
	$errors = array();
	if (trim($id_peserta)=='') {
		$errors[] = "Mohon Pilih Peserta Terlebih Dahul.!";
	}

	$SQL2 = $mysqli->query("SELECT * FROM nilai_danton WHERE
		id_peserta = '$id_peserta' and id_d != '$id_d'
		");
	if (mysqli_num_rows($SQL2)==1) {
		$errors[] = "Maaf, Nilai Tersebut Sudah Ada.";
	}

	if (!empty($errors)) {
		echo display_errors($errors);
	}else{
		$st_suara = (
			(float)$suara+
			(float)$suara2+
			(float)$suara3+
			(float)$suara4);
		$st_artikulasi = (
			(float)$artikulasi+
			(float)$artikulasi2+
			(float)$artikulasi3+
			(float)$artikulasi4);
		$st_urutan_aba = (
			(float)$urutan_aba+
			(float)$urutan_aba2+
			(float)$urutan_aba3+
			(float)$urutan_aba4);
		$st_expresi = (
			(float)$expresi+
			(float)$expresi2+
			(float)$expresi3+
			(float)$expresi4);
		$total_nilai = ($st_suara+$st_artikulasi+$st_urutan_aba+$st_expresi);
		$total_nilai = ($st_suara+$st_artikulasi+$st_urutan_aba+$st_expresi);
		$mysqli->query("UPDATE nilai_danton SET
			id_peserta 	= '$id_peserta',
			suara = '$suara',
			artikulasi = '$artikulasi',
			urutan_aba = '$urutan_aba',
			expresi = '$expresi',

			suara2 = '$suara2',
			artikulasi2 = '$artikulasi2',
			urutan_aba2 = '$urutan_aba2',
			expresi2 = '$expresi2',

			suara3 = '$suara3',
			artikulasi3 = '$artikulasi3',
			urutan_aba3 = '$urutan_aba3',
			expresi3 = '$expresi3',

			suara4 = '$suara4',
			artikulasi4 = '$artikulasi4',
			urutan_aba4 = '$urutan_aba4',
			expresi4 = '$expresi4',
			total_nilai = '$total_nilai' WHERE id_d = '$id_d'
			");
		$text = "Berhasil Mengubah Data Nilai.! ";
		echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '../?page=danton');
	}
}
?>