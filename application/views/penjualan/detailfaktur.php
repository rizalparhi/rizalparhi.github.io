<!-- Content Wrapper. Contains page content -->
<style>

</style>
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content">
            <div class="container-fluid">
                <!-- -------------------------- Tag WARPER HEADER -------------------->
                 <?php echo $this->session->flashdata('msg'); ?>
                


                <h2 class="page-title mb-3"> DATA FAKTUR </h2>
         
                <form id="formpenjualan" method="POST" action="<?php echo base_url();?>penjualan/simpanpenjualan" >
                    <!-- Cek barang untuk validasi ketika barang kosong supaya tidak bisa di input -->
                    <input type="hidden" id="cekBarang">



                    <div class="row">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body ">

                                    
                                   <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>No Faktur</th>
                                        <th><?php echo $penjualan['no_faktur']; ?></th>
                                    </tr>
                                     <tr>
                                        <th>Tanggal Transaksi</th>
                                        <th><?php echo $penjualan['tgltransaksi']; ?></th>
                                    </tr>
                                     <tr>
                                        <th>Kode Pelanggan</th>
                                        <th><?php echo $penjualan['kode_pelanggan']; ?></th>
                                    </tr>
                                     <tr>
                                        <th>Nama Pelanggan</th>
                                        <th><?php echo $penjualan['nama_pelanggan']; ?></th>
                                    </tr>
                                      <tr>
                                        <th>Jenis Transaksi</th>
                                        <th><?php echo $penjualan['jenistransaksi']; ?></th>
                                    </tr>
                                    <?php if($penjualan['jenistransaksi']=="kredit") { ?>
                                    
                                    <tr>
                                        <th>Jatuh Tempo</th>
                                        <th><?php echo $penjualan['jatuhtempo']; ?></th>
                                    </tr>
                                    
                                    <?php } ?>
                                   </table>


                                </div>
                            </div>
                        </div>


                        <div class="col-md-7 col-xl-7">
                            <div class="card card-sm">
                                <div class="card-body d-flex align-items-center">
                                    <span class="bg-blue text-white avatar mr-3" style="height:12rem; width:12rem">
                                        <i class="fa fa-shopping-cart mx-5 mt-5" style="font-size:5rem"> </i>
                                    </span>
                                    <div class="mr-3">
                                      
                                        <h2 id="totalpenjualan" style="font-size:5rem">0</h2>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header ">
                                    <h4 class="card-title ">Data Barang</h4>
                                </div>
                                <div class="card-body">
                                    
                                        
                                     

                                    <div class="row">
                                        <table class="table table-bordered table-striped">
                                            <thead class="thead-dark">
                                                <tr align="center">
                                                    <th>NO</th>
                                                    <th>KODE BARANG</th>
                                                    <th>NAMA BARANG</th>
                                                    <th>HARGA</th>
                                                    <th>QTY</th>
                                                    <th>TOTAL</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                  $no=1;
                                                  $grandtotal=0;
                                                  foreach($detail as $d) { 
                                                     $hargamodal=$d->harga_modal* $d->qty;
                                                     $totalharga = $d->harga * $d->qty;
                                                     $grandtotal += $totalharga;
                                                ?>   
                                                  <tr>
                                                    <td align="center"><?php echo $no++; ?></td>
                                                    <td align="center"><?php echo $d->kode_barang; ?></td>
                                                    <td align="center"><?php echo $d->nama_barang; ?></td>
                                                    <td align="right"><?php echo "Rp ".number_format($d->harga,'0','','.'); ?></td>
                                                    <td align="center"><?php echo $d->qty; ?></td>
                                                    <td align="right"><?php echo "Rp ".number_format($totalharga,'0','','.'); ?></td>
                                           
                                             

                                                  </tr>

                                                <?php } ?>
                                            </tbody>
                                            <tfoot >
                                                <tr>
                                                    <th colspan="5" style="color: green;"> GRAND TOTAL / TOTAL PEMBELANJAAN </th>
                                                    <th style="text-align:right; color: green;" id="grandtotal"><?php echo "Rp ".number_format($grandtotal,'0','','.'); ?></td></th>
                                            
                                                </tr>
                                            </tfoot>
                                           

                                        </table>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header ">
                                    <h4 class="card-title ">Histori Bayar</h4>
                                </div>
                                
                                <div class="card-body">
                                      <?php echo $this->session->flashdata('hpshistoribayar'); ?>

                                    <?php if($penjualan['jenistransaksi']=="kredit"){ ?>
                                    <div>
                                        <a href="#" class="btn btn-primary mb-3" id="bayar"><i class="fa fa-credit-card mr-3"></i>Bayar</a>
                                    </div>
                                    <?php } 
                                  
                                     ?>
                                     <table class="table table-bordered table-striped">
                                         <thead class="thead-dark">
                                                <tr align="center">
                                                    <th>NO</th>
                                                    <th>No Bukti</th>
                                                    <th>Tanggal Bayar</th>
                                                    <th>Jumlah Bayar</th>
                                          

                                                    <th>Aksi</th>
                                                </tr>
                                        </thead>
                                        <?php
                                                  $no=1;
                                                  $totalbayar=0;
                                                  $sisa_bayar =0;
                                                  foreach($bayar as $b) {
                                                    $totalbayar= $totalbayar + $b->bayar;
                                                    $sisa_bayar += $b->bayar;
                                                    ?>
                                               <tr>
                                                    <td><?php echo $no++;?></td>
                                                    <td><?php echo $b->nobukti; ?></td>
                                                    <td><?php echo $b->tglbayar; ?></td>
                                                    <td align="right"><?php echo "Rp ".number_format($b->bayar,'0','','.'); ?></td>
                                    
                                                    <td align="center">
                                                        <a href="<?php echo base_url()?>penjualan/hapusBayar/<?php echo $b->nobukti;?>/<?php echo $penjualan['no_faktur'];?>"
                                                          class="btn btn-danger btn-sm mb-3"
                                                          onclick="javascript: return confirm('Anda yakin ingin Menghapus data ?')">
                                                        <i class=" fas fa-trash"></i></a>
                                                    </td>
                                               </tr>
                                                       
                                                       <?php } ?>
                                               <tr>
                                                    <?php ?>

                                                    <th colspan="3" >TERBAYAR</th>
                                                    <th style="text-align:right" id="sisa_bayar"><?php echo "Rp ".number_format($totalbayar,'0','','.'); ?></td></th>
                                            
                                                </tr>
                                                <tr>
                                                    <?php $sisa_bayar= $grandtotal-$sisa_bayar ?>

                                                    <th colspan="3" style="color: red;" >SISA BAYAR</th>
                                                    <th style="text-align:right; color: red;" id="sisa_bayar"><?php echo "Rp ".number_format($sisa_bayar,'0','','.'); ?></td></th>
                                            
                                                </tr>
                                


                                     </table>

                                     <form>
                                       



                                        <input type="hidden" value="<?php echo $sisa_bayar;?>" >
                                        <input type="hidden" name="harga_modal" value="<?php echo  $hargamodal;?>" >
                               


                                     </form>


                                </div>
                            </div>
                        </div>
                    </div>

                </form>



