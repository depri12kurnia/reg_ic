<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->model('registrasi_model');
        $this->log_user->add_log();
        // Tambahkan proteksi halaman
        $url_pengalihan = str_replace('index.php/', '', current_url());
        $pengalihan     = $this->session->set_userdata('pengalihan', $url_pengalihan);
        // Ambil check login dari simple_login
        $this->simple_login->check_login($pengalihan);
    }

    // Halaman registrasi
    public function index()
    {
        //Allowing akses to admin only
        if ($this->session->userdata('akses_level') === 'Admin') {
            $registrasi = $this->registrasi_model->listing();
            $site       = $this->konfigurasi_model->listing();

            $data = array(
                'title'           => 'Registration All (' . count($registrasi) . ')',
                'registrasi'      => $registrasi,
                'site'            => $site,
                'isi'             => 'registrasi/list'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } elseif ($this->session->userdata('akses_level') === 'Verifikator') {
            $registrasi = $this->registrasi_model->listing();
            $site       = $this->konfigurasi_model->listing();

            $data = array(
                'title'           => 'Registration All (' . count($registrasi) . ')',
                'registrasi'      => $registrasi,
                'site'            => $site,
                'isi'             => 'registrasi/list'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('warning', 'Access Dained !!!');
            redirect(base_url('dasbor'), 'refresh');
        }
    }

    // Edit registrasi
    public function edit($id_reg)
    {
        $registrasi     = $this->registrasi_model->detail($id_reg);
        $this->session->set_userdata('upload_image_file_manager', true);

        // Validasi
        $validasi = $this->form_validation;

        $validasi->set_rules(
            'nama_lengkap',
            'Nama Lengkap',
            'required|trim|required|min_length[5]|max_length[30]|xss_clean',
            array('required' => '%s must be filled')
        );

        $validasi->set_rules(
            'email',
            'Email',
            'required|trim|required|valid_email|xss_clean',
            array('required' => '%s must be filled')
        );

        $validasi->set_rules(
            'handphone',
            'Handphone',
            'required|trim|required|xss_clean',
            array('required' => '%s must be filled')
        );

        $validasi->set_rules(
            'negara',
            'Negara',
            'required|trim|required|xss_clean',
            array('required' => '%s must be filled')
        );

        $validasi->set_rules(
            'status',
            'Status',
            'required|trim|required|xss_clean',
            array('required' => '%s must be filled')
        );

        if ($validasi->run()) {

            if (!empty($_FILES['bukti']['name'])) {

                $config['upload_path'] = './assets/upload/bukti/';
                $config['allowed_types'] = 'png|jpeg|jpg';
                $config['max_size'] = '3000'; // KB
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('bukti')) {
                    // End validasi

                    $data = array(
                        'title'          => 'Edit Registration',
                        'registrasi'     => $registrasi,
                        'error'          => $this->upload->display_errors(),
                        'isi'            => 'registrasi/edit'
                    );
                    $this->load->view('layout/wrapper', $data, FALSE);
                    // Masuk database
                } else {

                    $upload_data    = array('uploads' => $this->upload->data());

                    $i = $this->input;

                    $data = array(
                        'id_reg'        => $id_reg,
                        'nama_lengkap'  => $i->post('nama_lengkap'),
                        'email'         => $i->post('email'),
                        'handphone'     => $i->post('handphone'),
                        'pekerjaan'     => $i->post('pekerjaan'),
                        'jurusan'       => $i->post('jurusan'),
                        'jurusan_lain'  => $i->post('jurusan_lain'),
                        'negara'        => $i->post('negara'),
                        'bukti'         => $upload_data['uploads']['file_name'],
                        'status'        => $i->post('status'),
                        'created_at'    => date('Y-m-d H:i:s'),
                    );

                    $this->registrasi_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data has been successfully edited');
                    redirect(base_url('registrasi'), 'refresh');
                }
            } else {
                $i         = $this->input;
                $data = array(
                    'id_reg'        => $id_reg,
                    'nama_lengkap'  => $i->post('nama_lengkap'),
                    'email'         => $i->post('email'),
                    'handphone'     => $i->post('handphone'),
                    'pekerjaan'     => $i->post('pekerjaan'),
                    'jurusan'       => $i->post('jurusan'),
                    'jurusan_lain'  => $i->post('jurusan_lain'),
                    'negara'        => $i->post('negara'),
                    'status'        => $i->post('status'),
                    'created_at'    => date('Y-m-d H:i:s'),
                );

                $this->registrasi_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data has been successfully edited');
                redirect(base_url('registrasi'), 'refresh');
            }
        }
        // End masuk database
        $data = array(
            'title'             => 'Edit Registration',
            'registrasi'        => $registrasi,
            'isi'               => 'registrasi/edit'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

/* End of file registrasi.php */
/* Location: ./application/controllers/registrasi.php */