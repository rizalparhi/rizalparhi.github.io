<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>DATA TRANSAKSI PENJUALAN</b> </h1>
                </div>
            </div>
        </div>
    </div>



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Notifikasi aleret -->
            <!-- <?php 

            // echo $this->session->flashdata('msg'); ?> -->

            <div class="card">
                <div class="card-body">

                    <!-- Button trigger modal -->
                    <a href="<?php echo base_url();?>penjualan/inputpenjualan"  class="btn btn-primary btn  mb-3 mr-4" id="tambahpenjualan">
                       <i class=" fas fa-plus"></i>
                        Tambah Data
                    </a>

                    <form action="<?php echo base_url();?>penjualan/index" method="POST" id="cari">



                                  
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                                        </div>
                                        <input type="text"   name="no_faktur" id="no_faktur" class="form-control"
                                            placeholder="Cari Berdasarkan No Faktur" value="<?php echo $no_faktur; ?>" >
                                    </div>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                        </div>
                                        
                                        <input type="text"  class="form-control" name="nama_pelanggan"
                                            id="nama_pelanggan" placeholder="Cari Berdasarkan Nama Pelanggan"  value="<?php echo $nama_pelanggan; ?>">

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend date" data-provide="datepicker">
                                                     <span class="input-group-text"><i class="fas  fa-calendar"></i></span>
                                                </div>
                                                    <input type="date" name="dari" class="form-control" placeholder="Cari berdasar Tanggal Transaksi (Masukan Tanggal Mulai)" id="tglmulai"  value="<?php echo $dari; ?>" >
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend date" data-provide="datepicker">
                                                     <span class="input-group-text"><i class="fas  fa-calendar"></i></span>
                                                </div>
                                                    <input type="date" name="sampai" class="form-control" placeholder="Cari berdasar Tanggal Transaksi (Masukan Tanggal Akhir)" id="tglakhir" value="<?php echo $sampai; ?>" >
                                            </div> 
                                        </div>
                                    
                                    </div>
                                    <div class="mb-3">
                                        <!-- <div class="row">
                                            <div class="col-6">
                                                  <button id="btncari" type="submit" name="reset" class="btn btn-warning w-100"><i class="fa fa-search"></i> Kosongkan Form </button>
                                            </div>
                                            <div class="col-6">
                                                 <button id="btncari" type="submit" name="submit" class="btn btn-success w-100"><i class="fa fa-search"></i> Cari Data </button>
                                            </div>
                                            
                                        </div> -->
                                        <dic class="row">
                                             <button id="btncari" type="submit" name="submit" class="btn btn-success w-100"><i class="fa fa-search"></i> Cari Data </button>
                                        </dic>
                                       
                                       
                                    </div>




                    </form>
                 
         
                
                    <table class="table table-striped table-bordered" id="tableharga">
                        <!-- class=" " -->
                        <thead class="thead-dark">
                            <tr align="center" ;>
                                <th>NO</th>
                                <th>NO FAKTUR</th>
                                <th>TANGGAL</th>
                                <th>KODE PELANGGAN</th>
                                <th>NAMA PELANGGAN</th>
                                <th>JENIS TRANSAKSI</th>
                                <th>JATUH TEMPO</th>
                                <th>TOTAL PENJUALAN</th>
                                <th>TOTAL BAYAR</th>
                                <th>SISA BAYAR</th>
                                <th>KET</th>
                                <th>KASIR</th>
                                <th colspan="3">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            

                            $no=$row+1;
                            foreach($penjualan as $p){
                                $sisabayar = $p->totalpenjualan - $p->totalbayar;
                                if($sisabayar > 0){
                                    $ket="Belum Lunas";
                                    $warna= "bg-red";
                                }else{
                                    $ket ="Lunas";
                                    $warna= "bg-green";

                                };
                                if($p->totalbayar== null){
                                    $p->totalbayar=0;
                                }
                                ?>
                                <tr>
                                <td><?php echo $no++; ?></td>
                                <td> <a href="<?php echo base_url()?>penjualan/detailfaktur/<?php echo $p->no_faktur; ?>">
                                <?php echo $p->no_faktur; ?> </a></td>
                                <td><?php echo $p->tgltransaksi; ?></td>
                                <td><?php echo $p->kode_pelanggan; ?></td>
                                <td><?php echo $p->nama_pelanggan; ?></td>
                                <td><?php echo $p->jenistransaksi; ?></td>
                                <td><?php echo $p->jatuhtempo; ?></td>
                                <td ><?php echo "Rp ".number_format($p->totalpenjualan,'0','','.'); ?></td>
                                <td ><?php echo "Rp ".number_format($p->totalbayar,'0','','.'); ?></td>
                                <td ><?php echo "Rp ".number_format($p->totalpenjualan - $p->totalbayar,'0','','.'); ?></td>
                                <td align="center"><span class="badge <?php echo $warna; ?>"> <?php echo $ket; ?> </span></td>
                                <td><?php echo $p->nama_lengkap; ?></td>
                                <td>
                                   <a href="<?php echo base_url()?>penjualan/hapuspenjualan/<?php echo $p->no_faktur; ?>"
                                     class="btn btn-danger btn-sm mb-3 mx-auto"
                                     onclick="javascript: return confirm('Anda yakin ingin Menghapus Data Pelanggan?')">
                                     <i class=" fas fa-trash"></i></a>
                                </td>
                                <td>
                                     <a href="<?php echo base_url()?>penjualan/cetakpenjualan/<?php echo $p->no_faktur; ?>"
                                     target="_blank" class="btn btn-primary btn-sm mb-3 mx-auto">
                                     <i class=" fas fa-print"></i></a>
                                </td>
                                <td>
                                    <?php if($sisabayar != 0){ ?>
                                    <a href="<?php echo base_url()?>penjualan/detailfaktur/<?php echo $p->no_faktur; ?>"
                                      class="btn btn-success btn-sm mb-3 mx-auto">
                                    <i class="fa fa-credit-card "></i>  Bayar</a>
                                <?php } ?>
                                </td>

                                </tr>
                                


                            <?php } ?>
                        </tbody>
                       
                    </table>
                    <div>
                        <?php echo $pagination; ?>
                    </div>

                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>


<script>
// $('#tglmulai').datepicker({
//     format: 'yyyy/mm/dd',
//     todayHighlight: true,
//     autoclose: true,
    
// });

// $('#tglakhir').datepicker({
//     format: 'yyyy/mm/dd',
//     todayHighlight: true,
//     autoclose: true,
    
// // });
// $('#btncari'),onclick{
//     $('#cari').trigger("reset");
// }

</script>




