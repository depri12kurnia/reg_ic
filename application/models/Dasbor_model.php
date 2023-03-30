<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function all_regis()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('regis');
		$query = $this->db->get();
		return $query->row();
	}

	// Total Direktoran dan Jurusan
	public function process()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('regis');
		$this->db->where('regis.status', 'Process');
		$query = $this->db->get();
		return $query->row();
	}

	public function verify()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('regis');
		$this->db->where('regis.status', 'Verify');
		$query = $this->db->get();
		return $query->row();
	}

	public function failed()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('regis');
		$this->db->where('regis.status', 'Failed');
		$query = $this->db->get();
		return $query->row();
	}
}

/* End of file Dasboar_model.php */
/* Location: ./application/models/Dasboar_model.php */