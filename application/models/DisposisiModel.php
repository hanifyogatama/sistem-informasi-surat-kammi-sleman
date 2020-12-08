<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratMasukModel extends CI_Model
{

    // get all data
    public function getAllDisposisi($id = null)
    {
        $this->db->select('disposisi.*, departemen.nama_departemen as nama_departemen, status_surat.status as status,surat_masuk.no_surat as nomor_surat');

        $this->db->from('disposisi');
        $this->db->join('departemen', 'departemen.id_departemen = disposisi.id_departemen');
        $this->db->join('surat_masuk', 'surat_masuk.id_surat_masuk = disposisi.id_surat_masuk');
        $this->db->join('status_surat', 'status_surat.id_status_surat = disposisi.id_status_surat');

        if ($id != null) {
            $this->db->where('id_surat_masuk', $id);
        }

        $query = $this->db->get();
        return $query;
    }

    // add disposisi data
    public function addDisposisi()
    {
        $data = [
            "no_surat"              => $this->input->post('no_surat', true),
            "id_instansi"           => $this->input->post('id_instansi', true),
            "id_status_surat"       => $this->input->post('id_status_surat', true),
            "isi"                   => $this->input->post('isi', true),
            "tanggal_surat"         => $this->input->post('tanggal_surat', true),
            "tanggal_diterima"      => $this->input->post('tanggal_diterima', true),
            "keterangan"            => $this->input->post('keterangan', true),
        ];

        $this->db->insert('surat_masuk', $data);
    }
}
