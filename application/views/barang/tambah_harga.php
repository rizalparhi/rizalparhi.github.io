<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">FORM TAMBAH HARGA BARANG PADA CABANG</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">




                   <form action="<?php echo base_url()?>barang/inputHarga" class="formbarang" method="POST"
                    id="formtambahharga">

                    
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="">Pilih Cabang</label>
                            <div class="mb-1">
                                Data Harga ini akan disimpan di Toko Cabang yang di pilih
                            </div>
                            <select  disabled  class="form-control">
                            
                                <?php foreach ($cabang as $cb ){ 
                                    if($cb->kode_cabang != $kode_cabang){
                                        continue;
                                    }
                                    
                                    ?>
                                <option value="<?php echo $cb->kode_cabang; ?>"><?php echo $cb->nama_cabang; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                     <input type="text" name="kode_cabang" id="kode_cabang" value="<?php echo $kode_cabang; ?>">


                        <div class="mb-3">
                            <label class="form-label">Kode Harga</label>
                            <input type="text" class="form-control" readonly name="kode_harga" id="kode_harga"
                                placeholder="Masukan Kode Harga">
                        </div>

                       <div class="mb-3"> 
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <select name="kode_barang" class="selectbarang form-control kode_barang" id="kode_barang">

                                <?php $no=1; foreach ($barang as $b ){ ?>
                                    
                                <option value="<?php echo $b->kode_barang; ?>">
                                    <?php echo $b->kode_barang."-".$b->nama_barang; ?>
                                </option>

                                <?php } ?>

                            </select>

                        </div>
                    </div>
                        <?php echo $kode_cabang ;?>

                        <input type="hidden" name="tgl_masuk" id="tgl_masuk" value="<?php echo date("Y/m/d"); ?>">

                        <div class="mb-3">
                            <label class="form-label">Harga Modal</label>
                            <input type="text" class="form-control harga" name="harga_modal" id="harga_modal"
                                placeholder=" Harga Modal">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga Bakul</label>
                            <input type="text" class="form-control harga" name="harga_bakul" id="harga_bakul"
                                placeholder="Masukan Harga Bakul">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga Eceran</label>
                            <input type="text" class="form-control harga" name="harga" id="harga"
                                placeholder="Masukan Jual Barang">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="text" class="form-control" name="stok" id="stok"
                                placeholder="Masukan Jumlah Stok Barang">
                        </div>

                        <div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 12v-3a3 3 0 0 1 3 -3h13m-3 -3l3 3l-3 3" />
                                        <path d="M20 12v3a3 3 0 0 1 -3 3h-13m3 3l-3-3l3-3" />
                                    </svg>Reset
                                </button>

                                <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M7 12l5 5l10 -10" />
                                        <path d="M2 12l5 5m5 -5l5 -5" />
                                    </svg>Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                 </form>
                </div>

            </div>
        </div>
</div>
<!-- Close Header------------------------------------------------ -->
</div><!-- /.container-fluid -->

</div>
</div>
</section>
<!-- /.content -->
</div>

<script>
$(function() {


    $('#tableharga').DataTable({});
    $('#tablebarang').DataTable({});

    $("#tambahharga").click(function() {
        $("#modaltambahharga").modal("show");
    });

    function loadkodeharga() {

        var kode_barang = $('#kode_barang').val();
        // var kodebar = nama_barang.substring(0, 7); //ambil kode barangnya saja mulai index ke 0-ke 7
        // var harga_modal = nama_barang.substring(7, 30); //ambil kode barangnya saja mulai index ke 7-ke 30
        var kode_cabang = $('#kode_cabang').val();
        var kode_harga = kode_barang + kode_cabang; //tampung di var harga
        $('#kode_harga').val(kode_harga);

    }

    $("#kode_barang").change(function() {
        loadkodeharga();
    });
    $("#kode_cabang").change(function() {
        loadkodeharga();
    });





    $('#formtambahharga').submit(function() {
        var harga_modal = $("#harga_modal").val();
        var harga_bakul = $('#harga_bakul').val();
        var harga_jual = $('#harga').val();


        if (harga_bakul <= harga_modal) {
            swal.fire("Opps", "Harga Bakul Harus Lebih Besar Dari Harga Modal !", "warning");
            return false;
        } else if (harga_jual <= harga_modal) {
            swal.fire("Opps", "Harga Eceran Harus Lebih Besar Dari Harga Modal !", "warning");
            return false;

        } else if (harga_jual <= harga_bakul) {
            swal.fire("Opps", "Harga Eceran Harus Lebih Besar Dari Harga Bakul !", "warning");
            return false;
        } else if (harga_bakul >= harga_jual) {
            swal.fire("Opps", "Harga Bakul Harus Lebih Kecil Dari Harga Eceran !", "warning");
            return false;
        } else {

        };
    });


});
</script>