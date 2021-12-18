
<?php 
require_once '../../library/config.php';

$id_f = $_GET['id'];
$SQL = $mysqli->query("SELECT * FROM nilai_formasi WHERE id_f='$id_f'");
$data = mysqli_fetch_assoc($SQL);

$dataIdPeserta = isset($_POST['id_peserta'])?$_POST['id_peserta']:$data['id_peserta'];
$gerakan = isset($_POST['gerakan'])?$_POST['gerakan']:$data['gerakan'];
$kekompakan = isset($_POST['kekompakan'])?$_POST['kekompakan']:$data['kekompakan'];
?>

<div class="modal-dialog modal-xl modal-dialog-centered">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Edit Nilai Formasi</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		<form method="POST" action="nilai_formasi/proses_edit.php">
			<input type="hidden" name="id_f" value="<?=$id_f?>">
			<div class="modal-body">
				<div class="row">

					<div class="col-md-12 mb-2">
						<label for="id_peserta">Pilih Peserta</label>
						<select name="id_peserta" id="id_peserta" class="form-control select2">
							<option value="">----- PIlih Peserta -----</option>
							<?php 
							$SQL2 = $mysqli->query("SELECT * FROM tb_peserta ORDER BY no_peserta ASC");
							while ($data2 = mysqli_fetch_assoc($SQL2)) {
								if ($data2['id']==$dataIdPeserta) {
									$cek = " selected";
								}else{
									$cek='';
								}
								echo "<option value='$data2[id]' $cek>$data2[nama_peserta]</option>";
							}
							?>
						</select>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<label for="gerakan">Gerakan</label>
						<input type="number" placeholder="Gerakan" name="gerakan" id="gerakan" class="form-control" value="<?=$gerakan?>">
					</div>
					<div class="col-md-6">
						<label for="kekompakan">Kekompakan</label>
						<input type="number" placeholder="Kekompakan" name="kekompakan" id="kekompakan" class="form-control" value="<?=$kekompakan?>">
					</div>
				</div>

			</div>

			<div class="modal-footer">
				<button class="btn btn-md btn-success" type="submit" name="simpan"><span class="fa fa-save"></span> Simpan</button>

				<button type="button" class="btn btn-md btn-danger"  data-dismiss="modal" aria-hidden="true"><span class="fa fa-exclamation"></span> Tutup</button>
			</div>
		</form>
	</div>
</div>