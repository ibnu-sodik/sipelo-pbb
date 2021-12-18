
<?php 
require_once '../../library/config.php';

$id_s = $_GET['id'];
$SQL = $mysqli->query("SELECT * FROM nilai_supporter WHERE id_s='$id_s'");
$data = mysqli_fetch_assoc($SQL);

$dataIdPeserta = isset($_POST['id_peserta'])?$_POST['id_peserta']:$data['id_peserta'];
$kerumitan_gerakan = isset($_POST['kerumitan_gerakan'])?$_POST['kerumitan_gerakan']:$data['kerumitan_gerakan'];
$kekompakan_suara = isset($_POST['kekompakan_suara'])?$_POST['kekompakan_suara']:$data['kekompakan_suara'];
$kekompakan_gerakan = isset($_POST['kekompakan_gerakan'])?$_POST['kekompakan_gerakan']:$data['kekompakan_gerakan'];
$kesesuaian_kostum = isset($_POST['kesesuaian_kostum'])?$_POST['kesesuaian_kostum']:$data['kesesuaian_kostum'];
// 2
$kerumitan_gerakan2 = isset($_POST['kerumitan_gerakan2'])?$_POST['kerumitan_gerakan2']:$data['kerumitan_gerakan2'];
$kekompakan_suara2 = isset($_POST['kekompakan_suara2'])?$_POST['kekompakan_suara2']:$data['kekompakan_suara2'];
$kekompakan_gerakan2 = isset($_POST['kekompakan_gerakan2'])?$_POST['kekompakan_gerakan2']:$data['kekompakan_gerakan2'];
$kesesuaian_kostum2 = isset($_POST['kesesuaian_kostum2'])?$_POST['kesesuaian_kostum2']:$data['kesesuaian_kostum2'];
// 3
$kerumitan_gerakan3 = isset($_POST['kerumitan_gerakan3'])?$_POST['kerumitan_gerakan3']:$data['kerumitan_gerakan3'];
$kekompakan_suara3 = isset($_POST['kekompakan_suara3'])?$_POST['kekompakan_suara3']:$data['kekompakan_suara3'];
$kekompakan_gerakan3 = isset($_POST['kekompakan_gerakan3'])?$_POST['kekompakan_gerakan3']:$data['kekompakan_gerakan3'];
$kesesuaian_kostum3 = isset($_POST['kesesuaian_kostum3'])?$_POST['kesesuaian_kostum3']:$data['kesesuaian_kostum3'];
// 4
$kerumitan_gerakan4 = isset($_POST['kerumitan_gerakan4'])?$_POST['kerumitan_gerakan4']:$data['kerumitan_gerakan4'];
$kekompakan_suara4 = isset($_POST['kekompakan_suara4'])?$_POST['kekompakan_suara4']:$data['kekompakan_suara4'];
$kekompakan_gerakan4 = isset($_POST['kekompakan_gerakan4'])?$_POST['kekompakan_gerakan4']:$data['kekompakan_gerakan4'];
$kesesuaian_kostum4 = isset($_POST['kesesuaian_kostum4'])?$_POST['kesesuaian_kostum4']:$data['kesesuaian_kostum4'];
?>

