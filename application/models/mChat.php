<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mChat extends CI_Model
{
	//pelanggan
	public function chat($id_pelanggan)
	{
		return $this->db->query("SELECT * FROM `chatting` JOIN pelanggan ON chatting.id_pelanggan=pelanggan.id_pelanggan WHERE pelanggan.id_pelanggan='" . $id_pelanggan . "'")->result();
	}

	//admin
	public function list_chat()
	{
		return $this->db->query("SELECT MAX(time) as time, nama_pelanggan, pelanggan.id_pelanggan FROM `chatting` JOIN pelanggan ON chatting.id_pelanggan=pelanggan.id_pelanggan GROUP BY chatting.id_pelanggan")->result();
	}
	public function view_chat($id_pelanggan)
	{
		return $this->db->query("SELECT * FROM `chatting` JOIN pelanggan ON chatting.id_pelanggan=pelanggan.id_pelanggan WHERE pelanggan.id_pelanggan='" . $id_pelanggan . "'")->result();
	}
}

/* End of file mChat.php */
