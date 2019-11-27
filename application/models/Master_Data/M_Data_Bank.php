<?php

class M_Data_Bank extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('bank')->result_array();
    }

    public function tambah()
    {
        $data = [
            'Tanggal' =>  $this->input->post('tgl'),
            'Nama_Bank' =>  $this->input->post('nama_b'),
            'No_Rekening' =>  $this->input->post('no_rek'),
            'Jenis_Rekening' =>  $this->input->post('j_rek'),
            'Kredit' =>  $this->input->post('kredit'),
            'Debit' =>  $this->input->post('debit'),
            'Keterangan' =>  $this->input->post('keterangan'),
        ];
        $this->db->insert('bank', $data);

        $ket = 'insert nama Bank ' . $data['Nama_Bank'] . ' dengan no rekening ' . $data['No_Rekening'];
        $his = [
            'Kode_User' => $this->session->userdata('k_user'),
            'Keterangan' => $ket,
            'Waktu' => date('d-m-Y H:i:s')
        ];
        $this->db->insert('history', $his);
    }

    public function hapus($where, $table)
    {
        $data = [
            'ID' => $where
        ];
        $this->db->where($data);
        $this->db->delete($table);
    }

    public function edit($where, $table)
    {
        return $this->db->get_where($table, $where)->result_array();
    }

    public function update($where)
    {
        $data = [
            'Tanggal' =>  $this->input->post('tgl'),
            'Nama_Bank' =>  $this->input->post('nama_b'),
            'No_Rekening' =>  $this->input->post('no_rek'),
            'Jenis_Rekening' =>  $this->input->post('j_rek'),
            'Kredit' =>  $this->input->post('kredit'),
            'Debit' =>  $this->input->post('debit'),
            'Keterangan' =>  $this->input->post('keterangan'),
        ];
        $this->db->where($where);
        $this->db->update('data_bank', $data);

        $ket = 'D nama Bank ' . $data['Nama_Bank'] . 'dengan no rekening' . $data['No_Rekening'];
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
        $this->db->from('bank');
        $this->db->like('Nama_Bank', $where);
        $this->db->or_like('No_Rekening', $where);
        $this->db->or_like('Tanggal', $where);
        return $this->db->get()->result_array();
    }
}
