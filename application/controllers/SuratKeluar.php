<?php
defined('BASEPATH') or exit('No direct script access allowed');


use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class SuratKeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['SuratKeluarModel', 'InstansiModel', 'StatusSuratModel']);
        is_logged_in();
    }

    public function index()
    {
        $data['title']     = 'Surat Keluar';
        $data['user']      = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

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
        $data['title']  = 'Add Surat Keluar';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keluar']   = $this->db->get('surat_keluar')->result_array();
        $data['status_surat']   = $this->StatusSuratModel->getAllStatusSurat();
        $data['instansi']       = $this->InstansiModel->getAllInstansi();

        // rules
        $this->form_validation->set_rules('no_surat', 'No Surat', 'required|trim|is_unique[surat_keluar.no_surat]', [
            'required' => 'nomor surat belum diisi',
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

        $this->form_validation->set_rules('tanggal_surat', 'tanggal surat', 'required', [
            'required' => 'tanggal surat belum diisi'
        ]);

        if (empty($_FILES['file_surat']['name'])) {
            $this->form_validation->set_rules('file_surat', 'Document', 'required', [
                'required' => 'pastikan file sudah dicantumkan'
            ]);
        }

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
                $errorSurat = $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>file salah format / ukuran melebihi maksimal</div>');

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('suratkeluar/add', $data,  $errorSurat);
                $this->load->view('templates/footer');
            } else {
                $new_file = $this->upload->data('file_name');
                $this->SuratKeluarModel->addSuratKeluar($new_file);
                $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>data added</div>');
                redirect('suratkeluar');
            }
        }
    }

    // edit data surat keluar
    public function edit($id)
    {
        $data['title']  = 'Edit Surat Keluar';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['surat_keluar']   = $this->SuratKeluarModel->getByIdSuratKeluar($id);
        $data['status_surat']   = $this->StatusSuratModel->getAllStatusSurat();
        $data['instansi']       = $this->InstansiModel->getAllInstansi();

        // rules
        $this->form_validation->set_rules('no_surat', 'No SUrat', 'required|trim');
        $this->form_validation->set_rules('id_instansi', 'Instansi', 'required|trim');
        $this->form_validation->set_rules('id_status_surat', 'Status surat', 'required|trim');
        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan');

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
                $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>data edited</div>');
                redirect('suratkeluar');
            } else {

                $old_file = $data['surat_keluar']['file_surat'];
                $this->SuratKeluarModel->editSuratKeluar($old_file);
                $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>data edited</div>');
                redirect('suratkeluar');
            }
        }
    }

    public function detail($id)
    {
        $data['title']  = 'Detail Surat Keluar';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['surat_keluar'] = $this->SuratKeluarModel->getAllSuratKeluar($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratkeluar/detail', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->SuratKeluarModel->deleteSuratKeluar($id);
        $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data deleted</div>');
        redirect('suratkeluar');
    }

    public function exportToPdf()
    {
        $mpdf = new \Mpdf\Mpdf(['format' => 'Legal', 'orientation' => 'L']);
        $dataSuratKeluar = $this->SuratKeluarModel->getAllSuratKeluar()->result();
        $data = $this->load->view('pdf/data_surat_keluar', ['surat_keluar' => $dataSuratKeluar], True);
        $mpdf->WriteHTML($data);
        $mpdf->SetDisplayMode('fullwidth');
        $file_name = "Surat_Keluar_Kammi_Sleman_" . date("d-m-Y") . ".pdf";
        $mpdf->Output($file_name, 'D');
    }

    public function exportToExcel()
    {

        $data['title']      = 'Excel';
        $dataSuratKeluar = $this->SuratKeluarModel->getAllSuratKeluar()->result();

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
        $sheet->setCellValue('C1', 'Penerima');
        $sheet->setCellValue('D1', 'Jenis Surat');
        $sheet->setCellValue('E1', 'Deskripsi');
        $sheet->setCellValue('F1', 'Tanggal Surat');
        $sheet->setCellValue('G1', 'Keterangan');
        $no = 1;
        $x = 2;
        foreach ($dataSuratKeluar as $row) {

            $oldDateSurat = $row->tanggal_surat;
            $newDateSurat = date("d-m-Y", strtotime($oldDateSurat));

            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $row->no_surat);
            $sheet->setCellValue('C' . $x, $row->nama_instansi);
            $sheet->setCellValue('D' . $x, $row->status);
            $sheet->setCellValue('E' . $x, $row->isi);
            $sheet->setCellValue('F' . $x, $newDateSurat);
            $sheet->setCellValue('G' . $x, $row->keteranagn);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'surat-keluar' . date('d-m-Y H');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Surat Keluar ' . date('d-m-Y H'));

        $spreadsheet->setActiveSheetIndex(0);

        $filename = "Surat_Keluar_Kammi_Sleman_" . date("d-m-Y") . ".xlsx";
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename={$filename}");
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        //ob_end_clean();
        $writer->save('php://output');
        exit;
    }

    public function print()
    {
        $data['surat_keluar'] =  $this->SuratKeluarModel->getAllSuratKeluar()->result();
        $this->load->view('print/surat_keluar', $data);
    }

    public function download($fileName = NULL)
    {
        if ($fileName) {
            $file = realpath("file_document") . "\\" . $fileName;
            // check file exists    
            if (file_exists($file)) {
                // get file content
                $data = file_get_contents($file);
                //force download
                force_download($fileName, $data);
            } else {
                // Redirect to base url
                redirect(base_url());
            }
        }
    }


    function pdf($item)
    {
        $file = realpath("file_document") . "\\" . $item;;
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $file . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        readfile($file);
    }
}
