<link href="<?= base_url() ?>/assets/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/select2-bootstrap.min.css">
<script src="<?= base_url() ?>/assets/js/select2.min.js"></script>

<h1 class="mt-4">Nilai Danton</h1>
<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item active">Data Nilai Danton</li>
</ol>

<a href="#" class="btn btn-primary mb-2" data-target="#ModalAddNilaiDanton" data-toggle="modal" title="Tambah Nilai Danton">
	<i class="fa fa-plus mr-1"></i> Tambah Nilai Danton
</a>

<div class="card mb-4">
	<div class="card-header">
		<i class="fas fa-table mr-1"></i>
		DataTable Nilai Danton
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<!-- <th class="text-center">Nomor Peserta</th> -->
						<th class="text-center">Nama Peserta</th>
						<th class="text-center">Kelas</th>
						<th class="text-center">Nilai Suara</th>
						<th class="text-center">Nilai Artikulasi</th>
						<th class="text-center">Nilai Urutan Aba Aba</th>
						<th class="text-center">Nilai Expresi</th>
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
						<th class="text-center">Nilai Suara</th>
						<th class="text-center">Nilai Artikulasi</th>
						<th class="text-center">Nilai Urutan Aba Aba</th>
						<th class="text-center">Nilai Expresi</th>
						<th class="text-center">Total Nilai</th>
						<th class="text-center">Opsi</th>
					</tr>
				</tfoot>
				<tbody>
					<?php 
					$no=0;
					$SQL = $mysqli->query("SELECT nilai_danton.*, tb_peserta.* FROM nilai_danton LEFT JOIN tb_peserta ON nilai_danton.id_peserta = tb_peserta.id ORDER BY nama_peserta ASC");
					while($data=mysqli_fetch_assoc($SQL)):
						$no++;
						$st_suara = (
							$data['suara']+
							$data['suara2']+
							$data['suara3']+
							$data['suara4']);
						$st_artikulasi = (
							$data['artikulasi']+
							$data['artikulasi2']+
							$data['artikulasi3']+
							$data['artikulasi4']);
						$st_urutan_aba = (
							$data['urutan_aba']+
							$data['urutan_aba2']+
							$data['urutan_aba3']+
							$data['urutan_aba4']);
						$st_expresi = (
							$data['expresi']+
							$data['expresi2']+
							$data['expresi3']+
							$data['expresi4']);
							?>
							<tr>
								<td class="text-center"><?= $no; ?></td>
								<!-- <td class="text-center"><?= $data['no_peserta'] ?></td> -->
								<td class="text-center"><?= $data['nama_peserta'] ?></td>
								<td class="text-center"><?= $data['kelas'] ?></td>
								<td class="text-center"><?= $st_suara; ?></td>
								<td class="text-center"><?= $st_artikulasi; ?></td>
								<td class="text-center"><?= $st_urutan_aba; ?></td>
								<td class="text-center"><?= $st_expresi; ?></td>
								<td class="text-center"><?= $data['total_nilai']; ?></td>
								<td class="text-center">
									<a href="javascript:void(0)" class="modal_edit_nilai_danton btn btn-warning btn-sm mb-1" data-target="#ModalEditNilaiDanton" data-toggle="modal" id="<?=$data['id_d'];?>" title="Edit">
										<span class="fa fa-edit"></span>
									</a>

									<a href="javascript:void(0)" class="btn btn-danger btn-sm" data-target="#ModalDeleteNilaiDanton" title="Hapus" onclick="konfir_hapus_danton('nilai_danton/proses_hapus.php?&id=<?php echo $data['id_d']; ?>');">
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

	<div id="ModalAddNilaiDanton" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl modal-dialog-centered">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Tambah Nilai Danton</h4>
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
								<button disabled type="button" class="btn btn-block btn-info">Juri 1</button>
							</div>
							<div class="col-md-3">
								<label for="suara">Suara</label>
								<input type="number" placeholder="Suara" name="suara" id="suara" class="form-control">
							</div>
							<div class="col-md-3">
								<label for="artikulasi">Artikulasi</label>
								<input type="number" placeholder="Artikulasi" name="artikulasi" id="artikulasi" class="form-control">
							</div>
							<div class="col-md-3">
								<label for="urutan_aba">Urutan Aba Aba</label>
								<input type="number" placeholder="Urutan Aba Aba" name="urutan_aba" id="urutan_aba" class="form-control">
							</div>
							<div class="col-md-3 mb-2">
								<label for="expresi">Expresi</label>
								<input type="number" placeholder="Expresi" name="expresi" id="expresi" class="form-control">
							</div>
							<!-- 2 -->
							<div class="col-md-12 mb-2">
								<button disabled type="button" class="btn btn-block btn-primary">Juri 2</button>
							</div>
							<div class="col-md-3">
								<label for="suara2">Suara</label>
								<input type="number" placeholder="Suara" name="suara2" id="suara2" class="form-control">
							</div>
							<div class="col-md-3">
								<label for="artikulasi2">Artikulasi</label>
								<input type="number" placeholder="Artikulasi" name="artikulasi2" id="artikulasi2" class="form-control">
							</div>
							<div class="col-md-3">
								<label for="urutan_aba2">Urutan Aba Aba</label>
								<input type="number" placeholder="Urutan Aba Aba" name="urutan_aba2" id="urutan_aba2" class="form-control">
							</div>
							<div class="col-md-3 mb-2">
								<label for="expresi2">Expresi</label>
								<input type="number" placeholder="Expresi" name="expresi2" id="expresi2" class="form-control">
							</div>
							<!-- 3 -->						
							<div class="col-md-12 mb-2">
								<button disabled type="button" class="btn btn-block btn-warning">Juri 3</button>
							</div>
							<div class="col-md-3">
								<label for="suara3">Suara</label>
								<input type="number" placeholder="Suara" name="suara3" id="suara3" class="form-control">
							</div>
							<div class="col-md-3">
								<label for="artikulasi3">Artikulasi</label>
								<input type="number" placeholder="Artikulasi" name="artikulasi3" id="artikulasi3" class="form-control">
							</div>
							<div class="col-md-3">
								<label for="urutan_aba3">Urutan Aba Aba</label>
								<input type="number" placeholder="Urutan Aba Aba" name="urutan_aba3" id="urutan_aba3" class="form-control">
							</div>
							<div class="col-md-3 mb-2">
								<label for="expresi3">Expresi</label>
								<input type="number" placeholder="Expresi" name="expresi3" id="expresi3" class="form-control">
							</div>
							<!-- 4 -->						
							<div class="col-md-12 mb-2">
								<button disabled type="button" class="btn btn-block btn-danger">Juri 4</button>
							</div>
							<div class="col-md-3">
								<label for="suara4">Suara</label>
								<input type="number" placeholder="Suara" name="suara4" id="suara4" class="form-control">
							</div>
							<div class="col-md-3">
								<label for="artikulasi4">Artikulasi</label>
								<input type="number" placeholder="Artikulasi" name="artikulasi4" id="artikulasi4" class="form-control">
							</div>
							<div class="col-md-3">
								<label for="urutan_aba4">Urutan Aba Aba</label>
								<input type="number" placeholder="Urutan Aba Aba" name="urutan_aba4" id="urutan_aba4" class="form-control">
							</div>
							<div class="col-md-3 mb-2">
								<label for="expresi4">Expresi</label>
								<input type="number" placeholder="Expresi" name="expresi4" id="expresi4" class="form-control">
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
	<!-- proses tambah data -->
	<?php 

	if (isset($_POST['simpan'])) {
		$id_peserta = sanitize($_POST['id_peserta']);
		$suara 	= sanitize($_POST['suara']);
		$artikulasi 	= sanitize($_POST['artikulasi']);
		$urutan_aba 	= sanitize($_POST['urutan_aba']);
		$expresi 	= sanitize($_POST['expresi']);
	// 2
		$suara2 	= sanitize($_POST['suara2']);
		$artikulasi2 	= sanitize($_POST['artikulasi2']);
		$urutan_aba2 	= sanitize($_POST['urutan_aba2']);
		$expresi2 	= sanitize($_POST['expresi2']);
	// 3
		$suara3 	= sanitize($_POST['suara3']);
		$artikulasi3 	= sanitize($_POST['artikulasi3']);
		$urutan_aba3 	= sanitize($_POST['urutan_aba3']);
		$expresi3 	= sanitize($_POST['expresi3']);
	// 4
		$suara4 	= sanitize($_POST['suara4']);
		$artikulasi4 	= sanitize($_POST['artikulasi4']);
		$urutan_aba4 	= sanitize($_POST['urutan_aba4']);
		$expresi4	= sanitize($_POST['expresi4']);

	// validasi form tambah
		$errors = array();
		if (trim($id_peserta)=='') {
			$errors[] = "Mohon Pilih Peserta Terlebih Dahul.!";
		}

		$SQL2 = $mysqli->query("SELECT * FROM nilai_danton WHERE
			id_peserta = '$id_peserta'");
		if (mysqli_num_rows($SQL2)==1) {
			$errors[] = "Maaf, Nilai Tersebut Sudah Ada.";
		}

		if (!empty($errors)) {
			echo display_errors($errors);
		}else{
			$st_suara = (
				(float)$suara+
				(float)$suara2+
				(float)$suara3+
				(float)$suara4);
			$st_artikulasi = (
				(float)$artikulasi+
				(float)$artikulasi2+
				(float)$artikulasi3+
				(float)$artikulasi4);
			$st_urutan_aba = (
				(float)$urutan_aba+
				(float)$urutan_aba2+
				(float)$urutan_aba3+
				(float)$urutan_aba4);
			$st_expresi = (
				(float)$expresi+
				(float)$expresi2+
				(float)$expresi3+
				(float)$expresi4);
			$total_nilai = ($st_suara+$st_artikulasi+$st_urutan_aba+$st_expresi);
			$mysqli->query("INSERT INTO nilai_danton SET
				id_peserta 	= '$id_peserta',
				suara = '$suara',
				artikulasi = '$artikulasi',
				urutan_aba = '$urutan_aba',
				expresi = '$expresi',

				suara2 = '$suara2',
				artikulasi2 = '$artikulasi2',
				urutan_aba2 = '$urutan_aba2',
				expresi2 = '$expresi2',

				suara3 = '$suara3',
				artikulasi3 = '$artikulasi3',
				urutan_aba3 = '$urutan_aba3',
				expresi3 = '$expresi3',

				suara4 = '$suara4',
				artikulasi4 = '$artikulasi4',
				urutan_aba4 = '$urutan_aba4',
				expresi4 = '$expresi4',

				total_nilai = '$total_nilai'
				");
			$text = "Berhasil Menambahkan Nilai.! ";
			echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '');
		}
	}
	?>

	<div id="ModalEditNilaiDanton" class="modal fade" role="dialog" aria-labelledby="myModalLabelEdit" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

			</div>
		</div>
	</div>
	<!-- modal delete -->
	<div class="modal fade" id="ModalDeleteNilaiDanton" >
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Anda Yakin Ingin Mneghapus Data Ini</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-primary" id="link_hapus_danton">
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

			$("#dataTable").on('click', '.modal_edit_nilai_danton', function() {
				var m = $(this).attr("id");
				$.ajax({
					url: "nilai_danton/modal_edit_nilai_danton.php",
					type: "GET",
					data: {id: m,},
					success: function(ajaxData){
						$("#ModalEditNilaiDanton").html(ajaxData);
						$("#ModalEditNilaiDanton").modal('show', {backdrop: 'static'});
						$('.select2').select2({
							theme: 'bootstrap',
							dropdownParent: $('#ModalEditNilaiDanton')
						});
					}
				});
			});
		});

		function konfir_hapus_danton(delete_url){
			$('#ModalDeleteNilaiDanton').modal('show', {backdrop: 'static'});
			document.getElementById('link_hapus_danton').setAttribute('href' , delete_url);
		}
	</script>