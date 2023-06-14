<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('m_barang');
        return $this->db->get()->result();
    } 
    //insert
    public function tambah($data)
    {
        $this->db->insert('m_barang', $data);
    }

    //update
    public function edit($data)
    {
        $this->db->where('kode', $data['kode']);
        $this->db->update('m_barang', $data);
    }  

    //delete
    public function hapus($data)
    {
        $this->db->where('kode', $data['kode']);
        $this->db->delete('m_barang', $data);
    }

    

}

/* End of file ModelName.php */
