<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cObat extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mObat');
		$this->load->model('mKategori');
	}

	public function index()
	{
		$data = array(
			'kategori' => $this->mKategori->select(),
			'obat' => $this->mObat->select()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Layouts/header');
		$this->load->view('Admin/Obat/vObat', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('kategori', 'Kategori Obat', 'required');
		$this->form_validation->set_rules('nama', 'Nama Obat', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'kategori' => $this->mKategori->select(),
				'obat' => $this->mObat->select()
			);
			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/Layouts/aside');
			$this->load->view('Admin/Layouts/header');
			$this->load->view('Admin/Obat/vTambahObat', $data);
			$this->load->view('Admin/Layouts/footer');
		} else {
			$config['upload_path']          = './asset/foto-obat';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 500000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$data = array(
					'kategori' => $this->mKategori->select()
				);
				$this->load->view('Admin/Layouts/head');
				$this->load->view('Admin/Layouts/aside');
				$this->load->view('Admin/Layouts/header');
				$this->load->view('Admin/Obat/vTambahObat', $data);
				$this->load->view('Admin/Layouts/footer');
			} else {
				$upload_data = $this->upload->data();
				$data = array(
					'id_kategori' => $this->input->post('kategori'),
					'nama_obat' => $this->input->post('nama'),
					'deskripsi_obat' => $this->input->post('deskripsi'),
					'keterangan' => $this->input->post('keterangan'),
					'harga' => $this->input->post('harga'),
					'stok' => $this->input->post('stok'),
					'foto' => $upload_data['file_name']
				);
				$this->mObat->insert($data);
				$this->session->set_flashdata('success', 'Data Obat Berhasil Ditambahkan!');
				redirect('Admin/cObat');
			}
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('kategori', 'Kategori Obat', 'required');
		$this->form_validation->set_rules('nama', 'Nama Obat', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']          = './asset/foto-obat';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 500000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {

				$data = array(
					'kategori' => $this->mKategori->select(),
					'error' => $this->upload->display_errors(),
					'obat' => $this->mObat->edit($id)
				);
				$this->load->view('Admin/Layouts/head');
				$this->load->view('Admin/Layouts/aside');
				$this->load->view('Admin/Layouts/header');
				$this->load->view('Admin/Obat/vUpdateObat', $data);
				$this->load->view('Admin/Layouts/footer');
			} else {

				$upload_data =  $this->upload->data();
				$data = array(
					'id_kategori' => $this->input->post('kategori'),
					'nama_obat' => $this->input->post('nama'),
					'deskripsi_obat' => $this->input->post('deskripsi'),
					'keterangan' => $this->input->post('keterangan'),
					'harga' => $this->input->post('harga'),
					'stok' => $this->input->post('stok'),
					'foto' => $upload_data['file_name']
				);
				$this->mObat->update($id, $data);
				$this->session->set_flashdata('success', 'Data Obat Berhasil Diperbaharui !!!');
				redirect('Admin/cObat');
			} //tanpa ganti gambar
			$data = array(
				'id_kategori' => $this->input->post('kategori'),
				'nama_obat' => $this->input->post('nama'),
				'deskripsi_obat' => $this->input->post('deskripsi'),
				'keterangan' => $this->input->post('keterangan'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok')
			);
			$this->mObat->update($id, $data);
			$this->session->set_flashdata('success', 'Data Obat Berhasil Diperbaharui !!!');
			redirect('Admin/cObat');
		}
		$data = array(
			'kategori' => $this->mKategori->select(),
			'obat' => $this->mObat->edit($id)
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Layouts/header');
		$this->load->view('Admin/Obat/vUpdateObat', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function delete($id)
	{
		$this->mObat->delete($id);
		$this->session->set_flashdata('success', 'Data Obat Berhasil Dihapus!');
		redirect('Admin/cObat');
	}
}

/* End of file cObat.php */
