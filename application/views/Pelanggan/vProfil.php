<!-- Contact Section Begin -->
<section class="contact spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="contact__text">
					<div class="section-title">
						<span>Informasi</span>
						<h2>Pelanggan</h2>
					</div>
					<?php
					if ($this->session->userdata('success') != '') {
					?>
						<div class="alert alert-success" role="alert">
							<?= $this->session->userdata('success') ?>
						</div>
					<?php
					}
					?>
					<ul>
						<li>
							<h4>Nama Pelanggan</h4>
							<p><?= $pelanggan->nama_pelanggan ?> <br /><?= $pelanggan->no_hp ?></p>
						</li>
						<li>
							<h4>Level Member Pelanggan</h4>
							<p><?= $pelanggan->point ?> <br /><?php
																if ($pelanggan->level_member == '3') {
																	echo 'Clasic';
																} else if ($pelanggan->level_member == '2') {
																	echo 'Silver';
																} else {
																	echo 'Gold';
																}
																?></p>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="contact__form">
					<form action="<?= base_url('Pelanggan/cProfil/update/' . $pelanggan->id_pelanggan) ?>" method="POST">
						<div class="row">
							<div class="col-lg-6">
								<label>Nama Pelanggan <span class="text-danger">*</span></label>
								<input type="text" name="nama" placeholder="Name" value="<?= $pelanggan->nama_pelanggan ?>">
							</div>
							<div class="col-lg-6">
								<label>Alamat <span class="text-danger">*</span></label>
								<input type="text" name="alamat" placeholder="Email" value="<?= $pelanggan->alamat ?>">
							</div>
							<div class="col-lg-6">
								<label>No Telepon <span class="text-danger">*</span></label>
								<input type="text" name="no_hp" placeholder="Email" value="<?= $pelanggan->no_hp ?>">
							</div>
							<div class="col-lg-6">
								<label>Jenis Kelamin <span class="text-danger">*</span></label>
								<input type="text" name="jk" placeholder="Email" value="<?= $pelanggan->jk ?>">
							</div>
							<div class="col-lg-6">
								<label>Username <span class="text-danger">*</span></label>
								<input type="text" name="username" placeholder="Email" value="<?= $pelanggan->username ?>">
							</div>
							<div class="col-lg-6">
								<label>Password <span class="text-danger">*</span></label>
								<input type="password" name="password" placeholder="Email" value="<?= $pelanggan->password ?>">
							</div>
							<div class="col-lg-12">
								<button type="submit" class="site-btn">Perbaharui Data Pelanggan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Contact Section End -->
