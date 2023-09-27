<?php
class Projects extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('no_access', 'Sorry you are not allowed or not logged in');
            redirect('home');
        }
    }

    public function index()
    {
        $data['projects'] = $this->projects_model->get_projects();
        $data['main_view'] = 'projects/index.php';
        $this->load->view('layouts/main', $data);
    }

    public function display(){
        $data['main_view'] = 'projects/display';
        $this->load->view('layouts/main', $data);
    }
}
