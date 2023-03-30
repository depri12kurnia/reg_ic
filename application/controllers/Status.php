<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{

    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('bagian_model');
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
        $id_user     = $this->session->userdata('id_user');
        $user        = $this->user_model->detail($id_user);

        $data = array(
            'title'       => 'Status Pengajuan : ' . $this->session->userdata('nama'),
            'user'        => $user,
            'isi'         => 'status/cek_status'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */