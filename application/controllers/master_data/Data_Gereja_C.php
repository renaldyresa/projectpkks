<?php

class Data_Gereja_C extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_Data/M_Data_Gereja');
        if ($this->session->userdata('level') == null) {
            redirect('login');
        }
    }


    public function index()
    {
        $data['judul'] = 'Data Gereja';
        $data['data_gereja'] = $this->M_Data_Gereja->getAllDataGereja();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('master_data/data_gereja', $data);
        $this->load->view('templates/footer');
    }


    public function inputdata()
    {
        if ($this->session->userdata('level') == '3') {
            redirect('login');
        }
        $data['judul'] = 'Input Data Gereja';
        $this->form_validation->set_rules('kode_pkks_k', 'Kode PKKS Keuskupan', 'required|is_unique[data_gereja.Kode_PKKS_Keuskupan]');
        $this->form_validation->set_rules('nama_k', 'Nama Keuskupan', 'required');
        $this->form_validation->set_rules('kode_pkks_p', 'Kode PKKS Paroki', 'required');
        $this->form_validation->set_rules('nama_p', 'Nama Paroki', 'required');
        $this->form_validation->set_rules('alamat_p', 'Alamat Paroki', 'required');
        $this->form_validation->set_rules('no_tel_p', 'Nomor Telpon Paroki', 'required');
        $this->form_validation->set_rules('email_p', 'Email Paroki', 'required|valid_email');
        $this->form_validation->set_message('is_unique', 'Kode PKKS Keuskupan Sudah Ada.');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/ver_navbar');
            $this->load->view('master_data_input/i_data_gereja');
            $this->load->view('templates/footer');
        } else {
            $this->tambahdata();
        }
    }

    public function tambahdata()
    {
        $this->M_Data_Gereja->tambahDataGereja();
        redirect('Master_Data/Data_Gereja_C');
    }

    public function hapusData($Kode_PKKS_Keuskupan)
    {
        $this->M_Data_Gereja->hapusDataGereja($Kode_PKKS_Keuskupan, 'data_gereja');
        redirect('Master_Data/Data_Gereja_C');
    }

    public function editData($id)
    {
        if ($this->session->userdata('level') == '3') {
            redirect('login');
        }
        $where = array('Kode_PKKS_Keuskupan' => $id);
        $data['data_gereja'] = $this->M_Data_Gereja->editDataGereja($where, 'data_gereja');
        $data['judul'] = 'Edit Data Gereja';

        $this->form_validation->set_rules('kode_pkks_k', 'Kode PKKS Keuskupan', 'required');
        $this->form_validation->set_rules('nama_k', 'Nama Keuskupan', 'required');
        $this->form_validation->set_rules('kode_pkks_p', 'Kode PKKS Paroki', 'required');
        $this->form_validation->set_rules('nama_p', 'Nama Paroki', 'required');
        $this->form_validation->set_rules('alamat_p', 'Alamat Paroki', 'required');
        $this->form_validation->set_rules('no_tel_p', 'Nomor Telpon Paroki', 'required');
        $this->form_validation->set_rules('email_p', 'Email Paroki', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/ver_navbar');
            $this->load->view('master_data_edit/e_data_gereja');
            $this->load->view('templates/footer');
        } else {
            $this->updateData();
        }
    }

    public function updateData()
    {
        $this->M_Data_Gereja->updateDataGereja();
        redirect('Master_Data/Data_Gereja_C');
    }

    public function detail($id)
    {
        $where = array('Kode_PKKS_Keuskupan' => $id);
        $data['data_gereja'] = $this->M_Data_Gereja->editDataGereja($where, 'data_gereja');
        $data['judul'] = 'Detail Data Gereja';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('master_data_detail/d_data_gereja', $data);
        $this->load->view('templates/footer');
    }

    public function cariData()
    {
        $data['data_gereja'] = $this->M_Data_Gereja->cari();
        $data['judul'] = 'Data Gereja';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('master_data/data_gereja', $data);
        $this->load->view('templates/footer');
    }
}
