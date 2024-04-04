<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Penjualan</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Notifikasi aleret -->
            <!-- <?php echo $this->session->flashdata('msg'); ?> -->
            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">

                        <form action="<?php echo base_url();?>penjualan/cetakLaporanPenjualan" method="POST">
                         
                                <?php if($this->session->userdata('kode_cabang') == "PST"){?>

                                <div class="form-group">
                                    <label for="">Pilih Cabang</label>
                                    <select name="cabang" class="form-control" id="exampleFormControlSelect1">
                                        <option value="">SEMUA CABANG</option>
                                        <?php foreach ($cabang as $key ){ ?>
                                        <option value="<?php echo $key->kode_cabang; ?>">
                                            <?php echo $key->nama_cabang; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php }else{ ?>

                                            <input type="hidden" value="<?php echo $this->session->userdata('kode_cabang') ?>" name="cabang">

                                 <?php } ?>   


                            <div class="row">

                                <div class="col-md-6">


                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend date" data-provide="datepicker">
                                            <span class="input-group-text"><i class="fas  fa-calendar"></i></span>
                                        </div>
                                        <input type="date" name="dari" class="form-control"
                                            placeholder="Masukan Tanggal Mulai" id="tglmulai" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend date" data-provide="datepicker">
                                            <span class="input-group-text"><i class="fas  fa-calendar"></i></span>
                                        </div>
                                        <input type="date" name="sampai" class="form-control"
                                            placeholder="Masukan Tanggal Akhir" id="tglakhir" value="">
                                    </div>
                                </div>

                            </div>
                            <div class="mb-3">
                                <div class="row">

                                    <div class="col-md-6">
                                        <button type="submit" name="submit" class="btn btn-lg btn-primary w-100"><i
                                                class="fa fa-print"></i> Cetak </button>
                                    </div>

                                    <div class="col-md-6">
                                        <button type="submit" name="export" class="btn btn-lg btn-success w-100"><i
                                                class="fa fa-download"></i> Export Excel</button>
                                    </div>


                                </div>

                            </div>


                        </form>

                    </div>
                </div>


            </div>
        </div>
    </section>
</div>


<!-- <script>
$('#tglmulai').datepicker({
    // format: 'yyyy/mm/dd',
    todayHighlight: true,
    autoclose: true,

});

$('#tglakhir').datepicker({
    // format: 'yyyy/mm/dd',
    todayHighlight: true,
    autoclose: true,

});
</script> -->