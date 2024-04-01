<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cCheckout extends CI_Controller
{

	public function index()
	{
		$this->load->view('Pelanggan/vCheckout');
	}
	public function order()
	{
		//point transaksi
		$total = $this->cart->total();
		$perc = 0.5 / 100 * $total;
		$data = array(
			'id_pelanggan' => $this->session->userdata('id_pelanggan'),
			'tgl_transaksi' => date('Y-m-d'),
			'total_transaksi' => $this->cart->total(),
			'ongkir' => $this->input->post('ongkir'),
			'total_pembayaran' => $this->input->post('total_bayar'),
			'bukti_pembayaran' => '0',
			'alamat_pengiriman' => 'Kota ' . $this->input->post('kota') . ' Prov. ' . $this->input->post('provinsi') . 'Expedisi. ' . $this->input->post('expedisi') . $this->input->post('paket'),
			'point_transaksi' => $perc
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
		redirect('Pelanggan/cKatalog');
	}
}

/* End of file cCheckout.php */
