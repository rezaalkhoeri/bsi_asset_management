<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['role'] = $this->m_data->tampil_data('tb_user_role')->result();
        $data['get'] = $this->m_data->join_table_users('tb_user')->result();
        // print_r($data);
        // die;
        $data['title'] = 'Asset Management | User Management';
        $this->load->view('user/users_data', $data);
    }

    public function tampil()
    {
        $data = array(
            'name' => $name,
            'email' => $email
        );
        $this->m_data->input_data($data, 'tb_user');
        redirect('Users/index');
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data['get'] = $this->m_data->edit_data($where, 'tb_user')->result();
        $data['title'] = 'Admin | Edit User';
        $this->load->view('User/users_edit', $data);
    }

    public function update($id)
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');

        $where = array(
            'id' => $id
        );
        $data = array(
            'name' => $name,
            'email' => $email
        );
        $this->m_data->update_data($where, $data, 'tb_user');
        redirect('Users/index');
    }

    public function registration()
    {
        $name =  $this->input->post('name', true);
        $email =  $this->input->post('email', true);
        $roleid = $this->input->post('roleid', true);
        $password1 =  md5($this->input->post('password1', true));

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('roleid', 'roleid', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'Email has already registered'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Check your password again!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Regist Here';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($name),
                'email' => htmlspecialchars($email),
                'password' => $password1,
                // 'password' => password_hash($this->input->post('password1'),
                //  PASSWORD_BCRYPT),
                'role_id' => $roleid,
                'status' => 1
            ];

            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Thank you! Your account has been created. Please Login.</div>');
            redirect('users');
        }
    }
}