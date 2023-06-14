<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username')==null) {
            redirect('auth','refresh');
        }
        $this->load->model('m_barang');  
    }

    public function index()
    {
          $data= array(
            'data'        =>  $this->m_barang->lists(),
            'isi'         => 'barang/v_index'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE); 
    }

    
    public function tambah()
    {
        $this->form_validation->set_rules('kode', 'text', 'required|trim');
        $this->form_validation->set_rules('nama', 'text', 'required|trim');
        $this->form_validation->set_rules('harga', 'number', 'required|trim');
        

        if($this->form_validation->run() == TRUE)
        { 
            $data = array(
                'kode'          => $this->input->post('kode'),
                'nama'          => $this->input->post('nama'),
                'harga'          => $this->input->post('harga'),
            );
            $this->m_barang->tambah($data);
            redirect('barang');
        }
        redirect('barang');
    }


    
    public function edit($kode)
    {
        $this->form_validation->set_rules('nama', 'text', 'required');

        if($this->form_validation->run() == TRUE)
        { 
            $data = array(
                'kode'          => $kode,
                'nama'          => $this->input->post('nama'),
                'harga'          => $this->input->post('harga'),
            );
            $this->m_barang->edit($data);
            redirect('barang');
        }
        redirect('barang');
    }

    public function hapus($kode)
    {       
        $data = array('kode' => $kode);
        $this->m_barang->hapus($data);
        $this->session->set_flashdata('success', 'Layanan berhasil dihapus');
        redirect('barang');
    }

}

/* End of file Controllername.php */
