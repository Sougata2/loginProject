<?php
class Users extends CI_Controller
{
    public function register()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password', 'Password', 'trim|required|min_length[3]|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $data["main_view"] = 'users/register_view';
            $this->load->view("layouts/main", $data);
        } else {
            if ($this->user_model->create_user()) {
                $this->session->set_flashdata('user_registered', 'User has been registered');
                return redirect('home');
            } else {
            }
        }
    }
    public function login()
    {
        // echo $this->input->post('username');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password', 'Password', 'trim|required|min_length[3]|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'errors' => validation_errors()
            ];
            // $this->session->set_userdata($data); // Normal session setup
            $this->session->set_flashdata($data);
            return redirect('home');
        }
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->user_model->login_user($username, $password);

        if ($user) {
            // Setting user data into a session.
            $user_data = [
                'user' => $user,
                'username' => $username,
                'logged_in' => true
            ];
            $this->session->set_userdata($user_data);
            $this->session->set_flashdata('login_success', 'You are now logged in');
            $data['main_view'] = "admin_view";
            $this->load->view('layouts/main', $data);
            // return redirect('home');
        } else {
            $this->session->set_flashdata('login_failed', 'Sorry you are not logged in.');
            return redirect('home');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        return redirect('home');
    }
}
