<?php 
require_once '../../library/config.php';

$id_nm = $_GET['id'];
$SQL = $mysqli->query("SELECT * FROM nilai_minus WHERE id_nm='$id_nm'");
$data = mysqli_fetch_assoc($SQL);
$dataIdPeserta = isset($_POST['id_peserta'])?$_POST['id_peserta']:$data['id_peserta'];


$upacara_telat = isset($_POST['upacara_telat'])?$_POST['upacara_telat']:$data['upacara_telat'];
$upacara_tidak = isset($_POST['upacara_tidak'])?$_POST['upacara_tidak']:$data['upacara_tidak'];
$anggota_kurang = isset($_POST['anggota_kurang'])?$_POST['anggota_kurang']:$data['anggota_kurang'];
$anggota_tak_sesuai = isset($_POST['anggota_tak_sesuai'])?$_POST['anggota_tak_sesuai']:$data['anggota_tak_sesuai'];
$danton_tak_sesuai = isset($_POST['danton_tak_sesuai'])?$_POST['danton_tak_sesuai']:$data['danton_tak_sesuai'];
$atribut_tak_sesuai = isset($_POST['atribut_tak_sesuai'])?$_POST['atribut_tak_sesuai']:$data['atribut_tak_sesuai'];
$atribut_lepas = isset($_POST['atribut_lepas'])?$_POST['atribut_lepas']:$data['atribut_lepas'];
$apatis = isset($_POST['apatis'])?$_POST['apatis']:$data['apatis'];
$tak_siap_tampil = isset($_POST['tak_siap_tampil'])?$_POST['tak_siap_tampil']:$data['tak_siap_tampil'];
$aba_tak_urut = isset($_POST['aba_tak_urut'])?$_POST['aba_tak_urut']:$data['aba_tak_urut'];
$aba_terlewat = isset($_POST['aba_terlewat'])?$_POST['aba_terlewat']:$data['aba_terlewat'];
$aba_salah = isset($_POST['aba_salah'])?$_POST['aba_salah']:$data['aba_salah'];
$pingsan = isset($_POST['pingsan'])?$_POST['pingsan']:$data['pingsan'];
$danton_pingsan = isset($_POST['danton_pingsan'])?$_POST['danton_pingsan']:$data['danton_pingsan'];
$lewat_garis = isset($_POST['lewat_garis'])?$_POST['lewat_garis']:$data['lewat_garis'];
?>
<div class="modal-dialog modal-xl modal-dialog-centered">
	<div class="modal-content">

		<div class="modal-header">
			<h4 class="modal-title" id="myModalLabel">Tambah Nilai Minus</h4>
			<button class="close" type="button" data-dismiss="modal" aria-hidden="true">X</button>
		</div>
		<form method="POST" action="nilai_minus/proses_edit.php">
			<input type="hidden" name="id_nm" value="<?=$id_nm?>">
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
						<button disabled type="button" class="btn btn-block btn-info">Upacara</button>
					</div>
					<div class="col-md-6">
						<label for="upacara_telat">Terlambat Upacara -200</label>
						<input type="number" placeholder="Terlambat Upacara" name="upacara_telat" id="upacara_telat" class="form-control" value="<?=$upacara_telat?>">
					</div>
					<div class="col-md-6 mb-2">
						<label for="upacara_tidak">Tidak Ikut Upacara -300</label>
						<input type="number" placeholder="Tidak Ikut Upacara" name="upacara_tidak" id="upacara_tidak" class="form-control" value="<?=$upacara_tidak?>">
					</div>
					<div class="col-md-12 mb-2">
						<button disabled type="button" class="btn btn-block btn-primary">Anggota</button>
					</div>
					<div class="col-md-6">
						<label for="anggota_kurang">Anggota Kurang -50/p</label>
						<input type="number" placeholder="Anggota Kurang" name="anggota_kurang" id="anggota_kurang" class="form-control" value="<?=$anggota_kurang?>">
					</div>
					<div class="col-md-6">
						<label for="anggota_tak_sesuai">Anggota Tak Sesuai Form -50/p</label>
						<input type="number" placeholder="Anggota Tak Sesuai Form" name="anggota_tak_sesuai" id="anggota_tak_sesuai" class="form-control" value="<?=$anggota_tak_sesuai?>">
					</div>
					<div class="col-md-6">
						<label for="danton_tak_sesuai">Danton Tak Sesuai Form -100</label>
						<input type="number" placeholder="Danton Tak Sesuai Form" name="danton_tak_sesuai" id="danton_tak_sesuai" class="form-control" value="<?=$danton_tak_sesuai?>">
					</div>
					<div class="col-md-6 mb-2">
						<label for="atribut_tak_sesuai">Atribut Tak Sesuai Form -10/p</label>
						<input type="number" placeholder="Atribut Tak Sesuai Form" name="atribut_tak_sesuai" id="atribut_tak_sesuai" class="form-control" value="<?=$atribut_tak_sesuai?>">
					</div>

					<div class="col-md-12 mb-2">
						<button disabled type="button" class="btn btn-block btn-warning">Perform</button>
					</div>
					<div class="col-md-4">
						<label for="atribut_lepas">Atribut Lepas -15/p</label>
						<input type="number" placeholder="Atribut Lepas" name="atribut_lepas" id="atribut_lepas" class="form-control" value="<?=$atribut_lepas?>">
					</div>
					<div class="col-md-4">
						<label for="apatis">Apatis -100</label>
						<input type="number" placeholder="Apatis" name="apatis" id="apatis" class="form-control" value="<?=$apatis?>">
					</div>
					<div class="col-md-4 mb-2">
						<label for="tak_siap_tampil">Tak Siap Tampil -250</label>
						<input type="number" placeholder="Danton Tak Siap Tampil" name="tak_siap_tampil" id="tak_siap_tampil" class="form-control" value="<?=$tak_siap_tampil?>">
					</div>
					<div class="col-md-12 mb-2">
						<button disabled type="button" class="btn btn-block btn-danger">Aba Aba</button>
					</div>
					<div class="col-md-4">
						<label for="aba_tak_urut">Aba Aba Tidak Urut -50</label>
						<input type="number" placeholder="Aba Aba Tidak Urut" name="aba_tak_urut" id="aba_tak_urut" class="form-control" value="<?=$aba_tak_urut?>">
					</div>
					<div class="col-md-4">
						<label for="aba_terlewat">Aba Aba Terlewat -50</label>
						<input type="number" placeholder="Ab Aba Terlewat" name="aba_terlewat" id="aba_terlewat" class="form-control" value="<?=$aba_terlewat?>">
					</div>
					<div class="col-md-4">
						<label for="aba_salah">Aba Aba Danton Salah -100</label>
						<input type="number" placeholder="Aba Aba Danton Salah" name="aba_salah" id="aba_salah" class="form-control" value="<?=$aba_salah?>">
					</div>
					<div class="col-md-4">
						<label for="pingsan">Peserta Pingsan -15/p</label>
						<input type="number" placeholder="Peserta Pingsan" name="pingsan" id="pingsan" class="form-control" value="<?=$pingsan?>">
					</div>
					<div class="col-md-4">
						<label for="danton_pingsan">Danton Pingsan -100</label>
						<input type="number" placeholder="Danton Pingsan" name="danton_pingsan" id="danton_pingsan" class="form-control" value="<?=$danton_pingsan?>">
					</div>
					<div class="col-md-4">
						<label for="lewat_garis">Melewati Garis -20/p</label>
						<input type="number" placeholder="Melewati Garis" name="lewat_garis" id="lewat_garis" class="form-control" value="<?=$lewat_garis?>">
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