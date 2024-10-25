<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPesananSaya extends CI_Model
{
	public function transaksi($id_pelanggan)
	{
		return $this->db->query("SELECT * FROM `transaksi_obat` JOIN pelanggan ON transaksi_obat.id_pelanggan=pelanggan.id_pelanggan WHERE pelanggan.id_pelanggan='" . $id_pelanggan . "' ORDER BY id_transaksi DESC")->result();
	}
	public function detail_pesanan($id_transaksi)
	{
		$data['obat'] = $this->db->query("SELECT * FROM `transaksi_obat` JOIN detail_obat ON transaksi_obat.id_transaksi=detail_obat.id_transaksi JOIN obat ON obat.id_obat=detail_obat.id_obat JOIN kategori_obat ON kategori_obat.id_kategori=obat.id_kategori WHERE transaksi_obat.id_transaksi='" . $id_transaksi . "'")->result();
		$data['pelanggan'] = $this->db->query("SELECT * FROM `transaksi_obat` JOIN pelanggan ON transaksi_obat.id_pelanggan=pelanggan.id_pelanggan WHERE id_transaksi='" . $id_transaksi . "'")->row();
		return $data;
	}
}

/* End of file mPesananSaya.php */
