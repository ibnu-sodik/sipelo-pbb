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
	$id_v 		= sanitize($_POST['id_v']);
	$id_peserta = sanitize($_POST['id_peserta']);
	$kompak_gerakan 	= sanitize($_POST['kompak_gerakan']);
	$kompak_suara 	= sanitize($_POST['kompak_suara']);
	$indah_gerakan 	= sanitize($_POST['indah_gerakan']);
	$rumit_gerakan 	= sanitize($_POST['rumit_gerakan']);

	// validasi form tambah
	$errors = array();
	if (trim($id_peserta)=='') {
		$errors[] = "Mohon Pilih Peserta Terlebih Dahul.!";
	}

	$SQL2 = $mysqli->query("SELECT * FROM nilai_variasi WHERE
		id_peserta = '$id_peserta' and id_v != '$id_v'
		");
	if (mysqli_num_rows($SQL2)==1) {
		$errors[] = "Maaf, Nilai Tersebut Sudah Ada.";
	}

	if (!empty($errors)) {
		echo display_errors($errors);
	}else{
		$total_nilai = ((float)$kompak_gerakan+(float)$kompak_suara+(float)$indah_gerakan+(float)$rumit_gerakan);
		$mysqli->query("UPDATE nilai_variasi SET
			id_peserta 	= '$id_peserta',
			kompak_gerakan = '$kompak_gerakan',
			kompak_suara = '$kompak_suara',
			indah_gerakan = '$indah_gerakan',
			rumit_gerakan = '$rumit_gerakan',
			total_nilai = '$total_nilai' WHERE id_v = '$id_v'
			");
		$text = "Berhasil Mengubah Data Nilai.! ";
		echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '../?page=variasi');
	}
}
?>