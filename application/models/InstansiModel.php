<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InstansiModel extends CI_Model
{
    // get all data
    public function getAllInstansi()
    {
        $query = "SELECT * FROM instansi ORDER BY id_instansi DESC";
        return $this->db->query($query)->result_array();
    }

    // add data
    public function addInstansi()
    {
        $data = [
            "nama_instansi"         => $this->input->post('nama_instansi', true),
            "alamat"                => $this->input->post('alamat', true)
        ];

        $this->db->insert('instansi', $data);
    }

    // get data by id
    public function getByIdInstansi($id_instansi)
    {
        return $this->db->get_where('instansi', ['id_instansi' => $id_instansi])->row_array();
    }

    public function getCountDataInstansi()
    {
        return $this->db->query("select * from instansi");
    }


    // edit data by id
    public function editInstansi()
    {
        $data = ["nama_instansi" => htmlspecialchars($this->input->post('nama_instansi', true))];
        $data = ["alamat" => htmlspecialchars($this->input->post('alamat', true))];
        $this->db->where('id_instansi', $this->input->post('id_instansi'));
        $this->db->update('instansi', $data);
    }

    // delete data by id
    public function deleteInstansi($id)
    {
        $this->db->where('id_instansi', $id);
        $this->db->delete('instansi');
    }
}
