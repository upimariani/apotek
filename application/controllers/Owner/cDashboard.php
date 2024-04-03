<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mChat');
	}

	public function index()
	{
		$this->load->view('Owner/Layouts/head');
		$this->load->view('Owner/Layouts/aside');
		$this->load->view('Owner/Layouts/header');
		$this->load->view('Owner/vDashboard');
		$this->load->view('Owner/Layouts/footer');
	}
	public function cetak_laporan()
	{

		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(190, 10, 'APOTEK AGRA MEDIKA', 0, 1, 'C');
		$pdf->Cell(190, 10, 'LAPORAN TRANSAKSI BULAN KE - ' . $bulan . ' TAHUN ' . $tahun, 0, 1, 'C');


		$pdf->Cell(10, 15, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(45, 7, 'Tanggal Transaksi', 1, 0, 'C');
		$pdf->Cell(55, 7, 'Nama Pelanggan', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Point Transaksi', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Total Transaksi', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;

		$data = $this->db->query("SELECT * FROM `transaksi_obat` JOIN pelanggan ON transaksi_obat.id_pelanggan=pelanggan.id_pelanggan WHERE MONTH(tgl_transaksi) ='" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "' AND stat_transaksi='4'")->result();
		$total = 0;
		foreach ($data as $key => $value) {
			$total += $value->total_transaksi;
			$pdf->Cell(10, 7, $no++, 1, 0, 'C');
			$pdf->Cell(45, 7, $value->tgl_transaksi, 1, 0, 'L');
			$pdf->Cell(55, 7, $value->nama_pelanggan, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->point_transaksi, 1, 0, 'C');
			$pdf->Cell(40, 7, 'Rp.' . number_format($value->total_transaksi), 1, 1, 'C');
		}

		$pdf->Cell(10, 5, '', 0, 1);
		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(10, 7, '', 0, 0, 'C');
		$pdf->Cell(45, 7, '', 0, 0, 'C');
		$pdf->Cell(55, 7, '', 0, 0, 'C');
		$pdf->Cell(30, 7, 'Total Pendapatan', 0, 0, 'C');
		$pdf->Cell(40, 7, 'Rp.' . number_format($total), 0, 1, 'C');


		$pdf->SetFont('Times', '', 9);
		$pdf->Cell(40, 7, '', 0, 1, 'C');
		$pdf->Cell(40, 7, '', 0, 1, 'C');


		$pdf->Cell(95, 7, 'Mengetahui,', 0, 0, 'C');
		$pdf->Cell(95, 7, 'Kuningan, ' . date('j F Y'), 0, 1, 'C');
		$pdf->Cell(95, 7, 'Owner', 0, 0, 'C');
		$pdf->Cell(95, 7, 'Admin', 0, 1, 'C');
		$pdf->Cell(95, 10, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(95, 7, '(.........................)', 0, 0, 'C');
		$pdf->Cell(95, 7, '(.........................)', 0, 0, 'C');
		$pdf->Output();
	}
}

/* End of file cDashboard.php */
