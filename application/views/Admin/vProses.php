<main class="h-full pb-16 overflow-y-auto">
	<div class="container grid px-6 mx-auto">
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Transaksi Pelanggan
		</h2>
		<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
			Informasi Transaksi Sedang Diproses
		</h4>
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
							<th class="px-4 py-3">Nama Pelanggan</th>
							<th class="px-4 py-3">Tanggal Transaksi</th>
							<th class="px-4 py-3">Total Pembayaran</th>
							<th class="px-4 py-3">Detail</th>
						</tr>
					</thead>
					<tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
						<?php
						foreach ($transaksi['proses'] as $key => $value) {
						?>
							<tr class="text-gray-700 dark:text-gray-400">
								<td class="px-4 py-3">
									<div class="flex items-center text-sm">
										<!-- Avatar with inset shadow -->

										<div>
											<p class="font-semibold"><?= $value->nama_pelanggan ?></p>
											<p class="text-xs text-gray-600 dark:text-gray-400">
												<?= $value->no_hp ?>
											</p>
										</div>
									</div>
								</td>
								<td class="px-4 py-3 text-xs">
									<span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
										<?= $value->tgl_transaksi ?>
									</span>
								</td>
								<td class="px-4 py-3 text-xs">
									<span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
										Rp. <?= number_format($value->total_pembayaran) ?>
									</span>
								</td>

								<td class="px-4 py-3">
									<div class="flex items-center space-x-4 text-sm">
										<a href="<?= base_url('Admin/cTransaksi/detail_transaksi/' . $value->id_transaksi) ?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
											<svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
												<path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
											</svg>
										</a>

									</div>
								</td>
							</tr>
						<?php
						}
						?>


					</tbody>
				</table>
			</div>

		</div>
	</div>
</main>