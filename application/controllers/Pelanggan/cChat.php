<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cChat extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mChat');
	}

	public function index()
	{
		$this->form_validation->set_rules('pesan', 'Pesan', 'required');

		if ($this->form_validation->run() == FALSE) {
			//update status
			$status = array(
				'status' => '1'
			);
			$this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
			$this->db->where('chat is null');
			$this->db->update('chatting', $status);
			$data = array(
				'chat' => $this->mChat->chat($this->session->userdata('id_pelanggan'))
			);
			$this->load->view('Pelanggan/Layouts/head');
			$this->load->view('Pelanggan/Layouts/header');
			$this->load->view('Pelanggan/vChat', $data);
			$this->load->view('Pelanggan/Layouts/footer');
		} else {
			$data = array(
				'id_pelanggan' => $this->session->userdata('id_pelanggan'),
				'id_pengguna' => '1',
				'chat' => $this->input->post('pesan')
			);
			$this->db->insert('chatting', $data);
			$this->session->set_flashdata('success', 'Pesan berhasil dikirim!');
			redirect('Pelanggan/cChat');
		}
	}
}

/* End of file cChat.php */
