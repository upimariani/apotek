<main class="h-full overflow-y-auto">
	<div class="container px-6 mx-auto grid">
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Grafik Analisis
		</h2>
		<hr>
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Grafik <?= $tgl_awal ?> s/d <?= $tgl_akhir ?>
		</h2>

		<div class="mx-6 mb-10 overflow-hidden rounded-lg shadow-xs">
			<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
				<h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
					Transaksi
				</h4>
				<canvas id="viewtransaksi"></canvas>
			</div>
		</div>
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Laporan Kenaikan dan Penurunan Pendapatan
		</h2>
		<?php
		$vtransaksi = $this->db->query("SELECT SUM(total_transaksi) as jml, tgl_transaksi FROM `transaksi_obat` WHERE tgl_transaksi BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "' GROUP BY tgl_transaksi")->result();

		?>
		<div class="w-full overflow-hidden rounded-lg shadow-xs">
			<div class="w-full overflow-x-auto">
				<table id="myTable" class="w-full whitespace-no-wrap">
					<thead>
						<tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
							<th class="px-4 py-3">Tanggal Transaksi</th>
							<th class="px-4 py-3">Pendapatan</th>
							<th class="px-4 py-3">Status</th>
						</tr>
					</thead>
					<tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
						<?php
						foreach ($vtransaksi as $key => $item) {

							$tanggal_transaksi[] = $item->tgl_transaksi;
							$pendapatan[] = $item->jml;
						}
						?>
						<?php
						for ($i = 0; $i < sizeof($tanggal_transaksi); $i++) {
							if ($tanggal_transaksi[$i] == $tgl_awal) {
								$status = 'Transaksi Awal';
							} else {
								if ($pendapatan[$i] > $pendapatan[$i - 1]) {
									$nilai_awal = $pendapatan[$i - 1];
									$nilai_akhir = $pendapatan[$i];
									$perc = round((($nilai_akhir - $nilai_awal) / $nilai_awal) * 100);
									$status = 'Pendapatan Naik';
								} else {
									$nilai_awal = $pendapatan[$i - 1];
									$nilai_akhir = $pendapatan[$i];
									$perc = round((($nilai_awal - $nilai_akhir) / $nilai_awal) * 100);
									$status = 'Pendapatan Turun';
								}
							}
						?>

							<tr class="text-gray-700 dark:text-gray-400">
								<td class="px-4 py-3">
									<div class="flex items-center text-sm">
										<!-- Avatar with inset shadow -->
										<div>
											<p class="font-semibold"><?= $tanggal_transaksi[$i] ?></p>

										</div>
									</div>
								</td>
								<td class="px-4 py-3">
									<div class="flex items-center text-sm">
										<p class="font-semibold">Rp. <?= number_format($pendapatan[$i])  ?></p>
									</div>
								</td>
								<td class="px-4 py-3">
									<div class="flex items-center text-sm">
										<?php
										if ($status == 'Pendapatan Naik') {
										?>
											<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
												<?= $status ?> mencapai <?= $perc ?>%
											</span>
										<?php
										} else if ($status == 'Transaksi Awal') {
										?>
											<span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
												<?= $status ?>
											</span>
										<?php
										} else {
										?>
											<span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
												<?= $status ?> mencapai<?= $perc ?>%
											</span>
										<?php
										}
										?>

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
</div>
</div>
<script src="<?= base_url('asset/chart/js_chart.js') ?>"></script>
<link href="https://cdn.datatables.net/2.0.5/css/dataTables.tailwindcss.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<!-- <script src="https://cdn.tailwindcss.com/"></script> -->
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.tailwindcss.js"></script>
<!-- <script src="https://cdn.tailwindcss.com/"></script> -->
<script>
	new DataTable('#myTable');
</script>
<script>
	<?php
	foreach ($vtransaksi as $key => $value) {
		$tanggal[] = $value->tgl_transaksi;
		$total[] = $value->jml;
	}

	?>
	var ctx = document.getElementById('viewtransaksi');
	var grafik = new Chart(ctx, {
		type: 'line',
		data: {
			labels: <?= json_encode($tanggal) ?>,
			datasets: [{
				label: 'Jumlah Pendapatan Transaksi Per Bulan',
				data: <?= json_encode($total) ?>,
				backgroundColor: 'rgb(70,130,180)',
				borderColor: 'rgba(127, 111, 134, 0.5)',
				color: '#666',
				fill: false,
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>

</body>

</html>