
<?php 
require_once '../../library/config.php';

$id_v = $_GET['id'];
$SQL = $mysqli->query("SELECT * FROM nilai_variasi WHERE id_v='$id_v'");
$data = mysqli_fetch_assoc($SQL);

$dataIdPeserta = isset($_POST['id_peserta'])?$_POST['id_peserta']:$data['id_peserta'];
$kompak_gerakan = isset($_POST['kompak_gerakan'])?$_POST['kompak_gerakan']:$data['kompak_gerakan'];
$kompak_suara = isset($_POST['kompak_suara'])?$_POST['kompak_suara']:$data['kompak_suara'];
$indah_gerakan = isset($_POST['indah_gerakan'])?$_POST['indah_gerakan']:$data['indah_gerakan'];
$rumit_gerakan = isset($_POST['rumit_gerakan'])?$_POST['rumit_gerakan']:$data['rumit_gerakan'];

?>

<div class="modal-dialog modal-xl modal-dialog-centered">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Edit Nilai Variasi</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		<form method="POST" action="nilai_variasi/proses_edit.php">
			<input type="hidden" name="id_v" value="<?=$id_v?>">
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
					<div class="col-md-3">
						<label for="kompak_gerakan">Kekompakan Gerakan</label>
						<input type="number" placeholder="Kekompakan Gerakan" name="kompak_gerakan" id="kompak_gerakan" class="form-control" value="<?=$kompak_gerakan?>">
					</div>
					<div class="col-md-3">
						<label for="kompak_suara">Kekompakan Suara</label>
						<input type="number" placeholder="Kekompakan Suara" name="kompak_suara" id="kompak_suara" class="form-control" value="<?=$kompak_suara?>">
					</div>
					<div class="col-md-3">
						<label for="indah_gerakan">Keindahan Gerakan</label>
						<input type="number" placeholder="Keindahan Gerakan" name="indah_gerakan" id="indah_gerakan" class="form-control" value="<?=$indah_gerakan?>">
					</div>
					<div class="col-md-3">
						<label for="rumit_gerakan">Kerumitan Gerakan</label>
						<input type="number" placeholder="Kerumitan Gerakan" name="rumit_gerakan" id="rumit_gerakan" class="form-control" value="<?=$rumit_gerakan?>">
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