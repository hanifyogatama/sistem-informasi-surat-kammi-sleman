<?php

class MyFunction
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    public function countUser()
    {
        $this->ci->load->model('AdminModel');
        return $this->ci->AdminModel->getCountDataUser()->num_rows();
    }

    public function countSuratMasuk()
    {
        $this->ci->load->model('SuratMasukModel');
        return $this->ci->SuratMasukModel->getCountDataSuratMasuk()->num_rows();
    }

    public function countSuratKeluar()
    {
        $this->ci->load->model('SuratKeluarModel');
        return $this->ci->SuratKeluarModel->getCountDataSuratkeluar()->num_rows();
    }

    public function countInstansi()
    {
        $this->ci->load->model('InstansiModel');
        return $this->ci->InstansiModel->getCountDataInstansi()->num_rows();
    }

    public function countDisposisi()
    {
        $this->ci->load->model('SuratMasukModel');
        return $this->ci->SuratMasukModel->getCountDataDisposisi()->num_rows();
    }

    public function getDataDiposisiLaporan()
    {
        $this->ci->load->model('LaporanModel');
        return $this->ci->LaporanModel->getDisposisidata->get('nama_departemen')->result();
    }
}
