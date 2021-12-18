<h1 class="mt-4">Nilai Supporter</h1>
<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item active">Data Nilai Supporter</li>
</ol>

<a href="#" class="btn btn-primary mb-2" data-target="#ModalAddNilaiSupporter" data-toggle="modal" title="Tambah Nilai Supporter">
	<i class="fa fa-plus mr-1"></i> Tambah Nilai Supporter
</a>

<div class="card mb-4">
	<div class="card-header">
		<i class="fas fa-table mr-1"></i>
		DataTable Nilai Supporter
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
						<th class="text-center">Kerumitan Gerakan</th>
						<th class="text-center">Kekompakan Suara</th>
						<th class="text-center">Kekompakan Gerakan</th>
						<th class="text-center">Kesesuaian Kostum</th>
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
						<th class="text-center">Kerumitan Gerakan</th>
						<th class="text-center">Kekompakan Suara</th>
						<th class="text-center">Kekompakan Gerakan</th>
						<th class="text-center">Kesesuaian Kostum</th>
						<th class="text-center">Total Nilai</th>
						<th class="text-center">Opsi</th>
					</tr>
				</tfoot>
				<tbody>
					<?php 
					$no=0;
					$SQL = $mysqli->query("SELECT nilai_supporter.*, tb_peserta.* FROM nilai_supporter LEFT JOIN tb_peserta ON nilai_supporter.id_peserta = tb_peserta.id ORDER BY nama_peserta ASC");
					while($data=mysqli_fetch_assoc($SQL)):
						$no++;
						$st_kerumitan_gerakan = (
							$data['kerumitan_gerakan']+
							$data['kerumitan_gerakan2']+
							$data['kerumitan_gerakan3']+
							$data['kerumitan_gerakan4']);
						$st_kekompakan_suara = (
							$data['kekompakan_suara']+
							$data['kekompakan_suara2']+
							$data['kekompakan_suara3']+
							$data['kekompakan_suara4']);
						$st_kekompakan_gerakan = (
							$data['kekompakan_gerakan']+
							$data['kekompakan_gerakan2']+
							$data['kekompakan_gerakan3']+
							$data['kekompakan_gerakan4']);
						$st_kesesuaian_kostum = (
							$data['kesesuaian_kostum']+
							$data['kesesuaian_kostum2']+
							$data['kesesuaian_kostum3']+
							$data['kesesuaian_kostum4']);
						?>
						<tr>
							<td class="text-center"><?= $no; ?></td>
							<!-- <td class="text-center"><?= $data['no_peserta'] ?></td> -->
							<td class="text-center"><?= $data['nama_peserta'] ?></td>
							<td class="text-center"><?= $data['kelas'] ?></td>
							<td class="text-center"><?= $st_kerumitan_gerakan; ?></td>
							<td class="text-center"><?= $st_kekompakan_suara; ?></td>
							<td class="text-center"><?= $st_kekompakan_gerakan; ?></td>
							<td class="text-center"><?= $st_kesesuaian_kostum; ?></td>
							<td class="text-center"><?= $data['total_nilai']; ?></td>
							<td class="text-center">
								<a href="#" class="modal_edit_nilai_supporter btn btn-warning btn-sm mb-1" data-target="#ModalEditNilaiSupporter" data-toggle="modal" id="<?=$data['id_s'];?>" title="Edit">
									<span class="fa fa-edit"></span>
								</a>

								<a href="#" class="btn btn-danger btn-sm" data-target="#ModalDeleteNilaiSupporter" title="Hapus" onclick="konfir_hapus_supporter('nilai_supporter/proses_hapus.php?&id=<?php echo $data['id_s']; ?>');">
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

