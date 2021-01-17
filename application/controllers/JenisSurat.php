<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisSurat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['StatusSuratModel']);
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Jenis Surat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['status_surat'] = $this->StatusSuratModel->getAllStatusSurat();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('statussurat/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = 'Jenis Surat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['status_surat'] = $this->db->get('status_surat')->result_array();
        $data['status_surat'] = $this->db->get('status_surat')->result_array();

        // rules
        $this->form_validation->set_rules('kode_surat', 'Kode Surat', 'required', [
            'required' => 'kode surat harus diisi '
        ]);

        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'jenis surat harus diisi '
        ]);



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('statussurat/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->StatusSuratModel->addStatusSurat();
            $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data berhasil ditambah</div>');
            redirect('jenissurat');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Jenis Surat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['status_surat'] = $this->StatusSuratModel->getByIdStatusSurat($id);

        // rules
        $this->form_validation->set_rules('kode_surat', 'kode surat', 'required', [
            'required' => 'kode surat belum diisi'
        ]);

        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'jenis surat belum diisi'
        ]);



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('statussurat/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->StatusSuratModel->editStatusSurat();
            $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data berhasil diupdate</div>');
            redirect('jenissurat');
        }
    }

    public function delete($id)
    {
        // $departemenId = $this->input->post('id_departemen');
        $this->StatusSuratModel->deleteStatusSurat($id);
        $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data berhasil dihapus</div>');
        redirect('jenissurat');
    }
}
