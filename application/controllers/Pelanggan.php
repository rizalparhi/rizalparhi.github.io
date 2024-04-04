<?php 

class Pelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model('M_pelanggan');
        $this->load->model('M_cabang');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
        
    }
    function index()
    {
        $data=array(
            'kode_pelanggan'=>$this->M_pelanggan->cetakKodepelanggan()
          );
        $data['pelanggan']=$this->M_pelanggan->getDataPelanggan()->result();
        //  Memanggil table cabang unutk memilih option/combobox value cabang 
        $data['cabang']=$this->M_cabang->getDataCabang()->result();
        $this->load->view('pelanggan/v_pelanggan',$data);
    }

    function simpanDataPelanggan()
    {
         
         $this->form_validation->set_rules('kode_pelanggan','kode pelanggan','required');
         $this->form_validation->set_rules('nama_pelanggan','nama pelanggan','required');
         $this->form_validation->set_rules('kode_cabang','kode cabang','required');

         $kode_pelanggan=$this->input->post('kode_pelanggan');
         $nama_pelanggan=$this->input->post('nama_pelanggan');
         $alamat_pelanggan=$this->input->post('alamat_pelanggan');
         $no_hp=$this->input->post('no_hp');
         $kode_cabang=$this->input->post('kode_cabang');

         $data=array(
              'kode_pelanggan'=>$kode_pelanggan,
              'nama_pelanggan'=>$nama_pelanggan,
              'alamat_pelanggan'=>$alamat_pelanggan,
              'no_hp'=>$no_hp,
              'kode_cabang'=>$kode_cabang
         );


        


          if($this->form_validation->run() !=false){

             $this->M_pelanggan->insertDataPelanggan($data);

             $this->session->set_flashdata('message','<div class="alert alert-primary alert-dismissible fade show" role="alert">
             <i class="far fa-thumbs-up"></i>
              Data Pelangan Berhasil Di Tambahkan
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>');
             redirect('pelanggan/index'); 
            }else{
               $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
          
                <i class="far  fa-times-circle"></i>  Data Pelangan Gagal Di Tambahkan, Pastikan tidak ada data yang kosong!!
             
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>');
               redirect('pelanggan/index'); 
            }
     }

     function hapusDataPelanggan($kode_pelanggan)
     {
            $where=array('kode_pelanggan'=>$kode_pelanggan);
            $hapus=$this->M_pelanggan->hapusDataPelanggan($where,'pelanggan');
           

            if($hapus==1){
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert">
             Data Berhasil Di Hapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('pelanggan/index'); 
            };
     }  


    function btnEditDataPelanggan($kode_pelanggan)
    {
        $where=array('kode_pelanggan'=>$kode_pelanggan);
        $data['pelanggan']=$this->M_pelanggan->getEditDataPelanggan($where,'pelanggan');
          //  Memanggil table cabang unutk memilih option/combobox value cabang 
        $data['cabang']=$this->M_cabang->getDataCabang()->result();
        $this->load->view('pelanggan/v_editPelanggan',$data);
    }


    function editDataPelanggan()
    {
         $this->form_validation->set_rules('kode_pelanggan','kode pelanggan','required');
         $this->form_validation->set_rules('nama_pelanggan','nama pelanggan','required');
        //  $this->form_validation->set_rules('kode_cabang','kode cabang','required');

         $kode_pelanggan=$this->input->post('kode_pelanggan');
         $nama_pelanggan=$this->input->post('nama_pelanggan');
         $alamat_pelanggan=$this->input->post('alamat_pelanggan');
         $no_hp=$this->input->post('no_hp');
         $kode_cabang=$this->input->post('kode_cabang');

         $data=array(
              'kode_pelanggan'=>$kode_pelanggan,
              'nama_pelanggan'=>$nama_pelanggan,
              'alamat_pelanggan'=>$alamat_pelanggan,
              'no_hp'=>$no_hp,
              'kode_cabang'=>$kode_cabang
         );

      
         $where=array('kode_pelanggan'=>$kode_pelanggan);

        if($this->form_validation->run() !=false){
            $this->M_pelanggan->editDataPelanggan($where,$data,'pelanggan');

             $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
             <i class="far fa-thumbs-up"></i>
              Data Pelanggan Berhasil Di Ubah
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>');
             redirect('pelanggan'); 
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
         
                <i class="far  fa-times-circle"></i>   Data Pelanggan Gagal Di Ubah, Pastikan tidak ada data yang kosong!!
             
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('pelanggan');    
        }
    }
}    