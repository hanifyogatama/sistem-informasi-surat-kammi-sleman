<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekapitulasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DepartemenModel');
    }

    public function index()
    {
        $data['title'] = 'Rekapitulasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['status_surat'] = $this->StatusSuratModel->getAllStatusSurat();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rekapitulasi/index', $data);
        $this->load->view('templates/footer');
    }
}
