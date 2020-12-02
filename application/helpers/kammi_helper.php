<?php

function is_logged_in()
{
    // isntansiasi CI
    $instanceCI = get_instance();

    if (!$instanceCI->session->userdata('email')) {
        redirect('auth');
    } else {
        $roleId = $instanceCI->session->userdata('id_role');
        $menu = $instanceCI->uri->segment(1);

        $queryMenu = $instanceCI->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menuId = $queryMenu['id_menu'];

        $userAcces = $instanceCI->db->get_where('user_access_menu', [
            'id_role' => $roleId,
            'id_menu' => $menuId
        ]);

        if ($userAcces->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function check_access($id_role, $id_menu)
{
    $instanceCI = get_instance();

    $instanceCI->db->where('id_role', $id_role);
    $instanceCI->db->where('id_menu', $id_menu);

    $result = $instanceCI->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
