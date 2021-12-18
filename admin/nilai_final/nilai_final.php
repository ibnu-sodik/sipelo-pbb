<link href="<?= base_url() ?>/assets/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/select2-bootstrap.min.css">
<script src="<?= base_url() ?>/assets/js/select2.min.js"></script>

<h1 class="mt-4">Nilai Final</h1>
<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item active">Data Nilai Final</li>
</ol>

<a href="#" class="btn btn-primary mb-2" data-target="#ModalAddNilaiFinal" data-toggle="modal" title="Tambah Nilai Final">
	<i class="fa fa-plus mr-1"></i> Tambah Nilai Final
</a>
<a target="_blank" href="<?= base_url() ?>admin/export-pdf/nilai-final.php" class="btn btn-danger mb-2">
	<i class="fa fa-print"></i> Export PDF
</a>

<div class="card mb-4">
	<div class="card-header">
		<i class="fas fa-table mr-1"></i>
		DataTable Nilai Final
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<!-- <th class="text-center">Nomor Peserta</th> -->
						<th class="text-center">Nama Peserta</th>
						<th class="text-center">Kelas</th>
						<th class="text-center">PBB Murni</th>
						<th class="text-center">PBB Kreasi</th>
						<th class="text-center">PBB Formasi</th>
						<th class="text-center">PBB Variasi</th>
						<th class="text-center">Nilai Danton</th>
						<th class="text-center">Nilai Kostum</th>
						<th class="text-center">Nilai Harian</th>
						<th class="text-center">Pengurangan Nilai</th>
						<th class="text-center">Nilai Final</th>
						<th class="text-center">Opsi</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th class="text-center">No</th>
						<!-- <th class="text-center">Nomor Peserta</th> -->
						<th class="text-center">Nama Peserta</th>
						<th class="text-center">Kelas</th>
						<th class="text-center">PBB Murni</th>
						<th class="text-center">PBB Kreasi</th>
						<th class="text-center">PBB Formasi</th>
						<th class="text-center">PBB Variasi</th>
						<th class="text-center">Nilai Danton</th>
						<th class="text-center">Nilai Kostum</th>
						<th class="text-center">Nilai Harian</th>
						<th class="text-center">Pengurangan Nilai</th>
						<th class="text-center">Nilai Final</th>
						<th class="text-center">Opsi</th>
					</tr>
				</tfoot>
				<tbody>
					<?php 
					$no=0;
					$SQL = $mysqli->query("SELECT nilai_final.*, tb_peserta.* FROM nilai_final LEFT JOIN tb_peserta ON nilai_final.id_peserta = tb_peserta.id ORDER BY nama_peserta ASC");
					while($data=mysqli_fetch_assoc($SQL)):
						$no++;
						?>
						<tr>
							<td class="text-center"><?= $no; ?></td>
							<!-- <td class="text-center"><?= $data['no_peserta'] ?></td> -->
							<td class="text-center"><?= $data['nama_peserta'] ?></td>
							<td class="text-center"><?= $data['kelas'] ?></td>
							<td class="text-center"><?= $data['tn_murni']; ?></td>
							<td class="text-center"><?= $data['tn_kreasi']; ?></td>
							<td class="text-center"><?= $data['tn_formasi']; ?></td>
							<td class="text-center"><?= $data['tn_variasi']; ?></td>
							<td class="text-center"><?= $data['tn_danton']; ?></td>
							<td class="text-center"><?= $data['tn_kostum']; ?></td>
							<td class="text-center"><?= $data['tn_harian']; ?></td>
							<td class="text-center bg-danger"><?= $data['tn_pengurangan']; ?></td>
							<td class="text-center"><?= $data['total_nilai']; ?></td>
							<td class="text-center">
								<a href="javascript:void(0)" class="modal_edit_nilai_final btn btn-warning btn-sm mb-1" data-target="#ModalEditNilaiFinal" data-toggle="modal" id="<?=$data['id_nf'];?>" title="Edit">
									<span class="fa fa-edit"></span>
								</a>

								<a href="javascript:void(0)" class="btn btn-danger btn-sm" data-target="#ModalDeleteNilaiFinal" title="Hapus" onclick="konfir_hapus_final('nilai_final/proses_hapus.php?&id=<?php echo $data['id_nf']; ?>');">
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

