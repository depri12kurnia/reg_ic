<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verifikasi_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('regis');
		// End join
		$this->db->where('status', 'Process');
		$this->db->order_by('created_at', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function approved()
	{
		$this->db->select('*');
		$this->db->from('regis');
		// 
		$this->db->where('status', 'Verify');
		$this->db->order_by('created_at', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function failed()
	{
		$this->db->select('*');
		$this->db->from('regis');
		// 
		$this->db->where('status', 'Failed');
		$this->db->order_by('created_at', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function sendmailapproved()
	{
		$this->db->select('*');
		$this->db->from('regis');
		// 
		$this->db->order_by('created_at', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function dasbor()
	{
		$this->db->select('*');
		$this->db->from('regis');
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing By Status
	public function status($status)
	{
		$this->db->select('*');
		$this->db->from('regis');
		$this->db->where(array('regis.status' => $status));
		$this->db->order_by('created_at', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_count()
	{
		return $this->db->count_all('regis');
	}

	// Listing total
	public function total()
	{
		$this->db->select('*');
		$this->db->from('regis');
		$this->db->order_by('id_reg', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function detail($id_reg)
	{
		$this->db->select('*');
		$this->db->from('regis');
		$this->db->where('id_reg', $id_reg);
		$this->db->order_by('id_reg', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function getNoreg($data)
	{
		$this->db->where('id_reg', $data['id_reg']);
		$this->db->where('no_reg', $data['no_reg']);
		$this->db->update('regis', $data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_reg', $data['id_reg']);
		$this->db->update('regis', $data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id_reg', $data['id_reg']);
		$this->db->delete('regis', $data);
	}
}

/* End of file Verifikasi_model.php */
/* Location: ./application/models/Verifikasi_model.php */