<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProfil extends CI_Controller
{

	public function index()
	{
		$data = array(
			'pelanggan' => $this->db->query("SELECT * FROM `pelanggan` WHERE id_pelanggan='" . $this->session->userdata('id_pelanggan') . "'")->row()
		);
		$this->load->view('Pelanggan/Layouts/head');
		$this->load->view('Pelanggan/Layouts/header');
		$this->load->view('Pelanggan/vProfil', $data);
		$this->load->view('Pelanggan/Layouts/footer');
	}
	public function update($id_pelanggan)
	{
		$data = array(
			'nama_pelanggan' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'jk' => $this->input->post('jk'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),

		);
		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->update('pelanggan', $data);


		$this->session->set_flashdata('success', 'Anda Berhasil Memperbaharui data Pelanggan!');
		redirect('Pelanggan/cProfil');
	}
}

/* End of file cProfil.php */