<div id="ModalAddNilaiSupporter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Tambah Nilai Supporter</h4>
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
							<label for="kerumitan_gerakan">Kerumitan Gerakan</label>
							<input type="number" placeholder="Kerumitan Gerakan" name="kerumitan_gerakan" id="kerumitan_gerakan" class="form-control">
						</div>
						<div class="col-md-3">
							<label for="kekompakan_suara">Kekompakan Suara</label>
							<input type="number" placeholder="Kekompakan Suara" name="kekompakan_suara" id="kekompakan_suara" class="form-control">
						</div>
						<div class="col-md-3">
							<label for="kekompakan_gerakan">Kekompakan Gerakan</label>
							<input type="number" placeholder="Kekompakan Gerakan" name="kekompakan_gerakan" id="kekompakan_gerakan" class="form-control">
						</div>
						<div class="col-md-3 mb-2">
							<label for="kesesuaian_kostum">Kesesuaian Kostum</label>
							<input type="number" placeholder="Kesesuaian Kostum" name="kesesuaian_kostum" id="kesesuaian_kostum" class="form-control">
						</div>

						<div class="col-md-12 mb-2">
							<button disabled type="button" class="btn btn-block btn-primary">Juri 2</button>
						</div>
						<div class="col-md-3">
							<label for="kerumitan_gerakan2">Kerumitan Gerakan</label>
							<input type="number" placeholder="Kerumitan Gerakan" name="kerumitan_gerakan2" id="kerumitan_gerakan2" class="form-control">
						</div>
						<div class="col-md-3">
							<label for="kekompakan_suara2">Kekompakan Suara</label>
							<input type="number" placeholder="Kekompakan Suara" name="kekompakan_suara2" id="kekompakan_suara2" class="form-control">
						</div>
						<div class="col-md-3">
							<label for="kekompakan_gerakan2">Kekompakan Gerakan</label>
							<input type="number" placeholder="Kekompakan Gerakan" name="kekompakan_gerakan2" id="kekompakan_gerakan2" class="form-control">
						</div>
						<div class="col-md-3 mb-2">
							<label for="kesesuaian_kostum2">Kesesuaian Kostum</label>
							<input type="number" placeholder="Kesesuaian Kostum" name="kesesuaian_kostum2" id="kesesuaian_kostum2" class="form-control">
						</div>
						<!-- juri 3 -->
						<div class="col-md-12 mb-2">
							<button disabled type="button" class="btn btn-block btn-info">Juri 3</button>
						</div>
						<div class="col-md-3">
							<label for="kerumitan_gerakan3">Kerumitan Gerakan</label>
							<input type="number" placeholder="Kerumitan Gerakan" name="kerumitan_gerakan3" id="kerumitan_gerakan3" class="form-control">
						</div>
						<div class="col-md-3">
							<label for="kekompakan_suara3">Kekompakan Suara</label>
							<input type="number" placeholder="Kekompakan Suara" name="kekompakan_suara3" id="kekompakan_suara3" class="form-control">
						</div>
						<div class="col-md-3">
							<label for="kekompakan_gerakan3">Kekompakan Gerakan</label>
							<input type="number" placeholder="Kekompakan Gerakan" name="kekompakan_gerakan3" id="kekompakan_gerakan3" class="form-control">
						</div>
						<div class="col-md-3 mb-2">
							<label for="kesesuaian_kostum3">Kesesuaian Kostum</label>
							<input type="number" placeholder="Kesesuaian Kostum" name="kesesuaian_kostum3" id="kesesuaian_kostum3" class="form-control">
						</div>
						<!-- juri 4 -->
						<div class="col-md-12 mb-2">
							<button disabled type="button" class="btn btn-block btn-warning">Juri 4</button>
						</div>
						<div class="col-md-3">
							<label for="kerumitan_gerakan4">Kerumitan Gerakan</label>
							<input type="number" placeholder="Kerumitan Gerakan" name="kerumitan_gerakan4" id="kerumitan_gerakan4" class="form-control">
						</div>
						<div class="col-md-3">
							<label for="kekompakan_suara4">Kekompakan Suara</label>
							<input type="number" placeholder="Kekompakan Suara" name="kekompakan_suara4" id="kekompakan_suara4" class="form-control">
						</div>
						<div class="col-md-3">
							<label for="kekompakan_gerakan4">Kekompakan Gerakan</label>
							<input type="number" placeholder="Kekompakan Gerakan" name="kekompakan_gerakan4" id="kekompakan_gerakan4" class="form-control">
						</div>
						<div class="col-md-3 mb-2">
							<label for="kesesuaian_kostum4">Kesesuaian Kostum</label>
							<input type="number" placeholder="Kesesuaian Kostum" name="kesesuaian_kostum4" id="kesesuaian_kostum4" class="form-control">
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
	$kerumitan_gerakan 	= sanitize($_POST['kerumitan_gerakan']);
	$kekompakan_suara 	= sanitize($_POST['kekompakan_suara']);
	$kekompakan_gerakan 	= sanitize($_POST['kekompakan_gerakan']);
	$kesesuaian_kostum 	= sanitize($_POST['kesesuaian_kostum']);
	// 2
	$kerumitan_gerakan2 	= sanitize($_POST['kerumitan_gerakan2']);
	$kekompakan_suara2 	= sanitize($_POST['kekompakan_suara2']);
	$kekompakan_gerakan2 	= sanitize($_POST['kekompakan_gerakan2']);
	$kesesuaian_kostum2 	= sanitize($_POST['kesesuaian_kostum2']);
	// 3
	$kerumitan_gerakan3 	= sanitize($_POST['kerumitan_gerakan3']);
	$kekompakan_suara3 	= sanitize($_POST['kekompakan_suara3']);
	$kekompakan_gerakan3 	= sanitize($_POST['kekompakan_gerakan3']);
	$kesesuaian_kostum3 	= sanitize($_POST['kesesuaian_kostum3']);
	// 4
	$kerumitan_gerakan4 	= sanitize($_POST['kerumitan_gerakan4']);
	$kekompakan_suara4 	= sanitize($_POST['kekompakan_suara4']);
	$kekompakan_gerakan4 	= sanitize($_POST['kekompakan_gerakan4']);
	$kesesuaian_kostum4 	= sanitize($_POST['kesesuaian_kostum4']);

	// validasi form tambah
	$errors = array();
	if (trim($id_peserta)=='') {
		$errors[] = "Mohon Pilih Peserta Terlebih Dahul.!";
	}

	$SQL2 = $mysqli->query("SELECT * FROM nilai_supporter WHERE
		id_peserta = '$id_peserta'");
	if (mysqli_num_rows($SQL2)==1) {
		$errors[] = "Maaf, Nilai Tersebut Sudah Ada.";
	}

	if (!empty($errors)) {
		echo display_errors($errors);
	}else{
		$st_kerumitan_gerakan = (
			(float)$kerumitan_gerakan+
			(float)$kerumitan_gerakan2+
			(float)$kerumitan_gerakan3+
			(float)$kerumitan_gerakan4);
		$st_kekompakan_suara = (
			(float)$kekompakan_suara+
			(float)$kekompakan_suara2+
			(float)$kekompakan_suara3+
			(float)$kekompakan_suara4);
		$st_kekompakan_gerakan = (
			(float)$kekompakan_gerakan+
			(float)$kekompakan_gerakan2+
			(float)$kekompakan_gerakan3+
			(float)$kekompakan_gerakan4);
		$st_kesesuaian_kostum = (
			(float)$kesesuaian_kostum+
			(float)$kesesuaian_kostum2+
			(float)$kesesuaian_kostum3+
			(float)$kesesuaian_kostum4);
		$total_nilai = ((float)$st_kerumitan_gerakan+(float)$st_kekompakan_suara+(float)$st_kekompakan_gerakan+(float)$st_kesesuaian_kostum);
		$mysqli->query("INSERT INTO nilai_supporter SET
			id_peserta 	= '$id_peserta',
			kerumitan_gerakan = '$kerumitan_gerakan',
			kekompakan_suara = '$kekompakan_suara',
			kekompakan_gerakan = '$kekompakan_gerakan',
			kesesuaian_kostum = '$kesesuaian_kostum',
			kerumitan_gerakan2 = '$kerumitan_gerakan2',
			kekompakan_suara2 = '$kekompakan_suara2',
			kekompakan_gerakan2 = '$kekompakan_gerakan2',
			kesesuaian_kostum2 = '$kesesuaian_kostum2',
			kerumitan_gerakan3 = '$kerumitan_gerakan3',
			kekompakan_suara3 = '$kekompakan_suara3',
			kekompakan_gerakan3 = '$kekompakan_gerakan3',
			kesesuaian_kostum3 = '$kesesuaian_kostum3',
			kerumitan_gerakan4 = '$kerumitan_gerakan4',
			kekompakan_suara4 = '$kekompakan_suara4',
			kekompakan_gerakan4 = '$kekompakan_gerakan4',
			kesesuaian_kostum4 = '$kesesuaian_kostum4',
			total_nilai = '$total_nilai'
			");
		$text = "Berhasil Menambahkan Nilai.! ";
		echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '');
	}
}
?>

<div id="ModalEditNilaiSupporter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEdit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

		</div>
	</div>
</div>
<!-- modal delete -->
<div class="modal fade" id="ModalDeleteNilaiSupporter" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Anda Yakin Ingin Mneghapus Data Ini</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn btn-primary" id="link_hapus_supporter">
					<span class="fa fa-check"></span> Ya
				</a>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-minus-square"></span> Tidak</button>

			</div>
		</div>
	</div>
</div>