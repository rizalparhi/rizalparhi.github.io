<?php 

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model('M_pelanggan');
        $this->load->model('M_penjualan');
        $this->load->model('M_cabang');
        
    }

    function index()
    {
        // memanggil data dari databsae untuk di tampilkan di V dashboard
        $data['jmlpelanggan']= $this->M_pelanggan->getDataPelanggan()->num_rows();
        $data['jmlpenjualan']= $this->M_penjualan->getDatapenjualanhariini()->num_rows();
        $data['keuntungan']=$this->M_penjualan->getKeuntunganHariIni()->result();
        $data['jmlcabang']= $this->M_cabang->getDataCabang()->num_rows();
        $data['jmlbayar']= $this->M_penjualan->getBayarhariini()->row_array();
       

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dashboard/dashboard',$data);
        $this->load->view('template/footer');
    }
    
}    