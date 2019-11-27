<?php

class M_T_Barang_Keluar extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('t_barang_keluar_dt');
        $this->db->order_by("Id_Detail", "DESC");
        $data = $this->db->get();
        return $data->result_array();
    }


    public function detaildata($where)
    {
        $this->db->select("br.ID,br.No_KKK,br.Kode_Barang,dbar.Nama_Barang,br.Harga_Jual,br.Keterangan,brt.Tanggal");
        $this->db->from('t_barang_keluar as br');
        $this->db->join('t_barang_keluar_dt as brt', 'brt.Id_Detail = br.Transaksi_Detail');
        $this->db->join('data_barang as dbar', 'dbar.Kode_Barang = br.Kode_Barang');
        $this->db->where('br.Transaksi_Detail', $where);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function GetRow($keyword)
    {
        $this->db->order_by('No_KKK', 'DESC');
        $this->db->like("No_KKK", $keyword);
        $this->db->or_like("Nama_Lahir", $keyword);
        $this->db->limit(10);
        return $this->db->get('data_anggota')->result_array();
    }

    public function tambah($data)
    {
        $this->db->insert('t_barang_keluar', $data);
    }

    public function detail($data)
    {
        $this->db->insert('t_barang_keluar_dt', $data);
        $ket = 'Insert barang keluar, kode detail transaksi ' . $data['Id_Detail'];
        $his = [
            'Kode_User' => $this->session->userdata('k_user'),
            'Keterangan' => $ket,
            'Waktu' => date('d-m-Y H:i:s')
        ];
        $this->db->insert('history', $his);
    }

    public function iddetail()
    {
        $this->db->select_max('Id_Detail');
        $this->db->from('t_barang_keluar_dt');
        $data = $this->db->get();
        return $data->result();
    }

    public function carinama($where)
    {
        $this->db->select('Nama_Lahir');
        $this->db->from('data_anggota');
        $this->db->where('No_KKK', $where);
        $data = $this->db->get();
        return $data->result();
    }
}
