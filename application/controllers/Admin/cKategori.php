<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKategori extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mKategori');
	}

	public function index()
	{
		$data = array(
			'kategori' => $this->mKategori->select()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Layouts/header');
		$this->load->view('Admin/vKategori', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function create()
	{
		$data = array(
			'nama_kategori' => $this->input->post('nama')
		);
		$this->mKategori->insert($data);
		$this->session->set_flashdata('success', 'Data Kategori Berhasil Disimpan!');
		redirect('Admin/cKategori');
	}
	public function updateKategori($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'kategori' => $this->mKategori->edit($id)
			);
			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/Layouts/aside');
			$this->load->view('Admin/Layouts/header');
			$this->load->view('Admin/vUpdateKategori', $data);
			$this->load->view('Admin/Layouts/footer');
		} else {
			$data = array(
				'nama_kategori' => $this->input->post('nama')
			);
			$this->mKategori->update($id, $data);
			$this->session->set_flashdata('success', 'Data Kategori Berhasil Diperbaharui!');
			redirect('Admin/cKategori');
		}
	}
	public function delete($id)
	{
		$this->mKategori->delete($id);
		$this->session->set_flashdata('success', 'Data kategori Berhasil Dihapus!');
		redirect('Admin/cKategori');
	}
}

/* End of file cKategori.php */
