<?php

class Scan_model extends Ci_Model
{
    public function cek_id($id_reg)
    {
        $query_str = $this->db->where('id_reg', $id_reg)->get('regis');

        if ($query_str->num_rows() > 0) {
            return $query_str->row();
        } else {
            return false;
        }
    }

    public function absen_masuk($data)
    {
        return $this->db->insert('presensi', $data);
    }

    public function cek_kehadiran($id_reg, $tgl)
    {
        $query_str = $this->db->where('id_reg', $id_reg)->where('tgl', $tgl)->get('presensi');

        if ($query_str->num_rows() > 0) {
            return $query_str->row();
        } else {
            return false;
        }
    }
}
