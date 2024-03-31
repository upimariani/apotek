<main class="h-full pb-16 overflow-y-auto">
	<div class="container grid px-6 mx-auto">
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Obat
		</h2>
		<!-- CTA -->
		<a href="<?= base_url('Admin/cObat/create') ?>" class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
			<div class="flex items-center">
				<svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
					<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
				</svg>
				Tambah Data Obat


			</div>
			<span> &RightArrow;</span>
		</a>

		<!-- With actions -->
		<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
			Informasi Obat
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
							<th class="px-4 py-3">Nama Obat</th>
							<th class="px-4 py-3">Deskripsi</th>
							<th class="px-4 py-3">Keterangan</th>
							<th class="px-4 py-3">Harga</th>
							<th class="px-4 py-3">Stok</th>
							<th class="px-4 py-3">Actions</th>
						</tr>
					</thead>
					<tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
						<?php
						foreach ($obat as $key => $value) {
						?>
							<tr class="text-gray-700 dark:text-gray-400">
								<td class="px-4 py-3">
									<div class="flex items-center text-sm">
										<!-- Avatar with inset shadow -->
										<div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
											<img class="object-cover w-full h-full rounded-full" src="<?= base_url('asset/foto-obat/' . $value->foto) ?>" alt="" loading="lazy" />
											<div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
										</div>
										<div>
											<p class="font-semibold"><?= $value->nama_obat ?></p>
											<p class="text-xs text-gray-600 dark:text-gray-400">
												<?= $value->nama_kategori ?>
											</p>
										</div>
									</div>
								</td>
								<td class="px-4 py-3 text-sm">
									<?= $value->deskripsi_obat ?>
								</td>
								<td class="px-4 py-3 text-xs">
									<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
										<?= $value->keterangan ?>
									</span>
								</td>
								<td class="px-4 py-3 text-xs">
									Rp. <?= number_format($value->harga) ?>
								</td>
								<td class="px-4 py-3 text-sm">
									<?= $value->stok ?>
								</td>
								<td class="px-4 py-3">
									<div class="flex items-center space-x-4 text-sm">
										<a href="<?= base_url('Admin/cObat/update/' . $value->id_obat) ?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
											<svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
												<path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
											</svg>
										</a>
										<a href="<?= base_url('Admin/cObat/delete/' . $value->id_obat) ?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
											<svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
												<path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
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
<!-- Modal backdrop. This what you want to place close to the closing body tag -->

<!-- End of modal backdrop -->
