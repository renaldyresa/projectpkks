<?php

class T_Barang_Masuk_C extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi/M_T_Barang_Masuk');
    }

    public function detail_t()
    {
        $data['judul'] = 'Data Transaksi Barang Masuk';
        $data['data'] = $this->M_T_Barang_Masuk->getAllData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('transaksi_data/v_barang_masuk', $data);
        $this->load->view('templates/footer');
    }

    public function transaksi_detail($id)
    {
        $data['judul'] = 'Data Transaksi Barang Masuk';
        $data['data'] = $this->M_T_Barang_Masuk->detaildata($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('transaksi_data/detail/v_barang_masuk_detail', $data);
        $this->load->view('templates/footer');
    }

    public function index($data = [])
    {
        $data['judul'] = 'Transaksi Barang Masuk';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('transaksi/barang_masuk', $data);
        $this->load->view('templates/footer');
    }

    public function tambahdata()
    {
        $data = [
            'Kode_Barang' =>  $_POST['k_barang'],
            'Jumlah' =>  $_POST['jumlah'],
            'Harga_Beli' =>  $_POST['h_beli'],
            'Keterangan' =>  $_POST['keterangan'],
            'Transaksi_Detail' =>  $_POST['id_d'],
        ];

        $this->M_T_Barang_Masuk->tambah($data);
    }

    public function tambahdetail()
    {
        $data = [
            'Id_Detail' =>  $_POST['Id_Detail'],
            'Tanggal' => date('Y-m-d')
        ];
        $this->M_T_Barang_Masuk->detail($data);
    }

    public function getiddetail()
    {
        $data = $this->M_T_Barang_Masuk->iddetail();
        echo json_encode($data);
    }
}
