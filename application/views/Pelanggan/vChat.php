<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__text">
					<h4>Pesan</h4>
					<div class="breadcrumb__links">
						<a href="./index.html">Home</a>
						<a href="./shop.html">Shop</a>
						<span>Pesan</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
	<div class="container">


		<div class="col-md-12 col-lg-12 col-xl-12">
			<?php
			if ($this->session->userdata('success') != '') {
			?>
				<div class="alert alert-success" role="alert">
					<?= $this->session->userdata('success') ?>
				</div>
			<?php
			}
			?>
			<ul class="list-unstyled">
				<?php
				foreach ($chat as $key => $value) {
					if ($value->balasan == NULL) {
				?>
						<li class="d-flex justify-content-between mb-4">
							<img src="<?= base_url('asset/user.svg') ?>" alt="avatar" class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
							<div class="card w-100">
								<div class="card-header d-flex justify-content-between p-3">
									<p class="fw-bold mb-0 mr-3"><?= $value->nama_pelanggan ?></p><br>
									<p class="text-muted small mb-0"><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $value->time ?></p>
								</div>
								<div class="card-body">
									<p class="mb-0">
										<?= $value->chat ?>
									</p>
								</div>
							</div>
						</li>
					<?php
					} else {
					?>
						<li class="d-flex justify-content-between mb-4">
							<div class="card w-100">
								<div class="card-header d-flex justify-content-between p-3">
									<p class="fw-bold mb-0">Admin</p>
									<p class="text-muted small mb-0"><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $value->time ?></p>
								</div>
								<div class="card-body">
									<p class="mb-0">
										<?= $value->balasan ?>
									</p>
								</div>
							</div>
							<img src="<?= base_url('asset/user2.svg') ?>" alt="avatar" class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
						</li>
				<?php
					}
				}
				?>




				<form action="<?= base_url('Pelanggan/cChat') ?>" method="POST">
					<li class="bg-white mb-3">
						<div class="form-outline">
							<textarea class="form-control" name="pesan" id="textAreaExample2" rows="4" placeholder="Pesan..."></textarea>

						</div>
					</li>
					<button type="submit" class="btn btn-info btn-rounded float-end">Kirim</button>
				</form>
			</ul>

		</div>
	</div>
</section>
<!-- Shopping Cart Section End -->