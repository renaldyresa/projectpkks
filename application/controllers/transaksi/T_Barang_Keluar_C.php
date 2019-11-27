<?php

class  T_Barang_Keluar_C extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi/M_T_Barang_Keluar');
    }

    public function detail_t()
    {
        $data['judul'] = 'Data Transaksi Barang Keluar';
        $data['data'] = $this->M_T_Barang_Keluar->getAllData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('transaksi_data/v_barang_keluar', $data);
        $this->load->view('templates/footer');
    }

    public function transaksi_detail($id)
    {
        $data['judul'] = 'Data Transaksi Barang Keluar';
        $data['data'] = $this->M_T_Barang_Keluar->detaildata($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('transaksi_data/detail/v_barang_keluar_detail', $data);
        $this->load->view('templates/footer');
    }


    //input transaksi
    public function Getno_kkk()
    {
        $keyword = $_POST['keyword'];
        $data = $this->M_T_Barang_Keluar->GetRow($keyword);
        echo json_encode($data);
    }


    public function index($data = [])
    {
        $data['judul'] = 'Transaksi Barang Keluar';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('transaksi/barang_keluar', $data);
        $this->load->view('templates/footer');
    }

    public function inputdata()
    {
        $data['judul'] = 'Transaksi Barang Keluar';
        $data['data'] = $this->M_T_Barang_Keluar->cari();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('transaksi_input/i_barang_keluar', $data);
        $this->load->view('templates/footer');
    }

    public function tambahdata()
    {
        $data = [
            'No_KKK' => $_POST['no_kkk'],
            'Kode_Barang' =>  $_POST['k_barang'],
            'Harga_Jual' =>  $_POST['h_jual'],
            'Keterangan' =>  $_POST['keterangan'],
            'Transaksi_Detail' =>  $_POST['id_d'],
        ];

        $this->M_T_Barang_Keluar->tambah($data);
    }

    public function tambahdetail()
    {
        $data = [
            'Id_Detail' =>  $_POST['Id_Detail'],
            'Tanggal' => date('Y-m-d')
        ];
        $this->M_T_Barang_Keluar->detail($data);
    }

    public function getiddetail()
    {
        $data = $this->M_T_Barang_Keluar->iddetail();
        echo json_encode($data);
    }

    public function cari($where)
    {
        $datanama = $this->M_T_Barang_Keluar->carinama($where);
        echo json_encode($datanama);
    }
}
