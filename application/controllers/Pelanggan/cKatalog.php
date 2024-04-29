<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKatalog extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mKatalog');
	}

	public function index()
	{
		$data = array(
			'kategori' => $this->mKatalog->kategori(),
			'produk' => $this->mKatalog->produk()
		);
		$this->load->view('Pelanggan/Layouts/head');
		$this->load->view('Pelanggan/Layouts/header');
		$this->load->view('Pelanggan/vKatalog', $data);
		$this->load->view('Pelanggan/Layouts/footer');
	}
	public function detail($id_obat)
	{
		$data = array(
			'detail' => $this->mKatalog->detail_produk($id_obat)
		);
		$this->load->view('Pelanggan/Layouts/head');
		$this->load->view('Pelanggan/Layouts/header');
		$this->load->view('Pelanggan/vDetailKatalog', $data);
		$this->load->view('Pelanggan/Layouts/footer');
	}

	//CART----------------------------
	public function add_cart($id_obat)
	{
		$obat = $this->db->query("SELECT * FROM `obat` WHERE id_obat='" . $id_obat . "'")->row();
		$data = array(
			'id' => $obat->id_obat,
			'name' => $obat->nama_obat,
			'price' => $obat->harga,
			'qty' => '1',
			'stok' => $obat->stok,
			'picture' => $obat->foto
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('success', 'Obat berhasil dimasukkan ke keranjang!');
		redirect('Pelanggan/cKatalog');
	}
	public function addtocart_detail($id_obat)
	{
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
		redirect('Pelanggan/cKatalog');
	}
	public function cart()
	{
		$this->load->view('Pelanggan/Layouts/head');
		$this->load->view('Pelanggan/Layouts/header');
		$this->load->view('Pelanggan/vCart');
		$this->load->view('Pelanggan/Layouts/footer');
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('Pelanggan/cKatalog/cart');
	}
	public function update_cart()
	{
		$i = 1;
		foreach ($this->cart->contents() as $items) {
			$data = array(
				'rowid'  => $items['rowid'],
				'qty'    => $this->input->post($i . '[qty]')
			);
			$this->cart->update($data);
			$i++;
		}
		redirect('Pelanggan/cKatalog/cart');
	}
}

/* End of file cKatalog.php */
