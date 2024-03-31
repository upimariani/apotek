<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKategori extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('kategori_obat', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('kategori_obat');
		return $this->db->get()->result();
	}
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('kategori_obat');
		$this->db->where('id_kategori', $id);
		return $this->db->get()->row();
	}
	public function update($id_kategori, $data)
	{
		$this->db->where('id_kategori', $id_kategori);
		$this->db->update('kategori_obat', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategori_obat');
	}
}

/* End of file mKategori.php */
