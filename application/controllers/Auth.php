<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->library('form_validation');
    }

    // function buat login
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        // $a = $user['password'];
        // $b = md5($password);
        // var_dump($b);
        // die;

        //jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['status'] == 1) {
                //cek password
                if ($user['password'] == md5($password)) {
                    // password_verify($password, $user['password'])
                    $data = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'name' => $user['name']
                    ];
                    //password bener
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    }
                    if ($user['role_id'] == 2) {
                        redirect('manager');
                    }
                    if ($user['role_id'] == 3) {
                        redirect('analyst');
                    }
                    if ($user['role_id'] == 4) {
                        redirect('servicedesk');
                    } else {
                        redirect('user');
                    }
                } else {
                    //password salah
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your Email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your Email is not registered!</div>');
            redirect('auth');
        }
    }

    // function buat regist
    public function registration()
    {
        $name =  $this->input->post('name', true);
        $email =  $this->input->post('email', true);
        $password1 =  md5($this->input->post('password1', true));

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
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
                'role_id' => 1,
                'status' => 1
            ];

            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Thank you! Your account has been created. Please Login.</div>');
            redirect('users');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out.</div>');
        redirect('auth');
    }
}
