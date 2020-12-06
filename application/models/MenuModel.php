<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MenuModel extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.* , `user_menu`.`menu` 
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`id_menu` = `user_menu`.`id_menu`
        ";

        return $this->db->query($query)->result_array();
    }


    // get data by id menu
    public function getByIdMenu($id_menu)
    {
        return $this->db->get_where('user_menu', ['id_menu' => $id_menu])->row_array();
    }


    // edit data menu
    public function editMenu()
    {
        $data = ["menu" => htmlspecialchars($this->input->post('menu', true))];

        $this->db->where('id_menu', $this->input->post('id_menu'));
        $this->db->update('user_menu', $data);
    }

    // delete data by id
    public function deleteMenu($id)
    {
        $this->db->where('id_menu', $id);
        $this->db->delete('user_menu');
    }
}
