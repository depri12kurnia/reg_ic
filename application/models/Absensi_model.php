<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing data
    public function listing()
    {
        $this->db->select('presensi.*, regis.no_reg, regis.nama_lengkap, regis.pekerjaan, regis.negara, kehadiran.nama_khd, stts.nama_status');
        $this->db->from('presensi');
        // Join dg 2 tabel
        $this->db->join('regis', 'regis.id_reg = presensi.id_reg', 'LEFT');
        $this->db->join('kehadiran', 'kehadiran.id_khd = presensi.id_khd', 'LEFT');
        $this->db->join('stts', 'stts.id_status = presensi.id_status', 'LEFT');
        // End join
        $this->db->order_by('jam_msk', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file Absensi_model.php */
/* Location: ./application/models/Absensi_model.php */