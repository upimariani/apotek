<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKatalog extends CI_Model
{
	public function kategori()
	{
		return $this->db->query("SELECT * FROM `kategori_obat`")->result();
	}
	public function produk()
	{
		return $this->db->query("SELECT * FROM `obat` JOIN kategori_obat ON obat.id_kategori=kategori_obat.id_kategori")->result();
	}
	public function detail_produk($id)
	{
		return $this->db->query("SELECT * FROM `obat` JOIN kategori_obat ON obat.id_kategori=kategori_obat.id_kategori WHERE id_obat='" . $id . "'")->row();
	}
}

/* End of file mKatalog.php */
