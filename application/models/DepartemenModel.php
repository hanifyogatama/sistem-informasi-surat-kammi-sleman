<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DepartemenModel extends CI_Model
{
    // get all data
    public function getAllDepartemen()
    {
        $query = "SELECT * FROM departemen ORDER BY id_departemen DESC";
        return $this->db->query($query)->result_array();
    }

    // add data
    public function addDepartemen()
    {
        $data = ["nama_departemen" => htmlspecialchars($this->input->post('nama_departemen', true))];
        $this->db->insert('departemen', $data);
    }

    // get data by id
    public function getByIdDepartemen($id_departemen)
    {
        return $this->db->get_where('departemen', ['id_departemen' => $id_departemen])->row_array();
    }

    // edit data by id
    public function editDepartemen()
    {
        $data = ["nama_departemen" => htmlspecialchars($this->input->post('nama_departemen', true))];
        $this->db->where('id_departemen', $this->input->post('id_departemen'));
        $this->db->update('departemen', $data);
    }

    // delete data by id
    public function deleteDepartemen($id)
    {
        $this->db->where('id_departemen', $id);
        $this->db->delete('departemen');
    }
}
