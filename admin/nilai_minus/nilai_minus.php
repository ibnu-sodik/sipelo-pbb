<link href="<?= base_url() ?>/assets/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/select2-bootstrap.min.css">
<script src="<?= base_url() ?>/assets/js/select2.min.js"></script>

<h1 class="mt-4">Pengurangan Nilai</h1>
<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item active">Data Pengurangan Nilai</li>
</ol>

<a href="#" class="btn btn-primary mb-2" data-target="#ModalAddNilaiMinus" data-toggle="modal" title="Tambah Nilai Minus">
	<i class="fa fa-plus mr-1"></i> Tambah Nilai Minus
</a>
<div class="card mb-4">
	<div class="card-header">
		<i class="fa fa-table mr-1"></i>
		DataTable Pengurangan Nilai
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover table-bordered" id="dataTable">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<!-- <th class="text-center">Nomor Peserta</th> -->
						<th class="text-center">Nama Peserta</th>
						<th class="text-center">Kelas</th>
						<th class="text-center">Minus Upacara</th>
						<th class="text-center">Minus Anggota</th>
						<th class="text-center">Minus Perform</th>
						<th class="text-center">Minus Aba Aba</th>
						<th class="text-center">Total Nilai</th>
						<th class="text-center">Opsi</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th class="text-center">No</th>
						<!-- <th class="text-center">Nomor Peserta</th> -->
						<th class="text-center">Nama Peserta</th>
						<th class="text-center">Kelas</th>
						<th class="text-center">Minus Upacara</th>
						<th class="text-center">Minus Anggota</th>
						<th class="text-center">Minus Perform</th>
						<th class="text-center">Minus Aba Aba</th>
						<th class="text-center">Total Nilai</th>
						<th class="text-center">Opsi</th>
					</tr>
				</tfoot>
				<tbody>
					<?php 
					$no=0;
					$SQL = $mysqli->query("SELECT nilai_minus.*, tb_peserta.* FROM nilai_minus LEFT JOIN tb_peserta ON nilai_minus.id_peserta = tb_peserta.id ORDER BY nama_peserta ASC");
					while($data=mysqli_fetch_assoc($SQL)):
						$no++;
						$st_upacara = (
							$data['upacara_telat']+
							$data['upacara_tidak']);
						$st_anggota = (
							$data['anggota_kurang']+
							$data['anggota_tak_sesuai']+
							$data['danton_tak_sesuai']+
							$data['atribut_tak_sesuai']);
						$st_perform = (
							$data['atribut_lepas']+
							$data['apatis']+
							$data['tak_siap_tampil']);
						$st_aba = (
							$data['aba_tak_urut']+
							$data['aba_terlewat']+
							$data['aba_salah']+
							$data['pingsan']+
							$data['danton_pingsan']+
							$data['lewat_garis']);
							?>
							<tr>
								<td class="text-center"><?= $no ?></td>
								<!-- <td class="text-center"><?= $data['no_peserta'] ?></td> -->
								<td class="text-center"><?= $data['nama_peserta'] ?></td>
								<td class="text-center"><?= $data['kelas'] ?></td>
								<td class="text-center"><?= $st_upacara ?></td>
								<td class="text-center"><?= $st_anggota ?></td>
								<td class="text-center"><?= $st_perform ?></td>
								<td class="text-center"><?= $st_aba ?></td>
								<td class="text-center"><?=$data['total_nilai']?></td>
								<td class="text-center">
									<a href="javascript:void(0)" class="modal_edit_nilai_minus btn btn-warning btn-sm mb-1" data-target="#ModalEditNilaiMinus" data-toggle="modal" id="<?=$data['id_nm'];?>" title="Edit">
										<span class="fa fa-edit"></span>
									</a>

									<a href="javascript:void(0)" class="btn btn-danger btn-sm" data-target="#ModalDeleteNilaiMinus" title="Hapus" onclick="konfir_hapus_minus('nilai_minus/proses_hapus.php?&id=<?php echo $data['id_nm']; ?>');">
										<span class="fa fa-trash"></span>
									</a>
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div id="ModalAddNilaiMinus" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl modal-dialog-centered">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Tambah Nilai Minus</h4>
					<button class="close" type="button" data-dismiss="modal" aria-hidden="true">X</button>
				</div>
				<form method="POST" action="">
					<div class="modal-body">
						<div class="row">

							<div class="col-md-12 mb-2">
								<label for="id_peserta">Pilih Peserta</label>
								<select name="id_peserta" id="id_peserta" class="form-control">
									<option value="">----- PIlih Peserta -----</option>
									<?php 
									$SQL = $mysqli->query("SELECT * FROM tb_peserta ORDER BY no_peserta ASC");
									while ($data = mysqli_fetch_assoc($SQL)) {
										if ($data['id']==$dataIdPeserta) {
											$cek = " selected";
										}else{
											echo "<option value='$data[id]' $cek>$data[nama_peserta]</option>";
										}
									}
									?>
								</select>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 mb-2">
								<button disabled type="button" class="btn btn-block btn-info">Upacara</button>
							</div>
							<div class="col-md-6">
								<label for="upacara_telat">Terlambat Upacara -200</label>
								<input type="number" placeholder="Terlambat Upacara" name="upacara_telat" id="upacara_telat" class="form-control">
							</div>
							<div class="col-md-6 mb-2">
								<label for="upacara_tidak">Tidak Ikut Upacara -300</label>
								<input type="number" placeholder="Tidak Ikut Upacara" name="upacara_tidak" id="upacara_tidak" class="form-control">
							</div>
							<div class="col-md-12 mb-2">
								<button disabled type="button" class="btn btn-block btn-primary">Anggota</button>
							</div>
							<div class="col-md-6">
								<label for="anggota_kurang">Anggota Kurang -50/p</label>
								<input type="number" placeholder="Anggota Kurang" name="anggota_kurang" id="anggota_kurang" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="anggota_tak_sesuai">Anggota Tak Sesuai Form -50/p</label>
								<input type="number" placeholder="Anggota Tak Sesuai Form" name="anggota_tak_sesuai" id="anggota_tak_sesuai" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="danton_tak_sesuai">Danton Tak Sesuai Form -100</label>
								<input type="number" placeholder="Danton Tak Sesuai Form" name="danton_tak_sesuai" id="danton_tak_sesuai" class="form-control">
							</div>
							<div class="col-md-6 mb-2">
								<label for="atribut_tak_sesuai">Atribut Tak Sesuai Form -10/p</label>
								<input type="number" placeholder="Atribut Tak Sesuai Form" name="atribut_tak_sesuai" id="atribut_tak_sesuai" class="form-control">
							</div>

							<div class="col-md-12 mb-2">
								<button disabled type="button" class="btn btn-block btn-warning">Perform</button>
							</div>
							<div class="col-md-4">
								<label for="atribut_lepas">Atribut Lepas -15/p</label>
								<input type="number" placeholder="Atribut Lepas" name="atribut_lepas" id="atribut_lepas" class="form-control">
							</div>
							<div class="col-md-4">
								<label for="apatis">Apatis -100</label>
								<input type="number" placeholder="Apatis" name="apatis" id="apatis" class="form-control">
							</div>
							<div class="col-md-4 mb-2">
								<label for="tak_siap_tampil">Tak Siap Tampil -250</label>
								<input type="number" placeholder="Danton Tak Siap Tampil" name="tak_siap_tampil" id="tak_siap_tampil" class="form-control">
							</div>
							<div class="col-md-12 mb-2">
								<button disabled type="button" class="btn btn-block btn-danger">Aba Aba</button>
							</div>
							<div class="col-md-4">
								<label for="aba_tak_urut">Aba Aba Tidak Urut -50</label>
								<input type="number" placeholder="Aba Aba Tidak Urut" name="aba_tak_urut" id="aba_tak_urut" class="form-control">
							</div>
							<div class="col-md-4">
								<label for="aba_terlewat">Aba Aba Terlewat -50</label>
								<input type="number" placeholder="Ab Aba Terlewat" name="aba_terlewat" id="aba_terlewat" class="form-control">
							</div>
							<div class="col-md-4">
								<label for="aba_salah">Aba Aba Danton Salah -100</label>
								<input type="number" placeholder="Aba Aba Danton Salah" name="aba_salah" id="aba_salah" class="form-control">
							</div>
							<div class="col-md-4">
								<label for="pingsan">Peserta Pingsan -15/p</label>
								<input type="number" placeholder="Peserta Pingsan" name="pingsan" id="pingsan" class="form-control">
							</div>
							<div class="col-md-4">
								<label for="danton_pingsan">Danton Pingsan -100</label>
								<input type="number" placeholder="Danton Pingsan" name="danton_pingsan" id="danton_pingsan" class="form-control">
							</div>
							<div class="col-md-4">
								<label for="lewat_garis">Melewati Garis -20/p</label>
								<input type="number" placeholder="Melewati Garis" name="lewat_garis" id="lewat_garis" class="form-control">
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button class="btn btn-md btn-success" type="submit" name="simpan"><span class="fa fa-save"></span> Simpan</button>

						<button type="reset" class="btn btn-md btn-danger"  data-dismiss="modal" aria-hidden="true"><span class="fa fa-exclamation"></span> Tutup</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php 
	if (isset($_POST['simpan'])) {
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
			id_peserta = '$id_peserta'");
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
			$mysqli->query("INSERT INTO nilai_minus SET
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
				total_nilai = '$total_nilai'
				");
			$text = "Berhasil Menambahkan Data.! ";
			echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '');
		}
	}
	?>

	<div id="ModalEditNilaiMinus" class="modal fade" role="dialog" aria-labelledby="myModalLabelEdit" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

			</div>
		</div>
	</div>
	<!-- modal delete -->
	<div class="modal fade" id="ModalDeleteNilaiMinus" >
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Anda Yakin Ingin Mneghapus Data Ini</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-primary" id="link_hapus_minus">
						<span class="fa fa-check"></span> Ya
					</a>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-minus-square"></span> Tidak</button>

				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#dataTable').DataTable({
				responsive: {
					details: false
				}
			});

			$('#id_peserta').select2({
				theme: 'bootstrap',
				width: 'resolve'
			});

			$("#dataTable").on('click', '.modal_edit_nilai_minus', function() {
				var m = $(this).attr("id");
				$.ajax({
					url: "nilai_minus/modal_edit_nilai_minus.php",
					type: "GET",
					data: {id: m,},
					success: function(ajaxData){
						$("#ModalEditNilaiMinus").html(ajaxData);
						$("#ModalEditNilaiMinus").modal('show', {backdrop: 'static'});
						$('.select2').select2({
							theme: 'bootstrap',
							dropdownParent: $('#ModalEditNilaiMinus')
						});
					}
				});
			});
		});

		function konfir_hapus_minus(delete_url){
			$('#ModalDeleteNilaiMinus').modal('show', {backdrop: 'static'});
			document.getElementById('link_hapus_minus').setAttribute('href' , delete_url);
		}
	</script>