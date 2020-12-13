<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MenuModel');
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        // rules form add menu
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {

            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data added</div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('MenuModel', 'menu');

        // $data['submenu'] = $this->menu->getSubMenu();
        $data['submenu'] = $this->MenuModel->getAllSubMenu()->result();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        // rules form add sub menu
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('id_menu', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'id_menu' => $this->input->post('id_menu'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data added</div>');
            redirect('menu/submenu');
        }
    }


    public function menu_edit($id)
    {
        $data['title'] = 'Edit Status Surat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->MenuModel->getByIdMenu($id);

        // rules
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/menu_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->MenuModel->editMenu();
            $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data edited</div>');
            redirect('menu');
        }
    }

    // sub menu edit
    public function submenu_edit($id)
    {
        $data['title'] = 'Edit Instansi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['submenu'] = $this->MenuModel->getByIdSubMenu($id);
        //$data['submenus'] = $this->MenuModel->getSubMenu();
        // $data['submenu'] = $this->MenuModel->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        // rules
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('id_menu', 'Id menu', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->MenuModel->editSubMenu();
            $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data edited</div>');
            redirect('menu/submenu');
        }
    }

    // edit menu
    public function menu_delete($id)
    {
        // $departemenId = $this->input->post('id_departemen');
        $this->MenuModel->deleteMenu($id);
        $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data deleted</div>');
        redirect('menu');
    }

    public function sub_menu_delete($id)
    {
        // $departemenId = $this->input->post('id_departemen');
        $this->MenuModel->deleteSubMenu($id);
        $this->session->set_flashdata('message2', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data deleted</div>');
        redirect('menu/submenu');
    }
}
