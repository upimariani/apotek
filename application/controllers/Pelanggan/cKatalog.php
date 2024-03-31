<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKatalog extends CI_Controller
{

	public function index()
	{
		$this->load->view('Pelanggan/Layouts/head');
		$this->load->view('Pelanggan/Layouts/header');
		$this->load->view('Pelanggan/vKatalog');
		$this->load->view('Pelanggan/Layouts/footer');
	}
}

/* End of file cKatalog.php */
