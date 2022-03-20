<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
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
        $data['title'] = 'Produk';
        $data['produk'] = $this->inventory_model->get_produk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/produk/produk', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Produk';
        $data['kategori'] = $this->inventory_model->get_data('tbl_kategori')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/produk/tambah_produk', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $foto = $_FILES['foto']['name'];
            if ($foto = '') {
            } else {
                $config['upload_path'] = './assets/foto';
                $config['allowed_types'] = 'jpg|png|gif';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    echo 'Upload Gagal!';
                    die();
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nama_produk'   => $this->input->post('nama_produk'),
                'id_kategori'   => $this->input->post('id_kategori'),
                'harga_produk'  => $this->input->post('harga_produk'),
                'stok_produk'   => $this->input->post('stok_produk'),
                'foto'          => $foto
            );

            $this->inventory_model->insert_data($data, 'tbl_produk');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/produk');
        }
    }

    public function edit_data($id)
    {
        $data['title'] = 'Edit Produk';
        $data['produk'] = $this->db->query("SELECT * FROM tbl_produk WHERE id_produk='$id'")->result();
        $data['kategori'] = $this->inventory_model->get_data('tbl_kategori')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/produk/edit_produk', $data);
        $this->load->view('templates/footer');
    }

    public function edit_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $foto = $_FILES['foto']['name'];
            if ($foto) {
                $config['upload_path'] = './assets/foto';
                $config['allowed_types'] = 'jpg|png|gif';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                    $this->db->set('foto', $foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'nama_produk'    => $this->input->post('nama_produk'),
                'id_kategori'   => $this->input->post('id_kategori'),
                'harga_produk'  => $this->input->post('harga_produk'),
                'stok_produk'  => $this->input->post('stok_produk'),
            );

            $where = array(
                'id_produk' => $this->input->post('id_produk'),
            );

            $this->inventory_model->update_data('tbl_produk', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/produk');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga_produk', 'Harga Produk', 'required');
        $this->form_validation->set_rules('stok_produk', 'Stok Produk', 'required');
    }

    public function delete_data($id)
    {
        $where = array('id_produk' => $id);

        $this->inventory_model->delete_data($where, 'tbl_produk');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/produk');
    }
}

/* End of file Barang.php */
