<body>
	<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
		<!-- Desktop sidebar -->
		<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
			<div class="py-4 text-gray-500 dark:text-gray-400">
				<a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
					Apotek Agra Medika
				</a>
				<ul class="mt-6">
					<li class="relative px-6 py-3">
						<!-- <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span> -->
						<a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="<?= base_url('Admin/cDashboard') ?>">
							<svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
								<path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
							</svg>
							<span class="ml-4">Dashboard</span>
						</a>
					</li>
					<li class="relative px-6 py-3">
						<a href="<?= base_url('Admin/cUser') ?>" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="forms.html">
							<svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
								<path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
							</svg>
							<span class="ml-4">User</span>
						</a>
					</li>
					<li class="relative px-6 py-3">
						<a href="<?= base_url('Admin/cKategori') ?>" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="cards.html">
							<svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
								<path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
							</svg>
							<span class="ml-4">Kategori Obat</span>
						</a>
					</li>
					<li class="relative px-6 py-3">
						<a href="<?= base_url('Admin/cObat') ?>" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="charts.html">
							<svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
								<path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
								<path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
							</svg>
							<span class="ml-4">Obat</span>
						</a>
					</li>
				</ul>
				<p class="ml-6 inline-flex font-bold items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">Transaksi</p>
				<hr>
				<?php
				//notifikasi
				$belum_bayar = $this->db->query("SELECT COUNT(id_transaksi) as notif FROM `transaksi_obat` WHERE stat_transaksi='0'")->row();
				$konfirmasi = $this->db->query("SELECT COUNT(id_transaksi) as notif FROM `transaksi_obat` WHERE stat_transaksi='1'")->row();
				$proses = $this->db->query("SELECT COUNT(id_transaksi) as notif FROM `transaksi_obat` WHERE stat_transaksi='2'")->row();
				$kirim = $this->db->query("SELECT COUNT(id_transaksi) as notif FROM `transaksi_obat` WHERE stat_transaksi='3'")->row();
				?>
				<ul>
					<li class="relative px-6 py-2">
						<a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="<?= base_url('Admin/cTransaksi') ?>">
							<svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
								<path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
							</svg>Belum Bayar
							<?php
							if ($belum_bayar->notif != '0') {
							?><span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
									<?= $belum_bayar->notif ?>
								</span>

							<?php
							}
							?>

						</a>
					</li>
					<li class="relative px-6 py-2">
						<a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="<?= base_url('Admin/cTransaksi/konfirmasi') ?>">
							<svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
								<path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
							</svg> Menunggu Konfirmasi <?php
														if ($konfirmasi->notif != '0') {
														?><span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
									<?= $konfirmasi->notif ?>
								</span>

							<?php
														}
							?>
						</a>
					</li>
					<li class="relative px-6 py-2">
						<a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="<?= base_url('Admin/cTransaksi/proses') ?>">
							<svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
								<path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
							</svg> Pesanan Diproses <?php
													if ($proses->notif != '0') {
													?><span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
									<?= $proses->notif ?>
								</span>

							<?php
													}
							?>
						</a>
					</li>
					<li class="relative px-6 py-2">
						<a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="<?= base_url('Admin/cTransaksi/kirim') ?>">
							<svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
								<path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
							</svg>Pesanan Dikirim <?php
													if ($kirim->notif != '0') {
													?><span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
									<?= $kirim->notif ?>
								</span>

							<?php
													}
							?>
						</a>
					</li>
					<li class="relative px-6 py-2">
						<a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="<?= base_url('Admin/cTransaksi/selesai') ?>">
							<svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
								<path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
							</svg> Pesanan Selesai
						</a>
					</li>
					<hr>
					<li class="relative px-6 py-2">
						<a href="<?= base_url('Admin/cAnalisis') ?>" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="charts.html">
							<svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
								<path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
								<path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
							</svg>
							<span class="ml-4">Grafik Analisis</span>
						</a>
					</li>
				</ul>
				<div class="px-6 my-6">
					<a href="<?= base_url('cLogin/logout') ?>" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
						Logout
						<span class="ml-2" aria-hidden="true"></span>
					</a>
				</div>
			</div>
		</aside>
		<!-- Mobile sideb
ar -->
		<!-- Backdrop -->
