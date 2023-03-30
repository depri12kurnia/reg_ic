<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Regis_model extends CI_Model
{

    // load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('regis');
        $this->db->order_by('regis.id_reg', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function CreateNoRegis()
    {
        $this->db->select('RIGHT(regis.no_reg,5) as no_reg', false);
        $this->db->order_by('no_reg', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('regis');
        if ($query->num_rows() != 0) {
            $data = $query->row();
            $kode = intval($data->no_reg) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "4050102023" . $batas;
        return $kodetampil;
    }

    // Total
    public function total()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('regis');
        $query = $this->db->get();
        return $query->row();
    }

    // Detail
    public function detail($id_reg)
    {
        $this->db->select('*');
        $this->db->from('regis');
        $this->db->where('regis.id_reg', $id_reg);
        $this->db->order_by('regis.id_reg', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah
    public function tambah($data)
    {
        $this->db->insert('regis', $data);
    }

    // Edit
    public function edit($data)
    {
        $this->db->where('id_reg', $data['id_reg']);
        $this->db->update('regis', $data);
    }

    // Update Status Absen

    // Delete
    public function delete($data)
    {
        $this->db->where('id_reg', $data['id_reg']);
        $this->db->delete('regis', $data);
    }
}

/* End of file Regis_model.php */
/* Location: ./application/models/Regis_model.php */
