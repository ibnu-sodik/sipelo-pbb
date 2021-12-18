<link href="<?= base_url() ?>/assets/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/select2-bootstrap.min.css">
<script src="<?= base_url() ?>/assets/js/select2.min.js"></script>

<h1 class="mt-4">user</h1>
<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item active">Data user</li>
</ol>

<a href="#" class="btn btn-primary mb-2" data-target="#ModalAdduser" data-toggle="modal" title="Tambah User">
	<i class="fa fa-plus mr-1"></i> Tambah User
</a>

<div class="card mb-4">
	<div class="card-header">
		<i class="fas fa-table mr-1"></i>
		DataTable user
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Nama Depan</th>
						<th class="text-center">Nama Belakang</th>
						<th class="text-center">Username</th>
						<th class="text-center">Opsi</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Nama Depan</th>
						<th class="text-center">Nama Belakang</th>
						<th class="text-center">Username</th>
						<th class="text-center">Opsi</th>
					</tr>
				</tfoot>
				<tbody>
					<?php 
					$no=0;
					$SQL = $mysqli->query("SELECT * FROM user ORDER BY l_nama DESC");
					while($data=mysqli_fetch_assoc($SQL)):
						$no++;
						?>
						<tr>
							<td class="text-center"><?= $no; ?></td>
							<td class="text-center"><?= $data['f_nama'] ?></td>
							<td class="text-center"><?= $data['l_nama']; ?></td>
							<td class="text-center"><?= $data['username']; ?></td>
							<td class="text-center">
								<a href="javascript:void(0)" class="modal_edit_user btn btn-sm btn-warning" data-target="#ModalEditUserUser" data-toggle="modal" id="<?=$data['id'];?>" title="Edit">
									<span class="fa fa-edit"></span>
								</a>
								<?php if ($data['hak_akses']!='Admin') {
									?>
									<a href="javascript:void(0)" class="btn btn-danger btn-sm mb-1" data-target="#ModalDeleteUser" title="Hapus" onclick="konfir_hapus_user('user/proses_hapus.php?&id=<?php echo $data['id']; ?>');">
										<span class="fa fa-trash"></span>
									</a>
									<?php
								} ?>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- modal add -->
<div id="ModalAdduser" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Tambah User</h4>
				<button class="close" type="button" data-dismiss="modal" aria-hidden="true">X</button>
			</div>
			<form action="" name="modal_form" method="POST">
				<div class="modal-body">

					<div class="form-group">
						<label for="f_nama">Nama Depan</label>
						<input type="text" name="f_nama" id="f_nama" class="form-control" placeholder="Nama Depan">
					</div>

					<div class="form-group">
						<label for="l_nama">Nama Belakang</label>
						<input type="text" name="l_nama" id="l_nama" class="form-control" placeholder="Nama Belakang">
					</div>

					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" class="form-control" placeholder="Username">
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="Password">
						<label>
							<input type="checkbox" onclick="myFunction()"> Show Password
						</label>
					</div>

					<div class="form-group">
						<label for="hak_akses">Hak Akses</label>
						<select id="hak_akses" name="hak_akses" class="form-control">
							<option value="">----- Pilih Hak Akses -----</option>
							<option value="Admin">Admin</option>
							<option value="Operator">Operator</option>
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

<script type="text/javascript">
	function myFunction() {
		var x = document.getElementById("password");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
	function myFunction2() {
		var x = document.getElementById("password2");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
</script>
<?php 
if (isset($_POST['simpan'])) {
	$f_nama 	= sanitize($_POST['f_nama']);
	$l_nama 	= sanitize($_POST['l_nama']);
	$username 	= sanitize($_POST['username']);
	$hak_akses 	= $_POST['hak_akses'];
	$password 	= sanitize($_POST['password']);

	// validasi
	$errors = array();
	if (trim($f_nama)=="") {
		$errors[] = "Nama Depan Belum Diisi.!";
	}
	if (trim($l_nama)=="") {
		$errors[] = "Nama Belakang Belum Diisi.!";
	}
	if (trim($username)=="") {
		$errors[] = "Username Belum Diisi.!";
	}
	if (trim($password)=="") {
		$errors[] = "Password Belum Diisi.!";
	}
	if (trim($hak_akses)=="") {
		$errors[] = "Hak Akses Belum Dipilih.!";
	}

	$SQL2 = $mysqli->query("SELECT * FROM user WHERE
		l_nama = '$l_nama' and
		f_nama = '$f_nama' and
		username = '$username'
		");
	if (mysqli_num_rows($SQL2) == 1) {
		$errors[] = "Maaf, user Yang Sama Dengan Data Persis ".$l_nama." Suda Ada.!";
	}

	if (!empty($errors)) {
		echo display_errors($errors);
	}else{
		$new_pass = password_hash($password, PASSWORD_DEFAULT);
		$mysqli->query("INSERT INTO user SET
			f_nama 		= '$f_nama',
			l_nama 		= '$l_nama',
			username 	= '$username',
			password 	= '$new_pass',
			hak_akses	= '$hak_akses'
			");
		$text = "Berhasil Menambahkan ".$l_nama;
		echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '');
	}
}
?>

<div id="ModalEditUser" class="modal fade" role="dialog" aria-labelledby="myModalLabelEdit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

		</div>
	</div>
</div>
<!-- modal delete -->
<div class="modal fade" id="ModalDeleteUser">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Anda Yakin Ingin Mneghapus Data Ini</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn btn-primary" id="link_hapus_user">
					<span class="fa fa-check"></span> Ya
				</a>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-minus-square"></span> Tidak</button>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#dataTable').DataTable({
			responsive: {
				details: false
			}
		});

		$('#hak_akses').select2({
			theme: 'bootstrap',
			width: 'resolve'
		});

		$("#dataTable").on('click', '.modal_edit_user', function(e) {
			var m = $(this).attr("id");
			$.ajax({
				url: "user/modal_edit_user.php",
				type: "GET",
				data: {id: m,},
				success: function(ajaxData){
					$("#ModalEditUser").html(ajaxData);
					$("#ModalEditUser").modal('show', {backdrop: 'static'});
					$('.select2').select2({
						theme: 'bootstrap',
						dropdownParent: $('#ModalEditUser')
					});
				}
			});
		});
	});

	function konfir_hapus_user(delete_url){
		$('#ModalDeleteUser').modal('show', {backdrop: 'static'});
		document.getElementById('link_hapus_user').setAttribute('href' , delete_url);
	}
</script>