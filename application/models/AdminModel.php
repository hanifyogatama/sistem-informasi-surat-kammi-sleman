<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
    // get all data
    public function getAllUser()
    {
        $query = "SELECT * FROM user ORDER BY id_user DESC";
        return $this->db->query($query)->result_array();
    }

    public function getAllRole()
    {
        $query = "SELECT * FROM user_role ORDER BY id_role DESC";
        return $this->db->query($query)->result_array();
    }

    // add new data  role
    public function addRole()
    {
        $data = ["role" => htmlspecialchars($this->input->post('role'))];
        $this->db->insert('user_role', $data);
    }

    // get data by id
    public function getByIdRole($id_role)
    {
        return $this->db->get_where('user_role', ['id_role' => $id_role])->row_array();
    }


    // edit data role by id
    public function editRole()
    {

        $data = [
            "role" => $this->input->post('role', true)
        ];

        $this->db->where('id_role', $this->input->post('id_role'));
        $this->db->update('user_role', $data);
    }

    // delete data by id
    public function deleteDepartemen($id)
    {
        $this->db->where('id_departemen', $id);
        $this->db->delete('departemen');
    }
}