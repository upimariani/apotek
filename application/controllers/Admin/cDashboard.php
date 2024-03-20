<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Layouts/header');
		$this->load->view('Admin/vDashboard');
		$this->load->view('Admin/Layouts/footer');
	}
}

/* End of file cDashboard.php */
