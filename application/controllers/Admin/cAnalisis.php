<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnalisis extends CI_Controller
{

	public function index()
	{
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Layouts/header');
		$this->load->view('Admin/vAnalisis');
		$this->load->view('Admin/Layouts/footer');
	}
	public function viewTransaksi()
	{
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');
		if ($tgl_awal > $tgl_akhir) {
			$this->session->set_flashdata('success', 'Tanggal awal melebihi tanggal akhir');
			redirect('Admin/cAnalisis');
		} else {
			$data = array(
				'tgl_awal' => $this->input->post('tgl_awal'),
				'tgl_akhir' => $this->input->post('tgl_akhir')
			);
			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/Layouts/aside');
			$this->load->view('Admin/Layouts/header');
			$this->load->view('Admin/vViewTransaksi', $data);
		}
	}
}
