<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guide extends CI_Controller
{
    public function index()
    {
        $data = array('title' => 'Registration Guide');
        $this->load->view('login/panduan', $data, FALSE);
    }
}
