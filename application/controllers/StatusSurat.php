<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StatusSurat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('InstansiModel');
    }

    public function index()
    {
        $data['title'] = 'Status Surat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //$data['instansi'] = $this->InstansiModel->getAllInstansi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('statussurat/index', $data);
        $this->load->view('templates/footer');
    }
}
