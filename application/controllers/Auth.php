<?php

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
    }
    
    function login()
    {
        checklog();
        $this->load->view('auth/login');
    }

    function ceklogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $login = $this->M_auth->getlogin($username, $password);
        $ceklogin = $login->num_rows();
        //  num_rows unutk mengecek jmulah data,
        //  ada berapa data yang di temukan jika datanya da bernilai 1 sebalinya 0
        $datalogin = $login->row_array();
        $data = array(
            'id_user' => $datalogin['id_user'],
            'nama_lengkap' => $datalogin['nama_lengkap'],
            'username' => $datalogin['username'],
            'password' => $datalogin['password'],
            'level' => $datalogin['level'],
            'kode_cabang' => $datalogin['kode_cabang']
        );
        $this->session->set_userdata($data);


        if ($ceklogin == 1) {
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-warning alert-dismissible fade show" role="alert">
         
               <i class="far  fa-times-circle"></i>   Username atau Password Salah!!
             
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            redirect('auth/login');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
