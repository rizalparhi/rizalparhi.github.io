<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="page-title fs-4">
              Home/Dashboard
            </h1>

            <div class="alert alert-success" role="alert">
                <h3>
                    <!-- SVG icon code with class="mr-1" -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-1" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="7" r="4" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg>

                    Selamat Datang <b><?php echo $this->session->userdata('nama_lengkap'); ?></b>
                    sebagai <?php if($this->session->userdata('level')=="administrator"){ echo  "Kepala Toko";}else{  echo ucwords($this->session->userdata('level'));  } ?>
                            
            </div>

            <div class="row">
                <div class="col-md-6 col-xl-3">
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
                                    Data Peelanggan
                                </div>
                                <div class="text-muted">163 registered today</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
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
                                    132 Sales
                                </div>
                                <div class="text-muted">Transaksi Hari ini</div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-xl-3">
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
                                    10 Cabang
                                </div>
                                <div class="text-muted">Transaksi Hari ini</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
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
                                    Rp 20.000.000
                                </div>
                                <div class="text-muted">Pendapatan Hari ini</div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Grafik Penjualan</h3>
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit
                                incidunt, iste, itaque minima
                                neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                        </div>
                    </div>
                </div>


            </div>

            <!-- /.card -->
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>