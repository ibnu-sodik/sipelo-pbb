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
	$id_nj 		= sanitize($_POST['id_nj']);
	$id_peserta = sanitize($_POST['id_peserta']);
	$nilai_bahan_kostum 	= sanitize($_POST['nilai_bahan_kostum']);
	$nilai_kerumitan_kostum = sanitize($_POST['nilai_kerumitan_kostum']);
	$nilai_tema_kostum 		= sanitize($_POST['nilai_tema_kostum']);
	$nilai_selaras_kostum 	= sanitize($_POST['nilai_selaras_kostum']);

	// validasi form tambah
	$errors = array();
	if (trim($id_peserta)=='') {
		$errors[] = "Mohon Pilih Peserta Terlebih Dahul.!";
	}

	$SQL2 = $mysqli->query("SELECT * FROM nilai_juri WHERE
		id_peserta = '$id_peserta' and id_nj != '$id_nj'
		");
	if (mysqli_num_rows($SQL2)==1) {
		$errors[] = "Maaf, Nilai Tersebut Sudah Ada.";
	}

	if (!empty($errors)) {
		echo display_errors($errors);
	}else{
		$total_nilai = (
			$nilai_bahan_kostum+
			$nilai_kerumitan_kostum+
			$nilai_tema_kostum+
			$nilai_selaras_kostum
		);
		$mysqli->query("UPDATE nilai_juri SET
			id_peserta 	= '$id_peserta',
			nilai_bahan_kostum = '$nilai_bahan_kostum',
			nilai_kerumitan_kostum = '$nilai_kerumitan_kostum',
			nilai_tema_kostum = '$nilai_tema_kostum',
			nilai_selaras_kostum = '$nilai_selaras_kostum',
			total_nilai = '$total_nilai' WHERE id_nj = '$id_nj'
			");
		$text = "Berhasil Mengubah Data Nilai.! ";
		echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '../?page=juri');
	}
}
?>