<main class="h-full overflow-y-auto">
	<div class="container px-6 mx-auto grid">
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Grafik Analisis
		</h2>
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


		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Grafik
		</h2>
		<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
			<form action="<?= base_url('Admin/cAnalisis/viewTransaksi') ?>" method="POST">
				<!-- Helper text -->
				<h4>Range Laporan Grafik Transaksi</h4>
				<?php
				$tanggal = $this->db->query("SELECT tgl_transaksi FROM `transaksi_obat` GROUP BY tgl_transaksi")->result();
				?>
				<label class="block mt-4 text-sm">
					<span class="text-gray-700 dark:text-gray-400">
						Tanggal Awal
					</span>
					<select required name="tgl_awal" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
						<option value="">---Pilih Tanggal Awal---</option>
						<?php
						foreach ($tanggal as $key => $value) {
						?>
							<option value="<?= $value->tgl_transaksi ?>"><?= $value->tgl_transaksi ?></option>
						<?php
						}
						?>
					</select>
				</label>
				<label class="block mt-4 text-sm">
					<span class="text-gray-700 dark:text-gray-400">
						Tanggal Akhir
					</span>
					<select required name="tgl_akhir" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
						<option value="">---Pilih Tanggal Akhir---</option>
						<?php
						foreach ($tanggal as $key => $value) {
						?>
							<option value="<?= $value->tgl_transaksi ?>"><?= $value->tgl_transaksi ?></option>
						<?php
						}
						?>
					</select></label>
				<button type="submit" class="w-full mt-4 px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
					View
				</button>
			</form>
		</div>
		<div class="mx-6 mb-10 overflow-hidden rounded-lg shadow-xs">
			<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
				<h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
					Transaksi
				</h4>
				<canvas id="transaksi"></canvas>

			</div>

		</div>
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Grafik
		</h2>
		<!-- Cards with title -->
		<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
			Informasi Obat Laku dan Tidak Laku
		</h4>
		<?php
		$pl = $this->db->query("SELECT SUM(qty) as jml, nama_obat, keterangan FROM `detail_obat` LEFT JOIN obat ON detail_obat.id_obat=obat.id_obat GROUP BY obat.id_obat ORDER BY jml DESC limit 1")->row();
		$ptl = $this->db->query("SELECT SUM(qty) as jml, nama_obat, keterangan FROM `detail_obat` LEFT JOIN obat ON detail_obat.id_obat=obat.id_obat GROUP BY obat.id_obat ORDER BY jml ASC limit 1")->row();
		?>
		<div class="grid gap-6 mb-8 md:grid-cols-2">
			<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
				<h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
					Produk Obat Laku
				</h4>
				<p class="text-gray-600 dark:text-gray-400">
					Dilihat dari grafik bahwa obat <strong><?= $pl->nama_obat ?></strong> adalah obat paling banyak dibutuhkan oleh pelanggan dengan total pembelian sebanyak <strong><?= $pl->jml ?> <?= $pl->keterangan ?></strong>
				</p>
			</div>
			<div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs">
				<h4 class="mb-4 font-semibold">
					Produk Obat Tidak Laku
				</h4>
				<p>
					Dilihat dari grafik bahwa obat <strong><?= $ptl->nama_obat ?></strong> adalah obat dengan jumlah pembelian tidak laku dengan total pembelian sebanyak <strong><?= $ptl->jml ?> <?= $ptl->keterangan ?></strong>

				</p>
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



	</div>


</main>