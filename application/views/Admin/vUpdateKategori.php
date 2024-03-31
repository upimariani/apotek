<main class="h-full pb-16 overflow-y-auto">
	<div class="container px-6 mx-auto grid">
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Kategori
		</h2>

		<div class="mt-4 mb-6">
			<!-- Modal title -->
			<p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
				Update Data Kategori Obat
			</p>
			<!-- Modal description -->
			<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
				<form action="<?= base_url('Admin/cKategori/updateKategori/' . $kategori->id_kategori) ?>" method="POST">
					<!-- Helper text -->
					<label class="block mt-4 text-sm">
						<span class="text-gray-700 dark:text-gray-400">
							Nama Kategori
						</span>
						<input name="nama" value="<?= $kategori->nama_kategori ?>" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Masukkan Nama Pengguna" />
						<?= form_error('nama', '<span class="text-xs text-red-600 dark:text-gray-400">', '</span>') ?>
					</label>


					<button type="submit" class="w-full mt-4 px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
						Save
					</button>
				</form>
			</div>
		</div>
	</div>
</main>