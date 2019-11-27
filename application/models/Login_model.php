<?php
class Login_model extends CI_Model{

  function validate($k_user,$password){
    $this->db->where('Kode_User',$k_user);
    $this->db->where('Password_User',$password);
    $result = $this->db->get('user',1);
    return $result;
  }

}
