<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Departemen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DepartemenModel');
    }

    public function index()
    {
        $data['title'] = 'Departemen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['departemen'] = $this->DepartemenModel->getAllDepartemen();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('departemen/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = 'Tambah Departemen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['departemen'] = $this->db->get('departemen')->result_array();

        // rules
        $this->form_validation->set_rules('nama_departemen', 'Departemen', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('departemen/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->DepartemenModel->addDepartemen();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data added</div>');
            redirect('departemen');
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Departemen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['departemen'] = $this->DepartemenModel->getByIdDepartemen('id_departemen');
        $data['departemen'] = $this->db->get('departemen')->result_array();

        // rules
        $this->form_validation->set_rules('nama_departemen', 'Departemen', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('departemen/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->DepartemenModel->editDepartemen();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data edited</div>');
            redirect('departemen');
        }
    }

    public function delete($id)
    {
        // $departemenId = $this->input->post('id_departemen');
        $this->DepartemenModel->deleteDepartemen($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data deleted</div>');
        redirect('departemen');
    }
}
