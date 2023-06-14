<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index(){
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
    
            if($this->form_validation->run() == false){
                $this->load->view('v_login','', false); 
            }else{
            // validasi success
            $this->_login();
        }
    }


    private function _login()
    {
        $username    = $this->input->post('username');
        $password = $this->input->post('password');
        $user     = $this->db->get_where('user', ['username'=> $username])->row_array();

        if($user){
            //jika usernya aktif
            if($user['is_active'] == 1){
                //cek password
                if(password_verify($password, $user['password'])){
                    $data = [
                        'username'   => $user['username'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] == 1){
                        redirect('transaksi','refresh');
                }
            }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong Password </div>');
            redirect('/','refresh');
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email has not been activated </div>');
            redirect('/','refresh');
        }
        }else{
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Email is Not registered </div>');
        redirect('/','refresh');  
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been logged out! </div>');
        redirect('/','refresh');
    }
}

/* End of file Controllername.php */
