<?php 

class M_penjualan extends CI_Model
{
    function cekBarang()
    {
        $id_user=$this->session->userdata('id_user');
        return $this->db->get_where('penjualan_detail_temp',array('id_user'=>$id_user));
    }

    function cetakFaktur()
    {
        $sql ="SELECT MAX(MID(no_faktur,9,4))AS no_faktur_no 
                FROM penjualan WHERE MID(no_faktur,3,6)=DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query=$this->db->query($sql);  
        
        if($query->num_rows() > 0){
            $row =$query->row();
            $n =((int)$row->no_faktur_no)+1;
            $no=sprintf("%'.04d",$n);
        }else{
            $no="0001";
        }
        $invoice ="TR".date('ymd').$no;
        return $invoice;
    }

    function cekBarangtemp($kode_barang,$id_user)
    {
        return $this->db->get_where('penjualan_detail_temp', array('kode_barang'=>$kode_barang,'id_user'=>$id_user));
    }

    function insertBarangtemp($data)
    {
        $this->db->insert('penjualan_detail_temp',$data);
    }

    function getDatabarangtemp($id_user,$jenis_harga){
        if($jenis_harga=="harga modal"){
            $this->db->select('penjualan_detail_temp.kode_barang,nama_barang,jenis_harga,harga_modal,harga_bakul,harga,qty,stokbarang, ( harga_modal * qty ) as total, id_user');
        }elseif ($jenis_harga=="harga bakul") {
            $this->db->select('penjualan_detail_temp.kode_barang,nama_barang,jenis_harga,harga_modal,harga_bakul,harga,qty,stokbarang, ( harga_bakul * qty ) as total, id_user');
        }else{
            $this->db->select('penjualan_detail_temp.kode_barang,nama_barang,jenis_harga,harga_modal,harga_bakul,harga,qty,stokbarang, ( harga * qty) as total, id_user');
        }
        $this->db->from('penjualan_detail_temp');
        $this->db->join('barang_master','penjualan_detail_temp.kode_barang = barang_master.kode_barang');
        $this->db->where('id_user', $id_user);
        return $this->db->get();
     }

    function deleteBarangtemp($kode_barang,$id_user)
    {
        $hapus=$this->db->delete('penjualan_detail_temp', array('kode_barang'=>$kode_barang, 'id_user'=>$id_user));
        if($hapus){
            return 1;
        }
    }

