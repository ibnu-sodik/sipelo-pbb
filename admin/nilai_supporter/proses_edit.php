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
	$id_s 		= sanitize($_POST['id_s']);
	$id_peserta = sanitize($_POST['id_peserta']);
	$kerumitan_gerakan 	= sanitize($_POST['kerumitan_gerakan']);
	$kekompakan_suara 	= sanitize($_POST['kekompakan_suara']);
	$kekompakan_gerakan 	= sanitize($_POST['kekompakan_gerakan']);
	$kesesuaian_kostum 	= sanitize($_POST['kesesuaian_kostum']);
// 2
	$kerumitan_gerakan2 	= sanitize($_POST['kerumitan_gerakan2']);
	$kekompakan_suara2 	= sanitize($_POST['kekompakan_suara2']);
	$kekompakan_gerakan2 	= sanitize($_POST['kekompakan_gerakan2']);
	$kesesuaian_kostum2 	= sanitize($_POST['kesesuaian_kostum2']);
	// 3
	$kerumitan_gerakan3 	= sanitize($_POST['kerumitan_gerakan3']);
	$kekompakan_suara3 	= sanitize($_POST['kekompakan_suara3']);
	$kekompakan_gerakan3 	= sanitize($_POST['kekompakan_gerakan3']);
	$kesesuaian_kostum3 	= sanitize($_POST['kesesuaian_kostum3']);
	// 4
	$kerumitan_gerakan4 	= sanitize($_POST['kerumitan_gerakan4']);
	$kekompakan_suara4 	= sanitize($_POST['kekompakan_suara4']);
	$kekompakan_gerakan4 	= sanitize($_POST['kekompakan_gerakan4']);
	$kesesuaian_kostum4 	= sanitize($_POST['kesesuaian_kostum4']);
	// validasi form tambah
	$errors = array();
	if (trim($id_peserta)=='') {
		$errors[] = "Mohon Pilih Peserta Terlebih Dahul.!";
	}

	$SQL2 = $mysqli->query("SELECT * FROM nilai_supporter WHERE
		id_peserta = '$id_peserta' and id_s != '$id_s'
		");
	if (mysqli_num_rows($SQL2)==1) {
		$errors[] = "Maaf, Nilai Tersebut Sudah Ada.";
	}

	if (!empty($errors)) {
		echo display_errors($errors);
	}else{
		$st_kerumitan_gerakan = (
			(float)$kerumitan_gerakan+
			(float)$kerumitan_gerakan2+
			(float)$kerumitan_gerakan3+
			(float)$kerumitan_gerakan4);
		$st_kekompakan_suara = (
			(float)$kekompakan_suara+
			(float)$kekompakan_suara2+
			(float)$kekompakan_suara3+
			(float)$kekompakan_suara4);
		$st_kekompakan_gerakan = (
			(float)$kekompakan_gerakan+
			(float)$kekompakan_gerakan2+
			(float)$kekompakan_gerakan3+
			(float)$kekompakan_gerakan4);
		$st_kesesuaian_kostum = (
			(float)$kesesuaian_kostum+
			(float)$kesesuaian_kostum2+
			(float)$kesesuaian_kostum3+
			(float)$kesesuaian_kostum4);
		$total_nilai = ($st_kerumitan_gerakan+$st_kekompakan_suara+$st_kekompakan_gerakan+$st_kesesuaian_kostum);
		$mysqli->query("UPDATE nilai_supporter SET
			id_peserta 	= '$id_peserta',
			kerumitan_gerakan = '$kerumitan_gerakan',
			kekompakan_suara = '$kekompakan_suara',
			kekompakan_gerakan = '$kekompakan_gerakan',
			kesesuaian_kostum = '$kesesuaian_kostum',

			kerumitan_gerakan2 = '$kerumitan_gerakan2',
			kekompakan_suara2 = '$kekompakan_suara2',
			kekompakan_gerakan2 = '$kekompakan_gerakan2',
			kesesuaian_kostum2 = '$kesesuaian_kostum2',

			kerumitan_gerakan3 = '$kerumitan_gerakan3',
			kekompakan_suara3 = '$kekompakan_suara3',
			kekompakan_gerakan3 = '$kekompakan_gerakan3',
			kesesuaian_kostum3 = '$kesesuaian_kostum3',

			kerumitan_gerakan4 = '$kerumitan_gerakan4',
			kekompakan_suara4 = '$kekompakan_suara4',
			kekompakan_gerakan4 = '$kekompakan_gerakan4',
			kesesuaian_kostum4 = '$kesesuaian_kostum4',

			total_nilai = '$total_nilai' WHERE id_s = '$id_s'
			");
		$text = "Berhasil Mengubah Data Nilai.! ";
		echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '../?page=supporter');
	}
}
?>