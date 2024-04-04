<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url()?>assets/dist/img/2logo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Inventory Mekar Jaya</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
     
          <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
     
      </div> -->

        <!-- SidebarSearch Form -->
        <div class="form-inline">

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard/index" class="nav-link text-lg ">
                        <i> <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="12" cy="13" r="2" />
                                <line x1="13.45" y1="11.55" x2="15.5" y2="9.5" />
                                <path d="M6.4 20a9 9 0 1 1 11.2 0Z" />
                            </svg></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                    <hr />
                </li>
                <li class="nav-item ">

                    <!-- ----------------------------------------------------------- SESION Data Master ----------------------------------------------------------- -->

                    <?php if($this->session->userdata('level')=="administrator") { ?>

                    <!-- <ul class="nav nav-treeview"> -->
                    <ul class="nav ">
                        <hr />
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>cabang/index" class="nav-link text-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="3" y1="21" x2="21" y2="21" />
                                    <path
                                        d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                                    <line x1="5" y1="21" x2="5" y2="10.85" />
                                    <line x1="19" y1="21" x2="19" y2="10.85" />
                                    <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                                </svg>

                                <p class="mt-1"> Data Cabang</p>

                            </a>
                        </li>
                        <li class="nav-item color-danger">
                            <a href="<?php echo base_url(); ?>barang/supplier" class="nav-link text-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="7" cy="17" r="2" />
                                    <circle cx="17" cy="17" r="2" />
                                    <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
                                    <line x1="3" y1="9" x2="7" y2="9" />
                                </svg>
                                <p>Data Supplier</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>barang/index" class="nav-link text-lg ">
                                <i><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                                        <line x1="12" y1="12" x2="20" y2="7.5" />
                                        <line x1="12" y1="12" x2="12" y2="21" />
                                        <line x1="12" y1="12" x2="4" y2="7.5" />
                                        <line x1="16" y1="5.25" x2="8" y2="9.75" />
                                    </svg></i>
                                <p> Data Barang </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>barang/harga" class="nav-link text-lg">
                                <i><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="9" y1="14" x2="15" y2="8" />
                                        <circle cx="9.5" cy="8.5" r=".5" fill="currentColor" />
                                        <circle cx="14.5" cy="13.5" r=".5" fill="currentColor" />
                                        <path
                                            d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" />
                                    </svg></i>
                                <p>Data Harga</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>pelanggan/index" class="nav-link text-lg">
                                <i><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="9" cy="7" r="4" />
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                    </svg></i>
                                <p>Data Pelanggan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>barang/formHistoribarang" class="nav-link text-lg">
                                <i><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="9" />
                                        <polyline points="12 7 12 12 15 15" />
                                    </svg></i>
                                <p>Histori Barang</p>
                            </a>
                        </li>




                    </ul>
                </li>


                <?php }else if($this->session->userdata('level')=="karyawan toko") { ?>
                <ul class="nav ">
                    <hr />
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>pelanggan/index" class="nav-link text-lg">
                            <i><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                </svg></i>

                            <p>Data Pelanggan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>barang/index" class="nav-link text-lg ">
                            <i><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                                    <line x1="12" y1="12" x2="20" y2="7.5" />
                                    <line x1="12" y1="12" x2="12" y2="21" />
                                    <line x1="12" y1="12" x2="4" y2="7.5" />
                                    <line x1="16" y1="5.25" x2="8" y2="9.75" />
                                </svg></i>
                            <p>Data Barang </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>barang/harga" class="nav-link text-lg">
                            <i><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="9" y1="14" x2="15" y2="8" />
                                    <circle cx="9.5" cy="8.5" r=".5" fill="currentColor" />
                                    <circle cx="14.5" cy="13.5" r=".5" fill="currentColor" />
                                    <path
                                        d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" />
                                </svg></i>
                            <p>Data Harga</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>barang/formHistoribarang" class="nav-link text-lg">
                            <i><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="9" />
                                    <polyline points="12 7 12 12 15 15" />
                                </svg></i>
                            <p>Histori Barang</p>
                        </a>
                    </li>
                </ul>


                <?php }else if($this->session->userdata('level')=="karyawan gudang") { ?>

                <ul class="nav ">
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>barang/index" class="nav-link text-lg ">
                            <i><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                                    <line x1="12" y1="12" x2="20" y2="7.5" />
                                    <line x1="12" y1="12" x2="12" y2="21" />
                                    <line x1="12" y1="12" x2="4" y2="7.5" />
                                    <line x1="16" y1="5.25" x2="8" y2="9.75" />
                                </svg></i>

                            <p>Data Barang </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>barang/harga" class="nav-link text-lg">
                            <i><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="9" y1="14" x2="15" y2="8" />
                                    <circle cx="9.5" cy="8.5" r=".5" fill="currentColor" />
                                    <circle cx="14.5" cy="13.5" r=".5" fill="currentColor" />
                                    <path
                                        d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" />
                                </svg></i>

                            <p>Data Harga</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>barang/formHistoribarang" class="nav-link text-lg">
                            <i><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="9" />
                                    <polyline points="12 7 12 12 15 15" />
                                </svg></i>

                            <p>Histori Barang</p>
                        </a>
                    </li>
                </ul>


                <?php } if($this->session->userdata('level')=="pemilik toko") { ?>

                <ul class="nav">
                    <!-- <li class="nav-item">
                            <a href="<?php echo base_url(); ?>barang/supplier" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Supplier</p>
                            </a>
                        </li> -->
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>barang/index" class="nav-link text-lg">
                            <i><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                                    <line x1="12" y1="12" x2="20" y2="7.5" />
                                    <line x1="12" y1="12" x2="12" y2="21" />
                                    <line x1="12" y1="12" x2="4" y2="7.5" />
                                    <line x1="16" y1="5.25" x2="8" y2="9.75" />
                                </svg></i>

                            <p> Data Barang </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>barang/harga" class="nav-link text-lg">
                            <i><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="9" y1="14" x2="15" y2="8" />
                                    <circle cx="9.5" cy="8.5" r=".5" fill="currentColor" />
                                    <circle cx="14.5" cy="13.5" r=".5" fill="currentColor" />
                                    <path
                                        d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" />
                                </svg></i>

                            <p>Data Harga</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>barang/formHistoribarang" class="nav-link text-lg">
                            <i><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="9" />
                                    <polyline points="12 7 12 12 15 15" />
                                </svg></i>

                            <p>Histori Barang</p>
                        </a>
                    </li>
                </ul>
                </li>
                <?php } ?>
                <!-- ---------------------------------------------------------------SESION  Transaksi-------------------------------------------------------------------------------- -->
                <?php if($this->session->userdata('level')=="administrator") { ?>
                <li class="nav-item menu-open">

                    <hr />
                    <ul class="nav ">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>penjualan/index" class="nav-link text-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 12h4l3 8l4 -16l3 8h4" />
                                </svg>
                                <p>Data Transaksi </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="<?php echo base_url(); ?>penjualan/inputpenjualan" class="nav-link text-lg"><h5>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="9" cy="19" r="2" />
                                    <circle cx="17" cy="19" r="2" />
                                    <path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" />
                                </svg>
                                <b>
                                    <p>Kasir</p>
                                </b></h5>
                            </a>
                        </li>

                    </ul>
                  
                </li>

                <?php }else if($this->session->userdata('level')=="karyawan toko") { ?>
                <li class="nav-item menu-open">
                    <hr />
                    <ul class="nav ">
                        <li class="nav-item">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>penjualan/index" class="nav-link text-lg ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 12h4l3 8l4 -16l3 8h4" />
                                </svg>
                                <p>Data Transaksi </p>
                            </a>
                        </li>
                </li>
                <li class="nav-item ">
                    <a href="<?php echo base_url(); ?>penjualan/inputpenjualan" class="nav-link text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="9" cy="19" r="2" />
                            <circle cx="17" cy="19" r="2" />
                            <path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" />
                        </svg>
                        <b>
                            <p>Kasir</p>
                        </b>
                    </a>
                </li>
               
            </ul>
            </li>

            <hr />
            <?php }else if($this->session->userdata('level')=="karyawan gudang") { ?>


            <?php } ?>
            <!-- ---------------------------------------------------------------SESION  Transaksi-------------------------------------------------------------------------------- -->

            <?php if($this->session->userdata('level')!= "karyawan gudang"){?>
            <li class="nav-item menu-open">
                <hr />
                <ul class="nav ">
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>penjualan/laporanpenjualan" class="nav-link text-lg ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <rect x="5" y="3" width="14" height="18" rx="2" />
                                <line x1="9" y1="7" x2="15" y2="7" />
                                <line x1="9" y1="11" x2="15" y2="11" />
                                <line x1="9" y1="15" x2="13" y2="15" />
                            </svg>
                            <p>Laporan Penjualan </p>
                        </a>
                    </li>
                </ul>
            </li>
            <hr />

            <?php } ?>
            <!-- ---------------------------------------------------------------SESION UTITLITY-------------------------------------------------------------------------------- -->

            <?php if($this->session->userdata('level')=="administrator") { ?>

            <li class="nav-item menu-open">
                <hr />
                <ul class="nav ">
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>user/index" class="nav-link text-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="12" cy="7" r="4" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            </svg>
                            <p>Data User</p>
                        </a>
                    </li>
                </ul>
            </li>
            <hr />
            <?php }else{ }; ?>
            <li class="nav-item menu-open">
                <hr />
                <ul class="nav ">
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>auth/logout"  class="nav-link text-lg "  onclick="javascript: return confirm('Apakah Anda Yakin Ingin Keluar?')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                <path d="M7 12h14l-3 -3m0 6l3 -3" />
                            </svg>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>



<script>
/** add active class and stay opened when selected */
var url = window.location;
const allLinks = document.querySelectorAll('.nav-item a');
const currentLink = [...allLinks].filter(e => {
    return e.href == url;
});

if (currentLink.length > 0) { //this filter because some links are not from menu
    currentLink[0].classList.add("active");
    currentLink[0].closest(".nav-item .nav-treeview").style.display = "block";
    currentLink[0].closest(".nav-item .has-treeview").classList.add("active");
}
</script>