<?php 

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model('M_barang');
        $this->load->model('M_cabang');

        
        

        $this->form_validation->set_message(array(
            'required'    => '%s Tidak Boleh Kosong',
            'is_unique'   => '%s Sudah Ada',
            // 'numeric'     => '%s Harus Berupa Angka',
            // 'max_length'  => 'Jumlah %s Maximal {param}',
            // 'valid_email' => '%s Harus berupa email yang valid! contoh "aa@gmail.com"'
        ));
    }

    function index()
    {
        
          $data=array(
            'kode_barang'=>$this->M_barang->cetakKodebarang()
          );
        
        
        $data['barang']=$this->M_barang->getDataBarang(); 
        $data['supplier']=$this->M_barang->getDatasupplier()->result(); 

      
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('barang/v_barang',$data);
        $this->load->view('template/footer');
       
    }   

    function simpanbarang()
    {
        $this->form_validation->set_rules('namabarang','nama barang','required');

        $kode_barang=$this->input->post('kode_barang');
        $namabarang=$this->input->post('namabarang');
        $satuan=$this->input->post('satuan');
        $supplier=$this->input->post('supplier');


        $data=array(
            'kode_barang' =>$kode_barang,
            'nama_barang'=>$namabarang,
            'satuan'=>$satuan,
            'supplier'=>$supplier
        );

        if($this->form_validation->run() !=false){
             $this->M_barang->insertbarang($data);
             $this->session->set_flashdata('message','<div class="alert alert-succes alert-dismissible fade show" role="alert">
             <i class="far fa-thumbs-up"></i>
              Data Barang Berhasil Di Tambahkan
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>');
             redirect('Barang'); 
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
         
               <i class="far  fa-times-circle"></i>   Data Barang Gagal Di Tambahkan, Pastikan tidak ada data yang kosong!!
             
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('Barang');
             
        }
    }

        
    function hapus_barang($kodebarang)
    {
        $where=array('kode_barang'=>$kodebarang);
        $hapus=$this->M_barang->hapus_barang($where,'barang_master');

        if($hapus==1){
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert">
              Data Barang Berhasil Di Hapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
         redirect('Barang'); 
        };

    }  

    function btn_edit_barang($kodebarang)
    {
        $where=array('kode_barang'=>$kodebarang);
        $data['barang']=$this->M_barang->btn_edit_barang($where,'barang_master');
        $data['supplier']=$this->M_barang->getDatasupplier()->result_array(); 
        $this->load->view('barang/editbarang',$data);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('barang/editbarang',$data);
        $this->load->view('template/footer');

        
        

    }

    function update_barang()
    {

        $this->form_validation->set_rules('namabarang','nama barang','required');

        $kodebarang=$this->input->post('kodebarang');
        $namabarang=$this->input->post('namabarang');
        $satuan=$this->input->post('satuan');
        $supplier=$this->input->post('supplier');

        $data=array(
            'nama_barang'=>$namabarang,
            'satuan'=>$satuan,
            'supplier' => $supplier
        );
       

            $where=array('kode_barang'=>$kodebarang);

        if($this->form_validation->run() !=false){
            $this->M_barang->update_barang($where,$data,'barang_master');
             $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
             <i class="far fa-thumbs-up"></i>
              Data Barang Berhasil Di Ubah
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
             redirect('Barang'); 
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
         
               <i class="far fa-ban"></i>   Data Barang Gagal Di Rubah, Pastikan tidak ada data yang kosong!!
             
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('Barang');
             
        }

    }

    
    function harga()
    {
        $data['harga']=$this->M_barang->getDataHarga(); 
        $data['barang']=$this->M_barang->getDataBarang();
        $data['cabang']=$this->M_cabang->getdataCabang()->result();

         
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('barang/v_harga',$data);
        $this->load->view('template/footer'); 
    }  

    function inputBarangHarga()
    {
         $data['barang']=$this->M_barang->getDataBarang(); 
    
      

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('barang/daftarBarang',$data);
        $this->load->view('template/footer'); 
    }

    function inputharga()
    {
       $this->form_validation->set_rules('kode_harga','kode_harga','required|is_unique[barang_harga.kode_harga]');
       $this->form_validation->set_rules('kode_barang','kode_barang','required');
       $this->form_validation->set_rules('harga','harga','required');
       $this->form_validation->set_rules('stok','stok','required');
       $this->form_validation->set_rules('kode_cabang','kode_cabang','required');


        $kode_harga=$this->input->post('kode_harga');
        $kode_barang=$this->input->post('kode_barang');
        $harga=$this->input->post('harga');
        $stok=$this->input->post('stok');
        $kode_cabang=$this->input->post('kode_cabang');
        $tgl_masuk=$this->input->post('tgl_masuk');

        $data=array(
            'kode_harga'=>$kode_harga,
            'kode_barang'=>$kode_barang,
            'harga'=>$harga,
            'stok'=>$stok,
            'kode_cabang'=>$kode_cabang
        );

        $where=array(
            'kode_barang'=>$kode_barang
        );


        $barang=$this->M_barang->getDataBarangInput($where,'barang_master');
        foreach($barang->result() as $b){
           
        $data1=array(
            'nama_barang'=>$b->nama_barang,
            'supplier'=>$b->supplier,
            'tmbhstok'=>$stok,
            'tgl_masuk'=>$tgl_masuk,
            'kode_cabang'=>$kode_cabang
        );
      
        };
      

        if($this->form_validation->run() !=false){
             $this->M_barang->insertharga($data);
             $this->M_barang->barangMasuk($data1);
             $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
             <i class="far fa-thumbs-up"></i>
              Data Harga Berhasil Di Tambahkan
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('barang/harga');
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
         
               <i class="far  fa-times-circle"></i>   ' . validation_errors() . '
             
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('barang/harga');
             
        }

    }

    function tambahHarga()
    {
        $data['harga']=$this->M_barang->getDataHarga(); 
        $data['barang']=$this->M_barang->getDataBarang();
        $data['cabang']=$this->M_cabang->getdataCabang()->result();

       
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('barang/tambah_harga',$data);
        $this->load->view('template/footer'); 

    }

    function editHarga($kode_harga)
    {
        $where=array('kode_harga'=>$kode_harga);
        $data['barang']=$this->M_barang->getDataBarang();
        $data['cabang']=$this->M_cabang->getdataCabang()->result();
        $data['harga']=$this->M_barang->editHarga($where,'barang_harga');
      

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('barang/editharga',$data);
        $this->load->view('template/footer');
    }

    function updateDataHarga()
    {
       $this->form_validation->set_rules('harga','harga','required');
       $this->form_validation->set_rules('stok','stok','required');
        $kode_harga=$this->input->post('kode_harga');
        $harga=$this->input->post('harga');
        $stok=$this->input->post('stok');
        $data=array(
         
            'harga'=>$harga,
            'stok'=>$stok,
            
        );
        $where=array('kode_harga'=>$kode_harga);

        if($this->form_validation->run() !=false){
            $this->M_barang->updateDataHarga($where,$data,'barang_harga');
             $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
             <i class="far fa-thumbs-up"></i>
              Data Harga Berhasil Di Ubah
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
             redirect('barang/harga'); 
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
         
               <i class="far fa-ban"></i>   Data Harga Gagal Di Rubah, Pastikan tidak ada data yang kosong!!
             
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('barang/harga'); 
             
        }

    }

    function hapusDataHarga($kode_harga)
    {
        $where=array('kode_harga'=>$kode_harga);
        $hapus=$this->M_barang->hapusDataHarga($where,'barang_harga');

        if($hapus==1){
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert">
              Data Harga Berhasil Di Hapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
         redirect('barang/harga'); 
        };

    }  

    function supplier()
    {
        $data['supplier']=$this->M_barang->getDatasupplier()->result(); 
     

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('barang/v_supplier',$data);
        $this->load->view('template/footer');
    }

     function hapusDataSupplier($id_supplier)
    {
        $where=array('id_supplier'=>$id_supplier);
        $hapus=$this->M_barang->hapusDataSupplier($where,'supplier');

        if($hapus==1){
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert">
              Data Suppiler Berhasil Di Hapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
         redirect('barang/supplier'); 
        };

    }  

    function tambahDatasupplier()
    {
        $this->form_validation->set_rules('nama_supplier','nama Supplier','required');
        
        $nama_supplier=$this->input->post('nama_supplier');
        $alamat_supplier=$this->input->post('alamat_supplier');
        $no_telp=$this->input->post('no_telp');


        $data=array(
            'nama_supplier'=>$nama_supplier,
            'alamat_supplier'=>$alamat_supplier,
            'no_telp'=>$no_telp
        );

        if($this->form_validation->run() !=false){
             $this->M_barang->tambahDatasupplier($data);
             $this->session->set_flashdata('message','<div class="alert alert-succes alert-dismissible fade show" role="alert">
             <i class="far fa-thumbs-up"></i>
              Data Supplier Berhasil Di Tambahkan
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
              redirect('barang/supplier');  
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
         
               <i class="far  fa-times-circle"></i>   Data Supplier Gagal Di Tambahkan, Pastikan tidak ada data yang kosong!!
             
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
             redirect('barang/supplier'); 
        }
    }

    function btnEditDataSupplier($id_supplier)
    {
        $where=array('id_supplier'=>$id_supplier);
        $data['supplier']=$this->M_barang->btnEditDataSupplier($where,'supplier');
       

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('barang/editsupplier',$data);
        $this->load->view('template/footer');
    }

    function editDataSupplier()
   {
    
        $this->form_validation->set_rules('nama_supplier','nama supplier','required');
       
        $id_supplier=$this->input->post('id_supplier');
        $nama_supplier=$this->input->post('nama_supplier');
        $alamat_supplier=$this->input->post('alamat_supplier');
        $no_telp=$this->input->post('no_telp');

        $data=array(
         
            'nama_supplier'    => $nama_supplier,
            'alamat_supplier'  => $alamat_supplier,
            'no_telp'          => $no_telp

            
        );
        $where=array('id_supplier'=> $id_supplier);

        if($this->form_validation->run() !=false){
            $this->M_barang->editDataSupplier($where,$data,'supplier');
             $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
             <i class="far fa-thumbs-up"></i>
              Data Supplier Berhasil Di Ubah
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
             redirect('barang/supplier'); 
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
         
               <i class="far fa-ban"></i>   Data Supplier Gagal Di Ubah!!
             
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('barang/supplier'); 
             
        }
   }

    function tambahStok($kode_harga)
    {
        $where=array('kode_harga'=>$kode_harga);
        $data['barang']=$this->M_barang->getDataBarang();
        $data['cabang']=$this->M_cabang->getdataCabang()->result();
        $data['harga']=$this->M_barang->editHarga($where,'barang_harga');
        $this->load->view('barang/tambahStokbarang',$data);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('barang/tambahStokbarang',$data);
        $this->load->view('template/footer');
    }


    function historiBarangmasuk()
    {
       $this->form_validation->set_rules('tmbhstok','tmbhstok','required');
       $this->form_validation->set_rules('tgl_masuk','taggal Masuk','required');
       
        $kode_harga=$this->input->post('kode_harga');
        $nama_barang=$this->input->post('nama_barang');
        $supplier=$this->input->post('supplier');
        $stok=$this->input->post('stok');
        $tmbhstok=$this->input->post('tmbhstok');
        $tgl_masuk=$this->input->post('tgl_masuk');
        $kode_cabang=$this->input->post('kode_cabang');

        $data1=array(
           'nama_barang' => $nama_barang,
           'supplier' => $supplier,
           'tmbhstok' => $tmbhstok,
           'tgl_masuk' =>  $tgl_masuk,
           'kode_cabang' => $kode_cabang

        );

        $updatestok= $tmbhstok + $stok;

        $data=array(
            'stok'=> $updatestok
        );
        $where=array('kode_harga'=>$kode_harga);

        if($this->form_validation->run() !=false){
             $this->M_barang->barangMasuk($data1);
             $this->M_barang->updateDataHarga($where,$data,'barang_harga');

             $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
             <i class="far fa-thumbs-up"></i>
              Stok Barang Berhasil Di Tambahkan
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('barang/harga');
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
         
               <i class="far  fa-times-circle"></i>   Data Stok Barang Gagal Di Tambahkan !!
             
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('barang/harga'); 
        }
    }
    function formHistoribarang()
    {

        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('barang/form_historiBarang');
        $this->load->view('template/footer');
       

    }
    function barangMasuk()
    {    
        $json = file_get_contents("./assets/json/MOCK_DATA.json");
		$obj  = json_decode($json);
		$data = array(
			'list_data' => $obj
		);   
        $cabang=$this->session->userdata('kode_cabang');
        $data['barangmsk']= $this->M_barang->getDataBarangMasuk($cabang)->result();
        $this->load->view('barang/barang_masuk',$data);

        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('barang/barang_masuk',$data); 
        $this->load->view('template/footer');

    }
    function barangKeluar()
    {
        $json = file_get_contents("./assets/json/MOCK_DATA.json");
		$obj  = json_decode($json);
		$data = array(
			'list_data' => $obj
		);  
        $data['barangkeluar']= $this->M_barang->getDataBarangKeluar()->result();
      

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('barang/barang_keluar',$data);
        $this->load->view('template/footer');
    }
}   