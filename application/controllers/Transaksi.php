<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username')==null) {
            redirect('auth','refresh');
        }

        $this->load->model('m_customer');  
        $this->load->model('m_transaksi');  
        $this->load->model('m_barang'); 
    }

    public function index()
    {
        $cari = $this->input->post('cari');

        if(empty($cari)){
            $data_transaksi = $this->m_transaksi->lists();
        }else{
            $data_transaksi = $this->m_transaksi->filter_transaksi($cari);
        }
        $data= array(
            'data_transaksi'   =>  $data_transaksi, 
            'isi'              => 'transaksi/v_index'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE); 
    }

    public function tambah()
    {
        $data= array(
            'no_nota'       =>  $this->m_transaksi->no_nota(),
            'total'         =>  $this->cart->total(), 
            'data_barang'   =>  $this->m_barang->lists(), 
            'data_customer' =>  $this->m_customer->lists(),
            'isi'           => 'transaksi/v_create'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
        $this->cart->destroy(); 
    }

	function add_produk(){ 
		$data = array(
			'barang_id'     => $this->input->post('barang_id'),
            'kode_produk'   => $this->input->post('kode_produk'), 
			'name'          => $this->input->post('nama'), 
			'price'         => $this->input->post('harga_bandrol'),
            'qty'           => $this->input->post('qty'),
            'diskon_pct'    => $this->input->post('diskon_pct') != null ? $this->input->post('diskon_pct') : 0 ,
            'diskon_nilai'  => $this->input->post('diskon_nilai'),
            'harga_diskon'  => $this->input->post('harga_diskon'),
            'total'         => $this->input->post('total')
		);
		$this->cart->insert($data);
		echo $this->show_cart(); 
	}

    function show_cart(){ 
		$output = '';
		$no = 1;
		foreach ($this->cart->contents() as $items) {		
		$output .='
            <tr>
                <td><form><button type="button" id="'.$items['rowid'].'" class="romove_cart btn btn-danger btn-sm">Hapus</button></from></td>
                <td>'.$no++.'</td>
                <td>'.$items['kode_produk'].'</td>
                <td>'.$items['name'].'</td>		
                <td>'.$items['qty'].'</td>		
                <td>'.$items['price'].'</td>	
                <td>'.$items['diskon_pct'].'</td>
                <td>'.$items['diskonrp'].'</td>
                <td>'.$items['harga_diskon'].'</td>
                <td>'.$items['total'].'</td>
            </tr>
		    ';
		}
       
		return $output;
	}

    function show_subtotal(){ 
		$output = $this->cart->total();
		
		return $output;
	}

    function load_subtotal()
    {
        echo $this->show_subtotal();
    }

 
    
    function load_cart(){ 
		echo $this->show_cart();
	}

    function delete_cart(){ 
		$data = array(
			'rowid' => $this->input->post('row_id'), 
			'qty' => 0, 
		);
		$this->cart->update($data);
		echo $this->show_cart();
	}

    public function add_data()
    {
        $this->form_validation->set_rules('no_transaksi', 'text', 'required');

        
        if($this->form_validation->run() == TRUE)
        {            
            $id = $this->m_transaksi->id();
                $data = array(
                    'id'            => $id,
                    'kode'          => $this->input->post('no_transaksi'),
                    'tgl'           => $this->input->post('tgl'),
                    'cust_id'       => $this->input->post('cust_id'),
                    'subtotal'      => $this->input->post('subtotal'),
                    'diskon'        => $this->input->post('diskon'),
                    'ongkir'        => $this->input->post('ongkir'),
                    'total_bayar'   => $this->input->post('total_bayar') 
                );
                $this->m_transaksi->add_sales($data);


                foreach($this->cart->contents() as $items){
                    $rincian_produk = array(
                        'sales_id'      => $id,
                        'barang_id'     => $items['barang_id'],
                        'harga_bandrol' => $items['price'],
                        'qty'           => $items['qty'],
                        'diskon_pct'    => $items['diskon_pct'],
                        'diskon_nilai'  => $items['diskonrp'],
                        'harga_diskon'  => $items['harga_diskon'],
                        'total'         => $items['total'],
                    );  
                    $this->m_transaksi->add_sales_date($rincian_produk);
                }
                	$this->cart->destroy();
                redirect('transaksi');
               
            }
            redirect('transaksi');           
        }

    public function detail($id, $kode)
    { 
        $data = array(
            'title'            => 'AA Launcdry',
            'detail_transaksi' => $this->m_transaksi->detail($id),
            'kode'             => $kode,
            'isi'              => 'transaksi/v_detail'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE); 
    }

}

/* End of file Controllername.php */
