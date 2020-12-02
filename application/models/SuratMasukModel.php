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
    public function addSuratMasuk()
    {
        $data = ["nama_departemen" => htmlspecialchars($this->input->post('nama_departemen'))];
        $this->db->insert('departemen', $data);
    }

    // get data by id
    public function getByIdSuratMasukk($id_surat_masuk)
    {
        return $this->db->get_where('surat_masuk', ['id_surat_masuk' => $id_surat_masuk])->row_array();
    }

    // edit data by id
    public function editSuratMasuk()
    {
        $data = ["nama_departemen" => htmlspecialchars($this->input->post('nama_departemen', true))];
        $this->db->where('id_departemen', $this->input->post('id_departemen'));
        $this->db->update('departemen', $data);
    }

    // delete data by id
    public function deleteSuratMasuk($id)
    {
        $this->db->where('id_surat_masuk', $id);
        $this->db->delete('surat_masuk');
    }
}
