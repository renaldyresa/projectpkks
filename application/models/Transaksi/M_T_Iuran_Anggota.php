<?php
class M_T_Iuran_Anggota extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('t_iuran_anggota_dt');
        $this->db->order_by("Id_Detail", "DESC");
        $data = $this->db->get();
        return $data->result_array();
    }

    public function detaildata($where)
    {
        $this->db->select("br.ID,br.No_KKK,dbar.Nama_Lahir,dbar.Jumlah_KK,dbar.Status_Keanggotaan,br.Lama_Bulan,br.Total_Iuran,br.Sumbangan,brt.Tanggal");
        $this->db->from('t_iuran_anggota as br');
        $this->db->join('t_iuran_anggota_dt as brt', 'brt.Id_Detail = br.Transaksi_Detail');
        $this->db->join('data_anggota as dbar', 'dbar.No_KKK = br.No_KKK');
        $this->db->where('br.Transaksi_Detail', $where);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function carinama($where)
    {
        $this->db->select('*');
        $this->db->from('data_anggota');
        $this->db->where('No_KKK', $where);
        $data = $this->db->get();
        return $data->result();
    }

    public function detail($data)
    {
        $this->db->insert('t_iuran_anggota_dt', $data);
        $ket = 'Insert iuran anggota, kode detail transaksi ' . $data['Id_Detail'];
        $his = [
            'Kode_User' => $this->session->userdata('k_user'),
            'Keterangan' => $ket,
            'Waktu' => date('d-m-Y H:i:s')
        ];
        $this->db->insert('history', $his);
    }

    public function tambah($data)
    {
        $this->db->insert('t_iuran_anggota', $data);
    }

    public function iddetail()
    {
        $this->db->select_max('Id_Detail');
        $this->db->from('t_iuran_anggota_dt');
        $data = $this->db->get();
        return $data->result();
    }
}
