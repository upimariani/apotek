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

		$switch_point = $this->input->post('point');
		if ($switch_point == 'on') {
			$sp_total = $this->input->post('total_bayar') - $this->input->post('jmlpoint');
		} else {
			$sp_total = $this->input->post('total_bayar');
		}
		$data = array(
			'id_pelanggan' => $this->session->userdata('id_pelanggan'),
			'tgl_transaksi' => date('Y-m-d'),
			'total_transaksi' => $this->cart->total(),
			'ongkir' => $this->input->post('ongkir'),
			'total_pembayaran' => $sp_total,
			'bukti_pembayaran' => '0',
			'alamat_pengiriman' => 'Kota ' . $this->input->post('kota') . ' Prov. ' . $this->input->post('provinsi') . 'Expedisi. ' . $this->input->post('expedisi') . $this->input->post('paket'),
			'point_transaksi' => $perc
		);
		$this->db->insert('transaksi_obat', $data);

		$dtu_point = array(
			'point' => '0',
			'level_member' => '3'
		);
		$this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
		$this->db->update('pelanggan', $dtu_point);

		//mengurangi stok obat
		foreach ($this->cart->contents() as $key => $value) {
			$obat = $this->db->query("SELECT * FROM `obat` WHERE id_obat='" . $value['id'] . "'")->row();
			$ss = $obat->stok;
			$qty = $value['qty'];
			$st = $ss - $qty;

			$dt_stok = array(
				'stok' => $st
			);
			$this->db->where('id_obat', $obat->id_obat);
			$this->db->update('obat', $dt_stok);
		}

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
