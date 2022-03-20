<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventory_model');
        
        if ($this->session->userdata('role') != 'admin') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda belum login!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['kategori'] = $this->inventory_model->get_data('tbl_kategori')->num_rows();
        $data['produk'] = $this->inventory_model->get_data('tbl_produk')->num_rows();
        $data['user'] = $this->inventory_model->get_data('user')->num_rows();
        // $data['ustad'] = $this->inventory_model->get_data('ustad')->num_rows();
        // $data['user'] = $this->inventory_model->get_data('user')->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }
}

/* End of file Dashboard.php */