<div id="ModalAddNilaiFinal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Tambah Nilai Final</h4>
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
							<label for="tn_murni">PBB Murni</label>
							<input type="number" placeholder="PBB Murni" name="tn_murni" id="tn_murni" class="form-control">
						</div>
						<div class="col-md-6">
							<label for="tn_kreasi">PBB Kreasi</label>
							<input type="number" placeholder="PBB Kreasi" name="tn_kreasi" id="tn_kreasi" class="form-control">
						</div>
						<div class="col-md-6">
							<label for="tn_formasi">PBB Formasi</label>
							<input type="number" placeholder="PBB Formasi" name="tn_formasi" id="tn_formasi" class="form-control">
						</div>
						<div class="col-md-6">
							<label for="tn_variasi">PBB Variasi</label>
							<input type="number" placeholder="PBB Variasi" name="tn_variasi" id="tn_variasi" class="form-control">
						</div>
						<div class="col-md-6">
							<label for="tn_danton">Nilai Danton</label>
							<input type="number" placeholder="Nilai Danton" name="tn_danton" id="tn_danton" class="form-control">
						</div>
						<div class="col-md-6">
							<label for="tn_kostum">Nilai Kostum</label>
							<input type="number" placeholder="Nilai Kostum" name="tn_kostum" id="tn_kostum" class="form-control">
						</div>
						<div class="col-md-4">
							<label for="tn_supporter">Nilai Supporter</label>
							<input type="number" placeholder="Nilai Supporter" name="tn_supporter" id="tn_supporter" class="form-control">
						</div>
						<div class="col-md-4">
							<label for="tn_harian">Nilai PBB Harian</label>
							<input type="number" placeholder="Nilai Harian" name="tn_harian" id="tn_harian" class="form-control">
						</div>
						<div class="col-md-4">
							<label for="tn_pengurangan">Pengurangan Nilai</label>
							<input type="number" placeholder="Pengurangan Nilai" name="tn_pengurangan" id="tn_pengurangan" class="form-control">
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
	$id_peserta 		= sanitize($_POST['id_peserta']);
	$tn_murni 			= sanitize($_POST['tn_murni']);
	$tn_kreasi 			= sanitize($_POST['tn_kreasi']);
	$tn_formasi 		= sanitize($_POST['tn_formasi']);
	$tn_variasi 		= sanitize($_POST['tn_variasi']);
	$tn_pengurangan 	= sanitize($_POST['tn_pengurangan']);
	$tn_danton 			= sanitize($_POST['tn_danton']);
	$tn_kostum 			= sanitize($_POST['tn_kostum']);
	$tn_supporter 		= sanitize($_POST['tn_supporter']);
	$tn_harian 			= sanitize($_POST['tn_harian']);

	// validasi form tambah
	$errors = array();
	if (trim($id_peserta)=='') {
		$errors[] = "Mohon Pilih Peserta Terlebih Dahul.!";
	}

	$SQL2 = $mysqli->query("SELECT * FROM nilai_final WHERE
		id_peserta = '$id_peserta'");
	if (mysqli_num_rows($SQL2)==1) {
		$errors[] = "Maaf, Nilai Tersebut Sudah Ada.";
	}

	if (!empty($errors)) {
		echo display_errors($errors);
	}else{
		$total_nilai = ((float)$tn_murni+(float)$tn_kreasi+(float)$tn_formasi+(float)$tn_variasi+(float)$tn_danton+(float)$tn_kostum+(float)$tn_supporter+(float)$tn_harian-(float)$tn_pengurangan);
		$mysqli->query("INSERT INTO nilai_final SET
			id_peserta 		= '$id_peserta',
			tn_murni 		= '$tn_murni',
			tn_kreasi 		= '$tn_kreasi',
			tn_formasi 		= '$tn_formasi',
			tn_variasi 		= '$tn_variasi',
			tn_pengurangan 	= '$tn_pengurangan',
			tn_danton 		= '$tn_danton',
			tn_kostum 		= '$tn_kostum',
			tn_supporter 	= '$tn_supporter',
			tn_harian 		= '$tn_harian',
			total_nilai 	= '$total_nilai'
			");
		$text = "Berhasil Menambahkan Nilai.! ";
		echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '');
	}
}
?>

<div id="ModalEditNilaiFinal" class="modal fade" role="dialog" aria-labelledby="myModalLabelEdit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

		</div>
	</div>
</div>
<!-- modal delete -->
<div class="modal fade" id="ModalDeleteNilaiFinal" >
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Anda Yakin Ingin Mneghapus Data Ini</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn btn-primary" id="link_hapus_variasi">
					<span class="fa fa-check"></span> Ya
				</a>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-minus-square"></span> Tidak</button>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$("#dataTable").DataTable({
			responsive : {
				details : true
			}
		});

		$("#id_peserta").select2({
			theme : 'bootstrap',
			width : 'resolve'
		});

		$("#dataTable").on('click', '.modal_edit_nilai_final', function() {
			var m = $(this).attr("id");
			$.ajax({
				url : "nilai_final/modal_edit_nilai_final.php",
				type : "GET",
				data : {id: m,},
				success : function(ajaxData){
					$("#ModalEditNilaiFinal").html(ajaxData);
					$("#ModalEditNilaiFinal").modal('show', {backdrop : 'static'});
					$(".select2").select2({
						theme : 'bootstrap',
						drawParent : $("#ModalEditNilaiFinal")
					});
				}
			});
		});
	});

	function konfir_hapus_final(delete_url){
		$('#ModalDeleteNilaiFinal').modal('show', {backdrop: 'static'});
		document.getElementById('link_hapus_final').setAttribute('href' , delete_url);
	}

</script>