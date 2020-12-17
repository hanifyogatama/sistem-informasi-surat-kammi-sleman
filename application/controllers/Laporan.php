<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['SuratMasukModel', 'LaporanModel', 'SuratKeluarModel']);
        // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['tahun_surat_masuk'] = $this->LaporanModel->getYearSuratMasuk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function suratmasuk()
    {

        $data['title'] = 'Laporan Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $startDate = $this->input->get('tanggalawal');
        $endDate = $this->input->get('tanggalakhir');

        $data['surat_masuk'] = $this->LaporanModel->filterByDateSuratMasuk($startDate, $endDate);

        // rules form add surat masuk
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/suratmasuk', $data);
        $this->load->view('templates/footer');
    }

    public function suratkeluar()
    {
        $data['title']     = 'Laporan Surat Keluar';
        $data['user']      = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['surat_keluar'] = $this->SuratKeluarModel->getAllSuratKeluar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/suratkeluar', $data);
        $this->load->view('templates/footer');
    }


    public function disposisi()
    {
        $data['title']    = 'Disposisi';
        $data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['disposisi']      = $this->SuratMasukModel->getAllDisposisi2();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/disposisi', $data);
        $this->load->view('templates/footer');
    }

    public function pdf()
    {
        $mpdf = new \Mpdf\Mpdf(['format' => 'Legal', 'orientation' => 'L']);
        $dataSuratMasuk = $this->LaporanModel->filterByDateSuratMasuk()->result();
        $data = $this->load->view('pdf/data_surat_masuk', ['surat_masuk' => $dataSuratMasuk], True);
        $mpdf->WriteHTML($data);
        $mpdf->SetDisplayMode('fullwidth');
        $file_name = "Surat_Masuk_Kammi_Sleman_" . date("d-m-Y") . ".pdf";
        $mpdf->Output($file_name, 'D');
    }

    public function chart()
    {
    }
}
