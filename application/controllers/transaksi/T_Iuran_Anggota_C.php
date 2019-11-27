<?php

class  T_Iuran_Anggota_C extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi/M_T_Iuran_Anggota');
    }

    public function detail_t()
    {
        $data['judul'] = 'Data Transaksi Iuran Anggota';
        $data['data'] = $this->M_T_Iuran_Anggota->getAllData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('transaksi_data/v_iuran_anggota', $data);
        $this->load->view('templates/footer');
    }

    public function transaksi_detail($id)
    {
        $data['judul'] = 'Data Transaksi Iuran Anggota';
        $data['data'] = $this->M_T_Iuran_Anggota->detaildata($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('transaksi_data/detail/v_iuran_anggota_detail', $data);
        $this->load->view('templates/footer');
    }

    public function index()
    {
        $data['judul'] = 'Transaksi Iuran Anggota';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar');
        $this->load->view('transaksi/iuran_anggota');
        $this->load->view('templates/footer');
    }

    public function getiddetail()
    {
        $data = $this->M_T_Iuran_Anggota->iddetail();
        echo json_encode($data);
    }

    public function tambahdata()
    {
        $data = [
            'No_KKK' => $_POST['no_kkk'],
            'Jumlah_KK' =>  $_POST['j_kk'],
            'Lama_Bulan' =>  $_POST['l_bln'],
            'Total_Iuran' =>  $_POST['t_iuran'],
            'Sumbangan' =>  $_POST['sumbangan'],
            'Transaksi_Detail' =>  $_POST['id_d'],
        ];

        $this->M_T_Iuran_Anggota->tambah($data);
    }

    public function tambahdetail()
    {
        $data = [
            'Id_Detail' =>  $_POST['Id_Detail'],
            'Tanggal' => $_POST['Tanggal'],
            'Wilayah' => $_POST['Wilayah'],
            'Lingkungan' => $_POST['Lingkungan'],
            'Total_Pembayaran' => $_POST['T_Pembayaran'],
            'Keterangan' => $_POST['Keterangan']
        ];
        $this->M_T_Iuran_Anggota->detail($data);
    }

    public function cari($where)
    {
        $datanama = $this->M_T_Iuran_Anggota->carinama($where);
        echo json_encode($datanama);
    }
}
