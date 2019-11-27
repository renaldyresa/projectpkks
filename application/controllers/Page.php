<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  function index(){
    //Allowing akses to admin only
      if($this->session->userdata('level')==='1'){
        redirect('Home');
      }else{
          echo "Access Denied";
      }

  }

  function admin(){
    //Allowing akses to staff only
    if($this->session->userdata('level')==='2'){
      redirect('Home');
    }else{
        echo "Access Denied";
    }
  }

  function tamu(){
    //Allowing akses to staff only
    if($this->session->userdata('level')==='3'){
      redirect('Home');
    }else{
        echo "Access Denied";
    }
  }

}
