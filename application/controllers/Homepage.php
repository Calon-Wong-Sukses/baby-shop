<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventory_model');
    }

    public function index()
    {
        $data['produk'] = $this->inventory_model->get_produk();

        $this->load->view('templates_user/header');
        $this->load->view('user/homepage', $data);
        $this->load->view('templates_user/footer');
    }
}

/* End of file Homepage.php */
