<?php

class Data_Bank_C extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_Data/M_Data_Bank');
        if ($this->session->userdata('level') == null) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['judul'] = 'Data Bank';
        $data['data'] = $this->M_Data_Bank->getAllData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('master_data/data_bank');
        $this->load->view('templates/footer');
    }

    public function inputdata()
    {
        $data['judul'] = 'Input Data Bank';
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('nama_b', 'Nama Bank', 'required');
        $this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'required');
        $this->form_validation->set_rules('j_rek', 'Jenis Rekening', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/ver_navbar');
            $this->load->view('master_data_input/i_data_bank');
            $this->load->view('templates/footer');
        } else {
            $this->tambahdata();
        }
    }

    public function tambahdata()
    {
        $this->M_Data_Bank->tambah();
        redirect('Master_Data/Data_Bank_C');
    }

    public function hapusData($ID)
    {
        $this->M_Data_Bank->hapus($ID, 'bank');
        redirect('Master_Data/Data_Bank_C');
    }

    public function editData($id)
    {
        $where = array('ID' => $id);
        $data['data'] = $this->M_Data_Bank->edit($where, 'bank');
        $data['judul'] = 'Edit Data Bank';
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('nama_b', 'Nama Bank', 'required');
        $this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'required');
        $this->form_validation->set_rules('j_rek', 'Jenis Rekening', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_message('is_unique', 'Kode Barang Sudah Ada.');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/ver_navbar');
            $this->load->view('master_data_edit/e_data_bank');
            $this->load->view('templates/footer');
        } else {
            $this->updatehdata($where);
        }
    }

    public function updateData($where)
    {
        $this->M_Data_Bank->update($where);
        redirect('Master_Data/Data_Bank_C');
    }

    public function cariData()
    {
        $data['data'] = $this->M_Data_Bank->cari();
        $data['judul'] = 'Data Bank';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('master_data/data_bank', $data);
        $this->load->view('templates/footer');
    }
}
