<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
        $data['title'] = 'Add Surat Masuk';
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
        $data['title'] = 'Edit Surat Masuk';
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

            $config['allowed_types']    = 'docx|pdf';
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


    // detail data surat masuk 
    public function detail($id)
    {
        $data['title'] = 'Detail Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['surat_masuk'] = $this->SuratMasukModel->getAllSuratMasuk($id);

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
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data deleted</div>');
        redirect('suratmasuk');
    }


    // get all disposisi data
    public function disposisi($id)
    {
        $data['title'] = 'Disposisi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_masuk'] = $this->SuratMasukModel->getByIdSuratMasuk($id);
        $data['disposisi'] = $this->SuratMasukModel->getAllDisposisi2();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratmasuk/disposisi', $data);
        $this->load->view('templates/footer');
    }


    // add disposisi data
    public function disposisi_add($id)
    {
        $data['title'] = 'Add Data Disposisi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

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
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>data added</div>');
            redirect('suratmasuk/disposisi/' . $id);
        }
    }

    public function disposisi_detail($id)
    {
        $data['title'] = 'Detail Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['disposisi'] = $this->SuratMasukModel->getAllDisposisi2($id);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratmasuk/disposisi_detail', $data);
        $this->load->view('templates/footer');
    }


    public function disposisi_edit($id)
    {
        $data['title'] = 'Edit Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
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
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>data edited</div>');
            redirect('suratmasuk/disposisi_detail/' . $id);
        }
    }

    public function exportToExcel()
    {
        $data['surat_masuk'] = $this->SuratMasukModel->getAllSuratMasuk();

        require(APPPATH . 'PHPExcel/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');

        $objExcel = new PHPExcel();

        $objExcel->getProperties()->setCreator("Kammi Kamda Sleman");
        $objExcel->getProperties()->setLastModifiedBy("Kammi Kamda Sleman");

        $objExcel->setActiveSheetIndex(0);

        $objExcel->getActiveSheet()->setCellValue('A1', 'NO');
        $objExcel->getActiveSheet()->setCellValue('A1', 'NO SURAT');
        $objExcel->getActiveSheet()->setCellValue('A1', 'PENGIRIM');
        $objExcel->getActiveSheet()->setCellValue('A1', 'SIFAT');
        $objExcel->getActiveSheet()->setCellValue('A1', 'DESKRIPSI');
        $objExcel->getActiveSheet()->setCellValue('A1', 'TANGGAL SURAT');
        $objExcel->getActiveSheet()->setCellValue('A1', 'TANGGAL DITERIMA');
        $objExcel->getActiveSheet()->setCellValue('A1', 'KETERANGAN');
        $objExcel->getActiveSheet()->setCellValue('A1', 'DISPOSISI');

        $baris = 2;
        $no = 1;

        foreach ($data['surat_masuk'] as $suratmasuk) {
            $objExcel->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $objExcel->getActiveSheet()->setCellValue('A' . $baris, $suratmasuk->no_surat);
            $objExcel->getActiveSheet()->setCellValue('A' . $baris, $suratmasuk->nama_instansi);
            $objExcel->getActiveSheet()->setCellValue('A' . $baris, $suratmasuk->status);
            $objExcel->getActiveSheet()->setCellValue('A' . $baris, $suratmasuk->isi);
            $objExcel->getActiveSheet()->setCellValue('A' . $baris, $suratmasuk->tanggal_surat);
            $objExcel->getActiveSheet()->setCellValue('A' . $baris, $suratmasuk->tanggal_diterima);
            $objExcel->getActiveSheet()->setCellValue('A' . $baris, $suratmasuk->id_disposisi);
            $objExcel->getActiveSheet()->setCellValue('A' . $baris, $suratmasuk->keterangan);

            $baris++;
        }

        $fileName = "Data_Surat_Masuk_Kammi_Sleman" . '.xlsx';

        $objExcel->getActiveSheet()->setTitle("Data Surat Masuk");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control : max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($objExcel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
}