<!-- Modal DATA PEMBAYARAN-->
<div class="modal fade " id="modalbayar" tabindex="-1" role="dialog" aria-labelledby="tambahbarangLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="tambahPelanggan">Input Bayar</h2>
                <button type="button" class="ms-2 btn btn-danger btn-sm close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                 <div id="loadforminputbayar"></div>

            </div>

        </div>
    </div>
</div>















<script>
    $(function(){
        var grandtotal =$("#grandtotal").text();
        var sisa_bayar =$("#sisa_bayar").text();
        
     

        $("#totalpenjualan").text(grandtotal);

        $("#bayar").click(function(){
            var no_faktur ="<?php echo $penjualan['no_faktur']; ?>";
            // <!-- Karena di atas memakai titik  format number $grandtotal nya maka di bawah buat input hidden -->
            var grandtotal ="<?php echo $grandtotal; ?>";
            var totalbayar ="<?php echo $totalbayar; ?>";
            var totalmodal="<?php  echo  $hargamodal; ?>";

            $("#modalbayar").modal("show");
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>penjualan/inputbayar',
                data:{
                    no_faktur : no_faktur,
                    grandtotal : grandtotal,
                    totalbayar : totalbayar,
                    totalmodal : totalmodal

                },
                cache : false,
                success : function(respond){
                    $("#loadforminputbayar").html(respond);
                }
            });
        });


        $().change(function(){ 




        });
    });

</script>