    function insertPenjualan($data)
    {
        $simpan=$this->db->insert('penjualan',$data);
        if($simpan){
            // kalau Berhasil simpan, data akan di cek apakah ada data yang di input oleh si user tersebut
            // kalau ada data akan di simpan 
            $detailpenjualan=$this->db->get_where('penjualan_detail_temp',array('id_user'=>$data['id_user']));//ambil data penjualn_detail_temp berdasarkan id User
            $totalpenjualan=0;
            $totalmodal=0;
            $berhasil=0;
            $error=0;
            foreach($detailpenjualan->result()as $b){ //data dari penjualn_detail_temp di inisalisa ke $b

                $totalpenjualan =$totalpenjualan +($b->qty*$b->harga);
                $totalmodal =$totalmodal + ($b->harga_modal*$b->qty);

                $datadetail=array(
                    //Tb penjualan_detail => tb penjualan_detail_temp  (data dari tb penjualan_detail_temp di masukan ke Tb penjualan_detail )
                      'no_faktur'         =>$data['no_faktur'],
                      'kode_barang'       =>$b->kode_barang,
                      'harga'             =>$b->harga, //harga eceran
                      'harga_modal'       =>$b->harga_modal,
                      'qty'               =>$b->qty
                );

               
                 $simpandetail=$this->db->insert('penjualan_detail',$datadetail);
                // jika terjadi eror diinputan $datadetail  maka kita batalkan inputanya

                // jika simpandetail berhasil maka stok barang akan di update unutuk di kurangi 
                if($simpandetail){
                    $berhasil++;

                // ------------------------------------- UPDATE STOK BARANG ---------------------------------------------------
                    $barang=$b->kode_harga;
                    $stok=$b->stokbarang - $b->qty;//untuk dimsukan/update di field stok tb barang_harga

                    $databarang=array(
                            'stok'       => $stok
                    );
                    $where=array('kode_harga'=>$barang);

                    $this->db->where($where);
                    $this->db->update('barang_harga',$databarang);

             
                }else{
                    $error++;
                }
            }
            if($error >0){
                $hapusdetailpenjualan=$this->db->delete('penjualan_detail',array('no_faktur'=>$data['no_faktur']));
                $hapusdatapenjualan=$this->db->delete('penjualan',array('no_faktur'=>$data['no_faktur']));

                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <i class="far fa-thumbs-up"></i>
                 Data Barang Gagal Di Simpan!!!!!!
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                 </div>');
            
            }
            else{
                $hapustemporary=$this->db->delete('penjualan_detail_temp',array('id_user'=>$data['id_user']));
                
                if($hapustemporary){ //jika hapus temprary dia atas berhasil maka kita insert data ke HISTORI BAYAR
                    if($data['jenistransaksi']=="tunai"){
                            $sql ="SELECT MAX(MID(nobukti,9,4))AS nobukti_no 
                            FROM historibayar WHERE MID(nobukti,3,6)=DATE_FORMAT(CURDATE(),'%y%m%d')";
                            $query=$this->db->query($sql); 

                            if($query->num_rows() > 0){
                                    $row =$query->row();
                                    $n =((int)$row->nobukti_no)+1;
                                    $no=sprintf("%'.04d",$n);
                            }else{
                                    $no="0001";

                            }
                                $nobukti ="BK".date('ymd').$no;
                              
                            $databayar=array(
                                'nobukti'=>$nobukti,
                                'no_faktur'=>$data['no_faktur'],
                                'tglbayar'=>$data['tgltransaksi'],
                                'bayar'=>$totalpenjualan,
                                'totalmodal'=>$totalmodal,
                                'id_user'=>$data['id_user']

                             );

                            $bayar=$this->db->insert('historibayar',$databayar);

                            if($bayar){

                                        // echo "<script>alert('Data Transaksi Berhasil Disimpan');window.location='".base_url('penjualan/inputpenjualan')."';</script>";

                                         $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                         <i class="far fa-thumbs-up"></i>Data Transaksi Berhasil Disimpan!!!!!!
                                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                         </div>');
                                      
                                         redirect('penjualan/inputpenjualan');
                                       
                            }else{
                                       $hapusdetailpenjualan=$this->db->delete('penjualan_detail',array('no_faktur'=>$data['no_faktur']));
                                       $hapusdatapenjualan=$this->db->delete('penjualan',array('no_faktur'=>$data['no_faktur']));

                                       $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                         <i class="far fa-thumbs-up"></i>Data Transaksi Gagal Di Simpan!!!!!!
                                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                         </div>');

                                        redirect('penjualan/inputpenjualan');
                                }
                   }else{

                                         // --------------------------------------
                                        // $cabang=$this->session->userdata('kode_cabang');
                                        // $cetakstruk=$this->db->get_where('penjualan',$cabang)->result();
                                        
                                        // // --------------------------------------
                           $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
                           <i class="far fa-thumbs-up"></i>Data Transaksi Berhasil Disimpan!! 
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           </div>');
                           redirect('penjualan/inputpenjualan');
                   }

                }else{
                    $hapusdetailpenjualan=$this->db->delete('penjualan_detail',array('no_faktur'=>$data['no_faktur']));
                    $hapusdatapenjualan=$this->db->delete('penjualan',array('no_faktur'=>$data['no_faktur']));

                    $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="far fa-thumbs-up"></i>Data Barang Gagal Di Simpan!!!!!!
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         </div>');

                          redirect('penjualan/inputpenjualan');
                }
            }
                       //manghapus data yang di inputkan oleh user dari tb penjualan_detail_temp
                       // $this->db->delete('penjualan_detail_temp',array('id_user'=>$data['id_user']));

                    //Cetak No Bukti Bayar
        }


    }

function getDatapenjualan($rowno, $rowperpage, $no_faktur,$nama_pelanggan,$dari,$sampai)
{
    //cari data
    if($no_faktur != ""){
        $this->db->where('penjualan.no_faktur',$no_faktur);
    };
    if($nama_pelanggan != ""){
         $this->db->like('nama_pelanggan',$nama_pelanggan);//Like = agar data yang mirip dengan yg di input ikut tampil
    };
    if($dari != ""){
        $this->db->where('tgltransaksi >=',$dari);
    };
    if($sampai != ""){
         $this->db->where('tgltransaksi <=',$sampai);
    };
    
    
    $cabang=$this->session->userdata('kode_cabang');
    //Iner join kedua tablenya harus ada datanya,
    $this->db->select('penjualan.no_faktur,tgltransaksi,penjualan.kode_pelanggan,nama_pelanggan,jenistransaksi,jatuhtempo,penjualan.id_user,nama_lengkap,totalpenjualan,totalbayar');
    if($cabang != "PST"){
         $this->db->where_in('penjualan.kode_cabang',$cabang);
    }


    $this->db->from('penjualan');
    $this->db->join('pelanggan','penjualan.kode_pelanggan = pelanggan.kode_pelanggan');

    $this->db->join('users','penjualan.id_user = users.id_user');
    $this->db->join('view_totalpenjualan','penjualan.no_faktur = view_totalpenjualan.no_faktur');
    //gunakan Left join sehingga walupun tidak ada datanya faktur tersebut akan tetap Tampil
    $this->db->join('view_totalbayar','penjualan.no_faktur = view_totalbayar.no_faktur','left');
    // $rowperpage=10 Data ,$rowno= halaman (di ambil dari bais terakhir)
    $this->db->limit($rowperpage,$rowno);
    return $this->db->get();

    }

