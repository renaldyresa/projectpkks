<?php

class Data_Anggota_C extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_Data/M_Data_Anggota');
        if ($this->session->userdata('level') == null) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['judul'] = 'Data Anggota';
        $data['data_anggota'] = $this->M_Data_Anggota->getAllDataAnggota();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('master_data/data_anggota', $data);
        $this->load->view('templates/footer');
    }

    public function inputdata()
    {
        $data['judul'] = 'Input Data Anggota';
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('no_kkk', 'Nomor Kartu Keluarga Katolik', 'required|is_unique[data_anggota.No_KKK]');
        $this->form_validation->set_rules('n_baptis', 'Nama Baptis', 'required');
        $this->form_validation->set_rules('n_lahir', 'Nama Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('hub_kel', 'Hubungan Keluarga', 'required');
        $this->form_validation->set_message('is_unique', 'Nomor Kartu Keluarga Katolik (KKK) Sudah Ada.');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/ver_navbar');
            $this->load->view('master_data_input/i_data_anggota');
            $this->load->view('templates/footer');
        } else {
            $this->tambahdata();
        }
    }

    public function tambahdata()
    {
        $this->M_Data_Anggota->tambahDataAnggota();
        redirect('Master_Data/Data_Anggota_C');
    }

    public function hapusData($No_KKK)
    {
        $this->M_Data_Anggota->hapusDataAnggota($No_KKK, 'data_anggota');
        redirect('Master_Data/Data_Anggota_C');
    }

    public function detail($id)
    {
        $where = array('No_KKK' => $id);
        $data['data_anggota'] = $this->M_Data_Anggota->editDataAnggota($where, 'data_anggota');
        $data['judul'] = 'Detail Data Anggota';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('master_data_detail/d_data_anggota', $data);
        $this->load->view('templates/footer');
    }

    public function updateData()
    {
        $this->M_Data_Anggota->updateDataAnggota();
        redirect('Master_Data/Data_Anggota_C');
    }

    public function editData($id)
    {
        $this->load->database();
        $where = array('No_KKK' => $id);
        $data['data_anggota'] = $this->M_Data_Anggota->editDataAnggota($where, 'data_anggota');
        $data['judul'] = 'Edit Data Anggota';

        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('no_kkk', 'Nomor Kartu Keluarga Katolik', 'required');
        $this->form_validation->set_rules('n_baptis', 'Nama Baptis', 'required');
        $this->form_validation->set_rules('n_lahir', 'Nama Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('hub_kel', 'Hubungan Keluarga', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/ver_navbar');
            $this->load->view('master_data_edit/e_data_anggota');
            $this->load->view('templates/footer');
        } else {
            $this->updateData();
        }
    }

    public function cariData()
    {

        $data['data_anggota'] = $this->M_Data_Anggota->cari();
        $data['judul'] = 'Data Anggota';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('master_data/data_anggota', $data);
        $this->load->view('templates/footer');
    }
}
