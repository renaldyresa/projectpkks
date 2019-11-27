<?php
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('login_model');
  }

  function index(){
    $this->load->view('login_view');
  }

  function auth(){
    $k_user    = $this->input->post('k_user',TRUE);
    $password = $this->input->post('password',TRUE);
    $validate = $this->login_model->validate($k_user,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $name  = $data['Nama_User'];
        $level = $data['Kewenangan_User'];
        $sesdata = array(
            'k_user' => $k_user,
            'username'  => $name,
            'level'     => $level,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($level === '1'){
            redirect('page');

        // access login for staff
        }elseif($level === '2'){
            redirect('page/admin');
        }else{
          redirect('page/tamu');
        }

    }else{
        echo $this->session->set_flashdata('msg','Username or Password is Wrong');
        redirect('login');
    }
  }

  function logout(){
      $this->session->sess_destroy();
      redirect('login');
  }

}
