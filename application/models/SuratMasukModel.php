<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratMasukModel extends CI_Model
{
    // get all data
    public function getAllSuratMasuk()
    {
        $query = "SELECT * FROM surat_masuk ORDER BY id_surat_masuk DESC";
        return $this->db->query($query)->result_array();
    }

    // add data
    public function addSuratMasuk($file)
    {
        $data = [
            "no_surat"      => $this->input->post('no_surat', true),
            "pengirim"      => $this->input->post('pengirim', true),
            "isi"           => $this->input->post('isi', true),
            "tanggal_surat" => $this->input->post('tanggal_surat', true),
            "tanggal_diterima"  => $this->input->post('tanggal_diterima', true),
            "keterangan"        => $this->input->post('keterangan', true),
            "file_surat"        => $file
        ];

        $this->db->insert('surat_masuk', $data);
    }

    // get data by id
    public function getByIdSuratMasuk($id_surat_masuk)
    {
        return $this->db->get_where('surat_masuk', ['id_surat_masuk' => $id_surat_masuk])->row_array();
    }

    // edit data by id
    public function editSuratMasuk($file)
    {
        $data = [
            "no_surat"      => $this->input->post('no_surat', true),
            "pengirim"      => $this->input->post('pengirim', true),
            "isi"           => $this->input->post('isi', true),
            "tanggal_surat" => $this->input->post('tanggal_surat', true),
            "tanggal_diterima"  => $this->input->post('tanggal_diterima', true),
            "keterangan"        => $this->input->post('keterangan', true),
            "file_surat"        => $file
        ];

        $this->db->where('id_surat_masuk', $this->input->post('id_surat_masuk'));
        $this->db->update('surat_masuk', $data);
    }

    // delete data by id
    public function deleteSuratMasuk($id)
    {
        $this->db->where('id_surat_masuk', $id);
        $this->db->delete('surat_masuk');
    }
}
