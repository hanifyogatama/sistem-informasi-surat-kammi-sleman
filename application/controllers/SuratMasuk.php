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
        $this->load->helper('download');
        $this->load->model(['SuratMasukModel', 'InstansiModel', 'StatusSuratModel', 'DepartemenModel']);
        is_logged_in();
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
        $this->form_validation->set_rules('no_surat', 'No Surat', 'trim|required|is_unique[surat_masuk.no_surat]', [
            'required' =>  'nomor surat belum diisi',
            'is_unique' => 'nomor surat sudah ada'
        ]);

        $this->form_validation->set_rules('id_instansi', 'Instansi', 'trim|required', [
            'required' =>  'instansi belum dipilih'
        ]);

        $this->form_validation->set_rules('id_status_surat', 'Status surat', 'trim|required', [
            'required' =>  'jenis surat belum dipilih'
        ]);

        $this->form_validation->set_rules('isi', 'Isi', 'trim|required', [
            'required' =>  'deskripsi belum diisi',
        ]);

        $this->form_validation->set_rules('tanggal_surat', 'tanggal surat', 'trim|required', [
            'required' =>  'tanggal surat belum dipilih'
        ]);

        $this->form_validation->set_rules('tanggal_diterima', 'tanggal diterima', 'trim|required', [
            'required' =>  'tanggal diterima belum dipilih'
        ]);

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratmasuk/add', $data);
            $this->load->view('templates/footer');
        } elseif ($_FILES['file_surat']['name']) {

            $config['allowed_types']    = 'docx|pdf';
            $config['max_size']         = '2048';
            $config['upload_path']      = './file_document/';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file_surat')) {

                $errorSurat = $this->session->set_flashdata('alert_message_file', '<div class="alert alert-danger alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>cek kembali format / ukuran file</div>');

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('suratmasuk/add', $data,  $errorSurat);
                $this->load->view('templates/footer');
            } else {
                $new_file = $this->upload->data('file_name');
                $this->SuratMasukModel->addSuratMasuk($new_file);
                $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>data berhasil ditambah</div>');
                redirect('suratmasuk');
            }
        } else {

            $this->SuratMasukModel->addSuratMasuk1();
            $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>data berhasil ditambah</div>');
            redirect('suratmasuk');
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
        $this->form_validation->set_rules('no_surat', 'No Surat', 'required|trim');
        $this->form_validation->set_rules('id_instansi', 'Instansi', 'required|trim');
        $this->form_validation->set_rules('id_status_surat', 'Status surat', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi', 'required|trim');
        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required|trim');
        $this->form_validation->set_rules('tanggal_diterima', 'Tanggal Diterima', 'required|trim');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratmasuk/edit', $data);
            $this->load->view('templates/footer');
        } elseif ($_FILES['file_surat']['name']) {

            $config['allowed_types']    = 'docx|pdf';
            $config['max_size']         = '2048';
            $config['upload_path']      = './file_document/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_surat')) {

                $new_file = $this->upload->data('file_name');
                $this->SuratMasukModel->editSuratMasuk($new_file);
                $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>data berhasil diupdate</div>');
                redirect('suratmasuk');
            } elseif (!$this->upload->do_upload('file_surat')) {

                $errorSurat = $this->session->set_flashdata('alert_message_file', '<div class="alert alert-danger alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>cek kembali format / ukuran file</div>');

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('suratmasuk/edit', $data,  $errorSurat);
                $this->load->view('templates/footer');
            } else {

                $old_file = $data['surat_masuk']['file_surat'];
                $this->SuratMasukModel->editSuratMasuk($old_file);
                $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>data berhasil diupdate</div>');
                redirect('suratmasuk');
            }
        } else {
            $this->SuratMasukModel->editSuratMasuk1();
            $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>data berhasil diupdate</div>');
            redirect('suratmasuk');
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
            </button>data berhasil dihapus</div>');
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
        $data['title']  = 'Add Disposisi';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_masuk']    = $this->SuratMasukModel->getAllSuratMasuk($id)->row_array();
        $data['status_surat']   = $this->StatusSuratModel->getRowStatusSurat();
        $data['instansi']       = $this->InstansiModel->getAllInstansi();
        $data['departemen']     = $this->DepartemenModel->getAllDepartemen();

        // rules
        $this->form_validation->set_rules('id_surat_masuk', 'Surat masuk', 'required|trim');
        $this->form_validation->set_rules('id_status_surat', 'Status surat', 'required|trim');
        $this->form_validation->set_rules('id_departemen', 'Departemen', 'required|trim', [
            'required' => 'departemen belum dipilih'
        ]);
        $this->form_validation->set_rules('batas_waktu', 'Batas Waktu', 'required|trim', [
            'required' => 'batas waktu belum dipilih'
        ]);
        $this->form_validation->set_rules('isi', 'Isi', 'required|trim', [
            'required' => 'deskripsi belum diisi'
        ]);
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratmasuk/disposisi_add', $data);
            $this->load->view('templates/footer');
        } else {

            $this->SuratMasukModel->addDisposisi();
            $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>data berhasil ditambah</div>');
            redirect('suratmasuk/disposisi/' . $id);
        }
    }

    // disposisi detail data
    public function disposisi_detail($id)
    {
        $data['title']  = 'Detail Disposisi';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
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
        $data['title']  = 'Edit Disposisi';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['disposisi']      = $this->SuratMasukModel->getByIdDisposisi($id);
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
            $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>data berhasil diupdate</div>');
            redirect('suratmasuk/disposisi_detail/' . $id);
        }
    }


    public function disposisi_delete($id)
    {
        $this->SuratMasukModel->deleteDisposisi($id);
        $url = $_SERVER['HTTP_REFERER'];
        $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss=
        "alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data berhasil dihapus</div>');
        redirect($url);
    }


    public function exportToPdf()
    {
        $mpdf = new \Mpdf\Mpdf(['format' => 'Legal', 'orientation' => 'L']);
        $dataSuratMasuk = $this->SuratMasukModel->getAllSuratMasuk()->result();
        $data = $this->load->view('pdf/data_surat_masuk', ['surat_masuk' => $dataSuratMasuk], True);
        $mpdf->WriteHTML($data);
        $mpdf->SetDisplayMode('fullwidth');
        $file_name = "Surat_Masuk_Kammi_Sleman_" . date("d-M-Y") . ".pdf";
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
        $sheet->setCellValue('D1', 'Jenis Surat');
        $sheet->setCellValue('E1', 'Deskripsi');
        $sheet->setCellValue('F1', 'Tanggal Surat');
        $sheet->setCellValue('G1', 'Tanggal Diterima');
        $sheet->setCellValue('H1', 'Keterangan');
        $no = 1;
        $x = 2;

        foreach ($dataSuratMasuk as $row) {

            $oldDateSurat = $row->tanggal_surat;
            $oldDateDiterima = $row->tanggal_diterima;
            $newDateSurat = date("d-m-Y", strtotime($oldDateSurat));
            $newDateDiterima = date("d-m-Y", strtotime($oldDateDiterima));

            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $row->no_surat);
            $sheet->setCellValue('C' . $x, $row->nama_instansi);
            $sheet->setCellValue('D' . $x, $row->status);
            $sheet->setCellValue('E' . $x, $row->isi);
            $sheet->setCellValue('F' . $x, $newDateSurat);
            $sheet->setCellValue('G' . $x, $newDateDiterima);
            $sheet->setCellValue('H' . $x, $row->keterangan);
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

        $filename = "Surat_Masuk_Kammi_Sleman_" . date("d-M-Y") . ".xlsx";
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
        $data['surat_masuk'] = $this->SuratMasukModel->getAllSuratMasuk()->result();
        $this->load->view('print/surat_masuk', $data);
    }


    public function printAllDisposisi()
    {
        $data['disposisi'] = $this->SuratMasukModel->getAllDisposisi2()->result();
        $this->load->view('print/disposisi', $data);
    }


    public function pdfAllDisposisi()
    {
        $mpdf = new \Mpdf\Mpdf(['format' => 'Legal', 'orientation' => 'L']);
        $dataDisposisi = $this->SuratMasukModel->getAllDisposisi2()->result();
        $data = $this->load->view('pdf/data_disposisi', ['disposisi' => $dataDisposisi], True);
        $mpdf->WriteHTML($data);
        $mpdf->SetDisplayMode('fullwidth');
        $file_name = "Disposisi_Kammi_Sleman_" . date("d-M-Y") . ".pdf";
        $mpdf->Output($file_name, 'D');
    }


    public function printDisposisi($id)
    {
        $data['disposisi'] = $this->SuratMasukModel->getAllDisposisi2($id);
        $this->load->view('print/disposisi_per_item', $data);
    }


    public function pdfDisposisi($id)
    {
        $mpdf = new \Mpdf\Mpdf(['format' => 'Legal', 'orientation' => 'P']);
        $dataDisposisiItem = $this->SuratMasukModel->getAllDisposisi2($id);
        $data = $this->load->view('pdf/disposisi', ['disposisi' => $dataDisposisiItem], True);
        $mpdf->WriteHTML($data);
        $mpdf->SetDisplayMode('fullwidth');
        $file_name = "Lembar_Disposisi_Kammi_Sleman_" . date("d-M-Y") . ".pdf";
        $mpdf->Output($file_name, 'D');
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

    // preview file
    function pdf($item)
    {
        $file = realpath("file_document") . "\\" . $item;;
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $file . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        readfile($file);
    }


    public function exportToExcelDisposisi()
    {

        $data['title']      = 'Excel';
        $dataDisposisi     = $this->SuratMasukModel->getAllDisposisi2()->result();

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
        $sheet->setCellValue('C1', 'Tanggal Surat');
        $sheet->setCellValue('D1', 'Pengirim');
        $sheet->setCellValue('E1', 'Tujuan Disposisi');
        $sheet->setCellValue('F1', 'Jenis Surat');
        $sheet->setCellValue('G1', 'Deskripsi');
        $sheet->setCellValue('H1', 'Tanggal Disposisi');
        $sheet->setCellValue('I1', 'Batas Waktu');
        $sheet->setCellValue('J1', 'Keterangan');
        $no = 1;
        $x = 2;

        foreach ($dataDisposisi as $row) {

            $oldBatasWaktu = $row->batas_waktu;
            $oldTanggalSurat = $row->tanggal_surat;
            $oldTanggalDibuat = $row->tanggal_dibuat;

            $newTanggalDibuat = date("d-m-Y", strtotime($oldTanggalDibuat));
            $newBatasWaktu = date("d-m-Y", strtotime($oldBatasWaktu));
            $newTanggalSurat = date("d-m-Y", strtotime($oldTanggalSurat));

            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $row->nomor_surat);
            $sheet->setCellValue('C' . $x, $newTanggalSurat);
            $sheet->setCellValue('D' . $x, $row->nama_instansi);
            $sheet->setCellValue('E' . $x, $row->nama_departemen);
            $sheet->setCellValue('F' . $x, $row->status);
            $sheet->setCellValue('G' . $x, $row->isi);
            $sheet->setCellValue('H' . $x, $newTanggalDibuat);
            $sheet->setCellValue('I' . $x, $newBatasWaktu);
            $sheet->setCellValue('J' . $x, $row->keterangan);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'disposisi' . date('d-m-Y H');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Surat Masuk ' . date('d-m-Y H'));

        $spreadsheet->setActiveSheetIndex(0);

        $filename = "Disposisi_Kammi_Sleman_" . date("d-M-Y") . ".xlsx";
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
}
