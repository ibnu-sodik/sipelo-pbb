<h1 class="mt-4">Juara</h1>
<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item active">Data Juara</li>
</ol>

<div class="col-xl-12">
	<div class="row">

		<div class="col-md-4">
			<div class="card mb-3">
				<h5 class="card-header text-center">PBB MURNI</h5>
				<div class="card-body text-center" id="pbbMurni" style="display: none;">
					<i class="fa fa-star fa-7x"></i>
					<?php 
					$SQL = $mysqli->query("SELECT id,nama_peserta,kelas,id_peserta,nilai FROM tb_peserta a
						LEFT JOIN(SELECT id_peserta, MAX(total_nilai) as nilai FROM nilai_gerakan GROUP BY id_peserta ) b on a.id = b.id_peserta
						ORDER BY nilai DESC
						LIMIT 1;");
					$data=mysqli_fetch_assoc($SQL);
					?>
					<h3 class="card-title"><?= $data['nama_peserta'] ?></h3>
					<a href="#" class="btn btn-primary btn-lg">Total Nilai : <?= $data['nilai'] ?></a>
				</div>
				<div class="card-footer text-center">
					<button id="tampilPbbMurni" class="btn btn-primary">Tampilkan Juara <i class="fa fa-eye"></i></button>
					<h3 id="countdownMurni"></h3>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card mb-3">
				<h5 class="card-header text-center">PBB KREASI</h5>
				<div class="card-body text-center" id="pbbKreasi" style="display: none;">
					<i class="fa fa-star fa-7x"></i>
					<?php 
					$SQL = $mysqli->query("SELECT id,nama_peserta,kelas,id_peserta,nilai FROM tb_peserta a
						LEFT JOIN(SELECT id_peserta, MAX(total_nilai) as nilai FROM nilai_kreasi GROUP BY id_peserta ) b on a.id = b.id_peserta
						ORDER BY nilai DESC
						LIMIT 1;");
					$data=mysqli_fetch_assoc($SQL);
					?>
					<h3 class="card-title"><?= $data['nama_peserta'] ?></h3>
					<a href="#" class="btn btn-primary btn-lg">Total Nilai : <?= $data['nilai'] ?></a>
				</div>
				<div class="card-footer text-center">
					<button id="tampilPbbKresi" class="btn btn-primary">Tampilkan Juara <i class="fa fa-eye"></i></button>
					<h3 id="countdownKreasi"></h3>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card mb-3">
				<h5 class="card-header text-center">PBB FORMASI</h5>
				<div class="card-body text-center" id="pbbFormasi" style="display: none;">
					<i class="fa fa-star fa-7x"></i>
					<?php 
					$SQL = $mysqli->query("SELECT id,nama_peserta,kelas,id_peserta,nilai FROM tb_peserta a
						LEFT JOIN(SELECT id_peserta, MAX(total_nilai) as nilai FROM nilai_formasi GROUP BY id_peserta ) b on a.id = b.id_peserta
						ORDER BY nilai DESC
						LIMIT 1;");
					$data=mysqli_fetch_assoc($SQL);
					?>
					<h3 class="card-title"><?= $data['nama_peserta'] ?></h3>
					<a href="#" class="btn btn-primary btn-lg">Total Nilai : <?= $data['nilai'] ?></a>
				</div>
				<div class="card-footer text-center">
					<button id="tampilPbbFormasi" class="btn btn-primary">Tampilkan Juara <i class="fa fa-eye"></i></button>
					<h3 id="countdownFormasi"></h3>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card mb-3">
				<h5 class="card-header text-center">PBB VARIASI</h5>
				<div class="card-body text-center" id="pbbVariasi" style="display: none;">
					<i class="fa fa-star fa-7x"></i>
					<?php 
					$SQL = $mysqli->query("SELECT id,nama_peserta,kelas,id_peserta,nilai FROM tb_peserta a
						LEFT JOIN(SELECT id_peserta, MAX(total_nilai) as nilai FROM nilai_variasi GROUP BY id_peserta ) b on a.id = b.id_peserta
						ORDER BY nilai DESC
						LIMIT 1;");
					$data=mysqli_fetch_assoc($SQL);
					?>
					<h3 class="card-title"><?= $data['nama_peserta'] ?></h3>
					<a href="#" class="btn btn-primary btn-lg">Total Nilai : <?= $data['nilai'] ?></a>
				</div>
				<div class="card-footer text-center">
					<button id="tampilPbbVariasi" class="btn btn-primary">Tampilkan Juara <i class="fa fa-eye"></i></button>
					<h3 id="countdownVariasi"></h3>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card mb-3">
				<h5 class="card-header text-center">Danton Terbaik</h5>
				<div class="card-body text-center" id="danton" style="display: none;">
					<i class="fa fa-star fa-7x"></i>
					<?php 
					$SQL = $mysqli->query("SELECT id,nama_peserta,kelas,id_peserta,nilai FROM tb_peserta a
						LEFT JOIN(SELECT id_peserta, MAX(total_nilai) as nilai FROM nilai_danton GROUP BY id_peserta ) b on a.id = b.id_peserta
						ORDER BY nilai DESC
						LIMIT 1;");
					$data=mysqli_fetch_assoc($SQL);
					?>
					<h3 class="card-title"><?= $data['nama_peserta'] ?></h3>
					<a href="#" class="btn btn-primary btn-lg">Total Nilai : <?= $data['nilai'] ?></a>
				</div>
				<div class="card-footer text-center">
					<button id="tampilDanton" class="btn btn-primary">Tampilkan Juara <i class="fa fa-eye"></i></button>
					<h3 id="countdownDanton"></h3>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card mb-3">
				<h5 class="card-header text-center">Kostum Terbaik</h5>
				<div class="card-body text-center" id="kostum" style="display: none;">
					<i class="fa fa-star fa-7x"></i>
					<?php 
					$SQL = $mysqli->query("SELECT id,nama_peserta,kelas,id_peserta,nilai FROM tb_peserta a
						LEFT JOIN(SELECT id_peserta, MAX(total_nilai) as nilai FROM nilai_juri GROUP BY id_peserta ) b on a.id = b.id_peserta
						ORDER BY nilai DESC
						LIMIT 1;");
					$data=mysqli_fetch_assoc($SQL);
					?>
					<h3 class="card-title"><?= $data['nama_peserta'] ?></h3>
					<a href="#" class="btn btn-primary btn-lg">Total Nilai : <?= $data['nilai'] ?></a>
				</div>
				<div class="card-footer text-center">
					<button id="tampilKostum" class="btn btn-primary">Tampilkan Juara <i class="fa fa-eye"></i></button>
					<h3 id="countdownKostum"></h3>
				</div>
			</div>
		</div>

		<div class="col-md-12 text-center">
			<div class="alert alert-warning" role="alert">
				<h3>Juara PBB GEMILANG tahun <?= date('Y') ?></h3>
				<button id="startClock" class="btn btn-primary">Tampilkan Juara <i class="fa fa-eye"></i></button>
				<h3 id="countdown"></h3>
			</div>
		</div>
		<div id="daftarJuara" class="col-md-12 row" style="display: none;">
			<?php 
			$SQL = $mysqli->query("SELECT id,nama_peserta,kelas,id_peserta,nilai FROM tb_peserta a
				LEFT JOIN(SELECT id_peserta, MAX(total_nilai) as nilai FROM nilai_final GROUP BY id_peserta ) b on a.id = b.id_peserta
				ORDER BY nilai DESC
				LIMIT 3;");
			$no=0;
			while($data=mysqli_fetch_assoc($SQL)):
				$no++;
				if ($no == 3) {
					$icon = "fa fa-medal fa-8x";
				}elseif ($no == 2) {
					$icon = "fa fa-award fa-8x";
				}elseif ($no == 1) {
					$icon = "fa fa-trophy fa-8x";
				}
				?>
				<div class="col-md-4">
					<div class="card mb-3">
						<h5 class="card-header text-center">JUARA <?= $no ?> PBB GEMILANG</h5>
						<div class="card-body text-center">
							<i class="<?= $icon ?>"></i>
							<h3 class="card-title"><?= $data['nama_peserta'] ?></h3>
							<a href="#" class="btn btn-primary btn-lg">Total Nilai : <?= $data['nilai'] ?></a>
						</div>
					</div>
				</div>
				<?php 
			endwhile;
			?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#startClock").click( function(){
		var counter = 6;
		setInterval(function() {
			counter--;
			if (counter >= 0) {
				$('#startClock').hide();
				span = document.getElementById("countdown");
				span.innerHTML = '<i class="fa fa-clock"></i> '+counter;
			}
			if (counter === 0) {
				$('#countdown').hide();
				$('#daftarJuara').show();
				// alert('sorry, out of time');
				clearInterval(counter);
			}
		}, 1000);
	});
	
	$("#tampilPbbMurni").click( function(){
		var counter = 6;
		setInterval(function() {
			counter--;
			if (counter >= 0) {
				$('#tampilPbbMurni').hide();
				span = document.getElementById("countdownMurni");
				span.innerHTML = '<i class="fa fa-clock"></i> '+counter;
			}
			if (counter === 0) {
				$('#countdownMurni').hide();
				$('#pbbMurni').show();
				// alert('sorry, out of time');
				clearInterval(counter);
			}
		}, 1000);
	});
	
	$("#tampilPbbKresi").click( function(){
		var counter = 6;
		setInterval(function() {
			counter--;
			if (counter >= 0) {
				$('#tampilPbbKresi').hide();
				span = document.getElementById("countdownKreasi");
				span.innerHTML = '<i class="fa fa-clock"></i> '+counter;
			}
			if (counter === 0) {
				$('#countdownKreasi').hide();
				$('#pbbKreasi').show();
				// alert('sorry, out of time');
				clearInterval(counter);
			}
		}, 1000);
	});
	
	$("#tampilPbbFormasi").click( function(){
		var counter = 6;
		setInterval(function() {
			counter--;
			if (counter >= 0) {
				$('#tampilPbbFormasi').hide();
				span = document.getElementById("countdownFormasi");
				span.innerHTML = '<i class="fa fa-clock"></i> '+counter;
			}
			if (counter === 0) {
				$('#countdownFormasi').hide();
				$('#pbbFormasi').show();
				// alert('sorry, out of time');
				clearInterval(counter);
			}
		}, 1000);
	});
	
	$("#tampilDanton").click( function(){
		var counter = 6;
		setInterval(function() {
			counter--;
			if (counter >= 0) {
				$('#tampilDanton').hide();
				span = document.getElementById("countdownDanton");
				span.innerHTML = '<i class="fa fa-clock"></i> '+counter;
			}
			if (counter === 0) {
				$('#countdownDanton').hide();
				$('#danton').show();
				// alert('sorry, out of time');
				clearInterval(counter);
			}
		}, 1000);
	});
	
	$("#tampilKostum").click( function(){
		var counter = 6;
		setInterval(function() {
			counter--;
			if (counter >= 0) {
				$('#tampilKostum').hide();
				span = document.getElementById("countdownKostum");
				span.innerHTML = '<i class="fa fa-clock"></i> '+counter;
			}
			if (counter === 0) {
				$('#countdownKostum').hide();
				$('#kostum').show();
				// alert('sorry, out of time');
				clearInterval(counter);
			}
		}, 1000);
	});
	
	$("#tampilPbbVariasi").click( function(){
		var counter = 6;
		setInterval(function() {
			counter--;
			if (counter >= 0) {
				$('#tampilPbbVariasi').hide();
				span = document.getElementById("countdownVariasi");
				span.innerHTML = '<i class="fa fa-clock"></i> '+counter;
			}
			if (counter === 0) {
				$('#countdownVariasi').hide();
				$('#pbbVariasi').show();
				// alert('sorry, out of time');
				clearInterval(counter);
			}
		}, 1000);
	});
</script>