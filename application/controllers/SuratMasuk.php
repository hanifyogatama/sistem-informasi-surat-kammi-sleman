<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratMasuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['SuratMasukModel', 'InstansiModel', 'StatusSuratModel']);
        //  is_logged_in();
    }

    // get all data from surat masuk
    public function index()
    {
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['surat_masuk'] = $this->SuratMasukModel->getAllSuratMasuk();
        // $data['status_surat'] = $this->StatusSuratModel->getAllStatusSurat();
        // $data['instansi'] = $this->InstansiModel->getAllInstansi();

        // rules form add surat masuk

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratmasuk/index', $data);
        $this->load->view('templates/footer');
    }

    // add surat masuk
    public function add()
    {
        $data['title'] = 'Add Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['surat_masuk'] = $this->db->get('surat_masuk')->result_array();

        $data['status_surat'] = $this->StatusSuratModel->getAllStatusSurat();
        $data['instansi'] = $this->InstansiModel->getAllInstansi();


        // rules
        $this->form_validation->set_rules('no_surat', 'No Surat', 'required|trim', [
            'required' => 'nomor surat harus diisi'
        ]);

        $this->form_validation->set_rules('id_instansi', 'Instansi', 'required|trim', [
            'required' => 'pengirim surat belum diisi'
        ]);

        $this->form_validation->set_rules('id_status_surat', 'Status surat', 'required|trim', [
            'required' => 'sifat surat belum diisi'
        ]);

        $this->form_validation->set_rules('isi', 'Isi', 'required|trim', [
            'required' => 'deskripsi surat belum diisi'
        ]);

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', [
            'required' => 'keterangan surat belum diisi'
        ]);

        $this->form_validation->set_rules('tanggal_surat', 'tanggal surat', 'required|trim', [
            'required' => 'tanggal surat belum diisi'
        ]);

        $this->form_validation->set_rules('tanggal_diterima', 'tanggal diterima', 'required|trim', [
            'required' => 'tanggal diterima surat belum diisi'
        ]);

        $this->form_validation->set_rules('file_surat', 'File', 'required|trim', [
            'required' => 'file belum ditambahkan '
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratmasuk/add', $data);
            $this->load->view('templates/footer');
        } else {

            $config['allowed_types']    = 'pdf';
            $config['max_size']         = '2048';
            $config['upload_path']      = './file_document/';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file_surat')) {
                echo $this->upload->display_errors();
            } else {
                $new_file = $this->upload->data('file_name');
                $this->SuratMasukModel->addSuratMasuk($new_file);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>data added</div>');
                redirect('suratmasuk');
            }
        }
    }

    // edit data surat masuk
    public function edit($id)
    {
        $data['title'] = 'Edit Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_masuk'] = $this->SuratMasukModel->getByIdSuratMasuk($id);

        $data['status_surat'] = $this->StatusSuratModel->getAllStatusSurat();
        $data['instansi'] = $this->InstansiModel->getAllInstansi();

        // rules
        $this->form_validation->set_rules('no_surat', 'No SUrat', 'required|trim');
        $this->form_validation->set_rules('id_instansi', 'Instansi', 'required|trim');
        $this->form_validation->set_rules('id_status_surat', 'Status surat', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi', 'required|trim');
        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required|trim');
        $this->form_validation->set_rules('tanggal_diterima', 'Tanggal Diterima', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratmasuk/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $config['allowed_types']    = 'pdf';
            $config['max_size']         = '2048';
            $config['upload_path']      = './file_document/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_surat')) {

                $new_file = $this->upload->data('file_name');

                $this->SuratMasukModel->editSuratMasuk($new_file);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>data edited</div>');
                redirect('suratmasuk');
            } else {

                $old_file = $data['surat_masuk']['file_surat'];
                $this->SuratMasukModel->editSuratMasuk($old_file);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>data edited</div>');
                redirect('suratmasuk');
            }
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['surat_masuk'] = $this->SuratMasukModel->getAllSuratMasuk($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratmasuk/detail', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->SuratMasukModel->deleteSuratMasuk($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data deleted</div>');
        redirect('suratmasuk');
    }
}
