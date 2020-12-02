<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Departemen extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Departemen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
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
            $this->db->insert('departemen', ['nama_departemen' => $this->input->post('nama_departemen')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>new departement added</div>');
            redirect('departemen');
        }
    }
}
