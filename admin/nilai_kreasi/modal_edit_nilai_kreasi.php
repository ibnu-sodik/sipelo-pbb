
<?php 
require_once '../../library/config.php';

$id_k = $_GET['id'];
$SQL = $mysqli->query("SELECT * FROM nilai_kreasi WHERE id_k='$id_k'");
$data = mysqli_fetch_assoc($SQL);

$dataIdPeserta = isset($_POST['id_peserta'])?$_POST['id_peserta']:$data['id_peserta'];
$gerakan_1 = isset($_POST['gerakan_1'])?$_POST['gerakan_1']:$data['gerakan_1'];
$gerakan_2 = isset($_POST['gerakan_2'])?$_POST['gerakan_2']:$data['gerakan_2'];
$gerakan_3 = isset($_POST['gerakan_3'])?$_POST['gerakan_3']:$data['gerakan_3'];
$gerakan_4 = isset($_POST['gerakan_4'])?$_POST['gerakan_4']:$data['gerakan_4'];
$gerakan_5 = isset($_POST['gerakan_5'])?$_POST['gerakan_5']:$data['gerakan_5'];

?>

<div class="modal-dialog modal-xl modal-dialog-centered">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Edit Nilai Kreasi</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		<form method="POST" action="nilai_kreasi/proses_edit.php">
			<input type="hidden" name="id_k" value="<?=$id_k?>">
			<div class="modal-body">
				<div class="row">

					<div class="col-md-12 mb-2">
						<label for="id_peserta">Pilih Peserta</label>
						<select name="id_peserta" id="id_peserta" class="form-control select2">
							<option value="">----- PIlih Peserta -----</option>
							<?php 
							$SQL2 = $mysqli->query("SELECT * FROM tb_peserta ORDER BY nama_peserta ASC");
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
					<div class="col-md-4">
						<label for="gerakan_1">Gerakan 1</label>
						<input type="number" placeholder="Gerakan 1" name="gerakan_1" id="gerakan_1" class="form-control" value="<?=$gerakan_1?>">
					</div>
					<div class="col-md-4">
						<label for="gerakan_2">Gerakan 2</label>
						<input type="number" placeholder="Gerakan 2" name="gerakan_2" id="gerakan_2" class="form-control" value="<?=$gerakan_2?>">
					</div>
					<div class="col-md-4">
						<label for="gerakan_3">Gerakan 3</label>
						<input type="number" placeholder="Gerakan 3" name="gerakan_3" id="gerakan_3" class="form-control" value="<?=$gerakan_3?>">
					</div>
					<div class="col-md-6">
						<label for="gerakan_4">Gerakan 4</label>
						<input type="number" placeholder="Gerakan 4" name="gerakan_4" id="gerakan_4" class="form-control" value="<?=$gerakan_4?>">
					</div>
					<div class="col-md-6">
						<label for="gerakan_5">Gerakan 5</label>
						<input type="number" placeholder="Gerakan 5" name="gerakan_5" id="gerakan_5" class="form-control" value="<?=$gerakan_5?>">
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