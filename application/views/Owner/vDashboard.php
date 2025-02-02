<main class="h-full overflow-y-auto">
	<div class="container px-6 mx-auto grid">
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Dashboard Owner
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
		</div> <!-- Inputs with icons -->
		<?php
		$per_bulan = $this->db->query("SELECT MONTH(tgl_transaksi) as bulan FROM `transaksi_obat` GROUP BY MONTH(tgl_transaksi)")->result();
		$per_tahun = $this->db->query("SELECT YEAR(tgl_transaksi) as tahun FROM `transaksi_obat` GROUP BY YEAR(tgl_transaksi)")->result();
		?>
		<div class="grid gap-6 mb-8 md:grid-cols-2">
			<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
				<h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
					Cetak Laporan per Bulan
				</h4>
				<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
					<form action="<?= base_url('Owner/cDashboard/cetak_laporan') ?>" method="POST">
						<label class="block mt-4 text-sm">
							<span class="text-gray-700 dark:text-gray-400">
								Bulan
							</span>
							<select name="bulan" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
								<?php
								foreach ($per_bulan as $key => $value) {
								?>
									<option value="<?= $value->bulan ?>"><?= $value->bulan ?></option>
								<?php
								}
								?>
							</select>
						</label>

						<label class="block mt-4 text-sm">
							<span class="text-gray-700 dark:text-gray-400">
								Tahun
							</span>
							<select name="tahun" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
								<?php
								foreach ($per_tahun as $key => $value) {
								?>
									<option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>
								<?php
								}
								?>
							</select>
						</label>
						<label class="block mt-4 text-sm">
							<button type="submit" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
								<svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
									<path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" fill-rule="evenodd"></path>
								</svg>
								<span>View</span>
							</button>
						</label>
					</form>
				</div>
			</div>

			<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
				<h4 class="mb-4 font-semibold">
					Cetak Laporan per Tahun
				</h4>
				<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
					<form action="<?= base_url('Owner/cDashboard/cetak_laporan_tahun') ?>" method="POST">


						<label class="block mt-4 text-sm">
							<span class="text-gray-700 dark:text-gray-400">
								Tahun
							</span>
							<select name="tahun" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
								<?php
								foreach ($per_tahun as $key => $value) {
								?>
									<option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>
								<?php
								}
								?>
							</select>
						</label>
						<label class="block mt-4 text-sm">
							<button type="submit" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
								<svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
									<path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" fill-rule="evenodd"></path>
								</svg>
								<span>View</span>
							</button>
						</label>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>
