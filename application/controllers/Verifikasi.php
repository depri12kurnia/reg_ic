
<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Verifikasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('verifikasi_model');

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
            $registrasi = $this->verifikasi_model->listing();
            $site       = $this->konfigurasi_model->listing();

            $data = array(
                'title'           => 'Data Verifikasi All (' . count($registrasi) . ')',
                'registrasi'      => $registrasi,
                'site'            => $site,
                'isi'             => 'verifikasi/list'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } elseif ($this->session->userdata('akses_level') === 'Verifikator') {
            $registrasi = $this->verifikasi_model->listing();
            $site       = $this->konfigurasi_model->listing();

            $data = array(
                'title'           => 'Data Verifikasi All (' . count($registrasi) . ')',
                'registrasi'      => $registrasi,
                'site'            => $site,
                'isi'             => 'verifikasi/list'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('warning', 'Access Dained !!!');
            redirect(base_url('dasbor'), 'refresh');
        }
    }

    // Halaman Approved
    public function approved()
    {
        //Allowing akses to admin only
        if ($this->session->userdata('akses_level') === 'Admin') {
            $registrasi = $this->verifikasi_model->approved();
            $site       = $this->konfigurasi_model->listing();

            $data = array(
                'title'           => 'Data Approved Verifikasi All (' . count($registrasi) . ')',
                'registrasi'      => $registrasi,
                'site'            => $site,
                'isi'             => 'verifikasi/approved'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } elseif ($this->session->userdata('akses_level') === 'Verifikator') {
            $registrasi = $this->verifikasi_model->approved();
            $site       = $this->konfigurasi_model->listing();

            $data = array(
                'title'           => 'Data Approved Verifikasi All (' . count($registrasi) . ')',
                'registrasi'      => $registrasi,
                'site'            => $site,
                'isi'             => 'verifikasi/approved'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('warning', 'Access Dained !!!');
            redirect(base_url('dasbor'), 'refresh');
        }
    }

    // Halaman Failed
    public function failed()
    {
        //Allowing akses to admin only
        if ($this->session->userdata('akses_level') === 'Admin') {
            $registrasi = $this->verifikasi_model->failed();
            $site       = $this->konfigurasi_model->listing();

            $data = array(
                'title'           => 'Data Failed Verifikasi All (' . count($registrasi) . ')',
                'registrasi'      => $registrasi,
                'site'            => $site,
                'isi'             => 'verifikasi/failed'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } elseif ($this->session->userdata('akses_level') === 'Verifikator') {
            $registrasi = $this->verifikasi_model->failed();
            $site       = $this->konfigurasi_model->listing();

            $data = array(
                'title'           => 'Data Failed Verifikasi All (' . count($registrasi) . ')',
                'registrasi'      => $registrasi,
                'site'            => $site,
                'isi'             => 'verifikasi/failed'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('warning', 'Access Dained !!!');
            redirect(base_url('dasbor'), 'refresh');
        }
    }

    // Halaman Approved
    public function sendmailapproved()
    {
        //Allowing akses to admin only
        if ($this->session->userdata('akses_level') === 'Admin') {
            $registrasi = $this->verifikasi_model->sendmailapproved();
            $site       = $this->konfigurasi_model->listing();

            $data = array(
                'title'           => 'Data Verifikasi All (' . count($registrasi) . ')',
                'registrasi'      => $registrasi,
                'site'            => $site,
                'isi'             => 'verifikasi/sendmailapproved'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } elseif ($this->session->userdata('akses_level') === 'Verifikator') {
            $registrasi = $this->verifikasi_model->sendmailapproved();
            $site       = $this->konfigurasi_model->listing();

            $data = array(
                'title'           => 'Data Verifikasi All (' . count($registrasi) . ')',
                'registrasi'      => $registrasi,
                'site'            => $site,
                'isi'             => 'verifikasi/sendmailapproved'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $this->session->set_flashdata('warning', 'Access Dained !!!');
            redirect(base_url('dasbor'), 'refresh');
        }
    }

    // Verifikasi

    public function verify($id_reg)
    {
        $registrasi     = $this->verifikasi_model->detail($id_reg);
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
            'kepesertaan',
            'Kepesertaan',
            'required|trim|required|xss_clean',
            array('required' => '%s must be filled')
        );

        $validasi->set_rules(
            'jenis_peserta',
            'Jenis_peserta',
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
                        'title'          => 'Verify Registration',
                        'registrasi'     => $registrasi,
                        'error'          => $this->upload->display_errors(),
                        'isi'            => 'verifikasi/verify'
                    );
                    $this->load->view('layout/wrapper', $data, FALSE);
                    // Masuk database
                } else {

                    $upload_data    = array('uploads' => $this->upload->data());

                    $i          = $this->input;

                    $this->load->library('zend');
                    $this->zend->load('Zend/Barcode');
                    $barcode = $i->post('no_reg'); //nomor id barcode

                    $imageResource = Zend_Barcode::factory('code128', 'image', array('text' => $barcode), array())->draw();
                    // $imageName = $barcode . '.jpg';
                    $imagePath = 'assets/upload/barcode/'; // penyimpanan file barcode
                    imagejpeg($imageResource, $imagePath . $barcode . '.jpg');
                    $pathBarcode = $imagePath . $barcode . '.jpg'; //Menyimpan path image bardcode kedatabase

                    $kartu = $i->post('no_reg');
                    // $kartu = $this->cardregis($kartu);
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'B-L']);

                    $Pathpdf = 'assets/upload/kartu/';
                    $tgl_cetak = date('d F Y H:i:s');
                    $data = array(
                        'registrasi'     => $registrasi,
                    );
                    $html = $this->load->view('verifikasi/kartu', $data, true);
                    $mpdf->SetFooter(base_url() . ' : ' . $tgl_cetak);
                    $mpdf->WriteHTML($html);
                    // $mpdf->Output(); // opens in browser
                    $mpdf->Output($Pathpdf . $kartu . '.pdf', 'F');

                    $data = array(
                        'id_reg'        => $id_reg,
                        'no_reg'        => $i->post('no_reg'),
                        'nama_lengkap'  => $i->post('nama_lengkap'),
                        'email'         => $i->post('email'),
                        'handphone'     => $i->post('handphone'),
                        'pekerjaan'     => $i->post('pekerjaan'),
                        'jurusan'       => $i->post('jurusan'),
                        'jurusan_lain'  => $i->post('jurusan_lain'),
                        'kepesertaan'   => $i->post('kepesertaan'),
                        'jenis_peserta' => $i->post('jenis_peserta'),
                        'negara'        => $i->post('negara'),
                        'bukti'         => $upload_data['uploads']['file_name'],
                        'status'        => $i->post('status'),
                        'kartu'         => $kartu . '.pdf',
                        'created_at'    => date('Y-m-d H:i:s'),
                    );

                    // Panggil Data Untuk Mengirim Kan Email dan Barcode
                    $id_reg         = $id_reg;
                    $no_reg         = $i->post('no_reg');
                    $nama_lengkap   = $i->post('nama_lengkap');
                    $email          = $i->post('email');
                    $handphone      = $i->post('handphone');
                    $qr_code        = $no_reg . '.jpg';
                    $status         = $i->post('status');
                    $kartu          = $kartu . '.pdf';

                    // insert database
                    if ($this->verifikasi_model->edit($data)) {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('warning', 'Your verification failed, please try again !');
                        redirect(base_url('verifikasi'), 'refresh', $error);
                    } else {
                        $this->verifikasi_model->edit($data);
                        $this->sending($id_reg, $no_reg, $email, $nama_lengkap, $handphone, $qr_code, $kartu, $status);
                        $this->session->set_flashdata('sukses', 'Data has been successfully verification');
                        redirect(base_url('verifikasi'), 'refresh');
                    }
                }
            } else {
                $i         = $this->input;

                $kartu = $i->post('no_reg');
                // $kartu = $this->cardregis($kartu);
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'B-L']);

                $Pathpdf = 'assets/upload/kartu/';
                $tgl_cetak = date('d F Y H:i:s');
                $data = array(
                    'registrasi'     => $registrasi,
                );
                $html = $this->load->view('verifikasi/kartu', $data, true);
                $mpdf->SetFooter(base_url() . ' : ' . $tgl_cetak);
                $mpdf->WriteHTML($html);
                // $mpdf->Output(); // opens in browser
                $mpdf->Output($Pathpdf . $kartu . '.pdf', 'F');

                $data = array(
                    'id_reg'        => $id_reg,
                    'no_reg'        => $i->post('no_reg'),
                    'nama_lengkap'  => $i->post('nama_lengkap'),
                    'email'         => $i->post('email'),
                    'handphone'     => $i->post('handphone'),
                    'pekerjaan'     => $i->post('pekerjaan'),
                    'jurusan'       => $i->post('jurusan'),
                    'jurusan_lain'  => $i->post('jurusan_lain'),
                    'kepesertaan'   => $i->post('kepesertaan'),
                    'jenis_peserta' => $i->post('jenis_peserta'),
                    'negara'        => $i->post('negara'),
                    'status'        => $i->post('status'),

                    'ket'           => $i->post('ket'),
                    'kartu'         => $kartu . '.pdf',
                    'created_at'    => date('Y-m-d H:i:s'),
                );
                // Panggil Data Untuk Mengirim Kan Email dan Barcode
                $id_reg         = $id_reg;
                $no_reg         = $i->post('no_reg');
                $nama_lengkap   = $i->post('nama_lengkap');
                $email          = $i->post('email');
                $handphone      = $i->post('handphone');
                $qr_code        = $no_reg . '.jpg';
                $status         = $i->post('status');
                $ket            = $i->post('ket');
                $kartu          = $kartu . '.pdf';

                // insert database
                if ($this->verifikasi_model->edit($data)) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('warning', 'Your verification failed, please try again !');
                    redirect(base_url('verifikasi'), 'refresh', $error);
                } else {
                    if ($status == 'Verify') {
                        // Status Verify
                        $status = 'Verify';
                        $this->verifikasi_model->edit($data);
                        $this->sending($no_reg, $email, $nama_lengkap, $handphone, $qr_code, $kartu, $status, $ket);
                        $this->session->set_flashdata('sukses', 'Data has been successfully verification');
                        redirect(base_url('verifikasi'), 'refresh');
                    } else {
                        // Status Failed
                        $status = 'Failed';
                        $this->verifikasi_model->edit($data);
                        $this->sending_failed($no_reg, $email, $nama_lengkap, $handphone, $status, $ket);
                        $this->session->set_flashdata('sukses', 'Data has been successfully verification');
                        redirect(base_url('verifikasi'), 'refresh');
                    }
                }
            }
        }
        // End masuk database
        $data = array(
            'title'             => 'Verify Registration',
            'registrasi'        => $registrasi,
            'isi'               => 'verifikasi/verify'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
    // End Verifikasi

    public function sending($no_reg, $email, $nama_lengkap, $handphone, $qr_code, $kartu, $status, $ket)
    {
        $developmentMode = true;
        $mailer = new PHPMailer($developmentMode);

        try {

            $mailer->isSMTP();

            if ($developmentMode) {
                $mailer->SMTPOptions = [
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true,
                    ],
                ];
            }

            $mailer->Host = 'smtp.gmail.com';
            $mailer->SMTPAuth = true;
            $mailer->Username = 'apps.poltekkesjakarta3@gmail.com';
            $mailer->Password = 'vawcypzvlrdtorjn';
            $mailer->SMTPSecure = 'ssl';
            $mailer->Port = 465;

            $mailer->setFrom('reg.ichrs@poltekkesjakarta3.ac.id', 'COMMITTEE INTERNATIONAL CONFERENCE 4TH POLTEKKES JAKARTA III');
            $mailer->addAddress($email, $nama_lengkap);

            $mailer->isHTML(true);
            $mailer->Subject = 'Verification Registration Commitee International Conference 4TH Poltekkes Jakarta III';
            $mailer->Body = '<h2>Hallo, ' . $nama_lengkap . '</h2>
                            Here we inform you Registration International Conference 4TH Health Polytechnic Ministry of Health Jakarta III : <br>
                            <table>
                            <tr>
							<tr>
                            <td>Registration Number</td>
                            <td>: <b>' . $no_reg . '</b></td>
                            </tr>
                            <td>Full Name</td>
                            <td>: <b>' . $nama_lengkap . '</b></td>
                            </tr>
                            <tr>
                            <td>Email</td>
                            <td>: <b>' . $email . '</b></td>
                            </tr>
                            <tr>
                            <td>Mobile Number</td>
                            <td>: <b>' . $handphone . '</b></td>
                            </tr>
                            </table>
                            <br>
                            Registration Number ' . $no_reg . ' Status : <b><h2>' . $status . '</h2></b><br>
                            <b>' . $ket . '</b>
                            <br>
                            <br>
                            Thank You.<br>
                        ';
            // $path = base_url('assets/upload/barcode/' . $qr_code);
            $path = base_url('assets/upload/kartu/' . $kartu);

            $mailer->addStringAttachment(file_get_contents($path), $kartu);
            $mailer->send();
            $mailer->ClearAllRecipients();
            $this->session->set_flashdata('sukses', 'Your Registration is Successful Please Check Your Email');
        } catch (Exception $e) {
            $this->session->set_flashdata('warning', 'Your Registration Is Successful But Failed To Send Email Please Check Again ' . $mailer->ErrorInfo);
            // echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
        }
    }

    // Failed Send Mail
    public function sending_failed($no_reg, $email, $nama_lengkap, $handphone, $status, $ket)
    {
        $developmentMode = true;
        $mailer = new PHPMailer($developmentMode);

        try {

            $mailer->isSMTP();

            if ($developmentMode) {
                $mailer->SMTPOptions = [
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true,
                    ],
                ];
            }

            $mailer->Host = 'smtp.gmail.com';
            $mailer->SMTPAuth = true;
            $mailer->Username = 'apps.poltekkesjakarta3@gmail.com';
            $mailer->Password = 'vawcypzvlrdtorjn';
            $mailer->SMTPSecure = 'ssl';
            $mailer->Port = 465;

            $mailer->setFrom('reg.ichrs@poltekkesjakarta3.ac.id', 'COMMITTEE INTERNATIONAL CONFERENCE 4TH POLTEKKES JAKARTA III');
            $mailer->addAddress($email, $nama_lengkap);

            $mailer->isHTML(true);
            $mailer->Subject = 'Verification Registration Commitee International Conference 4TH Poltekkes Jakarta III';
            $mailer->Body = '<h2>Hallo, ' . $nama_lengkap . '</h2>
                            Here we inform you Registration International Conference 4TH Health Polytechnic Ministry of Health Jakarta III : <br>
                            <table>
                            <tr>
							<tr>
                            <td>Registration Number</td>
                            <td>: <b>' . $no_reg . '</b></td>
                            </tr>
                            <td>Full Name</td>
                            <td>: <b>' . $nama_lengkap . '</b></td>
                            </tr>
                            <tr>
                            <td>Email</td>
                            <td>: <b>' . $email . '</b></td>
                            </tr>
                            <tr>
                            <td>Mobile Number</td>
                            <td>: <b>' . $handphone . '</b></td>
                            </tr>
                            </table>
                            <br>
                            Registration Number ' . $no_reg . ' Status : <b><h2>' . $status . '</h2></b><br>
                            <b>' . $ket . '</b>
                            <br>
                            <br>
                            Thank You.<br>
                        ';
            $mailer->send();
            $mailer->ClearAllRecipients();
            $this->session->set_flashdata('sukses', 'Your Registration is Successful Please Check Your Email');
        } catch (Exception $e) {
            $this->session->set_flashdata('warning', 'Your Registration Is Successful But Failed To Send Email Please Check Again ' . $mailer->ErrorInfo);
            // echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
        }
    }

    public function cardregis($no_reg)
    {

        $mpdf = new \Mpdf\Mpdf();

        $Pathpdf = 'assets/upload/kartu/';
        $tgl_cetak = date('d F Y H:i:s');
        $html = $this->load->view('verifikasi/kartu', [], true);
        $mpdf->SetFooter(base_url() . $tgl_cetak);
        $mpdf->WriteHTML($html);
        // $mpdf->Output(); // opens in browser
        $mpdf->Output($Pathpdf . $no_reg . '.pdf', 'F'); // it downloads the file into the user system, with give name
    }
}

/* End of file Regis.php */
/* Location: ./application/controllers/Regis.php */