<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StatusSuratModel extends CI_Model
{
    // get all data

    public function getAllStatusSurat2()
    {
        $query = "SELECT * FROM status_surat";
        return $this->db->query($query)->row_array();
    }


    public function getAllStatusSurat()
    {
        $query = "SELECT * FROM status_surat ORDER BY id_status_surat DESC";
        return $this->db->query($query)->result_array();
    }

    // add data status surat
    public function addStatusSurat()
    {
        $data = [
            "status"   => $this->input->post('status', true)
        ];

        $this->db->insert('status_surat', $data);
    }

    // get data by id
    public function getByIdStatusSurat($id_status_surat)
    {
        return $this->db->get_where('status_surat', ['id_status_surat' => $id_status_surat])->row_array();
    }

    // get count data 
    public function getCountDataStatusSurat()
    {
        return $this->db->query("SELECT * FROM status_surat");
    }

    // edit data by id
    public function editStatusSurat()
    {
        $data = ["status" => htmlspecialchars($this->input->post('status', true))];

        $this->db->where('id_status_surat', $this->input->post('id_status_surat'));
        $this->db->update('status_surat', $data);
    }

    // delete data by id
    public function deleteStatusSurat($id)
    {
        $this->db->where('id_status_surat', $id);
        $this->db->delete('status_surat');
    }
}
