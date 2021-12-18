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
	$id_f 		= sanitize($_POST['id_f']);
	$id_peserta = sanitize($_POST['id_peserta']);
	$gerakan 	= sanitize($_POST['gerakan']);
	$kekompakan 	= sanitize($_POST['kekompakan']);

	// validasi form tambah
	$errors = array();
	if (trim($id_peserta)=='') {
		$errors[] = "Mohon Pilih Peserta Terlebih Dahul.!";
	}

	$SQL2 = $mysqli->query("SELECT * FROM nilai_formasi WHERE
		id_peserta = '$id_peserta' and id_f != '$id_f'
		");
	if (mysqli_num_rows($SQL2)==1) {
		$errors[] = "Maaf, Nilai Tersebut Sudah Ada.";
	}

	if (!empty($errors)) {
		echo display_errors($errors);
	}else{
		$total_nilai = ($gerakan+$kekompakan);
		$mysqli->query("UPDATE nilai_formasi SET
			id_peserta 	= '$id_peserta',
			gerakan = '$gerakan',
			kekompakan = '$kekompakan',
			total_nilai = '$total_nilai' WHERE id_f = '$id_f'
			");
		$text = "Berhasil Mengubah Data Nilai.! ";
		echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '../?page=formasi');
	}
}
?>