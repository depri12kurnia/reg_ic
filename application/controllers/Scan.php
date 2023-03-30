<?php

class Scan extends Ci_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->log_user->add_log();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan     = $this->session->set_userdata('pengalihan', $url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);

		$this->load->library('user_agent');
		$this->load->model('Scan_model', 'Scan');
		$this->load->library('form_validation');
	}


	public function messageAlert($type, $title)
	{
		$messageAlert = "const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});
		Toast.fire({
			type: '" . $type . "',
			title: '" . $title . "'
		});";
		return $messageAlert;
	}

	function index()
	{
		if ($this->agent->is_mobile('iphone')) {
			//Allowing akses to admin only
			if ($this->session->userdata('akses_level') === 'Admin') {
				$site       = $this->konfigurasi_model->listing();

				$data = array(
					'title'           => 'Mobile Scan QR Code',
					'site'            => $site,
					'isi'             => 'scan/scan_mobile'
				);
				$this->load->view('layout/wrapper', $data, FALSE);
			} elseif ($this->session->userdata('akses_level') === 'Absensi') {
				$site       = $this->konfigurasi_model->listing();

				$data = array(
					'title'           => 'Mobile Scan QR Code',
					'site'            => $site,
					'isi'             => 'scan/scan_mobile'
				);
				$this->load->view(
					'layout/wrapper',
					$data,
					FALSE
				);
			} else {
				$this->session->set_flashdata('warning', 'Access Dained !!!');
				redirect(base_url('dasbor'), 'refresh');
			}
		} elseif ($this->agent->is_mobile()) {
			//Allowing akses to admin only
			if ($this->session->userdata('akses_level') === 'Admin') {
				$site       = $this->konfigurasi_model->listing();

				$data = array(
					'title'           => 'Mobile Scan QR Code',
					'site'            => $site,
					'isi'             => 'scan/scan_mobile'
				);
				$this->load->view('layout/wrapper', $data, FALSE);
			} elseif ($this->session->userdata('akses_level') === 'Absensi') {
				$site       = $this->konfigurasi_model->listing();

				$data = array(
					'title'           => 'Mobile Scan QR Code',
					'site'            => $site,
					'isi'             => 'scan/scan_mobile'
				);
				$this->load->view(
					'layout/wrapper',
					$data,
					FALSE
				);
			} else {
				$this->session->set_flashdata('warning', 'Access Dained !!!');
				redirect(base_url('dasbor'), 'refresh');
			}
		} else {
			//Allowing akses to admin only
			if ($this->session->userdata('akses_level') === 'Admin') {
				$site       = $this->konfigurasi_model->listing();

				$data = array(
					'title'           => 'Desktop Scan QR Code',
					'site'            => $site,
					'isi'             => 'scan/scan_desktop'
				);
				$this->load->view('layout/wrapper', $data, FALSE);
			} elseif ($this->session->userdata('akses_level') === 'Absensi') {
				$site       = $this->konfigurasi_model->listing();

				$data = array(
					'title'           => 'Desktop Scan QR Code',
					'site'            => $site,
					'isi'             => 'scan/scan_desktop'
				);
				$this->load->view('layout/wrapper', $data, FALSE);
			} else {
				$this->session->set_flashdata('warning', 'Access Dained !!!');
				redirect(base_url('dasbor'), 'refresh');
			}
		}
	}

	function cek_id()
	{
		$user = $this->user;
		$result_code = $this->input->post('id_reg');
		$tgl = date('Y-m-d');
		$jam_msk = date('h:i:s');
		$cek_id = $this->Scan->cek_id($result_code);
		$cek_kehadiran = $this->Scan->cek_kehadiran($result_code, $tgl);
		if (!$cek_id) {
			$this->session->set_flashdata('warning', 'Absent Failed QR Data Not Found');
			redirect($_SERVER['HTTP_REFERER']);
		} elseif ($cek_kehadiran && $cek_kehadiran->jam_msk != '00:00:00' && $cek_kehadiran->id_status == 1) {
			$this->session->set_flashdata('warning', 'Absent Login Failed');
			redirect($_SERVER['HTTP_REFERER']);
			return false;
		} else {
			$data = array(
				'id_reg' => $result_code,
				'tgl' => $tgl,
				'jam_msk' => $jam_msk,
				'id_khd' => 1,
				'id_status' => 1,
			);
			$this->Scan->absen_masuk($data);
			$this->session->set_flashdata('sukses', 'Absent Login Successful');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}
