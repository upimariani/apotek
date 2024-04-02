<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mChat');
	}

	public function index()
	{
		$data = array(
			'list_chat' => $this->mChat->list_chat()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Layouts/header');
		$this->load->view('Admin/vDashboard', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function view_chat($id_pelanggan)
	{
		$data = array(
			'view_chat' => $this->mChat->view_chat($id_pelanggan),
			'id_pelanggan' => $id_pelanggan
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Layouts/header');
		$this->load->view('Admin/vViewChat', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function balasan($id_pelanggan)
	{
		$data = array(
			'id_pelanggan' => $id_pelanggan,
			'id_pengguna' => '1',
			'balasan' => $this->input->post('pesan')
		);
		$this->db->insert('chatting', $data);
		$this->session->set_flashdata('success', 'Balasan chat berhasil disimpan!');

		redirect('Admin/cDashboard/view_chat/' . $id_pelanggan, 'refresh');
	}
}

/* End of file cDashboard.php */
