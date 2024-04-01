<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__text">
					<h4>Pesanan Saya</h4>
					<div class="breadcrumb__links">
						<a href="./index.html">Home</a>
						<a href="./shop.html">Shop</a>
						<span>Pesanan Saya</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Breadcrumb Section End -->

<!-- Pesanan Saya Section Begin -->
<section class="shopping-cart spad">
	<div class="container">
		<div class="row">

			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="invoice-title">
							<h4 class="float-end font-size-15">Invoice #<?= $detail['pelanggan']->id_transaksi ?> <span class="badge bg-success font-size-12 ms-2"><?php if ($detail['pelanggan']->stat_transaksi == '0') {
																																									?>
										Belum Bayar
									<?php
																																									} else if ($detail['pelanggan']->stat_transaksi == '1') {
									?>
										Menunggu Konfirmasi
									<?php
																																									} else if ($detail['pelanggan']->stat_transaksi == '2') {
									?>
										Pesanan Diproses
									<?php
																																									} else if ($detail['pelanggan']->stat_transaksi == '3') {
									?>
										Pesanan Dikirim
									<?php
																																									} else if ($detail['pelanggan']->stat_transaksi == '4') {
									?>
										Pesanan Selesai
									<?php
																																									} ?></span></h4>
							<div class="mb-4">
								<h2 class="mb-1 text-muted">Apotek Agra Medika</h2>
							</div>
							<div class="text-muted">
								<p class="mb-1">Jln. Cut Nyak Dien RT.20 / RW.02 , </p>
								<p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> Cijoho Kecamatan Kuningan Kabupaten Kuningan</p>
								<p><i class="uil uil-phone me-1"></i> Jawa Barat</p>
							</div>
						</div>

						<hr class="my-4">

						<div class="row">
							<div class="col-sm-6">
								<div class="text-muted">
									<h5 class="font-size-16 mb-3">Billed To:</h5>
									<h5 class="font-size-15 mb-2"><?= $detail['pelanggan']->nama_pelanggan ?>r</h5>
									<p class="mb-1"><?= $detail['pelanggan']->alamat ?></p>
									<p class="mb-1"><?= $detail['pelanggan']->alamat_pengiriman ?></p>
									<p><?= $detail['pelanggan']->no_hp ?></p>
								</div>
							</div>
							<!-- end col -->
							<div class="col-sm-6">
								<div class="text-muted text-sm-end">
									<div>
										<h5 class="font-size-15 mb-1">Invoice No:</h5>
										<p>#<?= $detail['pelanggan']->id_transaksi ?></p>
									</div>
									<div class="mt-4">
										<h5 class="font-size-15 mb-1">Invoice Date:</h5>
										<p><?= $detail['pelanggan']->tgl_transaksi ?>0</p>
									</div>

								</div>
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->

						<div class="py-2">
							<h5 class="font-size-15">Order Summary</h5>

							<div class="table-responsive">
								<table class="table align-middle table-nowrap table-centered mb-0">
									<thead>
										<tr>
											<th style="width: 70px;">No.</th>
											<th>Item</th>
											<th>Price</th>
											<th>Quantity</th>
											<th class="text-end" style="width: 120px;">Total</th>
										</tr>
									</thead><!-- end thead -->
									<tbody>
										<?php
										$no = 1;
										foreach ($detail['obat'] as $key => $value) {
										?>
											<tr>
												<th scope="row"><?= $no++ ?></th>
												<td>
													<div>
														<h5 class="text-truncate font-size-14 mb-1"><?= $value->nama_obat ?></h5>
														<p class="text-muted mb-0"><?= $value->nama_kategori ?></p>
													</div>
												</td>
												<td>Rp. <?= number_format($value->harga) ?></td>
												<td><?= $value->qty ?></td>
												<td class="text-end">Rp. <?= number_format($value->harga * $value->qty) ?></td>
											</tr>
											<tr>
												<th scope="row" colspan="4" class="text-end">Sub Total</th>
												<td class="text-end">Rp. <?= number_format($value->total_transaksi) ?></td>
											</tr>
											<!-- end tr -->
											<tr>
												<th scope="row" colspan="4" class="border-0 text-end">
													Discount :</th>
												<td class="border-0 text-end">0</td>
											</tr>
											<!-- end tr -->
											<tr>
												<th scope="row" colspan="4" class="border-0 text-end">
													Ongkos Kirim :</th>
												<td class="border-0 text-end">Rp. <?= number_format($value->ongkir) ?></td>
											</tr>

											<tr>
												<th scope="row" colspan="4" class="border-0 text-end">Total</th>
												<td class="border-0 text-end">
													<h5 class="m-0 fw-semibold">Rp. <?= number_format($value->total_pembayaran) ?></h5>
												</td>
											</tr>
										<?php
										}
										?>

									</tbody><!-- end tbody -->
								</table><!-- end table -->
							</div><!-- end table responsive -->
							<div class="d-print-none mt-4">
								<div class="float-end">
									<a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
									<a href="<?= base_url('Pelanggan/cPesananSaya') ?>" class="btn btn-danger w-md">Kembali</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- end col -->
		</div>

	</div>
</section>
<!-- Pesanan Saya Section End -->