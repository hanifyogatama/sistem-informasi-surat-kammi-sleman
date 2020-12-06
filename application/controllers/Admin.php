<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('AdminModel');
    }


    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // get coount data user

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    // role user
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        // rules
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {

            $this->AdminModel->addRole();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>new role added</div>');
            redirect('admin/role');
        }
    }

    // role asscess
    public function roleAccess($id_role)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id_role' => $id_role])->row_array();
        $this->db->where('id_menu !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role_access', $data);
        $this->load->view('templates/footer');
    }

    // change access
    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'id_role' => $role_id,
            'id_menu' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role = "alert">access changed</div>');
    }

    // edit role 
    public function editRole($id)
    {
        $data['title'] = 'Edit Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->AdminModel->getByIdRole($id);

        // rules
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit_role', $data);
            $this->load->view('templates/footer');
        } else {

            $this->AdminModel->editRole();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>role edited</div>');
            redirect('admin/role');
        }
    }

    // backup data to layout
    public function backupData()
    {
        $data['title'] = 'Backup Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/backupdata', $data);
        $this->load->view('templates/footer');
    }

    // back up process
    public function backup()
    {

        $this->load->dbutil();
        $tanggal = date('Y-m-d');
        $config  = array(
            'format' => 'zip',
            'filename' => 'KammiSleman_db_backup_' . $tanggal . '.sql',
            'add_drop' => TRUE,
            'add_insert' => TRUE,
            'newline' => "\n",
            'foreign_key_checks' => FALSE
        );

        $backup = &$this->dbutil->backup($config);
        $name_file = 'KammiSleman_db_backup_' . $tanggal . '.zip';
        $this->load->helper('download');
        force_download($name_file, $backup);
    }


    // user management
    public function user_management()
    {

        $data['title'] = 'User Management';
        $data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['users']  = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user_management', $data);
        $this->load->view('templates/footer');
    }

    // user management detail
    public function user_management_detail($id_user)
    {

        $data['title'] = 'User Detail';
        $data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['users']  = $this->AdminModel->detailUser($id_user);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user_management_detail', $data);
        $this->load->view('templates/footer');
    }

    public function user_management_edit($id)
    {

        $data['title'] = 'Edit User';
        $data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['users']  = $this->db->get('user')->result_array();
        $data['users'] = $this->AdminModel->getByIdUser($id);


        $this->form_validation->set_rules('nama', 'Full Name', 'required|trim');
        // $this->form_validation->set_rules('password1', 'Old Password', 'required|trim');
        $this->form_validation->set_rules('password1', 'New Password', 'trim|min_length[5]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Confirm New Password', 'trim|min_length[5]|matches[password2]');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/user_management_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            $password = $this->input->post('password1');
            $password_hash = password_hash($password, PASSWORD_DEFAULT);


            $upload_image = $_FILES['gambar'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png';
                $config['max_size']         = '2048';
                $config['upload_path']      = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $old_gambar = $data['user']['gambar'];

                    if ($old_gambar != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_gambar);
                    }

                    $new_gambar = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_gambar);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->set('password', $password_hash);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>profile has been updated</div>');

            redirect('admin/user_management');
        }
    }

    public function user_management_add()
    {

        $data['title'] = 'Add User';
        $data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'email has already registered'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'password dont match',
            'min_length' => 'password too short'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/user_management_add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'gambar' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_role' => 2,
                'is_active' => 1,
                'tanggal_dibuat' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role = "alert">Congratulation, your account has been registered. Please login</div>');
            redirect('admin/user_management');
        };
    }


    public function delete($id)
    {
        // $departemenId = $this->input->post('id_departemen');
        $this->AdminModel->deleteUser($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>data deleted</div>');
        redirect('admin/user_management');
    }
}
