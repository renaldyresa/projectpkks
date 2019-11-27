<?php

class  T_Inventaris_Masuk_C extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi/M_T_Inventaris_Masuk');
    }


    public function detail_t()
    {
        $data['judul'] = 'Data Transaksi Inventaris Masuk';
        $data['data'] = $this->M_T_Inventaris_Masuk->getAllData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('transaksi_data/v_inventaris_masuk', $data);
        $this->load->view('templates/footer');
    }

    public function transaksi_detail($id)
    {
        $data['judul'] = 'Data Transaksi Inventaris Masuk';
        $data['data'] = $this->M_T_Inventaris_Masuk->detaildata($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('transaksi_data/detail/v_inventaris_masuk_detail', $data);
        $this->load->view('templates/footer');
    }

    public function index()
    {
        $data['judul'] = 'Transaksi Inventaris Masuk';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('transaksi/inventaris_masuk');
        $this->load->view('templates/footer');
    }

    public function tambahdata()
    {
        $data = [
            'Kode_Barang' =>  $_POST['k_barang'],
            'Harga_Beli' =>  $_POST['h_beli'],
            'Keterangan' =>  $_POST['keterangan'],
            'Posisi' =>  $_POST['posisi'],
            'Penanggung_Jawab' =>  $_POST['p_jawab'],
            'Transaksi_Detail' =>  $_POST['id_d'],
        ];
        $this->M_T_Inventaris_Masuk->tambah($data);
    }

    public function tambahdetail()
    {
        $data = [
            'Id_Detail' =>  $_POST['Id_Detail'],
            'Tanggal' => date('Y-m-d')
        ];
        $this->M_T_Inventaris_Masuk->detail($data);
    }

    public function getiddetail()
    {
        $data = $this->M_T_Inventaris_Masuk->iddetail();
        echo json_encode($data);
    }
}
