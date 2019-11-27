<?php

class M_History extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('history');
        $this->db->order_by('Waktu', 'DESC');
        $this->db->limit(10);
        return $this->db->get()->result_array();
    }

    public function cari()
    {
        $where1 = $this->input->post('icarikode');
        $where2 = $this->input->post('icariket');
        $where3 = $this->input->post('icariwak');
        $this->db->select('*');
        $this->db->from('history');
        $this->db->like('Kode_User', $where1);
        $this->db->like('Keterangan', $where2);
        $this->db->like('Waktu', $where3);
        $this->db->order_by('Waktu', 'DESC');
        return $this->db->get()->result_array();
    }
}
