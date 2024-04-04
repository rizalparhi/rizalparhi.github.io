<?php 

class Penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model('M_pelanggan');
        $this->load->model('M_penjualan');
        $this->load->model('M_barang');
        $this->load->model('M_cabang');

       
        
    }

    function index($rowno = 0)
    {

        $no_faktur="";
        $nama_pelanggan="";
        $dari="";
        $sampai="";
        if(isset($_POST['submit'])){
            $no_faktur=$this->input->post('no_faktur');
            $nama_pelanggan=$this->input->post('nama_pelanggan');
            $dari=$this->input->post('dari');
            $sampai=$this->input->post('sampai');
            $data= array(
                'no_faktur'=>$no_faktur,
                'nama_pelanggan'=>$nama_pelanggan,
                'dari'=>$dari,
                'sampai'=>$sampai
            );
            //data di atas di masukan ke dalam session agar tidak hilang saat pindah halaman
            $this->session->set_userdata($data);
        }else{
          if($this->session->userdata('no_faktur') != NULL){
            $no_faktur=$this->session->userdata('no_faktur');
           
          };
          if($this->session->userdata('nama_pelanggan') != NULL){
            $nama_pelanggan=$this->session->userdata('nama_pelanggan');
           
          };
          if($this->session->userdata('dari') != NULL){
            $dari=$this->session->userdata('dari');
           
          };
          if($this->session->userdata('sampai') != NULL){
            $sampai=$this->session->userdata('sampai');
           
          };
        }
           	$rowperpage = 10;
		        // Row position
		        if ($rowno != 0) {
			      $rowno = ($rowno - 1) * $rowperpage;
		        }
              $jumlahdata    = $this->M_penjualan->getDatapenjualanCount($no_faktur,$nama_pelanggan,$dari,$sampai)->num_rows();
			// Get records
			        $datapenjualan = $this->M_penjualan->getDatapenjualan($rowno, $rowperpage, $no_faktur,$nama_pelanggan,$dari,$sampai)->result();
              $config['base_url']         = base_url() . 'penjualan/index';
              $config['use_page_numbers'] = TRUE;
              $config['total_rows']       = $jumlahdata;
              $config['per_page']         = $rowperpage;
              $config['first_link']       = 'First';
              $config['last_link']        = 'Last';
              $config['next_link']        = 'Next';
              $config['prev_link']        = 'Prev';
              $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
              $config['full_tag_close']   = '</ul></nav></div>';
              $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
              $config['num_tag_close']    = '</span></li>';
              $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
              $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
              $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
              $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
              $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
              $config['prev_tagl_close']  = '</span>Next</li>';
              $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
              $config['first_tagl_close'] = '</span></li>';
              $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
              $config['last_tagl_close']  = '</span></li>';
              // Initialize
              $this->pagination->initialize($config);
              $data['pagination'] = $this->pagination->create_links();
              $data['penjualan'] = $datapenjualan;
              $data['row'] = $rowno;

              $data['no_faktur']=$no_faktur;
              $data['nama_pelanggan']=$nama_pelanggan;
              $data['dari']=$dari;
              $data['sampai']=$sampai;



              // $data['penjualan']=$this->M_penjualan->getDatapenjualan()->result();
              $this->load->view('template/header');
              $this->load->view('template/sidebar');
              $this->load->view('template/footer');
              $this->load->view('penjualan/v_penjualan',$data);
    }

    function inputPenjualan()
    {
        // Membuat No Faktur Otomatis ----------------------------------
          $data=array(
            'no_faktur'=>$this->M_penjualan->cetakFaktur()
          );
        // ------------------------------------------------------------- 

   
         $data['pelanggan']=$this->M_pelanggan->getDataPelanggan()->result();  

         
         $data['harga']=$this->M_barang->getDataHarga(); 

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
        $this->load->view('penjualan/inputpenjualan',$data);


    }
 
    function getJatuhTempo()
    {
        //  $tgltransaksi     = $this->input->post('tgltransaksi');
         $jatuhtempo = date('Y/m/d', strtotime("+1 month", strtotime(date($_POST['tran']))));
         echo $jatuhtempo;
    }

    function cekBarang()
    {
        $jumlahdatabarang=$this->M_penjualan->cekBarang()->num_rows();

        echo  $jumlahdatabarang;
    }

    function simpanbarangtemp()
    {
      
        $kode_barang = $this->input->post('kode_barang');
        $jenis_harga= $this->input->post('jenis_harga');
        $harga_modal = $this->input->post('harga_modal');
        $harga_bakul= $this->input->post('harga_bakul');
        $harga = $this->input->post('harga');
        $qty = $this->input->post('qty');
        $id_user = $this->session->userdata('id_user');
        $stokbarang = $this->input->post('stokbarang');
        $kode_harga = $this->input->post('kode_harga');


        $cekbarangtemp = $this->M_penjualan->cekBarangtemp($kode_barang,$id_user)->num_rows();
        if($cekbarangtemp > 0 ){
          echo "1";
        }else if($qty>$stokbarang){
          echo "2";
          
        
        }else{
          $data=array(
            'kode_barang' => $kode_barang,
            'harga_modal' => $harga_modal,
            'harga_bakul' => $harga_bakul,
            'harga' => $harga,
            'qty' => $qty,
            'id_user' =>$id_user,
            'stokbarang' => $stokbarang,
            'kode_harga' => $kode_harga,
            'jenis_harga' =>$jenis_harga,

          );

             $simpan=$this->M_penjualan->insertBarangtemp($data);
        }

    }

    function getDatabarangtemp()
    {
      $id_user= $this->session->userdata('id_user');
      $jenis_harga=$this->input->post('jenis_harga');
      $data['barangtemp']=$this->M_penjualan->getDatabarangtemp($id_user,$jenis_harga)->result();
  
    
      $this->load->view('penjualan/penjualan_detail_temp',$data);

    }

    function hapusBarangtemp()
    {
      $kode_barang = $this->input->post('kodebarang');
      $id_user = $this->input->post('iduser');
      $hapus = $this->M_penjualan->deleteBarangtemp($kode_barang, $id_user);
      echo $hapus;
    }

    function simpanpenjualan()
    {
      $no_faktur=$this->input->post('no_faktur');
      $tgltransaksi=$this->input->post('tgltransaksi');
      $kode_pelanggan=$this->input->post('kode_pelanggan');
      $jenistransaksi=$this->input->post('jenistransaksi');
      $jatuhtempo=$this->input->post('jatuhtempo');
      $id_user=$this->input->post('id_user');
      $kode_cabang=$this->input->post('kode_cabang');


    //  -------------------JIKA KODE PELANGGAN TIDAK DI INPUT------------------------------
    if($kode_pelanggan==""){

               if($this->session->userdata('level')=="karyawan toko") { 
                  $kode_pelanggan="PLG00001"; 
                       

                  }else if($this->session->userdata('level')=="administrator"){  
                  $kode_pelanggan="PLG00001"; 
                        
              }
    }
             

    // ------------------------------------------------------

      $data=array(
       'no_faktur' => $no_faktur,
       'tgltransaksi'=>$tgltransaksi,
       'kode_pelanggan'=>$kode_pelanggan,
       'jenistransaksi'=>$jenistransaksi,
       'jatuhtempo'=>$jatuhtempo,
       'id_user' =>$id_user,
       'kode_cabang' =>$kode_cabang
      );
      //untuk mencari di detail tmporary yang di input oleh si id user tersebut untuk di masukan ke tb detail penjualan
      $simpan=$this->M_penjualan->insertPenjualan($data,$jenistransaksi,$id_user);

      
     

    }

    function hapuspenjualan()
    {
        $no_faktur = $this->uri->segment(3);
        $hapus=$this->M_penjualan->deletePenjualan($no_faktur);
    }

    function cetakpenjualan()
    {
        $no_faktur = $this->uri->segment(3);
        $data['penjualan']=$this->M_penjualan->getPenjualan($no_faktur)->row_array();
        $data['detail']=$this->M_penjualan->getDetailpenjualan($no_faktur)->result();

        $this->load->view('penjualan/cetak_penjualan',$data);
    }

    function detailfaktur()
    {
        $no_faktur = $this->uri->segment(3);
        $data['penjualan']=$this->M_penjualan->getPenjualan($no_faktur)->row_array();
        $data['detail']=$this->M_penjualan->getDetailpenjualan($no_faktur)->result();
        $data['bayar']=$this->M_penjualan->getBayar($no_faktur)->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
        $this->load->view('penjualan/detailfaktur',$data);
    }

    function inputbayar()
    {
      $data['no_faktur'] = $this->input->post('no_faktur');
      $data['grandtotal'] = $this->input->post('grandtotal');
      $data['totalbayar'] = $this->input->post('totalbayar');
      $data['totalmodal'] = $this->input->post('totalmodal');

    
      
      $this->load->view('penjualan/input_bayar',$data);
    }

    function simpanbayar()
    {

      $this->M_penjualan->insertBayar();
      $this->M_penjualan->inputModalHistoibayar();
    }

    function hapusBayar()
    {
      $nobukti = $this->uri->segment(3);
      $no_faktur = $this->uri->segment(4);
      $this->M_penjualan->deleteBayar($nobukti, $no_faktur);

    } 


    function laporanpenjualan()
    {
        $data['cabang']=$this->M_cabang->getDataCabang()->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
        $this->load->view('penjualan/form_laporan_penjualan',$data);
    }

    function cetakLaporanPenjualan()
    {
      $cabang =  $this->input->post('cabang');
      $dari   =  $this->input->post('dari');
      $sampai =  $this->input->post('sampai');
      $data['cabang']=$cabang;
      $data['dari']=$dari;
      $data['sampai']=$sampai;
      $data['laporanpnj']= $this->M_penjualan->getLaporanPenjualan($cabang , $dari, $sampai)->result();

      // file excel----------------------------------------------------------------
        if(isset($_POST['export'])){
          // Fungsi header dengan mengirimkan raw data excel
            header("Content-type: application/vnd-ms-excel");

          // Mendefinisikan nama file ekspor "hasil-export.xls"
            header("Content-Disposition: attachment; filename=Laporan Penjualan.xls");
        }

        $this->load->view('penjualan/cetakLaporanPenjualan',$data);
    }

}    