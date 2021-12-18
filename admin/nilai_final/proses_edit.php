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
	$id_nf 		= sanitize($_POST['id_nf']);
	$id_peserta = sanitize($_POST['id_peserta']);
	$tn_murni 	= sanitize($_POST['tn_murni']);
	$tn_kreasi 	= sanitize($_POST['tn_kreasi']);
	$tn_formasi 	= sanitize($_POST['tn_formasi']);
	$tn_variasi 	= sanitize($_POST['tn_variasi']);
	$tn_pengurangan 	= sanitize($_POST['tn_pengurangan']);
	$tn_danton 			= sanitize($_POST['tn_danton']);
	$tn_kostum 			= sanitize($_POST['tn_kostum']);
	$tn_supporter 		= sanitize($_POST['tn_supporter']);
	$tn_harian 			= sanitize($_POST['tn_harian']);

	// validasi form tambah
	$errors = array();
	if (trim($id_peserta)=='') {
		$errors[] = "Mohon Pilih Peserta Terlebih Dahul.!";
	}

	$SQL2 = $mysqli->query("SELECT * FROM nilai_final WHERE
		id_peserta = '$id_peserta' and id_nf != '$id_nf'
		");
	if (mysqli_num_rows($SQL2)==1) {
		$errors[] = "Maaf, Nilai Tersebut Sudah Ada.";
	}

	if (!empty($errors)) {
		echo display_errors($errors);
	}else{
		$total_nilai = ((float)$tn_murni+(float)$tn_kreasi+(float)$tn_formasi+(float)$tn_variasi+(float)$tn_danton+(float)$tn_kostum+(float)$tn_supporter+(float)$tn_harian-(float)$tn_pengurangan);
		$mysqli->query("UPDATE nilai_final SET
			id_peserta 	= '$id_peserta',
			tn_murni 	= '$tn_murni',
			tn_kreasi 	= '$tn_kreasi',
			tn_formasi 	= '$tn_formasi',
			tn_variasi 	= '$tn_variasi',
			tn_danton 		= '$tn_danton',
			tn_kostum 		= '$tn_kostum',
			tn_supporter 	= '$tn_supporter',
			tn_harian 		= '$tn_harian',
			tn_pengurangan = '$tn_pengurangan',
			total_nilai = '$total_nilai' WHERE id_nf = '$id_nf'
			");
		$text = "Berhasil Mengubah Data Nilai.! ";
		echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '../?page=nilai_final');
	}
}
?>