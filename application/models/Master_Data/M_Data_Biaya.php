<?php 

class M_Data_Biaya extends CI_Model {
    public function getAllDataBiaya()
    {
        return $this->db->get('biaya')->result_array();
    }

    public function tambahDataBiaya()
    {
        $data = [
            'Kode_Biaya' =>  $this->input->post('kode_b'),
            'Nama_Biaya' =>  $this->input->post('nama_b'),
            'Keterangan' =>  $this->input->post('keterangan'),
        ];
        $this->db->insert('biaya',$data);

        $ket = 'insert kode biaya '.$data['Kode_Biaya'] ;
        $his = [
            'Kode_User' => $this->session->userdata('k_user'),
            'Keterangan' => $ket,
            'Waktu' => date('d-m-Y H:i:s')
        ];
        $this->db->insert('history',$his);
    }

    public function hapusDataBiaya($where,$table)
    {
        $data = [
            'Kode_Biaya' => $where
        ];
        $this->db->where($data);
        $this->db->delete($table);

        $ket = 'Delete kode biaya '.$data['Kode_Biaya'] ;
        $his = [
            'Kode_User' => $this->session->userdata('k_user'),
            'Keterangan' => $ket,
            'Waktu' => date('d-m-Y H:i:s')
        ];
        $this->db->insert('history',$his);
    }

    public function editDataBiaya($where,$table)
    {
        return $this->db->get_where($table,$where)->result_array();
    }

    public function updateDataBiaya()
    {
        $data = [
            'Nama_Biaya' =>  $this->input->post('nama_b'),
            'Keterangan' =>  $this->input->post('keterangan'),
        ];
        $where = [
            'Kode_Biaya' => $this->input->post('kode_b')
        ];
        $this->db->where($where);
        $this->db->update('biaya',$data);

        $ket = 'Update kode biaya '.$where['Kode_Biaya'] ;
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
        $this->db->from('biaya');
        $this->db->like('Kode_Biaya',$where);
        $this->db->or_like('Nama_Biaya',$where);
        return $this->db->get()->result_array();

    }
}