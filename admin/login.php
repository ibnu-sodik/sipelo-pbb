<?php 

// $password = "password";
// $hashed   = password_hash($password,PASSWORD_DEFAULT);
// echo $hashed;
require_once '../library/config.php';
require_once '../library/f_baseUrl.php';
require_once '../library/f_function.php';
require_once '../library/f_sweetalert.php';
require_once '../library/f_login.php';

$username = ((isset($_POST['username']))?sanitize($_POST['username']):'');
$username = trim($username);
$password = ((isset($_POST['password']))?sanitize($_POST['password']):'');
$password = trim($password);
$errors = array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="Aplikasi Sistem Penilaian Lomba Berbasis Web" />
	<meta name="author" content="IBNU SODIK" />
	<meta name="email" content="ibnusodik049@gmail.com" />
	<title>LOGIN :: SP GEMILANG</title>
	<link rel="icon" type="image/gif" href="<?=base_url('assets/images/logo.png')?>">
	<link href="<?= base_url() ?>/assets/css/styles.css" rel="stylesheet" />
	<link href="<?= base_url() ?>/assets/css/sweetalert.css" rel="stylesheet" />
	<script src="<?= base_url() ?>/assets/js/all.min.js"></script>
</head>
<body class="bg-primary">
	<div id="layoutAuthentication">
		<div id="layoutAuthentication_content">
			<main>
				<?php 

				if ($_POST) {
					if (empty($_POST['username']) || empty($_POST['password'])) {
						$errors[] = "Username Atau Password Salah.!";
					}
					$SQL = $mysqli->query("SELECT * FROM user WHERE username = '$username'");
					$user = mysqli_fetch_assoc($SQL);
					$userCount = mysqli_num_rows($SQL);
					if ($userCount < 1) {
						$errors[] = "Username tidak ada di database.";
					}
					if (!password_verify($password, $user['password'])) {
						$errors[] = "Password tidak cocok, mohon ulangi lagi.";
					}

					if (!empty($errors)) {
						echo display_errors($errors);
					} else {
						$user_id = $user['id'];
						login($user_id);
						
						$text = "Selamat Anda Berhasil Login.!";
						echo sweetalert('Berhasil...!', $text, 'success', 'false', '3000', '.');
					}
				}

				?>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-5">
							<div class="card shadow-lg border-0 rounded-lg mt-5">
								<div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
								<div class="card-body">
									<form method="post" action="">
										<div class="form-group">
											<label class="small mb-1" for="username">Username</label>
											<input class="form-control py-4" id="username" type="text" name="username" value="<?=$username?>" placeholder="Enter Username" autofocus/>
										</div>
										<div class="form-group">
											<label class="small mb-1" for="password">Password</label>
											<input class="form-control py-4" id="password" name="password" type="password" value="<?=$password?>" placeholder="Enter password" />
										</div>

										<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
											<div class="small">
												<a href="<?=base_url()?>">Visit Page.</a>
											</div>
											<button type="submit" name="" class="btn btn-primary">Login <span class="fa fa-arrow-right"></span></button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
		<div id="layoutAuthentication_footer">
			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Copyright &copy; Go-Blog Programming <?= date('Y') ?></div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<script src="<?= base_url() ?>/assets/js/jquery-3.5.1.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/scripts.js"></script>
	<script src="<?= base_url() ?>/assets/js/sweetalert.min.js"></script>
</body>
</html>
