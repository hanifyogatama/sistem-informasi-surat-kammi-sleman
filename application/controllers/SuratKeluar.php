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

    // add data surat keluar
    public function add()
    {
        $data['title'] = 'Tambah Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $data['suratKeluar'] = $this->db->get('surat_keluar')->result_array();

        // rules
        // $this->form_validation->set_rules('nama_departemen', 'Departemen', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratkeluar/add', $data);
            $this->load->view('templates/footer');
        } else {
            // $this->SuratMasukModel->addSuratMasuk();
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">departemen ditambah</div> ');
            // redirect('suratkeluar');
        }
    }
}
