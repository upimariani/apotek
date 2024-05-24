<main class="h-full overflow-y-auto">
	<div class="container px-6 mx-auto grid">
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Dashboard Admin
		</h2>
		<?php
		$pelanggan = $this->db->query("SELECT COUNT(id_pelanggan) as pelanggan FROM `pelanggan`")->row();
		$pendapatan = $this->db->query("SELECT SUM(total_transaksi) as pendapatan FROM `transaksi_obat`")->row();
		$produk = $this->db->query("SELECT COUNT(id_obat) as obat FROM `obat`")->row();
		$cs = $this->db->query("SELECT COUNT(id_chatting) as chat FROM `chatting` GROUP BY id_pelanggan")->row();
		?>
		<!-- Cards -->
		<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
			<!-- Card -->
			<div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
				<div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
						<path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
					</svg>
				</div>
				<div>
					<p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
						Total Pelanggan
					</p>
					<p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
						<?= $pelanggan->pelanggan ?>
					</p>
				</div>
			</div>
			<!-- Card -->
			<div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
				<div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
					</svg>
				</div>
				<div>
					<p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
						Pendapatan
					</p>
					<p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
						Rp. <?= number_format($pendapatan->pendapatan) ?>
					</p>
				</div>
			</div>
			<!-- Card -->
			<div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
				<div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
						<path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
					</svg>
				</div>
				<div>
					<p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
						Produk Obat
					</p>
					<p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
						<?= $produk->obat ?>
					</p>
				</div>
			</div>
			<!-- Card -->
			<div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
				<div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
					</svg>
				</div>
				<div>
					<p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
						Customer Service
					</p>
					<p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
						<?= $cs->chat ?>
					</p>
				</div>
			</div>
		</div>
		<!-- Charts -->
		<div class="mx-6 mb-10 overflow-hidden rounded-lg shadow-xs">
			<form action="<?= base_url('Admin/cDashboard/addtocart') ?>" method="POST">
				<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
					<h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
						Transaksi
					</h4>
					<label class="block mt-4 text-sm">
						<span class="text-gray-700 dark:text-gray-400">
							Transaksi Manual
						</span>
					</label>
					<label class="block mt-4 text-sm">
						<span class="text-gray-700 dark:text-gray-400">
							Nama Obat
						</span>
						<select name="produk" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
							<option value="">---Pilih Produk---</option>
							<?php
							$produk = $this->db->query("SELECT * FROM `obat`")->result();
							foreach ($produk as $key => $value) {
							?>
								<option value="<?= $value->id_obat ?>"><?= $value->nama_obat ?></option>
							<?php
							}
							?>


						</select>
					</label>
					<label class="block mt-4 text-sm">
						<span class="text-gray-700 dark:text-gray-400">
							Quantity Pesan
						</span>
						<input name="qty" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Masukkan Quantity Obat" />

					</label>
					<button type="submit" class="w-full mt-4 px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
						Tambah Keranjang
					</button>
				</div>
			</form>
		</div>

		<div class="mx-6 mb-10 overflow-hidden rounded-lg shadow-xs">
			<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
				<h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
					Keranjang
				</h4>
				<table class="w-full whitespace-no-wrap">
					<thead>
						<tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
							<th class="px-4 py-3">Nama Obat</th>
							<th class="px-4 py-3">Quantity</th>
							<th class="px-4 py-3">Harga</th>
							<th class="px-4 py-3">Subtotal</th>
							<th class="px-4 py-3">Actions</th>
						</tr>
					</thead>
					<tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
						<?php
						foreach ($this->cart->contents() as $key => $item) {
						?>
							<tr class="text-gray-700 dark:text-gray-400">

								<td class="px-4 py-3 text-sm">
									<?= $item['name'] ?>
								</td>
								<td class="px-4 py-3 text-xs">
									<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
										<?= $item['qty'] ?>
									</span>
								</td>
								<td class="px-4 py-3 text-xs">
									Rp. <?= number_format($item['price']) ?>
								</td>
								<td class="px-4 py-3 text-sm">
									Rp. <?= number_format($item['price'] * $item['qty']) ?>
								</td>
								<td class="px-4 py-3">
									<div class="flex items-center space-x-4 text-sm">

										<a href="<?= base_url('Admin/cDashboard/delete/' . $item['rowid']) ?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
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
						<tr>
							<td></td>
							<td></td>

							<td>Total: </td>
							<td>Rp. <?= number_format($this->cart->total()) ?></td>
							<td></td>
						</tr>
					</tbody>

				</table>
				<a href="<?= base_url('Admin/cDashboard/selesai') ?>" class="w-full mt-4 px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Pesanan Selesai</a>
			</div>
		</div>
		<!-- New Table -->
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Data Pelanggan
		</h2>
		<div class="mx-6 mb-10 overflow-hidden rounded-lg shadow-xs">
			<div class="w-full overflow-x-auto">
				<table class="w-full whitespace-no-wrap">
					<thead>
						<tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
							<th class="px-4 py-3">Nama Pelanggan</th>
							<th class="px-4 py-3">Alamat</th>
							<th class="px-4 py-3">No Telepon</th>
							<th class="px-4 py-3">Jenis Kelamin</th>
							<th class="px-4 py-3">Point</th>
							<th class="px-4 py-3">Level Member</th>
						</tr>
					</thead>
					<tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
						<?php
						$pelanggan = $this->db->query("SELECT * FROM `pelanggan`")->result();
						foreach ($pelanggan as $key => $value) {
						?>
							<tr class="text-gray-700 dark:text-gray-400">
								<td class="px-4 py-3 text-xs">
									<?= $value->nama_pelanggan ?>
								</td>
								<td class="px-4 py-3 text-xs">
									<?= $value->alamat ?>
								</td>
								<td class="px-4 py-3 text-xs">
									<?= $value->no_hp ?>
								</td>
								<td class="px-4 py-3 text-xs">
									<?= $value->jk ?>
								</td>
								<td class="px-4 py-3 text-xs">
									<?= $value->point ?>
								</td>
								<td class="px-4 py-3 text-xs">
									<?php
									if ($value->level_member == '3') {
										echo 'Clasic';
									} else if ($value->level_member == '2') {
										echo 'Silver';
									} else {
										echo 'Gold';
									}
									?>
								</td>
							</tr>
						<?php
						}
						?>


					</tbody>
				</table>
			</div>

		</div>
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Grafik
		</h2>
		<div class="mx-6 mb-10 overflow-hidden rounded-lg shadow-xs">
			<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
				<h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
					Transaksi
				</h4>
				<canvas id="transaksi"></canvas>

			</div>

		</div>
		<div class="mx-6 mb-10 overflow-hidden rounded-lg shadow-xs">
			<div class="w-full overflow-x-auto">
				<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
					<h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
						Obat
					</h4>
					<canvas id="obat"></canvas>

				</div>
			</div>

		</div>
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Chatting Pelanggan
		</h2>
		<!-- New Table -->
		<div class="mx-6 mb-10 overflow-hidden rounded-lg shadow-xs">
			<div class="w-full overflow-x-auto">
				<table class="w-full whitespace-no-wrap">
					<thead>
						<tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
							<th class="px-4 py-3">Pelanggan</th>
							<th class="px-4 py-3">Time</th>
							<th class="px-4 py-3">View</th>
						</tr>
					</thead>
					<tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
						<?php
						foreach ($list_chat as $key => $value) {
						?>
							<tr class="text-gray-700 dark:text-gray-400">
								<td class="px-4 py-3">
									<div class="flex items-center text-sm">
										<!-- Avatar with inset shadow -->
										<div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
											<img class="object-cover w-full h-full rounded-full" src="<?= base_url('asset/user.svg') ?>" alt="" loading="lazy" />
											<div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
										</div>
										<div>
											<p class="font-semibold"><?= $value->nama_pelanggan ?>
												<?php
												$notif = $this->db->query("SELECT COUNT(id_chatting) as jml FROM `chatting` WHERE id_pelanggan='" . $value->id_pelanggan . "' AND status='0' AND balasan is NULL")->row();
												if ($notif->jml != '0') {
												?>
													<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
														<?= $notif->jml ?>
													</span>
												<?php
												}
												?>

											</p>

										</div>
									</div>
								</td>

								<td class="px-4 py-3 text-xs">
									<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
										<?= $value->time ?>
									</span>
								</td>
								<td class="px-4 py-3 text-sm">
									<a href="<?= base_url('Admin/cDashboard/view_chat/' . $value->id_pelanggan) ?>" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
										<svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
											<path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" fill-rule="evenodd"></path>
										</svg>
										<span>View</span>
									</a>
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
