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
        return $this->ci->SuratMasukModel->getCountDataSuratKeluar()->num_rows();
    }

    public function countInstansi()
    {
        $this->ci->load->model('InstansiModel');
        return $this->ci->InstansiModel->getCountDataInstansi()->num_rows();
    }
}
