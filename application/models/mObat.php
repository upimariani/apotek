<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mObat extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('obat', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->join('kategori_obat', 'obat.id_kategori = kategori_obat.id_kategori', 'left');
		return $this->db->get()->result();
	}
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->join('kategori_obat', 'obat.id_kategori = kategori_obat.id_kategori', 'left');
		$this->db->where('id_obat', $id);
		return $this->db->get()->row();
	}
	public function update($id_obat, $data)
	{
		$this->db->where('id_obat', $id_obat);
		$this->db->update('obat', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_obat', $id);
		$this->db->delete('obat');
	}
}

/* End of file mObat.php */
