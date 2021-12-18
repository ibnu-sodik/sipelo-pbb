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
	$id_g = sanitize($_POST['id_g']);
	$id_peserta = sanitize($_POST['id_peserta']);
	$hormat_dj 	= sanitize($_POST['hormat_dj']);
	$laporan_dj = sanitize($_POST['laporan_dj']);
	$istirahat 	= sanitize($_POST['istirahat']);
	$periksa_kerapian 	= sanitize($_POST['periksa_kerapian']);
	$hormat 	= sanitize($_POST['hormat']);
	$berhitung 	= sanitize($_POST['berhitung']);
	$set_lencang_kanan 	= sanitize($_POST['set_lencang_kanan']);
	$lencang_kanan 	= sanitize($_POST['lencang_kanan']);
	$hadap_kanan 	= sanitize($_POST['hadap_kanan']);
	$haluan_kanan 	= sanitize($_POST['haluan_kanan']);
	$hadap_kiri 	= sanitize($_POST['hadap_kiri']);
	$serong_kanan 	= sanitize($_POST['serong_kanan']);
	$serong_kiri 	= sanitize($_POST['serong_kiri']);
	$balik_kanan 	= sanitize($_POST['balik_kanan']);
	$jalan_ditempat 	= sanitize($_POST['jalan_ditempat']);
	$hadap_kiri_henti 	= sanitize($_POST['hadap_kiri_henti']);
	$lencang_depan 	= sanitize($_POST['lencang_depan']);
	$buka_barisan 	= sanitize($_POST['buka_barisan']);
	$tutup_barisan 	= sanitize($_POST['tutup_barisan']);
	$empat_langkah_kekanan 	= sanitize($_POST['empat_langkah_kekanan']);
	$tiga_langkah_kebelakang 	= sanitize($_POST['tiga_langkah_kebelakang']);
	$empat_langkah_kekiri 	= sanitize($_POST['empat_langkah_kekiri']);
	$tiga_langkah_kedepan 	= sanitize($_POST['tiga_langkah_kedepan']);
	$melintang_kanan 	= sanitize($_POST['melintang_kanan']);
	$henti 	= sanitize($_POST['henti']);
	$balik_kanan2 	= sanitize($_POST['balik_kanan2']);
	$haluan_kanan 	= sanitize($_POST['haluan_kanan']);
	$hadap_kanan_henti 	= sanitize($_POST['hadap_kanan_henti']);
	$langkah_tegap 	= sanitize($_POST['langkah_tegap']);
	$langkah_biasa 	= sanitize($_POST['langkah_biasa']);
	$dua_kali_belok_kanan 	= sanitize($_POST['dua_kali_belok_kanan']);
	$langkah_tegap2 	= sanitize($_POST['langkah_tegap2']);
	$hormat_kanan 	= sanitize($_POST['hormat_kanan']);
	$langkah_biasa2 	= sanitize($_POST['langkah_biasa2']);
	$tiap_tiap_banjar 	= sanitize($_POST['tiap_tiap_banjar']);
	$ganti_langkah 	= sanitize($_POST['ganti_langkah']);
	$langkah_perlahan 	= sanitize($_POST['langkah_perlahan']);
	$langkah_biasa3 	= sanitize($_POST['langkah_biasa3']);
	$tiap_tiap_banjar2 	= sanitize($_POST['tiap_tiap_banjar2']);
	$lari 	= sanitize($_POST['lari']);
	$langkah_biasa4 	= sanitize($_POST['langkah_biasa4']);
	$tiap_tiap_banjar3 	= sanitize($_POST['tiap_tiap_banjar3']);
	$hadap_kiri_henti2 	= sanitize($_POST['hadap_kiri_henti2']);
	$bubar 	= sanitize($_POST['bubar']);

	$errors = array();
	if (trim($id_peserta)=='') {
		$errors[] = "Mohon Pilih Peserta Terlebih Dahul.!";
	}

	$SQL2 = $mysqli->query("SELECT * FROM nilai_gerakan WHERE
		id_peserta = '$id_peserta' and id_g != '$id_g'");		
	if (mysqli_num_rows($SQL2)==1) {
		$errors[] = "Maaf, Nilai Tersebut Sudah Ada.";
	}

	if (!empty($errors)) {
		echo display_errors($errors);
	}else{
		$sub_nilai_hadap = 	((float)$hadap_kanan+(float)$hadap_kiri+(float)$hadap_kiri_henti+(float)$hadap_kanan_henti+(float)$hadap_kiri_henti2+(float)$serong_kanan+(float)$serong_kiri+(float)$balik_kanan+(float)$balik_kanan2);
		$sub_nilai_lencang = ((float)$set_lencang_kanan+(float)$lencang_kanan+(float)$lencang_depan);
		$sub_nilai_gerak = ((float)$hormat_dj+(float)$laporan_dj+(float)$istirahat+(float)$periksa_kerapian+(float)$hormat+(float)$berhitung+(float)$melintang_kanan+(float)$henti+(float)$haluan_kanan+(float)$dua_kali_belok_kanan+(float)$hormat_kanan+(float)$tiap_tiap_banjar+(float)$tiap_tiap_banjar2+(float)$lari+(float)$tiap_tiap_banjar3+(float)$bubar);
		$sub_nilai_langkah = ((float)$jalan_ditempat+(float)$buka_barisan+(float)$tutup_barisan+(float)$empat_langkah_kekanan+(float)$tiga_langkah_kebelakang+(float)$empat_langkah_kekiri+(float)$tiga_langkah_kedepan+(float)$langkah_tegap+(float)$langkah_biasa+(float)$langkah_tegap2+(float)$langkah_biasa2+(float)$ganti_langkah+(float)$langkah_perlahan+(float)$langkah_biasa3+(float)$langkah_biasa4);
		
		$total_nilai = ($sub_nilai_hadap+$sub_nilai_lencang+$sub_nilai_gerak+$sub_nilai_langkah);
		$mysqli->query("UPDATE nilai_gerakan SET
			id_peserta 	= '$id_peserta',
			hormat_dj 	= '$hormat_dj',
			laporan_dj 	= '$laporan_dj',
			istirahat 	= '$istirahat',
			periksa_kerapian = '$periksa_kerapian',
			hormat 		= '$hormat',
			berhitung 	= '$berhitung',
			set_lencang_kanan = '$set_lencang_kanan',
			lencang_kanan 	= '$lencang_kanan',
			hadap_kanan 	= '$hadap_kanan',
			hadap_kiri 		= '$hadap_kiri',
			serong_kanan 	= '$serong_kanan',
			serong_kiri 	= '$serong_kiri',
			balik_kanan 	= '$balik_kanan',
			jalan_ditempat 	= '$jalan_ditempat',
			hadap_kiri_henti = '$hadap_kiri_henti',
			lencang_depan 	= '$lencang_depan',
			buka_barisan 	= '$buka_barisan',
			tutup_barisan 	= '$tutup_barisan',
			empat_langkah_kekanan = '$empat_langkah_kekanan',
			tiga_langkah_kebelakang = '$tiga_langkah_kebelakang',
			empat_langkah_kekiri = '$empat_langkah_kekiri',
			tiga_langkah_kedepan = '$tiga_langkah_kedepan',
			melintang_kanan 	= '$melintang_kanan',
			henti 				= '$henti',
			balik_kanan2 		= '$balik_kanan2',
			haluan_kanan 		= '$haluan_kanan',
			hadap_kanan_henti 	= '$hadap_kanan_henti',
			langkah_tegap 		= '$langkah_tegap',
			langkah_biasa 		= '$langkah_biasa',
			dua_kali_belok_kanan = '$dua_kali_belok_kanan',
			langkah_tegap2 		= '$langkah_tegap2',
			hormat_kanan 		= '$hormat_kanan',
			langkah_biasa2 		= '$langkah_biasa2',
			tiap_tiap_banjar 	= '$tiap_tiap_banjar',
			ganti_langkah 		= '$ganti_langkah',
			langkah_perlahan 	= '$langkah_perlahan',
			langkah_biasa3 		= '$langkah_biasa3',
			tiap_tiap_banjar2 	= '$tiap_tiap_banjar2',
			lari 				= '$lari',
			langkah_biasa4 		= '$langkah_biasa4',
			tiap_tiap_banjar3	= '$tiap_tiap_banjar3',
			hadap_kiri_henti2 	= '$hadap_kiri_henti2',
			bubar 				= '$bubar',
			total_nilai 		= '$total_nilai' WHERE id_g = '$id_g'
			");
		$text = "Berhasil Mengupdate Nilai.! ";
		echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '../?page=gerakan');
	}
}

?>