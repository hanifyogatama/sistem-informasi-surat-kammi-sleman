<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LaporanModel extends CI_Model
{



    function filterByDateSuratMasuk($startDate = null, $endDate = null)
    {
        $this->db->select('surat_masuk.*, instansi.nama_instansi as nama_instansi, status_surat.status as status');
        $this->db->from('surat_masuk');
        $this->db->join('instansi', 'instansi.id_instansi = surat_masuk.id_instansi');
        $this->db->join('status_surat', 'status_surat.id_status_surat = surat_masuk.id_status_surat');
        $this->db->order_by('surat_masuk.id_surat_masuk', 'DESC');

        // var_dump($startDate, $endDate);
        // die;

        if ($startDate && $endDate) {
            $this->db->where('tanggal_surat >', $startDate);
            $this->db->where('tanggal_surat <', $endDate);
        }
        return $this->db->get();
        // if ($id != null) {
        //     $this->db->where('surat_masuk.id_surat_masuk', $id);
        // }
        // $query = $this->db->get();

    }





















    function getYearSuratMasuk()
    {
        $query = $this->db->query("SELECT YEAR(tanggal_surat) AS tahun FROM surat_masuk GROUP BY YEAR(tanggal_surat) ORDER BY YEAR (tanggal_surat) ASC ");
        return $query->result();
    }


    function getYearSuratKeluar()
    {
        $query = $this->db->query("SELECT YEAR(tanggal_surat) AS tahun FROM surat_keluar GROUP BY YEAR(tanggal_surat) ORDER BY YEAR (tanggal_surat) ASC ");
        return $query->result();
    }

    // ----------------------------------------------------------


    // ----------------------------------------------------------


    function filterByDateSuratKeluar($startDate, $endDate)
    {
        $query = $this->db->query("SELECT * FROM surat_keluar WHERE tanggal_surat BETWEEN '$$startDate' AND '$endDate' ORDER BY tanggal_surat ASC ");
        return $query->result();
    }


    function filterByMonthSuratMasuk($yearSuratMasuk, $startMonth, $endMonth)
    {
        $query = $this->db->query("SELECT * FROM surat_masuk YEAR(tanggal_surat) = '$yearSuratMasuk' AND MONTH(tanggal_surat) BETWEEN '$startMonth' AND '$endMonth' ORDER BY tanggal_surat ASC ");
        return $query->result();
    }


    function filterByMonthSuratKeluar($yearSuratKeluar, $startMonth, $endMonth)
    {
        $query = $this->db->query("SELECT * FROM surat_keluar YEAR(tanggal_surat) = '$yearSuratKeluar' AND MONTH(tanggal_surat) BETWEEN '$startMonth' AND '$endMonth' ORDER BY tanggal_surat ASC ");
        return $query->result();
    }


    function filterYearSuratMasuk($getYearSuratMasuk)
    {
        $query = $this->db->query("SELECT * FROM surat_masuk WHERE YEAR(tanggal_surat) = '$getYearSuratMasuk' ORDER BY tanggal_surat ASC ");
        return $query->result();
    }
}
