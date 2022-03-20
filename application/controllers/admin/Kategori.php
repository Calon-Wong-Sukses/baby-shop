<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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
        $data['title'] = 'Kategori';
        $data['kategori'] = $this->inventory_model->get_data('tbl_kategori')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/kategori/kategori', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Kategori';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/kategori/tambah_kategori', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama_kategori'   => $this->input->post('nama_kategori'),
            );

            $this->inventory_model->insert_data($data, 'tbl_kategori');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/kategori');
        }
    }

    public function edit_data($id)
    {
        $data['title'] = 'Edit Kategori';
        $data['kategori'] = $this->db->query("SELECT * FROM tbl_kategori WHERE id_kategori='$id'")->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/kategori/edit_kategori', $data);
        $this->load->view('templates/footer');
    }

    public function edit_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama_kategori'    => $this->input->post('nama_kategori'),
            );

            $where = array(
                'id_kategori' => $this->input->post('id_kategori'),
            );

            $this->inventory_model->update_data('tbl_kategori', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/kategori');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
    }

    public function delete_data($id)
    {
        $where = array('id_kategori' => $id);

        $this->inventory_model->delete_data($where, 'tbl_kategori');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/kategori');
    }
}

/* End of file Kategori.php */
