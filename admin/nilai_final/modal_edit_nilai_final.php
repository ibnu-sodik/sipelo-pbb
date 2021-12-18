
<?php 
require_once '../../library/config.php';

$id_nf = $_GET['id'];
$SQL = $mysqli->query("SELECT * FROM nilai_final WHERE id_nf='$id_nf'");
$data = mysqli_fetch_assoc($SQL);

$dataIdPeserta = isset($_POST['id_peserta'])?$_POST['id_peserta']:$data['id_peserta'];
$tn_murni = isset($_POST['tn_murni'])?$_POST['tn_murni']:$data['tn_murni'];
$tn_kreasi = isset($_POST['tn_kreasi'])?$_POST['tn_kreasi']:$data['tn_kreasi'];
$tn_formasi = isset($_POST['tn_formasi'])?$_POST['tn_formasi']:$data['tn_formasi'];
$tn_variasi = isset($_POST['tn_variasi'])?$_POST['tn_variasi']:$data['tn_variasi'];
$tn_danton = isset($_POST['tn_danton'])?$_POST['tn_danton']:$data['tn_danton'];
$tn_kostum = isset($_POST['tn_kostum'])?$_POST['tn_kostum']:$data['tn_kostum'];
$tn_supporter = isset($_POST['tn_supporter'])?$_POST['tn_supporter']:$data['tn_supporter'];
$tn_pengurangan = isset($_POST['tn_pengurangan'])?$_POST['tn_pengurangan']:$data['tn_pengurangan'];

?>

<div class="modal-dialog modal-xl modal-dialog-centered">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Edit Nilai Variasi</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		<form method="POST" action="nilai_final/proses_edit.php">
			<input type="hidden" name="id_nf" value="<?=$id_nf?>">
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
						<label for="tn_murni">PBB Murni</label>
						<input type="number" placeholder="PBB Murni" name="tn_murni" id="tn_murni" class="form-control" value="<?=$tn_murni?>">
					</div>
					<div class="col-md-6">
						<label for="tn_kreasi">PBB Kreasi</label>
						<input type="number" placeholder="PBB Kreasi" name="tn_kreasi" id="tn_kreasi" class="form-control" value="<?=$tn_kreasi?>">
					</div>
					<div class="col-md-6">
						<label for="tn_formasi">PBB Formasi</label>
						<input type="number" placeholder="Keindahan Gerakan" name="tn_formasi" id="tn_formasi" class="form-control" value="<?=$tn_formasi?>">
					</div>
					<div class="col-md-6">
						<label for="tn_variasi">PBB Variasi</label>
						<input type="number" placeholder="PBB Variasi" name="tn_variasi" id="tn_variasi" class="form-control" value="<?=$tn_variasi?>">
					</div>
					<div class="col-md-6">
						<label for="tn_danton">Nilai Danton</label>
						<input type="number" placeholder="Nilai Danton" name="tn_danton" id="tn_danton" class="form-control" value="<?=$tn_danton?>">
					</div>
					<div class="col-md-6">
						<label for="tn_kostum">Nilai Kostum</label>
						<input type="number" placeholder="Nilai Kostum" name="tn_kostum" id="tn_kostum" class="form-control" value="<?=$tn_kostum?>">
					</div>
					<div class="col-md-4">
						<label for="tn_harian">Nilai PBB Harian</label>
						<input type="number" placeholder="Nilai PBB Harian" name="tn_harian" id="tn_harian" class="form-control" value="<?=$tn_harian?>">
					</div>
					<div class="col-md-4">
						<label for="tn_supporter">Nilai Supporter</label>
						<input type="number" placeholder="Nilai Supporter" name="tn_supporter" id="tn_supporter" class="form-control" value="<?=$tn_supporter?>">
					</div>
					<div class="col-md-4">
						<label for="tn_pengurangan">Pengurangan</label>
						<input type="number" placeholder="Pengurangan" name="tn_pengurangan" id="tn_pengurangan" class="form-control" value="<?=$tn_pengurangan?>">
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