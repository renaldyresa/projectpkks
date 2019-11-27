<?php

class M_T_Barang_Masuk extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('t_barang_masuk_dt');
        $this->db->order_by("Id_Detail", "DESC");
        $data = $this->db->get();
        return $data->result_array();
    }

    public function detail($data)
    {
        $this->db->insert('t_barang_masuk_dt', $data);
        $ket = 'Insert barang masuk, kode detail transaksi ' . $data['Id_Detail'];
        $his = [
            'Kode_User' => $this->session->userdata('k_user'),
            'Keterangan' => $ket,
            'Waktu' => date('d-m-Y H:i:s')
        ];
        $this->db->insert('history', $his);
    }

    public function detaildata($where)
    {
        $this->db->select("br.ID,br.Kode_Barang,dbar.Nama_Barang,br.Jumlah,br.Harga_Beli,br.Keterangan,brt.Tanggal");
        $this->db->from('t_barang_masuk as br');
        $this->db->join('t_barang_masuk_dt as brt', 'brt.Id_Detail = br.Transaksi_Detail');
        $this->db->join('data_barang as dbar', 'dbar.Kode_Barang = br.Kode_Barang');
        $this->db->where('br.Transaksi_Detail', $where);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function iddetail()
    {
        $this->db->select_max('Id_Detail');
        $this->db->from('t_barang_masuk_dt');
        $data = $this->db->get();
        return $data->result();
    }

    public function tambah($data)
    {
        $this->db->insert('t_barang_masuk', $data);
    }
}
