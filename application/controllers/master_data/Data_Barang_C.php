<?php

class Data_Barang_C extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_Data/M_Data_Barang');
        if ($this->session->userdata('level') == null) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['judul'] = 'Data Barang';
        $data['data_barang'] = $this->M_Data_Barang->getAllDataBarang();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('master_data/data_barang');
        $this->load->view('templates/footer');
    }

    public function inputdata()
    {
        $data['judul'] = 'Input Data Barang';
        $this->form_validation->set_rules('kode_b', 'Kode Barang', 'required|is_unique[data_barang.Kode_Barang]');
        $this->form_validation->set_rules('nama_b', 'Nama Barang', 'required');
        $this->form_validation->set_rules('h_jual', 'Harga Jual', 'required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_message('is_unique', 'Kode Barang Sudah Ada.');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/ver_navbar');
            $this->load->view('master_data_input/i_data_barang');
            $this->load->view('templates/footer');
        } else {
            $this->tambahdata();
        }
    }

    public function tambahdata()
    {
        $this->M_Data_Barang->tambahDataBarang();
        redirect('Master_Data/Data_Barang_C');
    }

    public function hapusData($Kode_Barang)
    {
        $this->M_Data_Barang->hapusDataBarang($Kode_Barang, 'data_barang');
        redirect('Master_Data/Data_Barang_C');
    }

    public function editData($id)
    {
        $where = array('Kode_Barang' => $id);
        $data['data_barang'] = $this->M_Data_Barang->editDataBarang($where, 'data_barang');
        $data['judul'] = 'Edit Data Barang';
        $this->form_validation->set_rules('nama_b', 'Nama Barang', 'required');
        $this->form_validation->set_rules('h_jual', 'Harga Jual', 'required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/ver_navbar');
            $this->load->view('master_data_edit/e_data_barang', $data);
            $this->load->view('templates/footer');
        } else {
            $this->updateData();
        }
    }

    public function updateData()
    {
        $this->M_Data_Barang->updateDataBarang();
        redirect('Master_Data/Data_Barang_C');
    }

    public function cariData()
    {
        $data['data_barang'] = $this->M_Data_Barang->cari();
        $data['judul'] = 'Data Barang';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('master_data/data_barang', $data);
        $this->load->view('templates/footer');
    }
}
