<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    // load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    // Detail
    public function detail($id_user)
    {
        $this->db->select('users.*,
							bagian.nama_bagian');
        $this->db->from('users');
        // join
        $this->db->join('bagian', 'bagian.id_bagian = users.id_bagian', 'left');
        // End join
        // where
        $this->db->where('users.id_user', $id_user);
        $this->db->order_by('users.id_user', 'desc');
        $query = $this->db->get();
        return $query->row();
    }
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */