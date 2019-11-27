<?php 

class  T_Bank extends CI_Controller{
    public function index()
    {
        $data['judul'] = 'Transaksi Inventaris Masuk' ;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar'); 
        $this->load->view('transaksi/bank');   
        $this->load->view('templates/footer');  
    }
}