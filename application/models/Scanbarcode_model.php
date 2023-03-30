<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScanBarcode_model extends CI_Model
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
        $this->db->where('status', 'Verify');
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    // Listing data
    public function dasbor()
    {
        $this->db->select('*');
        $this->db->from('regis');
        $this->db->order_by('id_reg', 'DESC');
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
        $this->db->order_by('id_reg', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_count()
    {
        return $this->db->count_all('regis');
    }

    // Listing total
    public function total_hadir()
    {
        $this->db->select('*');
        $this->db->from('regis');
        $this->db->where('presensi', 'Hadir');
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

    // Edit
    public function update_presensi($data)
    {
        $this->db->where('id_reg', $data['id_reg']);
        $this->db->update('regis', $data);
    }

    public function hadir($id_reg, $data)
    {
        $this->db->where('id_reg', $id_reg);
        $this->db->update('regis', $data);
    }
}

/* End of file scanbarcode_model.php */
/* Location: ./application/models/scanbarcode_model.php */