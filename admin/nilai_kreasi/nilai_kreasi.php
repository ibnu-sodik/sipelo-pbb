<link href="<?= base_url() ?>/assets/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/select2-bootstrap.min.css">
<script src="<?= base_url() ?>/assets/js/select2.min.js"></script>

<h1 class="mt-4">Nilai Kreasi</h1>
<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item active">Data Nilai Kreasi</li>
</ol>

<a href="#" class="btn btn-primary mb-2" data-target="#ModalAddNilaiKreasi" data-toggle="modal" title="Tambah Nilai Kreasi">
	<i class="fa fa-plus mr-1"></i> Tambah Nilai Kreasi
</a>

<div class="card mb-4">
	<div class="card-header">
		<i class="fas fa-table mr-1"></i>
		DataTable Nilai Kreasi
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
						<th class="text-center">Gerakan 1</th>
						<th class="text-center">Gerakan 2</th>
						<th class="text-center">Gerakan 3</th>
						<th class="text-center">Gerakan 4</th>
						<th class="text-center">Gerakan 5</th>
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
						<th class="text-center">Gerakan 1</th>
						<th class="text-center">Gerakan 2</th>
						<th class="text-center">Gerakan 3</th>
						<th class="text-center">Gerakan 4</th>
						<th class="text-center">Gerakan 5</th>
						<th class="text-center">Total Nilai</th>
						<th class="text-center">Opsi</th>
					</tr>
				</tfoot>
				<tbody>
					<?php 
					$no=0;
					$SQL = $mysqli->query("SELECT nilai_kreasi.*, tb_peserta.* FROM nilai_kreasi LEFT JOIN tb_peserta ON nilai_kreasi.id_peserta = tb_peserta.id ORDER BY nama_peserta ASC");
					while($data=mysqli_fetch_assoc($SQL)):
						$no++;
						?>
						<tr>
							<td class="text-center"><?= $no; ?></td>
							<!-- <td class="text-center"><?= $data['no_peserta'] ?></td> -->
							<td class="text-center"><?= $data['nama_peserta'] ?></td>
							<td class="text-center"><?= $data['kelas'] ?></td>
							<td class="text-center"><?= $data['gerakan_1']; ?></td>
							<td class="text-center"><?= $data['gerakan_2']; ?></td>
							<td class="text-center"><?= $data['gerakan_3']; ?></td>
							<td class="text-center"><?= $data['gerakan_4']; ?></td>
							<td class="text-center"><?= $data['gerakan_5']; ?></td>
							<td class="text-center"><?= $data['total_nilai']; ?></td>
							<td class="text-center">
								<a href="javascript:void(0)" class="modal_edit_nilai_kreasi btn btn-warning btn-sm mb-1" data-target="#ModalEditNilaiKreasi" data-toggle="modal" id="<?=$data['id_k'];?>" title="Edit">
									<span class="fa fa-edit"></span>
								</a>

								<a href="javascript:void(0)" class="btn btn-danger btn-sm" data-target="#ModalDeleteNilaiKreasi" title="Hapus" onclick="konfir_hapus_kreasi('nilai_kreasi/proses_hapus.php?&id=<?php echo $data['id_k']; ?>');">
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

