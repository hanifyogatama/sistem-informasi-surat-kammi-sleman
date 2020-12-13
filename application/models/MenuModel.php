<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MenuModel extends CI_Model
{


    public function getAllSubMenu($id = null)
    {
        $this->db->select('user_sub_menu.*, user_menu.menu as nama_menu, status_active.status as status');
        $this->db->from('user_sub_menu');
        $this->db->join('user_menu', 'user_menu.id_menu = user_sub_menu.id_menu');
        $this->db->join('status_active', 'status_active.id_status_active = user_sub_menu.is_active');
        $this->db->order_by('user_sub_menu.id_sub_menu', 'ASC');

        if ($id != null) {
            $this->db->where('user_sub_menu.id_sub_menu', $id);
        }
        $query = $this->db->get();
        return $query;
    }


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

    // get data by id menu
    public function getByIdSubMenu($id_sub_menu)
    {

        return $this->db->get_where('user_sub_menu', ['id_sub_menu' => $id_sub_menu])->row_array();
    }


    // edit data menu
    public function editMenu()
    {

        $data = ["menu" => htmlspecialchars($this->input->post('menu', true))];

        $this->db->where('id_menu', $this->input->post('id_menu'));
        $this->db->update('user_menu', $data);
    }

    public function editSubMenu()
    {

        $data = [
            'title' => $this->input->post('title'),
            'id_menu' => $this->input->post('id_menu'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon')
        ];

        $this->db->where('id_sub_menu', $this->input->post('id_sub_menu'));
        $this->db->update('user_sub_menu', $data);
    }

    // delete data by id
    public function deleteMenu($id)
    {
        $this->db->where('id_menu', $id);
        $this->db->delete('user_menu');
    }

    public function deleteSubMenu($id)
    {
        $this->db->where('id_sub_menu', $id);
        $this->db->delete('user_sub_menu');
    }
}
