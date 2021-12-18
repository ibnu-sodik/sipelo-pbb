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
	$id			= sanitize($_POST['id']);
	$f_nama 	= sanitize($_POST['f_nama']);
	$l_nama 	= sanitize($_POST['l_nama']);
	$username 	= sanitize($_POST['username']);
	$hak_akses 	= $_POST['hak_akses'];
	$password 	= sanitize($_POST['password']);

	// validasi
	$errors = array();
	if (trim($f_nama)=="") {
		$errors[] = "Nama Depan Belum Diisi.!";
	}
	if (trim($l_nama)=="") {
		$errors[] = "Nama Belakang Belum Diisi.!";
	}
	if (trim($username)=="") {
		$errors[] = "Username Belum Diisi.!";
	}
	if (trim($hak_akses)=="") {
		$errors[] = "Hak Akses Belum Dipilih.!";
	}

	$SQL2 = $mysqli->query("SELECT * FROM user WHERE
		l_nama = '$l_nama' and
		f_nama = '$f_nama' and
		username = '$username' and id!='$id'
		");
	if (mysqli_num_rows($SQL2) == 1) {
		$errors[] = "Maaf, user Yang Sama Dengan Data Persis ".$l_nama." Suda Ada.!";
	}

	if (!empty($errors)) {
		echo display_errors($errors);
	}else{
		if ($password=='') {
			$mysqli->query("UPDATE user SET
				f_nama 		= '$f_nama',
				l_nama 		= '$l_nama',
				username 	= '$username',
				hak_akses	= '$hak_akses' WHERE id='$id'
				");			
			$text = "Berhasil Mengupdate ".$f_nama.' '.$l_nama.' Tanpa Merubah Password.!';
			echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '../?page=user');
		}else{
			$new_pass = password_hash($password, PASSWORD_DEFAULT);
			$mysqli->query("UPDATE user SET
				f_nama 		= '$f_nama',
				l_nama 		= '$l_nama',
				username 	= '$username',
				password 	= '$new_pass',
				hak_akses	= '$hak_akses' WHERE id='$id'
				");
			$text = "Berhasil Mengupdate ".$f_nama.' '.$l_nama;
			echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '../?page=user');
		}
	}
}