
<?php 
require_once '../../library/config.php';

$id_nj = $_GET['id'];
$SQL = $mysqli->query("SELECT * FROM nilai_juri WHERE id_nj='$id_nj'");
$data = mysqli_fetch_assoc($SQL);

$dataIdPeserta = isset($_POST['id_peserta'])?$_POST['id_peserta']:$data['id_peserta'];
$nilai_bahan_kostum = isset($_POST['nilai_bahan_kostum'])?$_POST['nilai_bahan_kostum']:$data['nilai_bahan_kostum'];
$nilai_kerumitan_kostum = isset($_POST['nilai_kerumitan_kostum'])?$_POST['nilai_kerumitan_kostum']:$data['nilai_kerumitan_kostum'];
$nilai_tema_kostum = isset($_POST['nilai_tema_kostum'])?$_POST['nilai_tema_kostum']:$data['nilai_tema_kostum'];
$nilai_selaras_kostum = isset($_POST['nilai_selaras_kostum'])?$_POST['nilai_selaras_kostum']:$data['nilai_selaras_kostum'];
?>

<div class="modal-dialog modal-xl modal-dialog-centered">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Edit Nilai Juri</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		<form method="POST" action="nilai_juri/proses_edit.php">
			<input type="hidden" name="id_nj" value="<?=$id_nj?>">
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
					<div class="col-md-3">
						<label for="nilai_bahan_kostum">Kualitas Bahan</label>
						<input type="number" placeholder="Kualitas Bahan" name="nilai_bahan_kostum" id="nilai_bahan_kostum" class="form-control" value="<?=$nilai_bahan_kostum?>">
					</div>
					<div class="col-md-3">
						<label for="nilai_kerumitan_kostum">Kerumitan Kostum</label>
						<input type="number" placeholder="Kerumitan Kostum" name="nilai_kerumitan_kostum" id="nilai_kerumitan_kostum" class="form-control" value="<?=$nilai_kerumitan_kostum?>">
					</div>
					<div class="col-md-3">
						<label for="nilai_tema_kostum">Kesesuaian Tema</label>
						<input type="number" placeholder="Kesesuaian Tema" name="nilai_tema_kostum" id="nilai_tema_kostum" class="form-control" value="<?=$nilai_tema_kostum?>">
					</div>
					<div class="col-md-3">
						<label for="nilai_selaras_kostum">Keselarasan Kostum</label>
						<input type="number" placeholder="Keselarasan Kostum" name="nilai_selaras_kostum" id="nilai_selaras_kostum" class="form-control" value="<?=$nilai_selaras_kostum?>">
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