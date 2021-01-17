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

        if ($startDate && $endDate) {
            $this->db->where('tanggal_surat >=', $startDate);
            $this->db->where('tanggal_surat <=', $endDate);
        }
        return $this->db->get();
    }

    function filterByDateSuratKeluar($startDate = null, $endDate = null)
    {
        $this->db->select('surat_keluar.*, instansi.nama_instansi as nama_instansi, status_surat.status as status');
        $this->db->from('surat_keluar');
        $this->db->join('instansi', 'instansi.id_instansi = surat_keluar.id_instansi');
        $this->db->join('status_surat', 'status_surat.id_status_surat = surat_keluar.id_status_surat');
        $this->db->order_by('surat_keluar.id_surat_keluar', 'DESC');

        if ($startDate && $endDate) {
            $this->db->where('tanggal_surat >=', $startDate);
            $this->db->where('tanggal_surat <=', $endDate);
        }
        return $this->db->get();
    }

    function filterByDateSuratDisposisi($startDate = null, $endDate = null)
    {
        $this->db->select('disposisi.*, departemen.nama_departemen as nama_departemen, status_surat.status as status,surat_masuk.no_surat as nomor_surat,surat_masuk.tanggal_surat as tanggal_surat, surat_masuk.tanggal_diterima as tanggal_diterima,instansi.nama_instansi as nama_instansi');

        $this->db->from('disposisi');
        $this->db->join('departemen', 'departemen.id_departemen = disposisi.id_departemen');
        $this->db->join('surat_masuk', 'surat_masuk.id_surat_masuk = disposisi.id_surat_masuk');
        $this->db->join('status_surat', 'status_surat.id_status_surat = disposisi.id_status_surat');
        $this->db->join('instansi', 'instansi.id_instansi = disposisi.id_instansi');
        $this->db->order_by('disposisi.id_disposisi', 'DESC');

        if ($startDate && $endDate) {
            $this->db->where('tanggal_dibuat >=', $startDate);
            $this->db->where('tanggal_dibuat <=', $endDate);
        }
        return $this->db->get();
    }

    // function getYearSuratMasuk()
    // {
    //     $query = $this->db->query("SELECT YEAR(tanggal_surat) AS tahun FROM surat_masuk GROUP BY YEAR(tanggal_surat) ORDER BY YEAR (tanggal_surat) ASC ");
    //     return $query->result();
    // }

}
