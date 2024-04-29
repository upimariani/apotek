<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDashboard extends CI_Model
{
	public function produk()
	{
		return $this->db->query("SELECT * FROM `obat`")->result();
	}
}

/* End of file mDashboard.php */
