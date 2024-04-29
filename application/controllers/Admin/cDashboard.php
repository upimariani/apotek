<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mChat');
		$this->load->model('mDashboard');
	}

	public function index()
	{
		$data = array(
			'list_chat' => $this->mChat->list_chat()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Layouts/header');
		$this->load->view('Admin/vDashboard', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function view_chat($id_pelanggan)
	{
		//update status
		$status = array(
			'status' => '1'
		);
		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->where('balasan is null');
		$this->db->update('chatting', $status);



		$data = array(
			'view_chat' => $this->mChat->view_chat($id_pelanggan),
			'id_pelanggan' => $id_pelanggan
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Layouts/header');
		$this->load->view('Admin/vViewChat', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function balasan($id_pelanggan)
	{
		$data = array(
			'id_pelanggan' => $id_pelanggan,
			'id_pengguna' => '1',
			'balasan' => $this->input->post('pesan')
		);
		$this->db->insert('chatting', $data);
		$this->session->set_flashdata('success', 'Balasan chat berhasil disimpan!');

		redirect('Admin/cDashboard/view_chat/' . $id_pelanggan, 'refresh');
	}

	//cart
	public function addtocart()
	{
		$id_obat = $this->input->post('produk');
		$obat = $this->db->query("SELECT * FROM `obat` WHERE id_obat='" . $id_obat . "'")->row();
		$data = array(
			'id' => $obat->id_obat,
			'name' => $obat->nama_obat,
			'price' => $obat->harga,
			'qty' => $this->input->post('qty'),
			'stok' => $obat->stok,
			'picture' => $obat->foto
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('success', 'Obat berhasil dimasukkan ke keranjang!');
		redirect('Admin/cDashboard');
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('Admin/cDashboard');
	}
	public function selesai()
	{
		$data = array(
			'id_pelanggan' => '0',
			'tgl_transaksi' => date('Y-m-d'),
			'total_transaksi' => $this->cart->total(),
			'ongkir' => '0',
			'total_pembayaran' => '0',
			'bukti_pembayaran' => '0',
			'alamat_pengiriman' => 'Langsung',
			'point_transaksi' => '0',
			'status_transaksi' => '4'
		);
		$this->db->insert('transaksi_obat', $data);

		//detail obat
		$id = $this->db->query("SELECT MAX(id_transaksi) as id_transaksi FROM `transaksi_obat`")->row();
		foreach ($this->cart->contents() as $key => $value) {
			$item = array(
				'id_transaksi' => $id->id_transaksi,
				'id_obat' => $value['id'],
				'qty' => $value['qty']
			);
			$this->db->insert('detail_obat', $item);
		}
		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Anda berhasil melakukan transaksi!');
		redirect('Admin/cDashboard');
	}
}

/* End of file cDashboard.php */
