<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratKeluar extends CI_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     is_logged_in();
    // }


    public function index()
    {
        $data['title'] = 'Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        // rules form add surat masuk


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratkeluar/index', $data);
        $this->load->view('templates/footer');
    }
}
