<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function role()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Role';
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('template/footer', $data);
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New role added!
            </div>');
            redirect('admin/role');
        }
    }
    public function roleaccess($role_id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Role';
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/roleaccess', $data);
        $this->load->view('template/footer', $data);
    }
    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Access changed!
          </div>');
    }
    public function editRole()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Role';
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('template/footer', $data);
        } else {
            $id = $this->input->post('id');
            $data = [
                'role' => $this->input->post('role')
            ];
            $this->db->where('id', $id);
            $this->db->update('user_role', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Role has been edited!
            </div>');
            redirect('admin/role');
        }
    }
    public function deleteRole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Role has been deleted!
            </div>');
        redirect('admin/role');
    }
    public function userstatus()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'User Status';
        //$data['role']=$this->db->
        $this->load->model('Admin_model', 'admin');


        $data['member'] = $this->admin->getStatus();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/userstatus', $data);
        $this->load->view('template/footer', $data);
    }
    public function user()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Users';
        $this->load->model('Admin_model', 'admin');
        $data['member'] = $this->admin->user();
        $data['role'] = $this->admin->getRole();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('template/footer', $data);
    }
    public function tambah_user()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi';
            $this->load->view('template/auth_header', $data);
            $this->load->view('admin/registration');
            $this->load->view('template/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];
            // $token = base64_encode(random_bytes(32));
            // $user_token = [
            //     'email' => $email,
            //     'token' => $token,
            //     'date_created' => time()
            // ];
            $this->db->insert('user', $data);
            // $this->db->insert('user_token', $user_token);
            // $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! your account has been created, please contact your administrator to activated your account!
          </div>');
            redirect('admin/user');
        }
    }
    public function gantirole_member($id)
    {
        $data =   [
            'role_id' => $this->input->post('role')
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data has been update !!
          </div>');
        redirect('admin/user');
    }
    public function aktivasi($id)
    {
        $this->db->where('id', $id);
        $user = $this->db->get('user')->row_array();
        if ($user['is_active'] != 1) {
            $this->db->where('id', $id);
            $this->db->update('user', ['is_active' => 1]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            User has been activated !!
          </div>');
            redirect('admin/user');
        } else {
            $this->db->where('id', $id);
            $this->db->update('user', ['is_active' => 0]);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            User has been deactivated !!
          </div>');
            redirect('admin/user');
        }
    }
    public function rendal()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Rendal';
        $data['pekerjaan'] = $this->db->get('pekerjaan')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/rendal', $data);
        $this->load->view('template/footer', $data);
    }
    public function detail($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Ddetail Pekerjaan';

        $data['pekerjaan'] = $this->db->get_where('pekerjaan', ['id' => $id])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/detail', $data);
        $this->load->view('template/footer', $data);
    }
    public function add_job()
    {
        $nama_pekerjaan = $this->input->post('nama_pekerjaan');
        $vendor = $this->input->post('vendor');
        $no_kontrak = $this->input->post('no_kontrak');
        $password = rand();
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_selesai = $this->input->post('tgl_selesai');
        $deskripsi = $this->input->post('deskripsi');
        if ($nama_pekerjaan == "") {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Add Job';

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/add_job', $data);
            $this->load->view('template/footer', $data);
        } else {
            $ddata = [
                'nama_pekerjaan' => $nama_pekerjaan,
                'no_kontrak' => $no_kontrak,
                'vendor' => $vendor,
                'user_name' => $no_kontrak,
                'password' => $password,
                'tgl_mulai' => $tgl_mulai,
                'tgl_selesai' => $tgl_selesai,
                'deskripsi' => $deskripsi
            ];
            $this->db->insert('pekerjaan', $ddata);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            data has been insert!!
          </div>');
            redirect('admin/rendal');
        }
    }
}//end controller
