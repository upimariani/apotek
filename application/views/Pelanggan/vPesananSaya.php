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
				<div class="shopping__cart__table">
					<table>
						<thead>
							<tr>
								<th>Tanggal Transaksi</th>
								<th>Total Transaksi</th>
								<th>Ongkos Kirim</th>
								<th>Total Pembayaran</th>
								<th>Status Transaksi</th>
								<th>Detail Transaksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($transaksi as $key => $value) {
							?>
								<tr>
									<td><?= $value->tgl_transaksi ?></td>
									<td>Rp. <?= number_format($value->total_transaksi) ?></td>
									<td>Rp. <?= number_format($value->ongkir) ?></td>
									<td>Rp. <?= number_format($value->total_pembayaran) ?></td>
									<td><?php if ($value->stat_transaksi == '0') {
										?>
											<span class="badge badge-danger">Belum Bayar</span>
										<?php
										} else if ($value->stat_transaksi == '1') {
										?>
											<span class="badge badge-warning">Menunggu Konfirmasi</span>
										<?php
										} else if ($value->stat_transaksi == '2') {
										?>
											<span class="badge badge-primary">Pesanan Diproses</span>
										<?php
										} else if ($value->stat_transaksi == '3') {
										?>
											<span class="badge badge-info">Pesanan Dikirim</span>
										<?php
										} else if ($value->stat_transaksi == '4') {
										?>
											<span class="badge badge-success">Pesanan Selesai</span>
										<?php
										} ?>
									</td>
									<td class="text-center"><a href="<?= base_url('Pelanggan/cPesananSaya/detail_pesanan/' . $value->id_transaksi) ?>" class="primary-btn">...</a></td>
								</tr>
							<?php
							}
							?>


						</tbody>
					</table>
				</div>

			</div>




		</div>

	</div>
</section>
<!-- Pesanan Saya Section End -->
