<?php

class M_Data_Anggota extends CI_Model
{
    public function getAllDataAnggota()
    {
        return $this->db->get('data_anggota')->result_array();
    }

    public function tambahDataAnggota()
    {
        $data = [
            'Tanggal' =>  $this->input->post('tgl'),
            'No_KKK' =>  $this->input->post('no_kkk'),
            'Nama_Baptis' =>  $this->input->post('n_baptis'),
            'Nama_Lahir' =>  $this->input->post('n_lahir'),
            'Jumlah_KK' =>  $this->input->post('j_kk'),
            'Alamat' =>  $this->input->post('alamat'),
            'Tanggal_Lahir' =>  $this->input->post('tgl_lahir'),
            'Hub_Keluarga' =>  $this->input->post('hub_kel'),
            'Jenis_Kelamin' =>  $this->input->post('j_k'),
            'Status' =>  $this->input->post('status'),
            'Tanggal_Meninggal' =>  $this->input->post('tgl_men'),
            'Status_Keanggotaan' =>  $this->input->post('status_k')
        ];

        $this->db->insert('data_anggota', $data);

        $ket = 'Insert kode anggota ' . $data['No_KKK'];
        $his = [
            'Kode_User' => $this->session->userdata('k_user'),
            'Keterangan' => $ket,
            'Waktu' => date('d-m-Y H:i:s')
        ];
        $this->db->insert('history', $his);
    }

    public function hapusDataAnggota($where, $table)
    {
        $data = [
            'No_KKK' => $where
        ];
        $this->db->where($data);
        $this->db->delete($table);

        $ket = 'Delete kode anggota ' . $data['No_KKK'];
        $his = [
            'Kode_User' => $this->session->userdata('k_user'),
            'Keterangan' => $ket,
            'Waktu' => date('d-m-Y H:i:s')
        ];
        $this->db->insert('history', $his);
    }

    public function editDataAnggota($where, $table)
    {
        return $this->db->get_where($table, $where)->result_array();
    }

    public function updateDataAnggota()
    {
        $tgl_m = $this->input->post('tgl_men');
        if ($this->input->post('status') == 'Hidup') $tgl_m = '0000-00-00';
        $data = [
            'Tanggal' =>  $this->input->post('tgl'),
            'No_KKK' =>  $this->input->post('no_kkk'),
            'Nama_Baptis' =>  $this->input->post('n_baptis'),
            'Nama_Lahir' =>  $this->input->post('n_lahir'),
            'Jumlah_KK' =>  $this->input->post('j_kk'),
            'Alamat' =>  $this->input->post('alamat'),
            'Tanggal_Lahir' =>  $this->input->post('tgl_lahir'),
            'Hub_Keluarga' =>  $this->input->post('hub_kel'),
            'Jenis_Kelamin' =>  $this->input->post('j_k'),
            'Status' =>  $this->input->post('status'),
            'Tanggal_Meninggal' =>  $tgl_m,
            'Status_Keanggotaan' =>  $this->input->post('status_k')
        ];
        $where = [
            'No_KKK' =>  $this->input->post('no_kkk')
        ];
        $this->db->where($where);
        $this->db->update('data_anggota', $data);

        $ket = 'Update kode anggota ' . $where['No_KKK'];
        $his = [
            'Kode_User' => $this->session->userdata('k_user'),
            'Keterangan' => $ket,
            'Waktu' => date('d-m-Y H:i:s')
        ];
        $this->db->insert('history', $his);
    }
    public function cari()
    {
        $where = $this->input->post('icari');
        $this->db->select('*');
        $this->db->from('data_anggota');
        $this->db->like('No_KKK', $where);
        $this->db->or_like('Nama_Lahir', $where);
        return $this->db->get()->result_array();
    }
}
