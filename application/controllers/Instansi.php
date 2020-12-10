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
            $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data added</div>');
            redirect('instansi');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Instansi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['instansi'] = $this->InstansiModel->getByIdInstansi($id);


        // rules
        $this->form_validation->set_rules('nama_instansi', 'Instansi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('instansi/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->InstansiModel->editInstansi();
            $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data edited</div>');
            redirect('instansi');
        }
    }

    public function delete($id)
    {
        // $departemenId = $this->input->post('id_departemen');
        $this->InstansiModel->deleteInstansi($id);

        //$this->db->delete('instansi', array('id_instansi' => $id));
        $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data deleted</div>');
        redirect('instansi');
    }
}
