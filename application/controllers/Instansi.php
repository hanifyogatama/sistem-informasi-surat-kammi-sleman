<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instansi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('InstansiModel');
    }

    public function index()
    {
        $data['title'] = 'Instansi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['instansi'] = $this->InstansiModel->getAllInstansi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('instansi/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = 'Tambah Instansi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['instansi'] = $this->db->get('instansi')->result_array();

        // rules
        $this->form_validation->set_rules('nama_instansi', 'Instansi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('instansi/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->InstansiModel->addInstansi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">instansi ditambah</div> ');
            redirect('instansi');
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Instansi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['instansi'] = $this->InstansiModel->getByIdInstansi('id_instansi');
        $data['instansi'] = $this->db->get('instansi')->result_array();

        // rules
        $this->form_validation->set_rules('nama_departemen', 'Departemen', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('instansi/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->InstansiModel->editInstansi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">departemen diedit</div> ');
            redirect('instansi');
        }
    }

    // public function delete($id)
    // {
    //     // $departemenId = $this->input->post('id_departemen');
    //     $this->DepartemenModel->deleteDepartemen($id);
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Dihapus</div> ');
    //     redirect('departemen');
    // }
}
