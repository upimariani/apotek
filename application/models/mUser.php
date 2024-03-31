<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mUser extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('pengguna', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		return $this->db->get()->result();
	}
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('id_pengguna', $id);
		return $this->db->get()->row();
	}
	public function update($id_pengguna, $data)
	{
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('pengguna', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_pengguna', $id);
		$this->db->delete('pengguna');
	}
}

/* End of file mUser.php */
