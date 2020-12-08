<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['DisposisiModel', 'DepartemenModel', 'StatusSuratModel', 'SuratMasukModel']);
    }

    public function index($ido)
    {
        $data['title'] = 'Disposisi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $data['surat_masuk'] = $this->SuratMasukModel->getByIdSuratMasuk();

        $data['disposisi'] = $this->DisposisiModel->getAllDisposisi($ido);



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('disposisi/index', $data);
        $this->load->view('templates/footer');
    }

    // add data disposisi
    public function add()
    {
        $data['title'] = 'Add Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $data['surat_masuk'] = $this->db->get('surat_masuk')->result_array();

        // $data['status_surat'] = $this->StatusSuratModel->getAllStatusSurat();
        // $data['instansi'] = $this->InstansiModel->getAllInstansi();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('disposisi/add', $data);
            $this->load->view('templates/footer');
        }
    }
}
