<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url('asset/login-form-08/') ?>fonts/icomoon/style.css">

	<link rel="stylesheet" href="<?= base_url('asset/login-form-08/') ?>css/owl.carousel.min.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url('asset/login-form-08/') ?>css/bootstrap.min.css">

	<!-- Style -->
	<link rel="stylesheet" href="<?= base_url('asset/login-form-08/') ?>css/style.css">

	<title>REGISTRASI - APOTEK AGRA MEDIKA</title>
</head>

<body>



	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-6 order-md-2">
					<img src="<?= base_url('asset/login-form-08/') ?>images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
				</div>
				<div class="col-md-6 contents">
					<div class="row justify-content-center">
						<div class="col-md-8">
							<div class="mb-4">
								<h3>Registered to <strong>Apotek Agra Medika</strong></h3>
								<p class="mb-4">Silahkan melakukan registrasi untuk melakukan login.</p>
							</div>
							<form action="<?= base_url('Pelanggan/cLogin/registrasi') ?>" method="post">
								<div class="form-group first">
									<label for="username">Nama Pelanggan</label>
									<input type="text" name="nama" class="form-control" id="username">
									<?= form_error('nama', '<small class="text-danger">', '</small>') ?>

								</div>
								<div class="form-group last mb-4">
									<label for="password">Alamat</label>
									<input type="text" name="alamat" class="form-control" id="password">
									<?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group last mb-5">
									<label for="password">No Telepon</label>
									<input type="text" name="no_hp" class="form-control" id="password">
									<?= form_error('no_hp', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="row mb-5 form-group">
									<div class="col-lg-6">
										<input class="form-check-input" name="jk" value="Laki - Laki" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
										<label class="control control--checkbox mb-0">Laki - Laki</label>
									</div>
									<div class="col-lg-6">
										<input class="form-check-input" name="jk" value="Perempuan" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
										<label class="control control--checkbox mb-0">Perempuan</label>
									</div>
								</div>
								<?= form_error('jk', '<small class="text-danger">', '</small>') ?>


								<div class="form-group last mb-4">
									<label for="password">Username</label>
									<input type="text" name="username" class="form-control" id="password">
									<?= form_error('username', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group last mb-4">
									<label for="password">Password</label>
									<input type="text" name="password" class="form-control" id="password">
									<?= form_error('password', '<small class="text-danger">', '</small>') ?>
								</div>


								<input type="submit" value="Log In" class="btn text-white btn-block btn-primary">

								<a href="<?= base_url('Pelanggan/cLogin') ?>"><span class="d-block text-left my-4 text-muted"> or login here!</span></a>
							</form>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>


	<script src="<?= base_url('asset/login-form-08/') ?>js/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url('asset/login-form-08/') ?>js/popper.min.js"></script>
	<script src="<?= base_url('asset/login-form-08/') ?>js/bootstrap.min.js"></script>
	<script src="<?= base_url('asset/login-form-08/') ?>js/main.js"></script>
</body>

</html>