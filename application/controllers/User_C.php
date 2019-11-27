<?php 

class User_C extends CI_Controller{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('M_User');
    }
    public function index()
    {
        $data['judul'] = 'User' ;
        $data['user'] = $this->M_User->getAllDataUser();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/ver_navbar'); 
        $this->load->view('user/user_v');   
        $this->load->view('templates/footer');  
    }
    public function inputdata()
    {
        $data['judul'] = 'Input Data User' ;
        $this->form_validation->set_rules('kode_u','Kode User','required|is_unique[user.Kode_User]');
        $this->form_validation->set_rules('pass_u','Password','required');
        $this->form_validation->set_rules('nama_u','Nama User','required');
        $this->form_validation->set_rules('alamat_u','Alamat User','required');
        $this->form_validation->set_rules('jabatan_u','Jabatan User','required');
        $this->form_validation->set_rules('kewenangan_u','Kewenangan User','required');
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/ver_navbar'); 
            $this->load->view('user/i_user');   
            $this->load->view('templates/footer'); 
        }else {
            $this->tambahdata() ;
        }
        
    }
    public function tambahdata()
    {
        $this->M_User->tambahDataUser();
        redirect('User_C');
    }

    public function hapusData($Kode_User)
    {
        $this->M_User->hapusDataUser($Kode_User,'user');
        redirect('User_C');
    }

    public function editData($id)
    {
        $where = array('Kode_User' => $id);
        $data['user'] = $this->M_User->editDataUser($where,'user');
        $data['judul'] = 'Edit Data User' ;
        $this->form_validation->set_rules('pass_u','Password','required');
        $this->form_validation->set_rules('nama_u','Nama User','required');
        $this->form_validation->set_rules('alamat_u','Alamat User','required');
        $this->form_validation->set_rules('jabatan_u','Jabatan User','required');
        $this->form_validation->set_rules('kewenangan_u','Kewenangan User','required');;
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/ver_navbar'); 
            $this->load->view('user/e_user',$data);   
            $this->load->view('templates/footer');
        }else {
            $this->updateData() ;
        } 
    }

    public function updateData()
    {
        $this->M_User->updateDataUser();
        redirect('User_C');
    }

}