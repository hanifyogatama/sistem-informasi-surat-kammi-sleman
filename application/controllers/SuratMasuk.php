<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SuratMasuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['SuratMasukModel', 'InstansiModel', 'StatusSuratModel', 'DepartemenModel']);
        //  is_logged_in();
    }

    // get all data from surat masuk
    public function index()
    {
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_masuk'] = $this->SuratMasukModel->getAllSuratMasuk();

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
        $data['title']  = 'Add Surat Masuk';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['surat_masuk']    = $this->db->get('surat_masuk')->result_array();
        $data['status_surat']   = $this->StatusSuratModel->getAllStatusSurat();
        $data['instansi']       = $this->InstansiModel->getAllInstansi();

        // rules
        $this->form_validation->set_rules('no_surat', 'No Surat', 'required|trim', [
            'is_unique' => 'nomor surat sudah ada'
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

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratmasuk/add', $data);
            $this->load->view('templates/footer');
        } else {

            $config['allowed_types']    = 'docx|pdf';
            $config['max_size']         = '2048';
            $config['upload_path']      = './file_document/';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file_surat')) {

                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>belum ditambah / salah format</div>');
                redirect('suratmasuk/add', 'refresh');
            } else {
                $new_file = $this->upload->data('file_name');
                $this->SuratMasukModel->addSuratMasuk($new_file);
                $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>data added</div>');
                redirect('suratmasuk');
            }
        }
    }


    // edit data surat masuk
    public function edit($id)
    {
        $data['title']          = 'Edit Surat Masuk';
        $data['user']           = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['surat_masuk']    = $this->SuratMasukModel->getByIdSuratMasuk($id);
        $data['status_surat']   = $this->StatusSuratModel->getAllStatusSurat();
        $data['instansi']       = $this->InstansiModel->getAllInstansi();

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

            $config['allowed_types']    = 'docx|pdf';
            $config['max_size']         = '2048';
            $config['upload_path']      = './file_document/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_surat')) {

                $new_file = $this->upload->data('file_name');
                $this->SuratMasukModel->editSuratMasuk($new_file);
                $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>data edited</div>');
                redirect('suratmasuk');
            } else {

                $old_file = $data['surat_masuk']['file_surat'];
                $this->SuratMasukModel->editSuratMasuk($old_file);
                $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>data edited</div>');
                redirect('suratmasuk');
            }
        }
    }


    // detail data surat masuk 
    public function detail($id)
    {
        $data['title']    = 'Detail Surat Masuk';
        $data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_masuk']  = $this->SuratMasukModel->getAllSuratMasuk($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratmasuk/detail', $data);
        $this->load->view('templates/footer');
    }


    // delete surat masuk data 
    public function delete($id)
    {
        $this->SuratMasukModel->deleteSuratMasuk($id);
        $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data deleted</div>');
        redirect('suratmasuk');
    }


    // get all disposisi data
    public function disposisi($id)
    {
        $data['title']    = 'Disposisi';
        $data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_masuk']    = $this->SuratMasukModel->getByIdSuratMasuk($id);
        $data['disposisi']      = $this->SuratMasukModel->getAllDisposisi2();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratmasuk/disposisi', $data);
        $this->load->view('templates/footer');
    }


    // add disposisi data
    public function disposisi_add($id)
    {
        $data['title']  = 'Add Data Disposisi';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_masuk']    = $this->SuratMasukModel->getAllSuratMasuk($id)->row_array();
        $data['status_surat']   = $this->StatusSuratModel->getRowStatusSurat();
        $data['instansi']       = $this->InstansiModel->getAllInstansi();
        $data['departemen']     = $this->DepartemenModel->getAllDepartemen();

        // rules
        $this->form_validation->set_rules('id_surat_masuk', 'Surat masuk', 'required|trim');
        $this->form_validation->set_rules('id_status_surat', 'Status surat', 'required|trim');
        $this->form_validation->set_rules('id_departemen', 'Departemen', 'required|trim');
        $this->form_validation->set_rules('batas_waktu', 'Batas Waktu', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratmasuk/disposisi_add', $data);
            $this->load->view('templates/footer');
        } else {

            $this->SuratMasukModel->addDisposisi();
            $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>data added</div>');
            redirect('suratmasuk/disposisi/' . $id);
        }
    }

    // disposisi detail data
    public function disposisi_detail($id)
    {
        $data['title']      = 'Detail Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['disposisi']  = $this->SuratMasukModel->getAllDisposisi2($id);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratmasuk/disposisi_detail', $data);
        $this->load->view('templates/footer');
    }

    // disposisi edit data
    public function disposisi_edit($id)
    {
        $data['title']  = 'Edit Data';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //  $data['surat_masuk'] = $this->SuratMasukModel->getByIdSuratMasuk($id);

        // $data['status_surat'] = $this->StatusSuratModel->getAllStatusSurat();
        // $data['instansi'] = $this->InstansiModel->getAllInstansi();

        $data['disposisi'] = $this->SuratMasukModel->getByIdDisposisi($id);

        //$tol = $data['disposisi'] = $this->db->get('disposisi', 'id_surat_masuk');

        $data['surat_masuk']    = $this->SuratMasukModel->getAllSuratMasuk()->row_array();
        $data['status_surat']   = $this->StatusSuratModel->getRowStatusSurat();
        $data['instansi']       = $this->InstansiModel->getAllInstansi();
        $data['departemen']     = $this->DepartemenModel->getAllDepartemen();

        // rules
        $this->form_validation->set_rules('id_surat_masuk', 'Surat masuk', 'required|trim');
        $this->form_validation->set_rules('id_status_surat', 'Status surat', 'required|trim');
        $this->form_validation->set_rules('id_departemen', 'Departemen', 'required|trim');
        $this->form_validation->set_rules('batas_waktu', 'Batas Waktu', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratmasuk/disposisi_edit', $data);
            $this->load->view('templates/footer');
        } else {

            $this->SuratMasukModel->editDisposisi();
            $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>data edited</div>');
            redirect('suratmasuk/disposisi_detail/' . $id);
        }
    }

    // disposisi delete data 
    public function disposisi_delete($id)
    {
        $this->SuratMasukModel->deleteDisposisi($id);
        $url = $_SERVER['HTTP_REFERER'];
        $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss=
        "alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data deleted</div>');
        redirect($url);
    }

    public function exportToPdf()
    {
        $mpdf = new \Mpdf\Mpdf(['format' => 'Legal', 'orientation' => 'L']);
        $dataSuratMasuk = $this->SuratMasukModel->getAllSuratMasuk()->result();
        $data = $this->load->view('pdf/data_surat_masuk', ['surat_masuk' => $dataSuratMasuk], True);
        $mpdf->WriteHTML($data);
        $mpdf->SetDisplayMode('fullwidth');
        $file_name = "Surat_Masuk_Kammi_Sleman_" . date("d-m-Y") . ".pdf";
        $mpdf->Output($file_name, 'D');
    }

    public function exportToExcel()
    {

        $data['title']      = 'Excel';
        $dataSuratMasuk     = $this->SuratMasukModel->getAllSuratMasuk()->result();

        $spreadsheet = new Spreadsheet();
        // Set document properties
        $spreadsheet->getProperties()->setCreator('Kammi Kamda Sleman')
            ->setLastModifiedBy('Kammi Kamda Sleman')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nomor Surat');
        $sheet->setCellValue('C1', 'Pengirim');
        $sheet->setCellValue('D1', 'Sifat Surat');
        $sheet->setCellValue('E1', 'Deskripsi');
        $sheet->setCellValue('F1', 'Tgl Surat');
        $sheet->setCellValue('G1', 'Tgl Diterima');
        $sheet->setCellValue('H1', 'Keterangan');
        $no = 1;
        $x = 2;
        foreach ($dataSuratMasuk as $row) {
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $row->no_surat);
            $sheet->setCellValue('C' . $x, $row->nama_instansi);
            $sheet->setCellValue('D' . $x, $row->status);
            $sheet->setCellValue('E' . $x, $row->isi);
            $sheet->setCellValue('F' . $x, $row->tanggal_surat);
            $sheet->setCellValue('G' . $x, $row->tanggal_diterima);
            $sheet->setCellValue('H' . $x, $row->keteranagn);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'surat-masuk' . date('d-m-Y H');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Surat Masuk ' . date('d-m-Y H'));

        $spreadsheet->setActiveSheetIndex(0);

        $filename = "Surat_Masuk_Kammi_Sleman_" . date("d-m-Y") . ".xlsx";
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename={$filename}");
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        //ob_end_clean();
        $writer->save('php://output');
        exit;
    }

    public function print()
    {
        $data['surat_masuk'] = $this->SuratMasukModel->getAllSuratMasuk()->result();
        $this->load->view('print/surat_masuk', $data);
    }
}
