<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
         if ($this->session->userdata('username')==null) {
            redirect('auth','refresh');
        }
        $this->load->model('m_customer');  
    }

    public function index()
    {
        $data= array(
            'data'        =>  $this->m_customer->lists(),
            'isi'         => 'customer/v_index'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE); 
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'text', 'required');

        if($this->form_validation->run() == TRUE)
        { 
            $data = array(
                'kode'          => $this->m_customer->kode_customer(),
                'nama'          => $this->input->post('nama'),
                'telp'          => $this->input->post('telp'),
            );
            $this->m_customer->tambah($data);
            redirect('customer');
        }
        redirect('customer');
    }


    
    public function edit($kode)
    {
        $this->form_validation->set_rules('nama', 'text', 'required');

        if($this->form_validation->run() == TRUE)
        { 
            $data = array(
                'kode'          => $kode,
                'nama'          => $this->input->post('nama'),
                'telp'          => $this->input->post('telp'),
            );
            $this->m_customer->edit($data);
            redirect('customer');
        }
        redirect('customer');
    }

  


    public function hapus($kode)
    {       
        $data = array('kode' => $kode);
        $this->m_customer->hapus($data);
        $this->session->set_flashdata('success', 'Layanan berhasil dihapus');
        redirect('customer');
    }

  

}

/* End of file Controllername.php */
