<main class="h-full overflow-y-auto">
	<div class="container px-6 mx-auto grid">
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Dashboard
		</h2>
		<?php foreach ($view_chat as $key => $value) {
			if ($value->balasan == NULL) {
		?>
				<div class="flex items-start gap-2.5 mb-4">
					<img class="w-8 h-8 rounded-full" src="<?= base_url('asset/user.svg') ?>" alt="Jese image">
					<div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
						<div class="flex items-center space-x-2 rtl:space-x-reverse">
							<span class="text-sm mr-3 font-semibold text-gray-900 dark:text-white"><?= $value->nama_pelanggan ?></span>
							<span class="text-sm font-normal text-gray-500 dark:text-gray-400"><?= $value->time ?></span>
						</div>
						<p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white"><?= $value->chat ?></p>

						<span class="text-sm font-normal text-gray-500 dark:text-gray-400">Delivered</span>
					</div>
				</div>
			<?php
			} else {
			?>
				<div class="flex items-start gap-2.5 mb-4">

					<div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-blue-200 bg-blue-100 rounded-e-xl rounded-es-xl dark:bg-blue-700">
						<div class="flex items-center space-x-2 rtl:space-x-reverse">
							<span class="text-sm mr-3 font-semibold text-gray-900 dark:text-white">Admin</span>
							<span class="text-sm font-normal text-gray-500 dark:text-gray-400"><?= $value->time ?></span>
						</div>
						<p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white"><?= $value->balasan ?></p>

						<span class="text-sm font-normal text-gray-500 dark:text-gray-400">Delivered</span>
					</div>
					<img class="w-8 h-8 rounded-full" src="<?= base_url('asset/user2.svg') ?>" alt="Jese image">
				</div>
		<?php
			}
		}
		?>






		<form action="<?= base_url('Admin/cDashboard/balasan/' . $id_pelanggan) ?>" method="POST">
			<label class="block mt-4 text-sm">
				<span class="text-gray-700 dark:text-gray-400">Message</span>
				<textarea name="pesan" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Enter some long form content."></textarea>
			</label>
			<button type="submit" class="mt-3 flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
				<svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
					<path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" fill-rule="evenodd"></path>
				</svg>
				<span>Send</span>
			</button>
		</form>


	</div>
</main>
