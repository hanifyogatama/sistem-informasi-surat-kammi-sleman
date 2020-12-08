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

        $data['surat_keluar'] = $this->SuratKeluarModel->getAllSuratKeluar();
        // rules form add surat keluar

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratkeluar/index', $data);
        $this->load->view('templates/footer');
    }

    // add surat keluar
    public function add()
    {
        $data['title'] = 'Add Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keluar'] = $this->db->get('surat_keluar')->result_array();
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

        $this->form_validation->set_rules('tanggal_surat', 'tanggal surat', 'required', [
            'required' => 'tanggal surat belum diisi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratkeluar/add', $data);
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
                $this->SuratKeluarModel->addSuratKeluar($new_file);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>data added</div>');
                redirect('suratkeluar');
            }
        }
    }


    // edit data surat masuk
    public function edit($id)
    {
        $data['title'] = 'Edit Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keluar'] = $this->SuratKeluarModel->getByIdSuratKeluar($id);
        $data['status_surat'] = $this->StatusSuratModel->getAllStatusSurat();
        $data['instansi'] = $this->InstansiModel->getAllInstansi();

        // rules
        $this->form_validation->set_rules('no_surat', 'No SUrat', 'required|trim');
        $this->form_validation->set_rules('id_instansi', 'Instansi', 'required|trim');
        $this->form_validation->set_rules('id_status_surat', 'Status surat', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi', 'required|trim');
        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratkeluar/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $config['allowed_types']    = 'docx|pdf';
            $config['max_size']         = '2048';
            $config['upload_path']      = './file_document/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_surat')) {

                $new_file = $this->upload->data('file_name');

                $this->SuratKeluarModel->editSuratKeluar($new_file);
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


    // detail data seurat keluar
    public function detail($id)
    {
        $data['title'] = 'Detail Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['surat_keluar'] = $this->SuratKeluarModel->getAllSuratKeluar($id);

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
