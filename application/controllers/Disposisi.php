<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('DisposisiModel');
    }

    public function index()
    {
        $data['title'] = 'Disposisi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['surat_masuk'] = $this->DisposisiModel->getByIdDisposisi($id);
        // $data['departemen'] = $this->DepartemenModel->getAllDepartemen();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('disposisi/index', $data);
        $this->load->view('templates/footer');
    }
}
