<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates_user/header');
        $this->load->view('user/homepage');
        $this->load->view('templates_user/footer');
    }
}

/* End of file Homepage.php */
