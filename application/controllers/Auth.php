<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

    public function login() {
        $data['title'] = 'Login';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auth/login', $data);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->user_model->get_user($username);

            if ($user && password_verify($password, $user['password'])) {
                $this->session->set_userdata('user_id', $user['id']);
                redirect('books'); // Redirect to your main page after login
            } else {
                $data['error'] = 'Invalid username or password';
                $this->load->view('auth/login', $data);
            }
        }
    }

    public function signup() {
        $data['title'] = 'Sign Up';

        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auth/signup', $data);
        } else {
            $username = $this->input->post('username');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $user_data = array(
                'username' => $username,
                'password' => $password
            );

            if ($this->user_model->create_user($user_data)) {
                redirect('auth/login');
            } else {
                $data['error'] = 'Error creating user';
                $this->load->view('auth/signup', $data);
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('auth/login');
    }
}
?>
