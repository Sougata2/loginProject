<?php
class Home extends CI_Controller
{
    public function index()
    {
        // date_default_timezone_set('asia/kolkata');
        $data["main_view"] = "home_view";
        $this->load->view("layouts/main", $data);
    }
}
