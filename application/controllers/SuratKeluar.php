<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratKeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['SuratKeluarModel', 'InstansiModel', 'StatusSuratModel']);
        //  is_logged_in();
    }

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
        $data['title'] = 'Add Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


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

    public function edit()
    {
        $data['title'] = 'Edit Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        // rules
        // $this->form_validation->set_rules('no_surat', 'No SUrat', 'required');
        // $this->form_validation->set_rules('id_instansi', 'Instansi', 'required');
        // $this->form_validation->set_rules('id_status_surat', 'Status surat', 'required');
        // $this->form_validation->set_rules('isi', 'Isi', 'required');
        // $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required');
        // $this->form_validation->set_rules('tanggal_diterima', 'Tanggal Diterima', 'required');
        // $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratkeluar/edit', $data);
            $this->load->view('templates/footer');
        } else {

            // $config['allowed_types']    = 'pdf';
            // $config['max_size']         = '2048';
            // $config['upload_path']      = './file_document/';

            // $this->load->library('upload', $config);

            // if ($this->upload->do_upload('file_surat')) {

            //     $new_file = $this->upload->data('file_name');

            //     $this->SuratMasukModel->editSuratMasuk($new_file);
            //     $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>data edited</div>');
            //     redirect('suratmasuk');
            // } else {

            //     $old_file = $data['surat_masuk']['file_surat'];
            //     $this->SuratMasukModel->editSuratMasuk($old_file);
            //     $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>data edited</div>');
            //     redirect('suratmasuk');
            // }
        }
    }

    // detail data seurat keluar
    public function detail()
    {
        $data['title'] = 'Detail Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        //$data['surat_masuk'] = $this->SuratMasukModel->detailSuratMasuk($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratkeluar/detail', $data);
        $this->load->view('templates/footer');
    }

    // delete data suart keluar
    public function delete($id)
    {
        $this->suratKeluarModel->deleteSuratKeluar($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data deleted</div>');
        redirect('suratkeluar');
    }
}
