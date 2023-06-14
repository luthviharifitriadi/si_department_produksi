<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model {

    //kode customer
    //no nota
    public function kode_customer()
    {
       
        $this->db->select('RIGHT(m_customer.kode,3) as kode', FALSE);; 
		$this->db->order_by('kode','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('m_customer');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
            //cek kode jika telah tersedia    
            $data = $query->row();      
            $kode = intval($data->kode) + 1; 
        }
        else{      
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
        $kode_customer = 'C'.$batas;  //format kode
        return $kode_customer;  
    }
    //select
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('m_customer');
        return $this->db->get()->result();
    } 
    //insert
    public function tambah($data)
    {
        $this->db->insert('m_customer', $data);
    }

    //update
    public function edit($data)
    {
        $this->db->where('kode', $data['kode']);
        $this->db->update('m_customer', $data);
    }  

    //delete
    public function hapus($data)
    {
        $this->db->where('kode', $data['kode']);
        $this->db->delete('m_customer', $data);
    }
    

}

/* End of file ModelName.php */
