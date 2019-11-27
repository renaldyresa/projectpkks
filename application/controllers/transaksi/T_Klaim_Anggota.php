<?php

class  T_Klaim_Anggota extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Transaksi Klaim Anggota';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('transaksi/klaim_anggota');
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
}
