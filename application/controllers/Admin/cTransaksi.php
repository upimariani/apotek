<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
		$this->load->model('mPesananSaya');
	}

	public function index()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->transaksi()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Layouts/header');
		$this->load->view('Admin/vBelumBayar', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function delete($id_transaksi)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->delete('transaksi_obat');

		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->delete('detail_obat');

		$this->session->set_flashdata('success', 'Data Transaksi berhasil dihapus!');
		redirect('Admin/cTransaksi');
	}
	public function konfirmasi()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->transaksi()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Layouts/header');
		$this->load->view('Admin/vKonfirmasi', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function proses()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->transaksi()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Layouts/header');
		$this->load->view('Admin/vProses', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function kirim()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->transaksi()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Layouts/header');
		$this->load->view('Admin/vKirim', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function selesai()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->transaksi()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Layouts/header');
		$this->load->view('Admin/vSelesai', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function detail_transaksi($id_transaksi)
	{
		$data = array(
			'detail' => $this->mPesananSaya->detail_pesanan($id_transaksi)
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Layouts/header');
		$this->load->view('Admin/vDetailTransaksi', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function konfirmasi_pesanan($id_transaksi)
	{
		$data = array(
			'stat_transaksi' => '2'
		);
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->update('transaksi_obat', $data);
		$this->session->set_flashdata('success', 'Pesanan berhasil dikonfirmasi! Silahkan diproses!');
		redirect('Admin/cTransaksi/proses');
	}
	public function kirim_pesanan($id_transaksi)
	{
		$data = array(
			'stat_transaksi' => '3'
		);
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->update('transaksi_obat', $data);
		$this->session->set_flashdata('success', 'Pesanan berhasil dikirim! Silahkan menunggu konfirmasi pesanan diterima!');
		redirect('Admin/cTransaksi/kirim');
	}
}

/* End of file cTransaksi.php */
