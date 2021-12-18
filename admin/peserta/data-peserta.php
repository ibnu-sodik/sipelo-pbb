<h1 class="mt-4">Peserta</h1>
<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item active">Data Peserta</li>
</ol>

<a href="#" class="btn btn-primary mb-2" data-target="#ModalAddPeserta" data-toggle="modal" title="Tambah Peserta">
	<i class="fa fa-plus mr-1"></i> Tambah Peserta
</a>

<div class="card mb-4">
	<div class="card-header">
		<i class="fas fa-table mr-1"></i>
		DataTable Peserta
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered display responsive nowrap" id="dataTable" width="100%">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<!-- <th class="text-center">Nomor Peserta</th> -->
						<th class="text-center">Nama Peserta</th>
						<th class="text-center">Kelas</th>
						<th class="text-center">Opsi</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th class="text-center">No</th>
						<!-- <th class="text-center">Nomor Peserta</th> -->
						<th class="text-center">Nama Peserta</th>
						<th class="text-center">Kelas</th>
						<th class="text-center">Opsi</th>
					</tr>
				</tfoot>
				<tbody>
					<?php 
					$no=0;
					$SQL = $mysqli->query("SELECT * FROM tb_peserta ORDER BY nama_peserta ASC");
					while($data=mysqli_fetch_assoc($SQL)):
						$no++;
						?>
						<tr>
							<td class="text-center"><?= $no; ?></td>
							<!-- <td class="text-center"><?= $data['no_peserta'] ?></td> -->
							<td><?= $data['nama_peserta']; ?></td>
							<td class="text-center"><?= $data['kelas']; ?></td>
							<td class="text-center">
								<a href="javascript:void(0)" class="modal_edit btn btn-sm btn-warning" data-id="<?=$data['id'];?>" data-nopes="<?=$data['no_peserta'];?>" data-nama="<?=$data['nama_peserta'];?>" data-kelas="<?=$data['kelas'];?>" title="Edit">
									<span class="fa fa-edit"></span>
								</a>

								<a href="javascript:void(0)" class="btn btn-danger btn-sm mb-1" data-target="#ModalDeletePeserta" data-toggle="modal" title="Hapus" onclick="konfir_hapus_peserta('peserta/proses_hapus.php?&id=<?php echo $data['id']; ?>');">
									<span class="fa fa-trash"></span>
								</a>
							</td>
						</tr>
						<?php 
					endwhile;
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- modal add -->
<div id="ModalAddPeserta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Tambah Peserta</h4>
				<button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<form action="" name="modal_form" method="POST">
				<div class="modal-body">

					<div class="form-group">
						<label for="no_peserta">Nomor Peserta</label>
						<input type="number" name="no_peserta" id="no_peserta" class="form-control">
					</div>

					<div class="form-group">
						<label for="nama_peserta">Nama Peserta</label>
						<input type="text" name="nama_peserta" id="nama_peserta" class="form-control">
					</div>

					<div class="form-group">
						<label for="kelas">Kelas</label>
						<input type="text" name="kelas" id="kelas" class="form-control">
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
	$no_peserta 	= sanitize($_POST['no_peserta']);
	$nama_peserta 	= sanitize($_POST['nama_peserta']);
	$kelas 			= sanitize($_POST['kelas']);

	// validasi
	$errors = array();
	if (trim($no_peserta)=="" OR ! is_numeric(trim($no_peserta))) {
		$errors[] = "Nomor Peserta Belum Diisi Atau Harus Dengan Angka.!";
	}
	if (trim($nama_peserta)=="") {
		$errors[] = "Nama Peserta Belum Diisi.!";
	}
	if (trim($kelas)=="") {
		$errors[] = "Kelas Belum Diisi.!";
	}

	$SQL2 = $mysqli->query("SELECT * FROM tb_peserta WHERE
		nama_peserta = '$nama_peserta' and
		kelas = '$kelas'
		");
	if (mysqli_num_rows($SQL2) == 1) {
		$errors[] = "Maaf, Peserta Yang Sama Dengan Data Persis ".$nama_peserta." Suda Ada.!";
	}

	if (!empty($errors)) {
		echo display_errors($errors);
	}else{
		$mysqli->query("INSERT INTO tb_peserta SET
			no_peserta 		= '$no_peserta',
			nama_peserta 	= '$nama_peserta',
			kelas 			= '$kelas'
			");
		$text = "Berhasil Menambahkan ".$nama_peserta;
		echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '');
	}
}
?>

<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEdit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabelEdit">Edit Peserta</h4>
				<button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<form action="peserta/proses_edit.php" name="modal_form" method="POST">
				<div class="modal-body">
					<input type="hidden" name="id">
					<div class="form-group">
						<label for="no_peserta2">Nomor Peserta</label>
						<input type="text" name="no_peserta2" id="no_peserta2" placeholder="Nomor Peserta" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="nama_peserta2">Nama Peserta</label>
						<input type="text" name="nama_peserta2" id="nama_peserta2" placeholder="Nama Peserta" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="kelas">Kelas</label>
						<input type="text" class="form-control" name="kelas" id="kelas2" placeholder="Kelas" required>
					</div>

				</div>

				<div class="modal-footer">
					<button class="btn btn-md btn-success" type="submit" name="simpan">
						<span class="fa fa-save"></span> Simpan
					</button>

					<button type="button" class="btn btn-md btn-danger"  data-dismiss="modal" aria-hidden="true">
						<span class="fa fa-exclamation"></span> Tutup
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- modal delete -->
<div class="modal fade" id="ModalDeletePeserta">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Anda Yakin Ingin Mneghapus Data Ini</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p class="text-justify">
					Data Pada 
					<ol type="1">
						<li>Nilai Final</li>
						<li>Nilai Gerakan PBB Murni</li>
						<li>Nilai Gerakan PBB Kreasi</li>
						<li>Nilai Gerakan PBB Formasi</li>
						<li>Nilai Gerakan PBB Variasi</li>
						<li>Nilai Danton</li>
						<li>Nilai Kostum</li>
						<li>Nilai Minus</li>
						<li>Nilai Supporter</li>
					</ol>
					Juga Akan Terhapus.!<br>Terus Lanjutkan.?
				</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn btn-primary" id="link_hapus_peserta">
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

		$("#dataTable").on('click', '.modal_edit', function() {
			var id = $(this).data('id');
			var nopes = $(this).data('nopes');
			var nama = $(this).data('nama');
			var kelas = $(this).data('kelas');

			$('[name="id"]').val(id);
			$('[name="no_peserta2"]').val(nopes);
			$('[name="nama_peserta2"]').val(nama);
			$('[id="kelas2"]').val(kelas);
			$('#ModalEdit').modal('show', {backdrop: 'static'});
		});
	});	

	function konfir_hapus_peserta(delete_url){
		$('#ModalDeletePeserta').modal('show', {backdrop: 'static'});
		document.getElementById('link_hapus_peserta').setAttribute('href' , delete_url);
	}
</script>