    function getDatapenjualanCount($no_faktur,$nama_pelanggan,$dari,$sampai)
    {
       //cari data
        if($no_faktur != ""){
            $this->db->where('penjualan.no_faktur',$no_faktur);
        };
        if($nama_pelanggan != ""){
            $this->db->like('nama_pelanggan',$nama_pelanggan);//Like = agar data yang mirip dengan yg di input ikut tampil
        };
        if($dari !=""){
            $this->db->where('tgltransaksi >=',$dari);
        };
        if($sampai !=""){
            $this->db->where('tgltransaksi <=',$sampai); 
        }; 
        
        //Iner join kedua tablenya harus ada datanya, $this->
         $cabang=$this->session->userdata('kode_cabang');
            $this->db->select('penjualan.no_faktur,tgltransaksi,penjualan.kode_pelanggan,nama_pelanggan,jenistransaksi,jatuhtempo,penjualan.id_user,nama_lengkap,totalpenjualan,totalbayar');

            if($cabang != "PST"){
         $this->db->where_in('penjualan.kode_cabang',$cabang);
         }
            $this->db->from('penjualan');
            $this->db->join('pelanggan','penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
            $this->db->join('users','penjualan.id_user = users.id_user');
            $this->db->join('view_totalpenjualan','penjualan.no_faktur = view_totalpenjualan.no_faktur');
            //gunakan Left join sehingga walupun tidak ada datanya faktur tersebut akan tetap Tampil
            $this->db->join('view_totalbayar','penjualan.no_faktur = view_totalbayar.no_faktur','left');

            return $this->db->get();

    }

    function deletePenjualan($no_faktur)
    {
        $hapus=$this->db->delete('penjualan',array('no_faktur'=>$no_faktur));
        if($hapus){
        $hapusdetail=$this->db->delete('penjualan_detail',array('no_faktur'=>$no_faktur));

 
           if($hapusdetail){
                $historibayar=$this->db->delete('historibayar',array('no_faktur'=>$no_faktur));
                $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="far fa-close"></i>
                Data Transaksi Berhasil Dihapus!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span> </button>
                </div>');
                 redirect('penjualan'); 
            }
        }
    }

    function getPenjualan($no_faktur)
    {
        $this->db->select('penjualan.no_faktur,tgltransaksi,penjualan.kode_pelanggan,nama_pelanggan,alamat_pelanggan,jenistransaksi,jatuhtempo,penjualan.id_user,nama_lengkap
        as kasir');
        $this->db->from('penjualan');
        $this->db->join('pelanggan','penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
        $this->db->join('users','penjualan.id_user = users.id_user');
        $this->db->where('no_faktur',$no_faktur);
        return $this->db->get();
    }

    function getDetailpenjualan($no_faktur)
    {
        $this->db->select('penjualan_detail.kode_barang,nama_barang,penjualan_detail.harga,qty,satuan,harga_modal');
        $this->db->from('penjualan_detail');
        $this->db->join('barang_master','penjualan_detail.kode_barang = barang_master.kode_barang');
        $this->db->where('no_faktur',$no_faktur);
        return $this->db->get();
    }

    function getBayar($no_faktur)
    {
        
        return $this->db->get_where('historibayar',array('no_faktur'=>$no_faktur));

    }


       
    function insertBayar()
    {
        $id_user = $this->session->userdata('id_user');
        $no_faktur = $this->input->post('no_faktur');
        $tglbayar = $this->input->post('tglbayar');
        $jmlbayar = $this->input->post('jmlbayar');

        $grandtotal =$this->input->post('totalpenj');
        $totalbayar =$this->input->post('totalbayar');
        $totalmodal =$this->input->post('totalmodal');
        
        // rumus persentase
        // untuk mengehitung total persent = Jumlah bagian/toalkeseluruhan*100
        // unutk mengetahaui persentase dari sebuah nilai rumusnya = (persentase di bagi 100)*jumlah nilai 
        

        $persen=round(($totalbayar+$jmlbayar)/$grandtotal*100,2); 
        $persenToDesimal=round($persen/100,2); 
        $hargaModalTerbayar= $persenToDesimal*$totalmodal; 

        $sql ="SELECT MAX(MID(nobukti,9,4))AS nobukti_no
        FROM historibayar WHERE MID(nobukti,3,6)=DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query=$this->db->query($sql);

        if($query->num_rows() > 0){
        $row =$query->row();
        $n =((int)$row->nobukti_no)+1;
        $no=sprintf("%'.04d",$n);
        }else{
        $no="0001";
        }
        $nobukti ="BK".date('ymd').$no;

        $databayar=array(
        'nobukti'=>$nobukti,
        'no_faktur'=>$no_faktur,
        'tglbayar'=>$tglbayar,
        'bayar'=>$jmlbayar,
        'id_user'=>$id_user

        );

        $harga_modal=array(
              'totalmodal'=>$hargaModalTerbayar
        );

        $bayar=$this->db->insert('historibayar',$databayar);

        
        if($bayar){
        $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="far fa-close"></i> Data Berhasil Disimpan!! <button type="button" class="close"
                data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
        </div>');

        $this->db->where_in('historibayar.nobukti',[$nobukti]);
        $this->db->update('historibayar',$harga_modal);


        redirect('penjualan/detailfaktur/'. $no_faktur);

        }else{
        $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="far fa-close"></i> Data Gagal Disimpan!! <button type="button" class="close" data-dismiss="alert"
                aria-label="Close"><span aria-hidden="true">&times;</span> </button>
        </div>');
        redirect('penjualan/detailfaktur/'. $no_faktur);

        }
    }


        // Untuk Histori Bayar
    function deleteBayar($nobukti,$no_faktur)
    {

        $hapus=$this->db->delete('historibayar', array('nobukti' => $nobukti, 'no_faktur' => $no_faktur));

        if($hapus){

        // $this->db->get_where('penjualan',array('no_faktur'=>$no_faktur));

        $this->session->set_flashdata('hpshistoribayar','<div class="alert alert-success alert-dismissible fade show"
            role="alert">
            <i class="far fa-close"></i> History Bayar Berhasil Dihapus!! <button type="button" class="close"
                data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
        </div>');
        redirect('penjualan/detailfaktur/'. $no_faktur);

        }
    }

    //halaman from_laporan_penjualan
    function getLaporanPenjualan($cabang, $dari, $sampai)
    {

        if($cabang !=""){
        $this->db->where('users.kode_cabang', $cabang);
        }

        $this->db->where('tgltransaksi >=', $dari );
        $this->db->where('tgltransaksi <=', $sampai);
        $this->db->select('penjualan.no_faktur,tgltransaksi,penjualan.kode_pelanggan,nama_pelanggan,jenistransaksi,jatuhtempo,penjualan.id_user,nama_lengkap,totalpenjualan,totalbayar,totalmodal');
            $this->db->from('penjualan');
            $this->db->join('pelanggan','penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
            $this->db->join('users','penjualan.id_user = users.id_user');
            $this->db->join('view_totalpenjualan','penjualan.no_faktur = view_totalpenjualan.no_faktur');
            $this->db->join('view_totalbayar','penjualan.no_faktur = view_totalbayar.no_faktur','left');
            return $this->db->get();
    }


    function getDatapenjualanhariini()
    {
            $hariini=date("Y-m-d");
            if($this->session->userdata('kode_cabang')!=="PST")
            {
            $this->db->where('users.kode_cabang',$this->session->userdata('kode_cabang'));
            }

            $this->db->join('users','penjualan.id_user = users.id_user');

            return $this->db->get_where('penjualan',array('tgltransaksi' => $hariini));

    }

    function getBayarhariini()
    {
            $hariini =date("Y-m-d");
            $this->db->select("SUM(bayar) as totalbayar");
            $this->db->from('historibayar');
            $this->db->join('penjualan','historibayar.no_faktur = penjualan.no_faktur');
            $this->db->join('users','penjualan.id_user = users.id_user');
            $this->db->where('tglbayar', $hariini);
            
            return $this->db->get();
    }

    function getKeuntunganHariIni()
    {
            $hariini =date("Y-m-d");
            // $this->db->select("SUM(totalmodal) as totalmodal");
            $this->db->select("totalmodal");
            $this->db->from('historibayar');
            $this->db->join('penjualan','historibayar.no_faktur = penjualan.no_faktur');
            $this->db->join('users','penjualan.id_user = users.id_user');
            $this->db->where('tglbayar', $hariini);
            
            return $this->db->get();
    }





}