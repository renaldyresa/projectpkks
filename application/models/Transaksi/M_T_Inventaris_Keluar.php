<?php

class M_T_Inventaris_Keluar extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('t_inventaris_keluar_dt');
        $this->db->order_by("Id_Detail", "DESC");
        $data = $this->db->get();
        return $data->result_array();
    }

    public function detaildata($where)
    {
        $this->db->select("br.ID,br.Kode_Barang,br.Harga_Jual,br.Keterangan,brt.Tanggal");
        $this->db->from('t_inventaris_keluar as br');
        $this->db->join('t_inventaris_keluar_dt as brt', 'brt.Id_Detail = br.Transaksi_Detail');
        $this->db->where('br.Transaksi_Detail', $where);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function carinama($where)
    {
        $this->db->select('Nama_Barang');
        $this->db->from('data_barang');
        $this->db->where('Kode_Barang', $where);
        $data = $this->db->get();
        return $data->result();
    }

    public function tambah($data)
    {
        $this->db->insert('t_inventaris_keluar', $data);
    }

    public function detail($data)
    {
        $this->db->insert('t_inventaris_keluar_dt', $data);
        $ket = 'Insert inventaris keluar, kode detail transaksi ' . $data['Id_Detail'];
        $his = [
            'Kode_User' => $this->session->userdata('k_user'),
            'Keterangan' => $ket,
            'Waktu' => date('d-m-Y H:i:s')
        ];
        $this->db->insert('history', $his);
    }

    public function iddetail()
    {
        $this->db->select('Id_Detail');
        $this->db->from('t_inventaris_keluar_dt');
        $this->db->order_by("Id_Detail", "DESC");
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->result();
    }

    public function GetRow($keyword)
    {
        $this->db->order_by('Kode_Barang', 'DESC');
        $this->db->like("Kode_Barang", $keyword);
        $this->db->or_like("Nama_Barang", $keyword);
        $this->db->limit(5);
        return $this->db->get('data_barang')->result_array();
    }
}
