<?php include 'includes/header.php'; ?>

<?php 
if (!is_logged_in()) {
	$text = "Anda Harus Login Terlebih Dahulu.!";
	echo sweetalert('Stop..!', $text, 'error', '3000', 'false', 'login.php');
}
if (@$_GET['page']=='dashboard' || @$_GET['page']=='') {
	include 'views/dashboard.php';
}
elseif (@$_GET['page']=='peserta') {
	include 'peserta/data-peserta.php';
}
elseif (@$_GET['page']=='juri') {
	include 'nilai_juri/nilai_juri.php';
}
elseif (@$_GET['page']=='gerakan') {
	include 'nilai_gerakan/nilai_gerakan.php';
}
elseif (@$_GET['page']=='danton') {
	include 'nilai_danton/nilai_danton.php';
}
elseif (@$_GET['page']=='formasi') {
	include 'nilai_formasi/nilai_formasi.php';
}
elseif (@$_GET['page']=='kreasi') {
	include 'nilai_kreasi/nilai_kreasi.php';
}
elseif (@$_GET['page']=='variasi') {
	include 'nilai_variasi/nilai_variasi.php';
}
elseif (@$_GET['page']=='supporter') {
	include 'nilai_supporter/nilai_supporter.php';
}
elseif (@$_GET['page']=='nilai_minus') {
	include 'nilai_minus/nilai_minus.php';
}
elseif (@$_GET['page']=='nilai_final') {
	include 'nilai_final/nilai_final.php';
}
elseif (@$_GET['page']=='nilai_final') {
	include 'nilai_final/nilai_final.php';
}
elseif (@$_GET['page']=='juara') {
	include 'juara/juara.php';
}

 ?>

<?php include 'includes/footer.php'; ?>