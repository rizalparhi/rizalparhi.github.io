<!-- Content Wrapper. Contains page content -->
<style>

</style>
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content">
            <div class="container-fluid">
                <!-- -------------------------- Tag WARPER HEADER -------------------->

                <h2 class="page-title mb-3"> DATA PENJUALAN </h2>
                <?php echo $this->session->flashdata('message'); ?>
                <form id="formpenjualan" method="POST" action="<?php echo base_url();?>penjualan/simpanpenjualan">
                    <!-- Cek barang untuk validasi ketika barang kosong supaya tidak bisa di input -->
                    <input type="hidden" id="cekBarang">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body ">


                                    <label class="form-label mr-3">No Faktur : </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                                        </div>
                                        <input type="text" readonly name="no_faktur" id="no_faktur" class="form-control"
                                            placeholder="No Faktur" value="<?php echo $no_faktur ?>">
                                    </div>

                                    <label class="form-label mr-3">Tanggal Transaksi : </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend date" data-provide="datepicker">
                                            <span class="input-group-text"><i class="fas  fa-calendar"></i></span>
                                        </div>
                                        <input type="text" name="tgltransaksi" class="form-control"
                                            placeholder="Tanggal Transaksi" id="tgltransaksi"
                                            value="<?php echo date("Y/m/d"); ?>">
                                    </div>

                                    <input type="hidden" class="form-control" name="kode_pelanggan" id="kode_pelanggan">
                                    <label class="form-label mr-3 ">Data Pelanggan : </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary"><i
                                                    class="fas fa-users"></i></span>
                                        </div>

                                        <input type="text" readonly class="form-control " name="nama_pelanggan"
                                            id="nama_pelanggan" placeholder="Data Pelanggan ">

                                    </div>

                                    <label class="form-label mr-3">Jenis Transaksi : </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary"><i
                                                    class="fas  fa-credit-card"></i></span>
                                        </div>
                                        <select name="jenistransaksi" id="jenistransaksi"
                                            class="form-select form-control " id="exampleFormControlSelect1">
                                            <option value="tunai">Tunai</option>
                                            <option value="kredit">Kredit</option>
                                        </select>
                                    </div>


                                    <div id="tempo">
                                        <label class="form-label ">Tanggal Jatuh Tempo : </label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fas  fa-calendar-times"></i></span>
                                            </div>
                                            <input class="form-control" name="jatuhtempo" id="jatuhtempo">
                                        </div>
                                    </div>

                                    <label class="form-label mr-3">Jenis Harga : </label>
                                    <div id="notifJenisHarga"> <p style=" color: red;">Dalam Satu Transaksi Hanya Bisa Menggunakan Satu Jenis Harga || <b>Refresh Halaman Untuk Mengubahnya</b></p></div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-primary"><i
                                                        class="fas fa-tags"></i></span>
                                            </div>
                                            <select name="jenis_harga" id="jenis_harga" class="form-select form-control ">
                                                <option value="harga eceran">Harga Eceran</option>
                                                <option value="harga bakul">Harga Bakul</option>
                                                <option value="harga modal">Harga Modal</option>
                                            </select>
                                        </div>
                                 

                    

                                    <label class="form-label ">Kasir : </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="hidden" name="id_user"
                                            value="<?php echo $this->session->userdata('id_user');?>">
                                        <input type="hidden" name="kode_cabang"
                                            value="<?php echo $this->session->userdata('kode_cabang');?>">
                                        <input type="text" name="username" id="kasir" readonly class="form-control"
                                            placeholder="Kasir"
                                            value="<?php echo $this->session->userdata('id_user')."-".$this->session->userdata('nama_lengkap'); ?>">
                                    </div>

                                </div>


                            </div>
                        </div>


                        <div class="col-md-7 col-xl-7 mt-5">
                            <!-- ---------------------------------------------------------------------- -->
                            <?php 
                $faktur=substr($no_faktur,2);
             
                $faktur=((int)$faktur)-1;
           
                $print_faktur="TR"."".$faktur;
                $noTransaksi=substr($print_faktur,8);
              

            ?>

                            <?php if($noTransaksi !="0000"){ ?>

                            <a href="<?php echo base_url()?>penjualan/cetakpenjualan/<?php echo $print_faktur; ?>"
                                target="_blank" class="btn btn-success btn-xl mb-3 mx-auto  faktur">
                                <h3> <i class=" fas fa-print"> </i> CETAK STRUK TRANAKSI SEBELUMNYA NO FAKTUR:
                                    <?php echo $print_faktur; ?> </h3>
                            </a>

                            <?php } ?>

                            <!-- ---------------------------------------------------------------------- -->
                            <div class="card card-sm mt-5">
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
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for>Kode Barang :</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary"><i
                                                            class="fas fa-qrcode"></i></span>
                                                </div>
                                                <input type="text" readonly name="kode_barang" id="kode_barang"
                                                    class="form-control"
                                                    placeholder="Kode Barang  (Klik di sini untuk memilih Barang)">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for>Nama Barang :</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas  fa-barcode"></i></span>
                                                </div>
                                                <input type="text" readonly name="nama_barang" id="nama_barang"
                                                    class="form-control" placeholder="Nama Barang">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2" id="formHargamodal">
                                            <label class="text-danger" for>Harga Modal :</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-danger harga"><i
                                                            class="fas fa-tags"></i></span>
                                                </div>
                                                <input type="text" readonly name="harga_modal" id="harga_modal"
                                                    class="form-control harga " placeholder="Harga_modal">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2" id="formHargabakul">
                                            <label class="text-warning" for>Harga Bakul :</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-warning harga"><i
                                                            class="fas fa-tags"></i></span>
                                                </div>
                                                <input type="text" readonly name="harga_bakul" id="harga_bakul"
                                                    class="form-control harga" placeholder="Harga_bakul">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2" id="formHargaeceran">
                                            <label for>Harga Eceran :</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text harga bg-primary"><i
                                                            class="fas fa-tags"></i></span>
                                                </div>
                                                <input type="text" readonly name="harga" id="harga"
                                                    class="form-control   harga" placeholder="Harga_eceran">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for>Jumlah Barang :</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-list"></i></span>
                                                </div>
                                                <input type="text" name="qty" id="qty" class="form-control"
                                                    placeholder="Qty">
                                            </div>
                                        </div>
                                        <!-- ----------------------------------------------------------------------------- FORM UNUTK KURANGI STOK BARANG ---------------------------------------------------------------------------------------- -->

                                        <input type="hidden" name="stokbarang" id="stokbarang" class="form-control"
                                            placeholder="stok">

                                        <input type="hidden" name="kode_harga" id="kode_harga" class="form-control"
                                            placeholder="kode_harga">

                                        <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                                        <div class="form-group col-md-2 mt-4 pt-2">
                                            <a href="#" class="btn btn-primary w-10" id="tambahbarang">
                                                <i class="fa fa-cart-plus"></i>
                                            </a>

                                        </div>

                                    </div>




                                    <div class="row">
                                        <table class="table table-bordered table-striped">
                                            <thead class="thead-dark">
                                                <tr align="center">
                                                    <th>NO</th>
                                                    <th>KODE BARANG</th>
                                                    <th>NAMA BARANG</th>
                                                    <th>HARGA </th>
                                                    <th>QTY</th>
                                                    <th>TOTAL</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody id="loaddatabarang">

                                            </tbody>


                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <button id="btnsimpan" type="submit" class="btn btn-primary btn-block"><i
                                class="fa fa-send mr-2"></i>
                            Simpan</button>
                    </div>



                </form>













                <!-- -------------------------- Tag WARPER FOOTER ----------------- -->
            </div>
        </section>
    </div>
