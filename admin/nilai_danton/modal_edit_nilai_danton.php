
<?php 
require_once '../../library/config.php';

$id_d = $_GET['id'];
$SQL = $mysqli->query("SELECT * FROM nilai_danton WHERE id_d='$id_d'");
$data = mysqli_fetch_assoc($SQL);

$dataIdPeserta = isset($_POST['id_peserta'])?$_POST['id_peserta']:$data['id_peserta'];
$suara = isset($_POST['suara'])?$_POST['suara']:$data['suara'];
$artikulasi = isset($_POST['artikulasi'])?$_POST['artikulasi']:$data['artikulasi'];
$urutan_aba = isset($_POST['urutan_aba'])?$_POST['urutan_aba']:$data['urutan_aba'];
$expresi = isset($_POST['expresi'])?$_POST['expresi']:$data['expresi'];
// 2
$suara2 = isset($_POST['suara2'])?$_POST['suara2']:$data['suara2'];
$artikulasi2 = isset($_POST['artikulasi2'])?$_POST['artikulasi2']:$data['artikulasi2'];
$urutan_aba2 = isset($_POST['urutan_aba2'])?$_POST['urutan_aba2']:$data['urutan_aba2'];
$expresi2 = isset($_POST['expresi2'])?$_POST['expresi2']:$data['expresi2'];
// 3
$suara3 = isset($_POST['suara3'])?$_POST['suara3']:$data['suara3'];
$artikulasi3 = isset($_POST['artikulasi3'])?$_POST['artikulasi3']:$data['artikulasi3'];
$urutan_aba3 = isset($_POST['urutan_aba3'])?$_POST['urutan_aba3']:$data['urutan_aba3'];
$expresi3 = isset($_POST['expresi3'])?$_POST['expresi3']:$data['expresi3'];
// 4
$suara4 = isset($_POST['suara4'])?$_POST['suara4']:$data['suara4'];
$artikulasi4 = isset($_POST['artikulasi4'])?$_POST['artikulasi4']:$data['artikulasi4'];
$urutan_aba4 = isset($_POST['urutan_aba4'])?$_POST['urutan_aba4']:$data['urutan_aba4'];
$expresi4 = isset($_POST['expresi4'])?$_POST['expresi4']:$data['expresi4'];
?>

<div class="modal-dialog modal-xl modal-dialog-centered">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Edit Nilai Danton</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		<form method="POST" action="nilai_danton/proses_edit.php">
			<input type="hidden" name="id_d" value="<?=$id_d?>">
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
					<div class="col-md-12 mb-2">
						<button disabled type="button" class="btn btn-block btn-info">Juri 1</button>
					</div>
					<div class="col-md-3">
						<label for="suara">Suara</label>
						<input type="number" placeholder="Suara" name="suara" id="suara" class="form-control" value="<?=$suara?>">
					</div>
					<div class="col-md-3">
						<label for="artikulasi">Artikulasi</label>
						<input type="number" placeholder="Artikulasi" name="artikulasi" id="artikulasi" class="form-control" value="<?=$artikulasi?>">
					</div>
					<div class="col-md-3">
						<label for="urutan_aba">Urutan Aba Aba</label>
						<input type="number" placeholder="Urutan Aba Aba" name="urutan_aba" id="urutan_aba" class="form-control" value="<?=$urutan_aba?>">
					</div>
					<div class="col-md-3 mb-2">
						<label for="expresi">Expresi</label>
						<input type="number" placeholder="Expresi" name="expresi" id="expresi" class="form-control" value="<?=$expresi?>">
					</div>
					<!-- 2 -->
					<div class="col-md-12 mb-2">
						<button disabled type="button" class="btn btn-block btn-primary">Juri 2</button>
					</div>
					<div class="col-md-3">
						<label for="suara2">Suara</label>
						<input type="number" placeholder="Suara" name="suara2" id="suara2" class="form-control" value="<?=$suara2?>">
					</div>
					<div class="col-md-3">
						<label for="artikulasi2">Artikulasi</label>
						<input type="number" placeholder="Artikulasi" name="artikulasi2" id="artikulasi2" class="form-control" value="<?=$artikulasi2?>">
					</div>
					<div class="col-md-3">
						<label for="urutan_aba2">Urutan Aba Aba</label>
						<input type="number" placeholder="Urutan Aba Aba" name="urutan_aba2" id="urutan_aba2" class="form-control" value="<?=$urutan_aba2?>">
					</div>
					<div class="col-md-3 mb-2">
						<label for="expresi2">Expresi</label>
						<input type="number" placeholder="Expresi" name="expresi2" id="expresi2" class="form-control" value="<?=$expresi2?>">
					</div>
					<!-- 3 -->
					<div class="col-md-12 mb-2">
						<button disabled type="button" class="btn btn-block btn-warning">Juri 3</button>
					</div>
					<div class="col-md-3">
						<label for="suara3">Suara</label>
						<input type="number" placeholder="Suara" name="suara3" id="suara3" class="form-control" value="<?=$suara3?>">
					</div>
					<div class="col-md-3">
						<label for="artikulasi3">Artikulasi</label>
						<input type="number" placeholder="Artikulasi" name="artikulasi3" id="artikulasi3" class="form-control" value="<?=$artikulasi3?>">
					</div>
					<div class="col-md-3">
						<label for="urutan_aba3">Urutan Aba Aba</label>
						<input type="number" placeholder="Urutan Aba Aba" name="urutan_aba3" id="urutan_aba3" class="form-control" value="<?=$urutan_aba3?>">
					</div>
					<div class="col-md-3 mb-2">
						<label for="expresi3">Expresi</label>
						<input type="number" placeholder="Expresi" name="expresi3" id="expresi3" class="form-control" value="<?=$expresi3?>">
					</div>
					<!-- 4 -->
					<div class="col-md-12 mb-2">
						<button disabled type="button" class="btn btn-block btn-danger">Juri 4</button>
					</div>
					<div class="col-md-3">
						<label for="suara4">Suara</label>
						<input type="number" placeholder="Suara" name="suara4" id="suara4" class="form-control" value="<?=$suara4?>">
					</div>
					<div class="col-md-3">
						<label for="artikulasi4">Artikulasi</label>
						<input type="number" placeholder="Artikulasi" name="artikulasi4" id="artikulasi4" class="form-control" value="<?=$artikulasi4?>">
					</div>
					<div class="col-md-3">
						<label for="urutan_aba4">Urutan Aba Aba</label>
						<input type="number" placeholder="Urutan Aba Aba" name="urutan_aba4" id="urutan_aba4" class="form-control" value="<?=$urutan_aba4?>">
					</div>
					<div class="col-md-3 mb-2">
						<label for="expresi4">Expresi</label>
						<input type="number" placeholder="Expresi" name="expresi4" id="expresi4" class="form-control" value="<?=$expresi4?>">
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