<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>

            </div>
        </div>
    </div>




    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Notifikasi aleret -->










            <h1 class="page-title fs-4">
                Dashboard
            </h1>

            <div class="alert alert-success py-5" role="alert">
                <h1>

                    <i class="fa fa-user"></i>

                    Selamat Datang <b><?php echo $this->session->userdata('nama_lengkap'); ?></b>
                    sebagai
                    <b><?php if($this->session->userdata('level')=="administrator"){ echo  "Kepala Toko (administrator)";}else{  echo ucwords($this->session->userdata('level'));  } ?></b>
                </h1>
                <h1>

                    <i class="nav-icon fas fa-home"></i>

                    Kode Cabang <b><?php echo $this->session->userdata('kode_cabang'); ?></b>

                </h1>
            </div>

            <div class="row">
                <div class="col-md-6 col-xl-6">
                    <div class="card card-sm">
                        <div class="card-body d-flex align-items-center">

                            <span class="bg-red text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="7" r="4" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                </svg>
                            </span>
                            <div class="mr-3">
                                <div class="font-weight-medium">
                                    <?php echo $jmlpelanggan; ?> Pelanggan
                                </div>
                                <div class="text-muted">Data Pelanggan</div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-6">
                    <div class="card card-sm">
                        <div class="card-body d-flex align-items-center">
                            <span class="bg-blue text-white avatar mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="3" y1="21" x2="21" y2="21" />
                                    <line x1="3" y1="10" x2="21" y2="10" />
                                    <polyline points="5 6 12 3 19 6" />
                                    <line x1="4" y1="10" x2="4" y2="21" />
                                    <line x1="20" y1="10" x2="20" y2="21" />
                                    <line x1="8" y1="14" x2="8" y2="17" />
                                    <line x1="12" y1="14" x2="12" y2="17" />
                                    <line x1="16" y1="14" x2="16" y2="17" />
                                </svg>
                            </span>
                            <div class="mr-3">
                                <div class="font-weight-medium">
                                    <?php echo $jmlcabang; ?> Cabang
                                </div>
                                <div class="text-muted">Jumlah Cabang & Gudang</div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>



            <div class="row">
                <div class="col-md-6 col-xl-6">
                    <div class="card card-sm">
                        <div class="card-body d-flex align-items-center">
                            <span class="bg-green text-white avatar mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="9" cy="19" r="2" />
                                    <circle cx="17" cy="19" r="2" />
                                    <path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" />
                                </svg>
                            </span>
                            <div class="mr-3">
                                <div class="font-weight-medium">
                                    <?php echo $jmlpenjualan; ?> Transaksi
                                </div>
                                <div class="text-muted">Transaksi Hari ini</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-6">
                    <div class="card card-sm">
                        <div class="card-body d-flex align-items-center">
                            <span class="bg-blue text-white avatar mr-3">

                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>

                            </span>
                            <div class="mr-3">
                                <div class="font-weight-medium">
                                    <?php 
                                    if($jmlbayar['totalbayar']== 0){
                                        echo "0";
                                    }else{
                                                echo "Rp ".number_format($jmlbayar['totalbayar'],'0','','.'); 
                                    }
                                  ?>
                                </div>
                                <div class="text-muted">Pendapatan Hari ini</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <div class="card mt-1"> 

              <div class="col-md-6 col-xl-6">
                <div class="card card-sm">
                    <div class="card-body d-flex align-items-center">
                        <span class="bg-warning text-white avatar px-1 py-1 mr-3">

                            <i class="fas  fa-credit-card"></i>

                        </span>
                        <div class="mr-3">
                            <div class="font-weight-medium">
                                <?php  
                                  $modal=0;
                                   foreach($keuntungan as $k){
                                        $modal+=$k->totalmodal;
                                   }
                                   $totalkeuntungan=$jmlbayar['totalbayar']-$modal;
                                    echo "Rp ".number_format($totalkeuntungan,'0','','.');   
                                  ?>
                            </div>

                            <div class="text-muted">Keuntungan Hari ini</div>
                        </div>
                    </div>
                </div>
            </div>
            </div>


        <!-- </div>
</div>
</div>


</div>

</div>
</div>
</section>
<!-- /.content -->
</div>