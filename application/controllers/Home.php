<?php
class Home extends CI_Controller
{
    public function index()
    {
        // date_default_timezone_set('asia/kolkata');

        if ($this->session->userdata('logged_in')) {
            $user_id = $this->session->userdata('user')->id;
            $data['projects'] = $this->projects_model->get_all_projects_by_id($user_id);
        }
        $data["main_view"] = "home_view";
        $this->load->view("layouts/main", $data);
    }
}
