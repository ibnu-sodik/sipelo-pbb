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
	$id_nm = sanitize($_POST['id_nm']);
	$id_peserta = sanitize($_POST['id_peserta']);
	$upacara_telat 	= sanitize($_POST['upacara_telat']);
	$upacara_tidak 	= sanitize($_POST['upacara_tidak']);

	$anggota_kurang 	= sanitize($_POST['anggota_kurang']);
	$anggota_tak_sesuai 	= sanitize($_POST['anggota_tak_sesuai']);
	$danton_tak_sesuai 	= sanitize($_POST['danton_tak_sesuai']);
	$atribut_tak_sesuai 	= sanitize($_POST['atribut_tak_sesuai']);
	$atribut_lepas 	= sanitize($_POST['atribut_lepas']);
	$apatis 	= sanitize($_POST['apatis']);
	$tak_siap_tampil 	= sanitize($_POST['tak_siap_tampil']);
	$aba_tak_urut 	= sanitize($_POST['aba_tak_urut']);
	$aba_terlewat 	= sanitize($_POST['aba_terlewat']);
	$aba_salah 	= sanitize($_POST['aba_salah']);
	$pingsan 	= sanitize($_POST['pingsan']);
	$danton_pingsan 	= sanitize($_POST['danton_pingsan']);
	$lewat_garis 	= sanitize($_POST['lewat_garis']);

	// validasi form tambah
	$errors = array();
	if (trim($id_peserta)=='') {
		$errors[] = "Mohon Pilih Peserta Terlebih Dahul.!";
	}

	$SQL2 = $mysqli->query("SELECT * FROM nilai_minus WHERE
		id_peserta = '$id_peserta' and id_nm != '$id_nm'");
	if (mysqli_num_rows($SQL2)==1) {
		$errors[] = "Maaf, Data Tersebut Sudah Ada.";
	}

	if (!empty($errors)) {
		echo display_errors($errors);
	}else{
		$st_upacara = (
			(float)$upacara_telat+
			(float)$upacara_tidak);
		$st_anggota = (
			(float)$anggota_kurang+
			(float)$anggota_tak_sesuai+
			(float)$danton_tak_sesuai+
			(float)$atribut_tak_sesuai);
		$st_perform = (
			(float)$atribut_lepas+
			(float)$apatis+
			(float)$tak_siap_tampil);
		$st_aba = (
			(float)$aba_tak_urut+
			(float)$aba_terlewat+
			(float)$aba_salah+
			(float)$pingsan+
			(float)$danton_pingsan+
			(float)$lewat_garis);
		$total_nilai = ($st_upacara+$st_anggota+$st_perform+$st_aba);
		$mysqli->query("UPDATE nilai_minus SET
			id_peserta 	= '$id_peserta',
			upacara_telat = '$upacara_telat',
			upacara_tidak = '$upacara_tidak',
			anggota_kurang = '$anggota_kurang',
			anggota_tak_sesuai = '$anggota_tak_sesuai',
			danton_tak_sesuai = '$danton_tak_sesuai',
			atribut_tak_sesuai = '$atribut_tak_sesuai',
			atribut_lepas = '$atribut_lepas',
			apatis = '$apatis',
			tak_siap_tampil = '$tak_siap_tampil',
			aba_tak_urut = '$aba_tak_urut',
			aba_terlewat = '$aba_terlewat',
			aba_salah = '$aba_salah',
			pingsan = '$pingsan',
			danton_pingsan = '$danton_pingsan',
			lewat_garis = '$lewat_garis',
			total_nilai = '$total_nilai' WHERE id_nm = '$id_nm'
			");
		$text = "Berhasil Mengubah Data.! ";
		echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '../?page=nilai_minus');
	}
}
?>