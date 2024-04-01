<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mChat extends CI_Model
{
	public function chat($id_pelanggan)
	{
		return $this->db->query("SELECT * FROM `chatting` JOIN pelanggan ON chatting.id_pelanggan=pelanggan.id_pelanggan WHERE pelanggan.id_pelanggan='" . $id_pelanggan . "'")->result();
	}
}

/* End of file mChat.php */
