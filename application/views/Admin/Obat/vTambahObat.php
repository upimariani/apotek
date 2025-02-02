<main class="h-full pb-16 overflow-y-auto">
	<div class="container px-6 mx-auto grid">
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Obat
		</h2>

		<div class="mt-4 mb-6">
			<!-- Modal title -->
			<p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
				Tambah Data Obat
			</p>
			<!-- Modal description -->
			<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
				<?= form_open_multipart('Admin/cObat/create') ?>
				<!-- Helper text -->
				<label class="block mt-4 text-sm">
					<span class="text-gray-700 dark:text-gray-400">
						Kategori Obat
					</span>
					<select name="kategori" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
						<option value="">---Pilih Kategori---</option>
						<?php
						foreach ($kategori as $key => $value) {
						?>
							<option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
						<?php
						}
						?>

					</select>
					<?= form_error('kategori', '<span class="text-xs text-red-600 dark:text-gray-400">', '</span>') ?>
				</label>
				<label class="block mt-4 text-sm">
					<span class="text-gray-700 dark:text-gray-400">
						Nama Obat
					</span>
					<input name="nama" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Masukkan Nama Obat" />
					<?= form_error('nama', '<span class="text-xs text-red-600 dark:text-gray-400">', '</span>') ?>
				</label>

				<!-- Helper text -->
				<label class="block mt-4 text-sm">
					<span class="text-gray-700 dark:text-gray-400">
						Deskripsi
					</span>
					<input name="deskripsi" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Masukkan Deskripsi" />
					<?= form_error('deskripsi', '<span class="text-xs text-red-600 dark:text-gray-400">', '</span>') ?>
				</label>
				<!-- Helper text -->
				<label class="block mt-4 text-sm">
					<span class="text-gray-700 dark:text-gray-400">
						Keterangan
					</span>
					<select name="keterangan" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
						<option value="">---Pilih Keterangan---</option>
						<option value="botol">botol</option>
						<option value="dus">dus</option>
						<option value="tablet">tablet</option>
						<option value="pcs">pcs</option>
						<option value="strip">strip</option>

					</select>
					<?= form_error('keterangan', '<span class="text-xs text-red-600 dark:text-gray-400">', '</span>') ?>
				</label>
				<label class="block mt-4 text-sm">
					<span class="text-gray-700 dark:text-gray-400">
						Harga
					</span>
					<input name="harga" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Masukkan Harga" />
					<?= form_error('harga', '<span class="text-xs text-red-600 dark:text-gray-400">', '</span>') ?>
				</label>
				<label class="block mt-4 text-sm">
					<span class="text-gray-700 dark:text-gray-400">
						Stok
					</span>
					<input name="stok" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Masukkan Stok" />
					<?= form_error('stok', '<span class="text-xs text-red-600 dark:text-gray-400">', '</span>') ?>
				</label>
				<label class="block mt-4 text-sm">
					<span class="text-gray-700 dark:text-gray-400">
						Foto
					</span>
					<input name="gambar" type="file" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" required />
				</label>


				<button type="submit" class="w-full mt-4 px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
					Save
				</button>
				</form>
			</div>
		</div>
	</div>
</main>
