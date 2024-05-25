<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnalisis extends CI_Controller
{

	public function index()
	{
		$this->load->view('Owner/Layouts/head');
		$this->load->view('Owner/Layouts/aside');
		$this->load->view('Owner/Layouts/header');
		$this->load->view('Owner/vAnalisis');
		$this->load->view('Owner/Layouts/footer');
	}
	public function viewTransaksi()
	{
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');
		if ($tgl_awal > $tgl_akhir) {
			$this->session->set_flashdata('success', 'Tanggal awal melebihi tanggal akhir');
			redirect('Owner/cAnalisis');
		} else {
			$data = array(
				'tgl_awal' => $this->input->post('tgl_awal'),
				'tgl_akhir' => $this->input->post('tgl_akhir')
			);
			$this->load->view('Owner/Layouts/head');
			$this->load->view('Owner/Layouts/aside');
			$this->load->view('Owner/Layouts/header');
			$this->load->view('Owner/vViewTransaksi', $data);
		}
	}
}
