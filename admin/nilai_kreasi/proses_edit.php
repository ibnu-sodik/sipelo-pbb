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
	$id_k 		= sanitize($_POST['id_k']);
	$id_peserta = sanitize($_POST['id_peserta']);
	$gerakan_1 	= sanitize($_POST['gerakan_1']);
	$gerakan_2 	= sanitize($_POST['gerakan_2']);
	$gerakan_3 	= sanitize($_POST['gerakan_3']);
	$gerakan_4 	= sanitize($_POST['gerakan_4']);
	$gerakan_5 	= sanitize($_POST['gerakan_5']);

	// validasi form tambah
	$errors = array();
	if (trim($id_peserta)=='') {
		$errors[] = "Mohon Pilih Peserta Terlebih Dahul.!";
	}

	$SQL2 = $mysqli->query("SELECT * FROM nilai_kreasi WHERE
		id_peserta = '$id_peserta' and id_k != '$id_k'
		");
	if (mysqli_num_rows($SQL2)==1) {
		$errors[] = "Maaf, Nilai Tersebut Sudah Ada.";
	}

	if (!empty($errors)) {
		echo display_errors($errors);
	}else{
		$total_nilai = ($gerakan_1+$gerakan_2+$gerakan_3+$gerakan_4+
			$gerakan_5);
		$mysqli->query("UPDATE nilai_kreasi SET
			id_peserta 	= '$id_peserta',
			gerakan_1 = '$gerakan_1',
			gerakan_2 = '$gerakan_2',
			gerakan_3 = '$gerakan_3',
			gerakan_4 = '$gerakan_4',
			gerakan_5 = '$gerakan_5',
			total_nilai = '$total_nilai' WHERE id_k = '$id_k'
			");
		$text = "Berhasil Mengubah Data Nilai.! ";
		echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '../?page=kreasi');
	}
}
?>