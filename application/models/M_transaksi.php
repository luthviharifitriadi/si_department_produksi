<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {


    public function id()
    {
        $this->db->select('RIGHT(t_sales.id, 1) as id,', FALSE);
		$this->db->order_by('id','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('t_sales');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
            //cek kode jika telah tersedia    
            $data = $query->row();      
            $kode = intval($data->id) + 1; 
        }
        else{      
            $kode = 1;  //cek jika kode belum terdapat pada table
        }    
        $id = $kode;  //format kode
        return $id;  
    }

    public function no_nota()
    {
        $bulan = date('m');
        $tahun = date('Y');
        $this->db->select('RIGHT(t_sales.kode,4) as kode,', FALSE);
         $this->db->where('MONTH(tgl)', $bulan); 
         $this->db->where('YEAR(tgl)', $tahun);
          
		$this->db->order_by('kode','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('t_sales');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
            //cek kode jika telah tersedia    
            $data = $query->row();      
            $kode = intval($data->kode) + 1; 
        }
        else{      
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
        $kode_customer = date('Ym').'-'.$batas;  //format kode
        return $kode_customer;  
    }


    public function lists()//daftar item yang dipilih
    {
        $this->db->select('*, t_sales.kode as kode, t_sales.id as id, SUM(t_sales_det.qty)as jumlah');    
        $this->db->from('t_sales');
        $this->db->join('t_sales_det', 't_sales.id =  t_sales_det.sales_id');
        $this->db->join('m_customer', 'm_customer.id =  t_sales.cust_id');
        
        $this->db->group_by('t_sales_det.sales_id');
        
        
       
        
        return $this->db->get()->result();
    }
    

    public function add_sales($data)//menambah data pelanggan
    {
        $this->db->insert('t_sales', $data);
    }

     public function add_sales_date($data)//menambah data pelanggan
    {
        $this->db->insert('t_sales_det', $data);
    }

      public function detail($id)//daftar item yang dipilih
    {
        $this->db->select('*');    
        $this->db->from('t_sales_det');
          $this->db->join('m_barang', 'm_barang.id =  t_sales_det.barang_id');
        $this->db->where('t_sales_det.sales_id', $id );
        return $this->db->get()->result();
    }
    

    

}

/* End of file ModelName.php */
