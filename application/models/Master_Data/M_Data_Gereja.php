<?php 

class M_Data_Gereja extends CI_Model {
    public function getAllDataGereja()
    {
        return $this->db->get('data_gereja')->result_array();
    }

    public function tambahDataGereja()
    {
        $data = [
            'Kode_PKKS_Keuskupan' =>  $this->input->post('kode_pkks_k'),
            'Nama_Keuskupan' =>  $this->input->post('nama_k'),
            'Kode_PKKS_Paroki' =>  $this->input->post('kode_pkks_p'),
            'Nama_Paroki' =>  $this->input->post('nama_p'),
            'Alamat_Paroki' =>  $this->input->post('alamat_p'),
            'No_Telpon_Paroki' =>  $this->input->post('no_tel_p'),
            'Email_Paroki' =>  $this->input->post('email_p')
        ];
        $this->db->insert('data_gereja',$data);

        $ket = 'insert kode gereja '.$data['Kode_PKKS_Keuskupan'] ;
        $his = [
            'Kode_User' => $this->session->userdata('k_user'),
            'Keterangan' => $ket,
            'Waktu' => date('d-m-Y H:i:s')
        ];
        $this->db->insert('history',$his);
    }

    public function hapusDataGereja($where,$table)
    {
        $data = [
            'Kode_PKKS_Keuskupan' => $where
        ];
        $this->db->where($data);
        $this->db->delete($table);

        $ket = 'Delete kode gereja '.$data['Kode_PKKS_Keuskupan'] ;
        $his = [
            'Kode_User' => $this->session->userdata('k_user'),
            'Keterangan' => $ket,
            'Waktu' => date('d-m-Y H:i:s')
        ];
        $this->db->insert('history',$his);
    }

    public function editDataGereja($where,$table)
    {
        return $this->db->get_where($table,$where)->result_array();
    }
    
    public function updateDataGereja()
    {
        $data = [
            'Nama_Keuskupan' =>  $this->input->post('nama_k'),
            'Kode_PKKS_Paroki' =>  $this->input->post('kode_pkks_p'),
            'Nama_Paroki' =>  $this->input->post('nama_p'),
            'Alamat_Paroki' =>  $this->input->post('alamat_p'),
            'No_Telpon_Paroki' =>  $this->input->post('no_tel_p'),
            'Email_Paroki' =>  $this->input->post('email_p')
        ];
        $where = [
            'Kode_PKKS_Keuskupan' =>  $this->input->post('kode_pkks_k')
        ];
        $this->db->where($where);
        $this->db->update('data_gereja',$data);

        $ket = 'Update kode gereja '.$where['Kode_PKKS_Keuskupan'] ;
        $his = [
            'Kode_User' => $this->session->userdata('k_user'),
            'Keterangan' => $ket,
            'Waktu' => date('d-m-Y H:i:s')
        ];
        $this->db->insert('history',$his);
    }

    public function cari()
    {
        $where = $this->input->post('icari');
        $this->db->select('*');
        $this->db->from('data_gereja');
        $this->db->like('Kode_PKKS_Keuskupan',$where);
        $this->db->or_like('Nama_Keuskupan',$where);
        return $this->db->get()->result_array();

    }
}