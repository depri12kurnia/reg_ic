<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi extends CI_Controller
{
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('presensi_model', 'presensi');
        // Tambahkan proteksi halaman
        $url_pengalihan = str_replace('index.php/', '', current_url());
        $pengalihan     = $this->session->set_userdata('pengalihan', $url_pengalihan);
        // Ambil check login dari simple_login
        $this->simple_login->check_login($pengalihan);
    }

    // Halaman utama
    public function index()
    {
        // Ambil data user
        $data = array(
            'title'       => 'Presensi Registration Internationl Conferencee',
            'isi'         => 'laporan/presensi'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function ajax_list()
    {
        $this->load->helper('url');

        $list = $this->presensi->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $val) {
            $no++;
            $row = array();
            $row[] = $val->no_reg;
            $row[] = $val->nama_lengkap;
            $row[] = $val->email;
            $row[] = $val->handphone;
            $row[] = $val->kepesertaan;
            $row[] = $val->pekerjaan;
            $row[] = $val->jenis_peserta;
            $row[] = $val->negara;
            $row[] = $val->status;
            $row[] = $val->presensi;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->presensi->count_all(),
            "recordsFiltered" => $this->presensi->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}

/* End of file presensi.php */
/* Location: ./application/controllers/presensi.php */