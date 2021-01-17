<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['SuratMasukModel', 'LaporanModel', 'SuratKeluarModel']);
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $data['tahun_surat_masuk'] = $this->LaporanModel->getYearSuratMasuk();

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

        $startDate = $this->input->get('tanggalawal');
        $endDate = $this->input->get('tanggalakhir');

        $data['surat_keluar'] = $this->LaporanModel->filterByDateSuratKeluar($startDate, $endDate);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/suratkeluar', $data);
        $this->load->view('templates/footer');
    }


    public function disposisi()
    {
        $data['title']    = 'Laporan Disposisi';
        $data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $startDate = $this->input->get('tanggalawal');
        $endDate = $this->input->get('tanggalakhir');

        $data['disposisi'] = $this->LaporanModel->filterByDateSuratDisposisi($startDate, $endDate);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/disposisi', $data);
        $this->load->view('templates/footer');
    }

    public function pdfSuratMasuk()
    {

        $startDate  = $this->input->get('tanggalawal');
        $endDate    = $this->input->get('tanggalakhir');

        $mpdf = new \Mpdf\Mpdf(['format' => 'Legal', 'orientation' => 'L']);
        $dataSuratMasuk = $this->LaporanModel->filterByDateSuratMasuk($startDate, $endDate)->result();
        $data = $this->load->view('pdf/data_surat_masuk', ['surat_masuk' => $dataSuratMasuk], True);
        $mpdf->WriteHTML($data);
        $mpdf->SetDisplayMode('fullwidth');
        $file_name = "Laporan_Surat_Masuk_Kammi_Sleman_" . date("d-m-Y") . ".pdf";
        $mpdf->Output($file_name, 'D');
    }

    public function pdfSuratkeluar()
    {

        $startDate  = $this->input->get('tanggalawal');
        $endDate    = $this->input->get('tanggalakhir');

        $mpdf = new \Mpdf\Mpdf(['format' => 'Legal', 'orientation' => 'L']);
        $dataSuratKeluar = $this->LaporanModel->filterByDateSuratKeluar($startDate, $endDate)->result();
        $data = $this->load->view('pdf/data_surat_keluar', ['surat_keluar' => $dataSuratKeluar], True);
        $mpdf->WriteHTML($data);
        $mpdf->SetDisplayMode('fullwidth');
        $file_name = "Laporan_Surat_Keluar_Kammi_Sleman_" . date("d-m-Y") . ".pdf";
        $mpdf->Output($file_name, 'D');
    }

    public function pdfSuratDisposisi()
    {

        $startDate = $this->input->get('tanggalawal');
        $endDate = $this->input->get('tanggalakhir');

        $mpdf = new \Mpdf\Mpdf(['format' => 'Legal', 'orientation' => 'L']);
        $dataSuratDisposisi = $this->LaporanModel->filterByDateSuratDisposisi($startDate, $endDate)->result();
        $data = $this->load->view('pdf/data_disposisi', ['disposisi' => $dataSuratDisposisi], True);
        $mpdf->WriteHTML($data);
        $mpdf->SetDisplayMode('fullwidth');
        $file_name = "Laporan_Disposisi_Kammi_Sleman_" . date("d-m-Y") . ".pdf";
        $mpdf->Output($file_name, 'D');
    }


    public function exportExcelSuratMasuk()
    {
        $startDate  = $this->input->get('tanggalawal');
        $endDate    = $this->input->get('tanggalakhir');

        $data['title']      = 'Excel';
        $dataSuratMasuk     = $this->LaporanModel->filterByDateSuratMasuk($startDate, $endDate)->result();

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
        $filename = 'laporan-surat-masuk' . date('d-m-Y H');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Surat Masuk ' . date('d-m-Y H'));

        $spreadsheet->setActiveSheetIndex(0);

        $filename = "Laporan_Surat_Masuk_Kammi_Sleman_" . date("d-m-Y") . ".xlsx";
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

    public function exportExcelSuratKeluar()
    {
        $startDate  = $this->input->get('tanggalawal');
        $endDate    = $this->input->get('tanggalakhir');

        $data['title']      = 'Excel';
        $dataSuratKeluar = $this->LaporanModel->filterByDateSuratKeluar($startDate, $endDate)->result();

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
            $sheet->setCellValue('G' . $x, $row->keterangan);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan-surat-keluar' . date('d-m-Y H');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Surat Keluar ' . date('d-m-Y H'));

        $spreadsheet->setActiveSheetIndex(0);

        $filename = "Laporan_Surat_Keluar_Kammi_Sleman_" . date("d-m-Y") . ".xlsx";
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

    public function exportExcelDisposisi()
    {
        $startDate  = $this->input->get('tanggalawal');
        $endDate    = $this->input->get('tanggalakhir');

        $data['title']      = 'Excel';
        $dataDisposisi = $this->LaporanModel->filterByDateSuratDisposisi($startDate, $endDate)->result();

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
        $sheet->setCellValue('D1', 'Tujuan Disposisi');
        $sheet->setCellValue('E1', 'Jenis Surat');
        $sheet->setCellValue('F1', 'Deskripsi');
        $sheet->setCellValue('G1', 'Batas Waktu');
        $sheet->setCellValue('H1', 'Keterangan');
        $no = 1;
        $x = 2;


        foreach ($dataDisposisi as $row) {

            $oldate = $row->batas_waktu;
            $newDate = date("d-m-Y", strtotime($oldate));

            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $row->nomor_surat);
            $sheet->setCellValue('C' . $x, $row->nama_instansi);
            $sheet->setCellValue('D' . $x, $row->nama_departemen);
            $sheet->setCellValue('E' . $x, $row->status);
            $sheet->setCellValue('F' . $x, $row->isi);
            $sheet->setCellValue('G' . $x, $newDate);
            $sheet->setCellValue('H' . $x, $row->keterangan);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan-disposisi' . date('d-m-Y H');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Disposisi ' . date('d-m-Y H'));

        $spreadsheet->setActiveSheetIndex(0);

        $filename = "Laporan_Disposisi_Kammi_Sleman_" . date("d-m-Y") . ".xlsx";
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
