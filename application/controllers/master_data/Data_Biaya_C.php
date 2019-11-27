<?php

class Data_Biaya_C extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_Data/M_Data_Biaya');
        if ($this->session->userdata('level') == null) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['judul'] = 'Data Biaya';
        $data['data_biaya'] = $this->M_Data_Biaya->getAllDataBiaya();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('master_data/data_biaya');
        $this->load->view('templates/footer');
    }

    public function inputdata()
    {
        $data['judul'] = 'Input Data Biaya';
        $this->form_validation->set_rules('kode_b', 'Kode Biaya', 'required|is_unique[biaya.Kode_Biaya]');
        $this->form_validation->set_rules('nama_b', 'Nama Biaya', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_message('is_unique', 'Kode Biaya Sudah Ada.');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/ver_navbar');
            $this->load->view('master_data_input/i_data_biaya');
            $this->load->view('templates/footer');
        } else {
            $this->tambahdata();
        }
    }

    public function tambahdata()
    {
        $this->M_Data_Biaya->tambahDataBiaya();
        redirect('Master_Data/Data_Biaya_C');
    }

    public function hapusData($Kode_Biaya)
    {
        $this->M_Data_Biaya->hapusDataBiaya($Kode_Biaya, 'biaya');
        redirect('Master_Data/Data_Biaya_C');
    }

    public function editData($id)
    {
        $where = array('Kode_Biaya' => $id);
        $data['data_biaya'] = $this->M_Data_Biaya->editDataBiaya($where, 'biaya');
        $data['judul'] = 'Edit Data Biaya';
        $this->form_validation->set_rules('nama_b', 'Nama Biaya', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/ver_navbar');
            $this->load->view('master_data_edit/e_data_biaya', $data);
            $this->load->view('templates/footer');
        } else {
            $this->updateData();
        }
    }

    public function updateData()
    {
        $this->M_Data_Biaya->updateDataBiaya();
        redirect('Master_Data/Data_Biaya_C');
    }

    public function cariData()
    {
        $data['data_biaya'] = $this->M_Data_Biaya->cari();
        $data['judul'] = 'Data Biaya';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('master_data/data_biaya', $data);
        $this->load->view('templates/footer');
    }
}
