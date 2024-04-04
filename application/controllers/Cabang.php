<?php 

class Cabang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model('M_cabang');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
        
    }

    function index()
    {

        $data['cabang']=$this->M_cabang->getdataCabang()->result();
        $this->load->view('cabang/v_cabang',$data);
    }

    function tambahDataCabang()
    {
        $this->form_validation->set_rules('kode_cabang','kode cabang','required');
        $this->form_validation->set_rules('nama_cabang','nama cabang','required');
        $this->form_validation->set_rules('alamat_cabang','alamat cabang','required');
        $this->form_validation->set_rules('telepon','telepon','required');

        $kode_cabang=$this->input->post('kode_cabang');
        $nama_cabang=$this->input->post('nama_cabang');
        $alamat_cabang=$this->input->post('alamat_cabang');
        $telepon=$this->input->post('telepon');

        $data=array(
             'kode_cabang'=>$kode_cabang,
             'nama_cabang'=> $nama_cabang,
             'alamat_cabang'=>$alamat_cabang,
             'telepon'=>$telepon
        );

        if($this->form_validation->run() !=false){
             $this->M_cabang->tambahDataCabang($data);
             $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
             <i class="far fa-thumbs-up"></i>
              Data Cabang Berhasil Di Tambahkan
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
             redirect('cabang/index'); 
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
         
               <i class="far  fa-times-circle"></i>   Data Cabang Gagal Di Tambahkan, Pastikan tidak ada data yang kosong!!
             
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('cabang/index');
             
        }
    }

    function hapusDataCabang($kode_cabang)
    {
        $where=array('kode_cabang'=>$kode_cabang);
        $hapus=$this->M_cabang->hapusDataCabang($where,'cabang');

        if($hapus==1){
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert">
              Data Cabang Berhasil Di Hapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
         redirect('cabang/index');
        };
    }

     function btnEditCabang($kode_cabang)
     {
        $where=array('kode_cabang'=>$kode_cabang);
        $data['cabang']=$this->M_cabang->btnEditCabang($where,'cabang');
        $this->load->view('cabang/v_editcabang',$data);
        

     }

    function editDataCabang()
    {

      
        $this->form_validation->set_rules('nama_cabang','nama cabang','required');
        $this->form_validation->set_rules('alamat_cabang','alamat cabang','required');
        $this->form_validation->set_rules('telepon','telepon','required');


        
        $kode_cabang=$this->input->post('kode_cabang');
        $nama_cabang=$this->input->post('nama_cabang');
        $alamat_cabang=$this->input->post('alamat_cabang');
        $telepon=$this->input->post('telepon');

        $data=array(
             'kode_cabang'=>$kode_cabang,
             'nama_cabang'=> $nama_cabang,
             'alamat_cabang'=>$alamat_cabang,
             'telepon'=>$telepon
        );
       
            $where=array('kode_cabang'=>$kode_cabang);

        if($this->form_validation->run() !=false){
             $this->M_cabang->editDataCabang($where,$data,'cabang');
             $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
             <i class="far fa-thumbs-up"></i>
              Data Berhasil Di Ubah
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>');
                redirect('cabang/index');
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
         
               <i class="far  fa-times-circle"></i>  Data Gagal Di Rubah, Pastikan tidak ada data yang kosong!!
             
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
             redirect('cabang/index');
             
        }
    }

}