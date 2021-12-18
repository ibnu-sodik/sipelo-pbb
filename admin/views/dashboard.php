<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
	<div class="col-xl-12 text-center" id="div_timer">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 rounded bg-gradient-4 shadow text-center mb-5 p-3">
				<h4>Grafik muncul setelah hitung mundur selesai.!</h4>
				<button class="btn btn-primary">
					<h3><strong id="countdown"></strong></h3>					
				</button>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
	<div class="col-xl-12" id="nilai_final"></div>
	<div class="col-xl-12" id="nilai_murni"></div>
	<div class="col-xl-12" id="nilai_kreasi"></div>
	<div class="col-xl-12" id="nilai_variasi"></div>
	<div class="col-xl-12" id="nilai_formasi"></div>
	<div class="col-xl-12" id="nilai_danton"></div>
	<!-- <div class="col-xl-12" id="nilai_supporter"></div> -->
	<div class="col-xl-12" id="nilai_kostum"></div>
</div>
<script type="text/javascript">
	var n = 30;
	setTimeout(countDown,1000);

	function countDown(){
		n--;
		if(n > 0){
			setTimeout(countDown,1000);
		}
		document.getElementById("countdown").innerHTML = n;
		if(n === 0){
			document.getElementById("div_timer").style.display="none";
		} 
	}

	$(document).ready(function () {
		setInterval(function() {
			$("#nilai_final").load("grafik/grafik_nilai_final.php")
		}, 60 * 500);
		setInterval(function() {
			$("#nilai_murni").load("grafik/grafik_nilai_murni.php")
		}, 60 * 500);
		setInterval(function() {
			$("#nilai_kreasi").load("grafik/grafik_nilai_kreasi.php")
		}, 60 * 500);
		setInterval(function() {
			$("#nilai_variasi").load("grafik/grafik_nilai_variasi.php")
		}, 60 * 500);
		setInterval(function() {
			$("#nilai_formasi").load("grafik/grafik_nilai_formasi.php")
		}, 60 * 500);
		setInterval(function() {
			$("#nilai_danton").load("grafik/grafik_nilai_danton.php")
		}, 60 * 500);
		// setInterval(function() {
		// 	$("#nilai_supporter").load("grafik/grafik_nilai_supporter.php")
		// }, 60 * 500);
		setInterval(function() {
			$("#nilai_kostum").load("grafik/grafik_nilai_kostum.php")
		}, 60 * 500);
	})
</script>
