<?php 

class M_Data_Barang extends CI_Model {
    public function getAllDataBarang()
    {
        return $this->db->get('data_barang')->result_array();
    }

    public function tambahDataBarang()
    {
        $k_bar = $this->input->post('kode_b') ;
        $data = [
            'Kode_Barang' => $k_bar ,
            'Nama_Barang' =>  $this->input->post('nama_b'),
            'Harga_Jual' =>  $this->input->post('h_jual'),
            'Keterangan' =>  $this->input->post('keterangan'),
        ];
        $this->db->insert('data_barang',$data);
        $ket = 'insert kode barang '.$k_bar ;
        $his = [
            'Kode_User' => $this->session->userdata('k_user'),
            'Keterangan' => $ket,
            'Waktu' => date('d-m-Y H:i:s')
        ];
        $this->db->insert('history',$his);
    }

    public function hapusDataBarang($where,$table)
    {
        $data = [
            'Kode_Barang' => $where
        ];
        $this->db->where($data);
        $this->db->delete($table);
        $ket = 'Delete kode barang '.$data['Kode_Barang'] ;
        $his = [
            'Kode_User' => $this->session->userdata('k_user'),
            'Keterangan' => $ket,
            'Waktu' => date('d-m-Y H:i:s')
        ];
        $this->db->insert('history',$his);
    }

    public function editDataBarang($where,$table)
    {
        return $this->db->get_where($table,$where)->result_array();
    }

    public function updateDataBarang()
    {
        $data = [
            'Nama_Barang' =>  $this->input->post('nama_b'),
            'Harga_Jual' =>  $this->input->post('h_jual'),
            'Keterangan' =>  $this->input->post('keterangan'),
        ];
        $where = [
            'Kode_Barang' => $this->input->post('kode_b')
        ];
        $this->db->where($where);
        $this->db->update('data_barang',$data);
        
        $ket = 'Update kode barang '.$where['Kode_Barang'] ;
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
        $this->db->from('data_barang');
        $this->db->like('Kode_Barang',$where);
        $this->db->or_like('Nama_Barang',$where);
        return $this->db->get()->result_array();

    }
}