<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Login - Windmill Dashboard</title>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="<?= base_url('asset/windmill-dashboard/public/') ?>assets/css/tailwind.output.css" />
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
	<script src="<?= base_url('asset/windmill-dashboard/public/') ?>assets/js/init-alpine.js"></script>
</head>

<body>
	<div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
		<div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">

			<div class="flex flex-col overflow-y-auto md:flex-row">
				<div class="h-32 md:h-auto md:w-1/2">
					<img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="<?= base_url('asset/windmill-dashboard/public/') ?>assets/img/login-office.jpeg" alt="Office" />
					<img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="<?= base_url('asset/windmill-dashboard/public/') ?>assets/img/login-office-dark.jpeg" alt="Office" />
				</div>

				<div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">

					<div class="w-full">
						<form action="<?= base_url('cLogin') ?>" method="POST">
							<?php
							if ($this->session->userdata('error') != '') {
							?>
								<div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
									<div class="flex">
										<div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
												<path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
											</svg></div>
										<div>
											<p class="font-bold">Gagal!</p>
											<p class="text-sm"><?= $this->session->userdata('error') ?></p>
										</div>
									</div>
								</div>
							<?php
							}
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


							<h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
								Login
							</h1>

							<label class="block text-sm">
								<span class="text-gray-700 dark:text-gray-400">Username</span>
								<input name="username" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" />
								<?= form_error('username', '<span class="text-xs text-red-600 dark:text-gray-400">', '</span>') ?>

							</label>
							<label class="block mt-4 text-sm">
								<span class="text-gray-700 dark:text-gray-400">Password</span>
								<input name="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password" />
								<?= form_error('password', '<span class="text-xs text-red-600 dark:text-gray-400">', '</span>') ?>
							</label>

							<!-- You should use a button here, as the anchor is only used for the example  -->
							<button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" href="../index.html">
								Log in
							</button>
						</form>

					</div>

				</div>

			</div>
		</div>
	</div>
</body>


</html>