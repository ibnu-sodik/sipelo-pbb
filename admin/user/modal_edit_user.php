<?php 
require_once '../../library/config.php';

$id = $_GET['id'];
$SQL = $mysqli->query("SELECT * FROM user WHERE id='$id'");
$data = mysqli_fetch_assoc($SQL);
?>
<!-- modal edit -->

<div class="modal-dialog modal-xl modal-dialog-centered">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title" id="myModalLabelEdi">Edit Peserta</h4>
			<button class="close" type="button" data-dismiss="modal" aria-hidden="true">X</button>
		</div>
		<form action="user/proses_edit.php" name="modal_form" method="POST">
			<div class="modal-body">
				<input type="hidden" name="id" value="<?=$data['id']?>">
				<div class="form-group">
					<label for="f_nama">Nama Depan</label>
					<input type="text" name="f_nama" id="f_nama" class="form-control" placeholder="Nama Depan" value="<?=$data['f_nama']?>">
				</div>

				<div class="form-group">
					<label for="l_nama">Nama Belakang</label>
					<input type="text" name="l_nama" id="l_nama" class="form-control" placeholder="Nama Belakang" value="<?=$data['l_nama']?>">
				</div>

				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?=$data['username']?>">
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password2" class="form-control" placeholder="Password">
					<label>
						<input type="checkbox" onclick="myFunction2()"> Show Password
					</label>

				</div>

				<div class="form-group">
					<label for="hak_akses">Hak Akses</label>
					<select id="hak_akses" name="hak_akses" class="form-control select2">
						<option value="">----- Pilih Hak Akses -----</option>
						<option value="Admin" <?php if($data['hak_akses']=="Admin"){echo "selected";} ?>>Admin</option>
						<option value="Operator" <?php if($data['hak_akses']=="Operator"){echo "selected";} ?>>Operator</option>
					</select>
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