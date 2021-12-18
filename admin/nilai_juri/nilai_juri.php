
<link href="<?= base_url() ?>/assets/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/select2-bootstrap.min.css">
<script src="<?= base_url() ?>/assets/js/select2.min.js"></script>
<?php 
if (@$_GET['act']=='') {
// nilai data pada form tambah nilai
	$dataIdPeserta = isset($_POST['id_peserta'])?$_POST['id_peserta']:'';

	?>

	<h1 class="mt-4">Nilai Kostum</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active">Data Nilai Kostum</li>
	</ol>

	<a href="#" class="btn btn-primary mb-2" data-target="#ModalAddNilaiJuri" data-toggle="modal" title="Tambah Nilai Kostum">
		<i class="fa fa-plus mr-1"></i> Tambah Nilai Kostum
	</a>

	<div class="card mb-4">
		<div class="card-header">
			<i class="fas fa-table mr-1"></i>
			DataTable Nilai Kostum
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
							<th class="text-center">Bahan</th>
							<th class="text-center">Kerumitan Kostum</th>
							<th class="text-center">Kesesuaian Tema</th>
							<th class="text-center">Keselarasan</th>
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
							<th class="text-center">Bahan</th>
							<th class="text-center">Kerumitan Kostum</th>
							<th class="text-center">Kesesuaian Tema</th>
							<th class="text-center">Keselarasan</th>
							<th class="text-center">Total Nilai</th>
							<th class="text-center">Opsi</th>
						</tr>
					</tfoot>
					<tbody>
						<?php 
						$no=0;
						$SQL = $mysqli->query("SELECT nilai_juri.*, tb_peserta.* FROM nilai_juri LEFT JOIN tb_peserta ON nilai_juri.id_peserta = tb_peserta.id ORDER BY nama_peserta ASC");
						while($data=mysqli_fetch_assoc($SQL)):
							$no++;
							$juri_5 = ($data['nilai_bahan_kostum'] + $data['nilai_kerumitan_kostum'])+($data['nilai_tema_kostum']+$data['nilai_selaras_kostum']);
							?>
							<tr>
								<td class="text-center"><?= $no; ?></td>
								<!-- <td class="text-center"><?= $data['no_peserta'] ?></td> -->
								<td class="text-center"><?= $data['nama_peserta'] ?></td>
								<td class="text-center"><?= $data['kelas'] ?></td>
								<td class="text-center"><?= $data['nilai_bahan_kostum']; ?></td>
								<td class="text-center"><?= $data['nilai_kerumitan_kostum']; ?></td>
								<td class="text-center"><?= $data['nilai_tema_kostum']; ?></td>
								<td class="text-center"><?= $data['nilai_selaras_kostum']; ?></td>
								<td class="text-center"><?= $data['total_nilai']; ?></td>
								<td class="text-center">
									<a href="javascript:void(0)" class="modal_edit_nilai_juri btn btn-warning btn-sm mb-1" data-target="#ModalEditNilaiJuri" data-toggle="modal" id="<?=$data['id_nj'];?>" title="Edit">
										<span class="fa fa-edit"></span>
									</a>

									<a href="javascript:void(0)" class="btn btn-danger btn-sm" data-target="#ModalDeleteNilaiJuri" title="Hapus" onclick="konfir_hapus_nj('nilai_juri/proses_hapus.php?&id=<?php echo $data['id_nj']; ?>');">
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

	<div id="ModalAddNilaiJuri" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl modal-dialog-centered">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Tambah Nilai Juri</h4>
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
							<div class="col-md-3">
								<label for="nilai_bahan_kostum">Kualitas Bahan</label>
								<input type="number" placeholder="Kualitas Bahan" name="nilai_bahan_kostum" id="nilai_bahan_kostum" class="form-control">
							</div>
							<div class="col-md-3">
								<label for="nilai_kerumitan_kostum">Kerumitan Kostum</label>
								<input type="number" placeholder="Kerumitan Kostum" name="nilai_kerumitan_kostum" id="nilai_kerumitan_kostum" class="form-control">
							</div>
							<div class="col-md-3">
								<label for="nilai_tema_kostum">Kesesuaian Tema</label>
								<input type="number" placeholder="Kesesuaian Tema" name="nilai_tema_kostum" id="nilai_tema_kostum" class="form-control">
							</div>
							<div class="col-md-3">
								<label for="nilai_selaras_kostum">Keselarasan Kostum</label>
								<input type="number" placeholder="Keselarasan Kostum" name="nilai_selaras_kostum" id="nilai_selaras_kostum" class="form-control">
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
		$nilai_bahan_kostum 	= sanitize($_POST['nilai_bahan_kostum']);
		$nilai_kerumitan_kostum = sanitize($_POST['nilai_kerumitan_kostum']);
		$nilai_tema_kostum 		= sanitize($_POST['nilai_tema_kostum']);
		$nilai_selaras_kostum 	= sanitize($_POST['nilai_selaras_kostum']);

	// validasi form tambah
		$errors = array();
		if (trim($id_peserta)=='') {
			$errors[] = "Mohon Pilih Peserta Terlebih Dahul.!";
		}

		$SQL2 = $mysqli->query("SELECT * FROM nilai_juri WHERE
			id_peserta = '$id_peserta'
			");
		if (mysqli_num_rows($SQL2)==1) {
			$errors[] = "Maaf, Nilai Tersebut Sudah Ada.";
		}

		if (!empty($errors)) {
			echo display_errors($errors);
		}else{
			$total_nilai = (
				$nilai_bahan_kostum+
				$nilai_kerumitan_kostum+
				$nilai_tema_kostum+
				$nilai_selaras_kostum
			);
			$mysqli->query("INSERT INTO nilai_juri SET
				id_peserta 	= '$id_peserta',
				nilai_bahan_kostum = '$nilai_bahan_kostum',
				nilai_kerumitan_kostum = '$nilai_kerumitan_kostum',
				nilai_tema_kostum = '$nilai_tema_kostum',
				nilai_selaras_kostum = '$nilai_selaras_kostum',
				total_nilai = '$total_nilai'
				");
			$text = "Berhasil Menambahkan Nilai.! ";
			echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '');
		}
	}
	?>

	<div id="ModalEditNilaiJuri" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEdit" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

			</div>
		</div>
	</div>
	<!-- modal delete -->
	<div class="modal fade" id="ModalDeleteNilaiJuri" >
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Anda Yakin Ingin Mneghapus Data Ini</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-primary" id="link_hapus_nj">
						<span class="fa fa-check"></span> Ya
					</a>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-minus-square"></span> Tidak</button>

				</div>
			</div>
		</div>
	</div>
	<?php
} elseif (@$_GET['act']=='del') {
	$hapus = $mysqli->query("DELETE FROM nilai_juri WHERE id_nj='$_GET[id]'");
	if ($hapus) {
		$text = "Berhasil Menghapus Data.!";
		echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '?page=juri');
	}
}
?>
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

		$("#dataTable").on('click', '.modal_edit_nilai_juri', function() {
			var m = $(this).attr("id");
			$.ajax({
				url: "nilai_juri/modal_edit_nilai_juri.php",
				type: "GET",
				data: {id: m,},
				success: function(ajaxData){
					$("#ModalEditNilaiJuri").html(ajaxData);
					$("#ModalEditNilaiJuri").modal('show', {backdrop: 'static'});
					$('.select2').select2({
						theme: 'bootstrap',
						dropdownParent: $('#ModalEditNilaiJuri')
					});
				}
			});
		});
	});

	function konfir_hapus_nj(delete_url){
		$('#ModalDeleteNilaiJuri').modal('show', {backdrop: 'static'});
		document.getElementById('link_hapus_nj').setAttribute('href' , delete_url);
	}
</script>