<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{


	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Pelanggan/vLogin');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$data = $this->db->query("SELECT * FROM `pelanggan` WHERE username='" . $username . "' AND password='" . $password . "'")->row();
			if ($data) {
				$array = array(
					'id_pelanggan' => $data->id_pelanggan
				);
				$this->session->set_userdata($array);
				redirect('Pelanggan/cKatalog');
			} else {
				$this->session->set_flashdata('error', 'Username dan Password Anda Salah!');
				redirect('Pelanggan/cLogin');
			}
		}
	}
	public function logout()
	{

		$this->session->unset_userdata('id_pelanggan');
		$this->session->set_flashdata('success', 'Anda Berhasil Logout!');
		redirect('Pelanggan/cLogin');
	}
	public function registrasi()
	{
		$this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_hp', 'No Telepon', 'required|min_length[12]|max_length[13]');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Pelanggan/vRegistrasi');
		} else {
			$data = array(
				'nama_pelanggan' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),
				'jk' => $this->input->post('jk'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level_member' => '3',
				'point' => '0',
				'stat_reward' => '0'
			);
			$this->db->insert('pelanggan', $data);
			$this->session->set_flashdata('success', 'Anda Berhasil Melakukan Registrasi, Silahkan Login!');
			redirect('Pelanggan/cLogin');
		}
	}
}

/* End of file cLogin.php */
