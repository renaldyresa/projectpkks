<?php 

class History_C extends CI_Controller{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('M_History');
    }

    public function index()
    {
        $data['judul'] = 'History' ;
        $data['data'] = $this->M_History->getAllData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar'); 
        $this->load->view('history');   
        $this->load->view('templates/footer');  
    }
    
    public function cariData()
    {
        $data['data'] = $this->M_History->cari();
        $data['judul'] = 'History' ;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar'); 
        $this->load->view('history',$data);   
        $this->load->view('templates/footer');
    }
}