<link href="<?= base_url() ?>/assets/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/select2-bootstrap.min.css">
<script src="<?= base_url() ?>/assets/js/select2.min.js"></script>

<h1 class="mt-4">Nilai Formasi</h1>
<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item active">Data Nilai Formasi</li>
</ol>

<a href="#" class="btn btn-primary mb-2" data-target="#ModalAddNilaiFormasi" data-toggle="modal" title="Tambah Nilai Formasi">
	<i class="fa fa-plus mr-1"></i> Tambah Nilai Formasi
</a>

<div class="card mb-4">
	<div class="card-header">
		<i class="fas fa-table mr-1"></i>
		DataTable Nilai Formasi
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
						<th class="text-center">Nilai Gerakan</th>
						<th class="text-center">Nilai Kekompakan</th>
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
						<th class="text-center">Nilai Gerakan</th>
						<th class="text-center">Nilai Kekompakan</th>
						<th class="text-center">Total Nilai</th>
						<th class="text-center">Opsi</th>
					</tr>
				</tfoot>
				<tbody>
					<?php 
					$no=0;
					$SQL = $mysqli->query("SELECT nilai_formasi.*, tb_peserta.* FROM nilai_formasi LEFT JOIN tb_peserta ON nilai_formasi.id_peserta = tb_peserta.id ORDER BY nama_peserta ASC");
					while($data=mysqli_fetch_assoc($SQL)):
						$no++;
						?>
						<tr>
							<td class="text-center"><?= $no; ?></td>
							<!-- <td class="text-center"><?= $data['no_peserta'] ?></td> -->
							<td class="text-center"><?= $data['nama_peserta'] ?></td>
							<td class="text-center"><?= $data['kelas'] ?></td>
							<td class="text-center"><?= $data['gerakan']; ?></td>
							<td class="text-center"><?= $data['kekompakan']; ?></td>
							<td class="text-center"><?= $data['total_nilai']; ?></td>
							<td class="text-center">
								<a href="javascript:void(0)" class="modal_edit_nilai_formasi btn btn-warning btn-sm mb-1" data-target="#ModalEditNilaiFormasi" data-toggle="modal" id="<?=$data['id_f'];?>" title="Edit">
									<span class="fa fa-edit"></span>
								</a>

								<a href="javascript:void(0)" class="btn btn-danger btn-sm" data-target="#ModalDeleteNilaiFormasi" title="Hapus" onclick="konfir_hapus_formasi('nilai_formasi/proses_hapus.php?&id=<?php echo $data['id_f']; ?>');">
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

<div id="ModalAddNilaiFormasi" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Tambah Nilai Formasi</h4>
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
						<div class="col-md-6">
							<label for="gerakan">Gerakan</label>
							<input type="number" placeholder="Gerakan" name="gerakan" id="gerakan" class="form-control">
						</div>
						<div class="col-md-6">
							<label for="kekompakan">Kekompakan</label>
							<input type="number" placeholder="Kekompakan" name="kekompakan" id="kekompakan" class="form-control">
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
	$gerakan 	= sanitize($_POST['gerakan']);
	$kekompakan 	= sanitize($_POST['kekompakan']);

	// validasi form tambah
	$errors = array();
	if (trim($id_peserta)=='') {
		$errors[] = "Mohon Pilih Peserta Terlebih Dahul.!";
	}

	$SQL2 = $mysqli->query("SELECT * FROM nilai_formasi WHERE
		id_peserta = '$id_peserta'");
	if (mysqli_num_rows($SQL2)==1) {
		$errors[] = "Maaf, Nilai Tersebut Sudah Ada.";
	}

	if (!empty($errors)) {
		echo display_errors($errors);
	}else{
		$total_nilai = ($gerakan+$kekompakan);
		$mysqli->query("INSERT INTO nilai_formasi SET
			id_peserta 	= '$id_peserta',
			gerakan = '$gerakan',
			kekompakan = '$kekompakan',
			total_nilai = '$total_nilai'
			");
		$text = "Berhasil Menambahkan Nilai.! ";
		echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '');
	}
}
?>

<div id="ModalEditNilaiFormasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEdit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

		</div>
	</div>
</div>
<!-- modal delete -->
<div class="modal fade" id="ModalDeleteNilaiFormasi" >
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Anda Yakin Ingin Mneghapus Data Ini</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn btn-primary" id="link_hapus_formasi">
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

		$("#dataTable").on('click', '.modal_edit_nilai_formasi', function() {
			var m = $(this).attr("id");
			$.ajax({
				url: "nilai_formasi/modal_edit_nilai_formasi.php",
				type: "GET",
				data: {id: m,},
				success: function(ajaxData){
					$("#ModalEditNilaiFormasi").html(ajaxData);
					$("#ModalEditNilaiFormasi").modal('show', {backdrop: 'static'});
					$('.select2').select2({
						theme: 'bootstrap',
						dropdownParent: $('#ModalEditNilaiFormasi')
					});
				}
			});			
		})
	});

	function konfir_hapus_formasi(delete_url){
		$('#ModalDeleteNilaiFormasi').modal('show', {backdrop: 'static'});
		document.getElementById('link_hapus_formasi').setAttribute('href' , delete_url);
	}
</script>