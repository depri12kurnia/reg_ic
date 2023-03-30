
<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Regis extends CI_Controller
{

    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('regis_model');
    }

    // Halaman utama
    public function index()
    {
        $this->load->view('regis/list', false);
    }

    // Tambah
    public function tambah()
    {
        // Validasi
        $validasi           = $this->form_validation;
        $create_barcode     = $this->regis_model->CreateNoRegis();

        $validasi->set_rules(
            'nama_lengkap',
            'Nama Lengkap',
            'required|trim|min_length[5]|max_length[30]|xss_clean',
            array('required' => '%s must be filled')
        );

        $validasi->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[regis.email]|xss_clean',
            array('required' => '%s must be filled')
        );

        $validasi->set_rules(
            'handphone',
            'Handphone',
            'required|xss_clean',
            array('required' => '%s must be filled')
        );

        $validasi->set_rules(
            'kepesertaan',
            'Kepesertaan',
            'required|xss_clean',
            array('required' => '%s must be filled')
        );

        $validasi->set_rules(
            'jenis_peserta',
            'Jenis_peserta',
            'required|xss_clean',
            array('required' => '%s must be filled')
        );

        $validasi->set_rules(
            'negara',
            'Negara',
            'required|xss_clean',
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
                    $error = $this->upload->display_errors();
                    $this->load->view('regis/list', false, $error);
                    // Masuk database
                } else {
                    $upload_data = array('uploads' => $this->upload->data());

                    $i = $this->input;

                    $this->load->library('zend');
                    $this->zend->load('Zend/Barcode');
                    $barcode = $create_barcode; //nomor id barcode

                    $imageResource = Zend_Barcode::factory('code128', 'image', array('text' => $barcode), array())->draw();
                    // $imageName = $barcode . '.jpg';
                    $imagePath = 'assets/upload/barcode/'; // penyimpanan file barcode
                    imagejpeg($imageResource, $imagePath . $barcode . '.jpg');
                    $pathBarcode = $imagePath . $barcode . '.jpg'; //Menyimpan path image bardcode kedatabase

                    $data = array(
                        'no_reg'        => $create_barcode,
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
                        'qr_code'       => $create_barcode . '.jpg',
                        'status'        => $i->post('status'),
                        'presensi'      => $i->post('presensi'),
                        'created_at'    => date('Y-m-d H:i:s'),
                    );
                    // call on insert data
                    $no_reg = $create_barcode;
                    $nama_lengkap = $i->post('nama_lengkap');
                    $email = $i->post('email');
                    $handphone = $i->post('handphone');
                    // $qr_code = $this->qrcode($no_reg);

                    // insert database
                    if ($this->regis_model->tambah($data)) {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('warning', 'Your registration failed, please check again !!!');
                        redirect(base_url('regis'), 'refresh', $error);
                    } else {
                        $this->sending($no_reg, $email, $nama_lengkap, $handphone);
                        $this->session->set_flashdata('sukses', 'Your Registration Is Successful Please Check Your Email');
                        redirect(base_url('regis'), 'refresh');
                    }
                }
            } else {
                $i = $this->input;

                $this->load->library('zend');
                $this->zend->load('Zend/Barcode');
                $barcode = $i->post('no_reg'); //nomor id barcode

                $imageResource = Zend_Barcode::factory('code128', 'image', array('text' => $barcode), array())->draw();
                // $imageName = $barcode . '.jpg';
                $imagePath = 'assets/upload/barcode/'; // penyimpanan file barcode
                imagejpeg($imageResource, $imagePath . $barcode . '.jpg');
                $pathBarcode = $imagePath . $barcode . '.jpg'; //Menyimpan path image bardcode kedatabase

                $data = array(
                    'no_reg'        => $create_barcode,
                    'nama_lengkap'  => $i->post('nama_lengkap'),
                    'email'         => $i->post('email'),
                    'handphone'     => $i->post('handphone'),
                    'pekerjaan'     => $i->post('pekerjaan'),
                    'jurusan'       => $i->post('jurusan'),
                    'jurusan_lain'  => $i->post('jurusan_lain'),
                    'kepesertaan'   => $i->post('kepesertaan'),
                    'jenis_peserta' => $i->post('jenis_peserta'),
                    'negara'        => $i->post('negara'),
                    'qr_code'       => $create_barcode . '.jpg',
                    'status'        => $i->post('status'),
                    'presensi'      => $i->post('presensi'),
                    'created_at'    => date('Y-m-d H:i:s'),
                );
                // call on insert data
                $no_reg = $create_barcode;
                $nama_lengkap = $i->post('nama_lengkap');
                $email = $i->post('email');
                $handphone = $i->post('handphone');

                // insert database
                if ($this->regis_model->tambah($data)) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('warning', 'Your registration failed, please check again !!!');
                    redirect(base_url('regis'), 'refresh', $error);
                } else {
                    $this->sending($no_reg, $email, $nama_lengkap, $handphone);
                    $this->session->set_flashdata('sukses', 'Your Registration Is Successful Please Check Your Email');
                    redirect(base_url('regis'), 'refresh');
                }
            }
        }
        // End masuk database

        $this->load->view('regis/list', false);
    }

    public function sending($no_reg, $email, $nama_lengkap, $handphone)
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
            $mailer->Username = 'depripahlakurnia12@gmail.com';
            $mailer->Password = 'tmmnvjtcvxuwutfr';
            $mailer->SMTPSecure = 'ssl';
            $mailer->Port = 465;

            $mailer->setFrom('reg.ichrs@poltekkesjakarta3.ac.id', 'COMMITTEE INTERNATIONAL CONFERENCE 4TH Health Polytechnic Ministry of Health Jakarta III');
            $mailer->addAddress($email, $nama_lengkap);

            $mailer->isHTML(true);
            $mailer->Subject = 'Registration Commitee International Conference 4TH Health Polytechnic Ministry of Health Jakarta III';
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
                            </table><br>
                            <b>Registration Number ' . $no_reg . ' Currently Validation Process </b><br>
                            <br>
                            <br>
                            Thank You.<br>
                        ';

            $mailer->send();
            $mailer->ClearAllRecipients();
            $this->session->set_flashdata('sukses', 'Your registration is successful. Please check your email');
        } catch (Exception $e) {
            $this->session->set_flashdata('warning', 'Your Registration Is Successful But Failed To Send Email Please Check Again' . $mailer->ErrorInfo);
            // echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
        }
    }
}

/* End of file Regis.php */
/* Location: ./application/controllers/Regis.php */