</div>



<!-- Modal DATA Pelanggan-->
<div class="modal fade " id="modalpelanggan" tabindex="-1" role="dialog" aria-labelledby="tambahbarangLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="tambahPelanggan">Tambah Data Pelanggan</h2>
                <button type="button" class="ms-2 btn btn-danger btn-sm close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered" id="tablepelanggan">
                    <!-- class=" " -->
                    <thead class="thead-dark" align="center">
                        <tr align="center">
                            <th scope="col">NO</th>
                            <th scope="col">KODE PELANGGAN</th>
                            <th scope="col">NAMA PELANGGAN</th>
                            <th scope="col">ALAMAT PELANGGAN</th>
                            <th scope="col">NO HANDPHONE</th>
                            <th scope="col">KODE CABANG</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    $no=1;
                    foreach ($pelanggan as $key) { 
                        if($key->kode_pelanggan=="PLG00001"){
                            continue;
                        }
                        
                    ?>

                        <tr align="center">
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $key->kode_pelanggan; ?></td>
                            <td><?php echo $key->nama_pelanggan; ?></td>
                            <td><?php echo $key->alamat_pelanggan; ?></td>
                            <td><?php echo $key->no_hp; ?></td>
                            <td><?php echo $key->nama_cabang; ?></td>
                            <td align="center">
                                <a href="#" class="btn btn-primary btn-sm mb-3 pilih"
                                    data-kodepel="<?php echo $key->kode_pelanggan; ?>"
                                    data-namapel="<?php echo $key->nama_pelanggan; ?>">Pilih </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal DATA TAMBAH BARANG-->
<div class="modal fade " id="modalbarangharga" tabindex="-1" role="dialog" aria-labelledby="tambahbarangLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="tambahPelanggan">Tambah Data Barang</h2>
                <button type="button" class="ms-2 btn btn-danger btn-sm close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <table class="table table-striped table-bordered" id="tableharga">
                    <!-- class=" " -->
                    <thead class="thead-dark">
                        <tr align="center" ;>
                            <th>NO</th>
                            <th>KODE HARGA</th>
                            <th>KODE BARANG</th>
                            <th>NAMA BARANG</th>
                            <th>SATUAN</th>
                            <th>HARGA MODAL</th>
                            <th>HARGA BAKUL</th>
                            <th>HARGA ECERAN</th>
                            <th>STOK</th>
                            <th>CABANG</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    $no=1;
                    foreach ($harga as $hr) { ?>
                        <?php   
                     if($hr->stok <= '10' ){
                                   
                                    $warna= "bg-red";
                                }else{
                                    $warna= "";

                                }
                    ?>
                        <tr align="center" ;>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $hr->kode_harga; ?></td>
                            <td><?php echo $hr->kode_barang; ?></td>
                            <td><?php echo $hr->nama_barang; ?></td>
                            <td><?php echo $hr->satuan; ?></td>
                            <td align="right"><?php echo number_format($hr->harga_modal,'0','','.'); ?></td>
                            <td align="right"><?php echo number_format($hr->harga_bakul,'0','','.'); ?></td>
                            <td align="right"><?php echo number_format($hr->harga,'0','','.'); ?></td>
                            <!-- <td></td> -->
                            <td align="center">
                                <h4><span class="badge  font-weight-normal <?php echo $warna; ?>">
                                        <?php echo $hr->stok; ?> </span></h4>
                            </td>

                            <td><?php echo $hr->kode_cabang;  ?></td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm mb-3 barang"
                                    data-kodebar="<?php echo $hr->kode_barang; ?>"
                                    data-nambar="<?php echo $hr->nama_barang; ?>"
                                    hr-modal="<?php echo $hr->harga_modal; ?>"
                                    hr-bakul="<?php echo $hr->harga_bakul; ?>" data-har="<?php echo $hr->harga; ?>"
                                    data-stok="<?php echo $hr->stok; ?>"
                                    kode-harga="<?php echo $hr->kode_harga; ?>">Pilih </a>

                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>



            </div>
        </div>
    </div>




    <script>
    $('#tgltransaksi').datepicker({
        format: 'yyyy/mm/dd',
        todayHighlight: true,
        autoclose: true,

    });

    $(function() {
        $('#tablepelanggan').DataTable({});
    });


    $(function() {
        $('#tableharga').DataTable({});
    });

    $(document).ready(function() {

        // Format mata uang.
        $('.harga').mask('000.000.000', {
            reverse: true
        });

    });
    </script>



    <script>
    function loadDataBarang() {
        var id_user = $("#id_user").val();
        var jenis_harga = $('#jenis_harga').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>penjualan/getDatabarangtemp',
            data: {
                id_user: id_user,
                jenis_harga: jenis_harga
            },
            cache: false,
            success: function(respond) {

                $("#loaddatabarang").html(respond);
            }

        });
    }

    loadDataBarang();

    $(function() {
        function hidejatuhtempo() {
            $("#tempo").hide();
        }

        function showjatuhtempo() {
            $("#tempo").show();
        }

        function getJatuhTempo() {
            var trans = $('#tgltransaksi').val();
            // alert("Hai")
            $.post('<?= @base_url('penjualan/getJatuhTempo') ?>', {
                tran: trans
            }, function(result) {
                $("#jatuhtempo").val(result);
            })
        }


        function cekBarang() {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url();?>penjualan/cekBarang',
                cache: false,
                success: function(respond) {
                    // alert(respond);
                    $("#cekBarang").val(respond);
                }
            });
        }


        cekBarang();


        hidejatuhtempo();



        $("#jenistransaksi").change(function() {
            var jenistransaksi = $(this).val();
            if (jenistransaksi == "kredit") {
                showjatuhtempo();
                getJatuhTempo();
            } else {
                hidejatuhtempo();
            }
        })

        function hideformHargamodal() {
            $("#formHargamodal").hide();
        }
        hideformHargamodal()

        function hideformHargabakul() {
            $("#formHargabakul").hide();
        }
        hideformHargabakul()

        // function hideformHargaeceran() {
        //     $("#formformHargaeceran").hide();
        // }




        $("#jenis_harga").change(function() {
            var jenisharga = $(this).val();

            if (jenisharga == "harga modal") {

                $("#formHargaeceran").hide();
                $("#formHargamodal").show();
                hideformHargabakul()



            } else if (jenisharga == "harga bakul") {
                $("#formHargaeceran").hide();
                $("#formHargabakul").show();
                hideformHargamodal()




            } else {
                $("#formHargaeceran").show();
                hideformHargabakul()
                hideformHargamodal()

            }

        })



        // Validasi form penjualan
        $('#formpenjualan').submit(function() {
            var no_faktur = $("#no_faktur").val();
            var tgltransaksi = $('#tgltransaksi').val();
            var kode_pelanggan = $('#kode_pelanggan').val();
            var jenistransaksi = $('#jenistransaksi').val();
            var kodebarang = $('#kode_barang').val();



            if (no_faktur == "") {
                swal.fire("Opps", "No Faktur Harus Diisi !", "warning");
                return false;
            } else if (tgltransaksi == "") {
                swal.fire("Opps", "Tanggal Transaksi Harus Diisi !", "warning");
                return false;

            } else if (jenistransaksi == "") {
                swal.fire("Opps", "Jenis Transaksi Harus Diisi !", "warning");
                return false;
            } else if (jenistransaksi == "kredit") {
                if (kode_pelanggan == "") {
                    swal.fire("Opps",
                        "Harap Isi Nama Pelanggan Untuk Transaksi Kredit / Jika Data Pelanggan Belum Ada Silahkan Tambah Data Pelanggan Terlebih Dahulu!",
                        "warning");
                    return false;
                }
            } else if (kodebarang == "") {
                swal.fire("Opps", "Kode Barang Harus Diisi !", "warning");
                return false;
            } else {
                Swal.fire(
                    'Good job!',
                    'Data Transaksi Berhasil Disimpan!',
                    'success'
                )

                //  document.querySelector('.faktur').click();


            }
        });

        $("#no_faktur").change(function() {
            document.querySelector('.faktur').click();
        });

        // Modal cari data Pelanggan
        $("#nama_pelanggan").click(function() {
            $("#modalpelanggan").modal("show");
        });

        //pilih Data pelangan
        $(".pilih").click(function() {
            var kodepelanggan = $(this).attr("data-kodepel");
            var namapelanggan = $(this).attr("data-namapel");

            $("#kode_pelanggan").val(kodepelanggan);
            $("#nama_pelanggan").val(namapelanggan);
            $("#modalpelanggan").modal("hide");


        });

        $("#kode_barang").click(function() {
            $("#modalbarangharga").modal("show");
        });
    });




    //pilih Data pelangan
    $(".barang").click(function() {
        var kodeBarang = $(this).attr("data-kodebar");
        var namBar = $(this).attr("data-nambar");
        var hr_modal = $(this).attr("hr-modal");
        var hr_bakul = $(this).attr("hr-bakul");
        var harga = $(this).attr("data-har");
        var stokbarang = $(this).attr("data-stok");
        var kode_harga = $(this).attr("kode-harga");

        $("#kode_barang").val(kodeBarang);
        $("#nama_barang").val(namBar);
        $("#harga_modal").val(hr_modal);
        $("#harga_bakul").val(hr_bakul);
        $("#harga").val(harga);
        // ---------------------------------------
        $("#stokbarang").val(stokbarang);
        $("#kode_harga").val(kode_harga);

        $("#modalbarangharga").modal("hide");
    });

    // -----------------------------------------------------------------------------------------------
      $("#notifJenisHarga").hide(); 
     
    // --------------- Tambah Barang ------------------ 

    $("#tambahbarang").click(function() {
        var jenis_harga = $('#jenis_harga').val();
        var kode_barang = $('#kode_barang').val();
        var harga_modal = $("#harga_modal").val();
        var harga_bakul = $("#harga_bakul").val();
        var harga = $("#harga").val();
        var qty = $("#qty").val();
        var id_user = $("#id_user").val();

        // ------------------------------------------
        var stokbarang = $("#stokbarang").val();
        var kode_harga = $("#kode_harga").val();

        if (kode_barang == "") {
            swal.fire("Oops !", "Kode Barang Harus Diisi", "Warning");
        } else if (qty == "" || qty == 0) {
            swal.fire("Oops !", "Qty Barang Harus Diisi", "Warning");
            // }else if(qty>stokbarang){
            //     swal.fire("Oops !","Stok Barang Kurang","Warning");
        } else if (stokbarang == 0) {
            swal.fire("Oops !", "Stok Barang Habis", "Warning");
        } else {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url();?>penjualan/simpanbarangtemp',
                data: {

                    kode_barang: kode_barang,
                    jenis_harga: jenis_harga,
                    harga_modal: harga_modal,
                    harga_bakul: harga_bakul,
                    harga: harga,
                    qty: qty,
                    stokbarang: stokbarang,
                    kode_harga: kode_harga,
                    id_user: id_user
                },
                cache: false,
                success: function(respond) {


                    if (respond == 1) {
                        swal.fire("Oops !", "Data Sudah Ada ", "Warning");
                    } else if (respond == 2) {

                        swal.fire("Oops !", "Stok Barang Kurang", "Warning");
                        window.location.reload();
                    }

                    loadDataBarang();

                    $('#jenis_harga').attr("disabled","disabled");
                    $("#notifJenisHarga").show();

                }
            });
        }
    });
    </script>