<?php 

class M_User extends CI_Model {
    public function getAllDataUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function tambahDataUser()
    {
        $data = [
            'Kode_User' =>  $this->input->post('kode_u'),
            'Password_User' =>  $this->input->post('pass_u'),
            'Nama_User' =>  $this->input->post('nama_u'),
            'Alamat_User' =>  $this->input->post('alamat_u'),
            'Jabatan_User' =>  $this->input->post('jabatan_u'),
            'Kewenangan_User' =>  $this->input->post('kewenangan_u'),
        ];

        $this->db->insert('user',$data);
    }

    public function hapusDataUser($where,$table)
    {
        $data = [
            'Kode_User' => $where
        ];
        $this->db->where($data);
        $this->db->delete($table);
    }

    public function editDataUser($where,$table)
    {
        return $this->db->get_where($table,$where)->result_array();
    }

    public function updateDataUser()
    {
        $data = [
            'Password_User' =>  $this->input->post('pass_u'),
            'Nama_User' =>  $this->input->post('nama_u'),
            'Alamat_User' =>  $this->input->post('alamat_u'),
            'Jabatan_User' =>  $this->input->post('jabatan_u'),
            'Kewenangan_User' =>  $this->input->post('kewenangan_u'),
        ];
        $where = [
            'Kode_User' =>  $this->input->post('kode_u'),
        ];
        $this->db->where($where);
        $this->db->update('user',$data);
    }
}