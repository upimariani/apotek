<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPesananSaya extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPesananSaya');
	}

	public function index()
	{
		$data = array(
			'transaksi' => $this->mPesananSaya->transaksi($this->session->userdata('id_pelanggan'))
		);
		$this->load->view('Pelanggan/Layouts/head');
		$this->load->view('Pelanggan/Layouts/header');
		$this->load->view('Pelanggan/vPesananSaya', $data);
		$this->load->view('Pelanggan/Layouts/footer');
	}
	public function detail_pesanan($id_transaksi)
	{
		$data = array(
			'detail' => $this->mPesananSaya->detail_pesanan($id_transaksi)
		);
		$this->load->view('Pelanggan/Layouts/head');
		$this->load->view('Pelanggan/Layouts/header');
		$this->load->view('Pelanggan/vDetailPesanan', $data);
		$this->load->view('Pelanggan/Layouts/footer');
	}
	public function bayar($id_transaksi)
	{
		$config['upload_path']          = './asset/pembayaran';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'detail' => $this->mPesananSaya->detail_pesanan($id_transaksi)
			);
			$this->load->view('Pelanggan/Layouts/head');
			$this->load->view('Pelanggan/Layouts/header');
			$this->load->view('Pelanggan/vDetailPesanan', $data);
			$this->load->view('Pelanggan/Layouts/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'bukti_pembayaran' => $upload_data['file_name'],
				'stat_transaksi' => '1'
			);
			$this->db->where('id_transaksi', $id_transaksi);
			$this->db->update('transaksi_obat', $data);

			$this->session->set_flashdata('success', 'Data Pembayaran Berhasil Dikirim!');
			redirect('Pelanggan/cPesananSaya/detail_pesanan/' . $id_transaksi);
		}
	}
	public function diterima($id_transaksi)
	{
		$data = array(
			'stat_transaksi' => '4'
		);
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->update('transaksi_obat', $data);

		$this->session->set_flashdata('success', 'Pesanan Berhasil Diterima!');
		redirect('Pelanggan/cPesananSaya/detail_pesanan/' . $id_transaksi);
	}
}

/* End of file c.php */
