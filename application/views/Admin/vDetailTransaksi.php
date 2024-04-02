<main class="h-full pb-16 overflow-y-auto">
	<div class="container grid px-6 mx-auto">
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Transaksi Pelanggan
		</h2>
		<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
			Informasi Detail Transaksi
		</h4>
		<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
			<p class="mb-4 text-sm font-semibold text-gray-600 dark:text-gray-300">
				Atas Nama : <?= $detail['pelanggan']->nama_pelanggan ?><br>
				No Telepon : <?= $detail['pelanggan']->no_hp ?><br>
				Alamat Pengiriman : <?= $detail['pelanggan']->alamat_pengiriman ?><br>

			</p>
			<?php
			if ($detail['pelanggan']->stat_transaksi != '0') {
			?>
				<hr>
				<p class="mb-4 text-sm font-semibold text-gray-600 dark:text-gray-300">
					Bukti Pembayaran
				</p>
				<img style="width: 150px;" src="<?= base_url('asset/pembayaran/' . $detail['pelanggan']->bukti_pembayaran) ?>">
			<?php
			}
			?>

		</div>

		<?php
		if ($this->session->userdata('success') != '') {
		?>
			<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
				<div class="flex">
					<div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
							<path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
						</svg></div>
					<div>
						<p class="font-bold">Sukses!</p>
						<p class="text-sm"><?= $this->session->userdata('success') ?></p>
					</div>
				</div>
			</div>
		<?php
		}
		?>
		<div class="w-full overflow-hidden rounded-lg shadow-xs">
			<div class="w-full overflow-x-auto">
				<table class="w-full whitespace-no-wrap">
					<thead>
						<tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
							<th class="px-4 py-3">Quantity</th>
							<th class="px-4 py-3">Nama Obat</th>
							<th class="px-4 py-3">Harga</th>
							<th class="px-4 py-3">SubTotal</th>
						</tr>
					</thead>
					<tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
						<?php
						foreach ($detail['obat'] as $key => $value) {
						?>
							<tr class="text-gray-700 dark:text-gray-400">
								<td class="px-4 py-3">
									<div class="flex items-center text-sm">
										<!-- Avatar with inset shadow -->

										<div>
											<p class="font-semibold"><?= $value->qty ?> x</p>

										</div>
									</div>
								</td>
								<td class="px-4 py-3 text-xs">
									<span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
										<?= $value->nama_obat ?>
									</span>
								</td>
								<td class="px-4 py-3 text-xs">
									<span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
										Rp. <?= number_format($value->harga) ?>
									</span>
								</td>
								<td class="px-4 py-3 text-xs">
									Rp. <?= number_format($value->harga * $value->qty) ?>

								</td>


							</tr>
						<?php
						}
						?>


					</tbody>
				</table>
				<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
					<table class="w-full whitespace-no-wrap">
						<tr class="text-gray-700 dark:text-gray-400">
							<td class="px-4 py-3 text-xs">SubTotal</td>
							<td class=" px-4 py-3 text-xs">Rp. <?= number_format($detail['pelanggan']->total_transaksi) ?></td>
						</tr>
						<tr class="text-gray-700 dark:text-gray-400">
							<td class="px-4 py-3 text-xs">Ongkos Kirim</td>
							<td class=" px-4 py-3 text-xs">Rp. <?= number_format($detail['pelanggan']->ongkir) ?></td>
						</tr>
						<tr class="text-gray-700 dark:text-gray-400">
							<td class="px-4 py-3 text-xs">Diskon</td>
							<td class=" px-4 py-3 text-xs">Rp. <?= number_format($detail['pelanggan']->total_pembayaran - ($detail['pelanggan']->total_transaksi + $detail['pelanggan']->ongkir)) ?></td>
						</tr>
						<tr class="text-gray-700 dark:text-gray-400">
							<td class="px-4 py-3 text-xs">Total Pembayaran</td>
							<td class=" px-4 py-3 text-xs"><strong>Rp. <?= number_format($detail['pelanggan']->total_pembayaran) ?></strong></td>
						</tr>
					</table>

				</div>
				<?php
				if ($detail['pelanggan']->stat_transaksi == '1') {
				?>
					<a href="<?= base_url('Admin/cTransaksi/konfirmasi_pesanan/' . $detail['pelanggan']->id_pelanggan) ?>" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
						<span>Konfirmasi Pesanan</span>
						<svg class="w-4 h-4 ml-2 -mr-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
							<path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" fill-rule="evenodd"></path>
						</svg>
					</a>
				<?php
				}
				?>
				<?php
				if ($detail['pelanggan']->stat_transaksi == '2') {
				?>
					<a href="<?= base_url('Admin/cTransaksi/kirim_pesanan/' . $detail['pelanggan']->id_pelanggan) ?>" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
						<span>Pesanan Dikirim</span>
						<svg class="w-4 h-4 ml-2 -mr-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
							<path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" fill-rule="evenodd"></path>
						</svg>
					</a>
				<?php
				}
				?>

			</div>

		</div>
	</div>
</main>