<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Edit Nilai Supporter</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		<form method="POST" action="nilai_supporter/proses_edit.php">
			<input type="hidden" name="id_s" value="<?=$id_s?>">
			<div class="modal-body">
				<div class="row">

					<div class="col-md-12 mb-2">
						<label for="id_peserta">Pilih Peserta</label>
						<select name="id_peserta" id="id_peserta" class="form-control">
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
					<div class="col-md-12 mb-2">
						<button disabled type="button" class="btn btn-block btn-info">Juri 1</button>
					</div>
					<div class="col-md-3">
						<label for="kerumitan_gerakan">Kerumitan Gerakan</label>
						<input type="number" placeholder="Kerumitan Gerakan" name="kerumitan_gerakan" id="kerumitan_gerakan" class="form-control" value="<?=$kerumitan_gerakan?>">
					</div>
					<div class="col-md-3">
						<label for="kekompakan_suara">Kekompakan Suara</label>
						<input type="number" placeholder="Kekompakan Suara" name="kekompakan_suara" id="kekompakan_suara" class="form-control" value="<?=$kekompakan_suara?>">
					</div>
					<div class="col-md-3">
						<label for="kekompakan_gerakan">Kekompakan Gerakan</label>
						<input type="number" placeholder="Kekompakan Gerakan" name="kekompakan_gerakan" id="kekompakan_gerakan" class="form-control" value="<?=$kekompakan_gerakan?>">
					</div>
					<div class="col-md-3 mb-2">
						<label for="kesesuaian_kostum">Expresi</label>
						<input type="number" placeholder="Expresi" name="kesesuaian_kostum" id="kesesuaian_kostum" class="form-control" value="<?=$kesesuaian_kostum?>">
					</div>
					<!-- 2 -->
					<div class="col-md-12 mb-2">
						<button disabled type="button" class="btn btn-block btn-primary">Juri 2</button>
					</div>
					<div class="col-md-3">
						<label for="kerumitan_gerakan2">Kerumitan Gerakan</label>
						<input type="number" placeholder="Kerumitan Gerakan" name="kerumitan_gerakan2" id="kerumitan_gerakan2" class="form-control" value="<?=$kerumitan_gerakan2?>">
					</div>
					<div class="col-md-3">
						<label for="kekompakan_suara2">Kekompakan Suara</label>
						<input type="number" placeholder="Kekompakan Suara" name="kekompakan_suara2" id="kekompakan_suara2" class="form-control" value="<?=$kekompakan_suara2?>">
					</div>
					<div class="col-md-3">
						<label for="kekompakan_gerakan2">Kekompakan Gerakan</label>
						<input type="number" placeholder="Kekompakan Gerakan" name="kekompakan_gerakan2" id="kekompakan_gerakan2" class="form-control" value="<?=$kekompakan_gerakan2?>">
					</div>
					<div class="col-md-3 mb-2">
						<label for="kesesuaian_kostum2">Expresi</label>
						<input type="number" placeholder="Expresi" name="kesesuaian_kostum2" id="kesesuaian_kostum2" class="form-control" value="<?=$kesesuaian_kostum2?>">
					</div>
					<!-- 3 -->
					<div class="col-md-12 mb-2">
						<button disabled type="button" class="btn btn-block btn-info">Juri 3</button>
					</div>
					<div class="col-md-3">
						<label for="kerumitan_gerakan3">Kerumitan Gerakan</label>
						<input type="number" placeholder="Kerumitan Gerakan" name="kerumitan_gerakan3" id="kerumitan_gerakan3" class="form-control" value="<?=$kerumitan_gerakan3?>">
					</div>
					<div class="col-md-3">
						<label for="kekompakan_suara3">Kekompakan Suara</label>
						<input type="number" placeholder="Kekompakan Suara" name="kekompakan_suara3" id="kekompakan_suara3" class="form-control" value="<?=$kekompakan_suara3?>">
					</div>
					<div class="col-md-3">
						<label for="kekompakan_gerakan3">Kekompakan Gerakan</label>
						<input type="number" placeholder="Kekompakan Gerakan" name="kekompakan_gerakan3" id="kekompakan_gerakan3" class="form-control" value="<?=$kekompakan_gerakan3?>">
					</div>
					<div class="col-md-3 mb-2">
						<label for="kesesuaian_kostum3">Expresi</label>
						<input type="number" placeholder="Expresi" name="kesesuaian_kostum3" id="kesesuaian_kostum3" class="form-control" value="<?=$kesesuaian_kostum3?>">
					</div>
					<!-- 4 -->
					<div class="col-md-12 mb-2">
						<button disabled type="button" class="btn btn-block btn-warning">Juri 4</button>
					</div>
					<div class="col-md-3">
						<label for="kerumitan_gerakan4">Kerumitan Gerakan</label>
						<input type="number" placeholder="Kerumitan Gerakan" name="kerumitan_gerakan4" id="kerumitan_gerakan4" class="form-control" value="<?=$kerumitan_gerakan4?>">
					</div>
					<div class="col-md-3">
						<label for="kekompakan_suara4">Kekompakan Suara</label>
						<input type="number" placeholder="Kekompakan Suara" name="kekompakan_suara4" id="kekompakan_suara4" class="form-control" value="<?=$kekompakan_suara4?>">
					</div>
					<div class="col-md-3">
						<label for="kekompakan_gerakan4">Kekompakan Gerakan</label>
						<input type="number" placeholder="Kekompakan Gerakan" name="kekompakan_gerakan4" id="kekompakan_gerakan4" class="form-control" value="<?=$kekompakan_gerakan4?>">
					</div>
					<div class="col-md-3 mb-2">
						<label for="kesesuaian_kostum4">Expresi</label>
						<input type="number" placeholder="Expresi" name="kesesuaian_kostum4" id="kesesuaian_kostum4" class="form-control" value="<?=$kesesuaian_kostum4?>">
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