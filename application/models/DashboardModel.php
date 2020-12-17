<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardModel extends CI_Model
{

    public function getDisposisidata($id = null)
    {
        $this->db->select('disposisi.*, departemen.nama_departemen as nama_departemen, status_surat.status as status,surat_masuk.no_surat as nomor_surat');
        $this->db->from('disposisi');
        $this->db->join('departemen', 'departemen.id_departemen = disposisi.id_departemen');
        $this->db->join('surat_masuk', 'surat_masuk.id_surat_masuk = disposisi.id_surat_masuk');
        $this->db->join('status_surat', 'status_surat.id_status_surat = disposisi.id_status_surat');

        if ($id != null) {
            $this->db->where('disposisi.id_disposisi',  $id);
        }

        $query = $this->db->get();
        return $query;
    }
}
