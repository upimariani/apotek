</div>
</div>
<script src="<?= base_url('asset/chart/js_chart.js') ?>"></script>
<script>
	<?php
	$transaksi = $this->db->query("SELECT SUM(total_transaksi) as jml, tgl_transaksi FROM `transaksi_obat` GROUP BY MONTH(tgl_transaksi)")->result();
	foreach ($transaksi as $key => $value) {
		$tgl[] = $value->tgl_transaksi;
		$jml[] = $value->jml;
	}

	?>
	var ctx = document.getElementById('transaksi');
	var grafik = new Chart(ctx, {
		type: 'line',
		data: {
			labels: <?= json_encode($tgl) ?>,
			datasets: [{
				label: 'Jumlah Pendapatan Transaksi Per Bulan',
				data: <?= json_encode($jml) ?>,
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
<script>
	<?php
	$obat = $this->db->query("SELECT SUM(qty) as qty, nama_obat FROM `detail_obat` JOIN obat ON obat.id_obat=detail_obat.id_obat")->result();
	foreach ($obat as $key => $value) {
		$dt_obat[] = $value->nama_obat;
		$qty[] = $value->qty;
	}

	?>
	var ctx = document.getElementById('obat');
	var grafik = new Chart(ctx, {
		type: 'line',
		data: {
			labels: <?= json_encode($dt_obat) ?>,
			datasets: [{
				label: 'Jumlah Pendapatan Transaksi Per Bulan',
				data: <?= json_encode($qty) ?>,
				backgroundColor: 'rgb(184,134,11)',
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