<div id="ModalAddNilaiKreasi" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Tambah Nilai Kreasi</h4>
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
								$SQL = $mysqli->query("SELECT * FROM tb_peserta ORDER BY nama_peserta ASC");
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
						<div class="col-md-4">
							<label for="gerakan_1">Gerakan 1</label>
							<input type="number" placeholder="Gerakan 1" name="gerakan_1" id="gerakan_1" class="form-control">
						</div>
						<div class="col-md-4">
							<label for="gerakan_2">Gerakan 2</label>
							<input type="number" placeholder="Gerakan 2" name="gerakan_2" id="gerakan_2" class="form-control">
						</div>
						<div class="col-md-4">
							<label for="gerakan_3">Gerakan 3</label>
							<input type="number" placeholder="Gerakan 3" name="gerakan_3" id="gerakan_3" class="form-control">
						</div>
						<div class="col-md-6">
							<label for="gerakan_4">Gerakan 4</label>
							<input type="number" placeholder="Gerakan 4" name="gerakan_4" id="gerakan_4" class="form-control">
						</div>
						<div class="col-md-6">
							<label for="gerakan_5">Gerakan 5</label>
							<input type="number" placeholder="Gerakan 5" name="gerakan_5" id="gerakan_5" class="form-control">
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
	$gerakan_1 	= sanitize($_POST['gerakan_1']);
	$gerakan_2 	= sanitize($_POST['gerakan_2']);
	$gerakan_3 	= sanitize($_POST['gerakan_3']);
	$gerakan_4 	= sanitize($_POST['gerakan_4']);
	$gerakan_5 	= sanitize($_POST['gerakan_5']);

	// validasi form tambah
	$errors = array();
	if (trim($id_peserta)=='') {
		$errors[] = "Mohon Pilih Peserta Terlebih Dahul.!";
	}

	$SQL2 = $mysqli->query("SELECT * FROM nilai_kreasi WHERE
		id_peserta = '$id_peserta'");
	if (mysqli_num_rows($SQL2)==1) {
		$errors[] = "Maaf, Nilai Tersebut Sudah Ada.";
	}

	if (!empty($errors)) {
		echo display_errors($errors);
	}else{
		$total_nilai = ((float)$gerakan_1+(float)$gerakan_2+(float)$gerakan_3+(float)$gerakan_4+(float)$gerakan_5);
		$mysqli->query("INSERT INTO nilai_kreasi SET
			id_peserta 	= '$id_peserta',
			gerakan_1 = '$gerakan_1',
			gerakan_2 = '$gerakan_2',
			gerakan_3 = '$gerakan_3',
			gerakan_4 = '$gerakan_4',
			gerakan_5 = '$gerakan_5',
			total_nilai = '$total_nilai'
			");
		$text = "Berhasil Menambahkan Nilai.! ";
		echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '');
	}
}
?>

<div id="ModalEditNilaiKreasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEdit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

		</div>
	</div>
</div>
<!-- modal delete -->
<div class="modal fade" id="ModalDeleteNilaiKreasi" >
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Anda Yakin Ingin Mneghapus Data Ini</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn btn-primary" id="link_hapus_kreasi">
					<span class="fa fa-check"></span> Ya
				</a>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-minus-square"></span> Tidak</button>

			</div>
		</div>
	</div>
</div>



<!-- In Final -->
<div id="ModalInFinalK" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">			
			<div class="modal-header">
				<h4 class="modal-title">Klik Ya Untuk Melanjutkan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>

			<div class="modal-footer">
				<a href="#" class="btn btn-primary" id="in_finalK">
					<span class="fa fa-check"></span> Ya
				</a>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-minus-square"></span> Tidak</button>

			</div>
		</div>
	</div>
</div>
<!-- Out Final -->
<div id="ModalOutFinalK" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">			
			<div class="modal-header">
				<h4 class="modal-title">Klik Ya Untuk Menghapus Data Dari Tabel Nilai Final</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>

			<div class="modal-footer">
				<a href="#" class="btn btn-primary" id="out_finalK">
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

		$("#dataTable").on('click', '.modal_edit_nilai_kreasi', function() {
			var m = $(this).attr("id");
			$.ajax({				
				url: "nilai_kreasi/modal_edit_nilai_kreasi.php",
				type: "GET",
				data: {id: m,},
				success: function(ajaxData){
					$("#ModalEditNilaiKreasi").html(ajaxData);
					$("#ModalEditNilaiKreasi").modal('show', {backdrop: 'static'});
					$('.select2').select2({
						theme: 'bootstrap',
						dropdownParent: $('#ModalEditNilaiKreasi')
					});
				}
			})
		})
	});

	function konfir_hapus_kreasi(delete_url){
		$('#ModalDeleteNilaiKreasi').modal('show', {backdrop: 'static'});
		document.getElementById('link_hapus_kreasi').setAttribute('href' , delete_url);
	}
</script>