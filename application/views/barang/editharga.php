<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">FORM EDIT BARANG</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <!-- Tag Header------------------------------------------------ -->


                    <?php foreach ($harga as $hr) :?>

                    <form action="<?php echo base_url(); ?>barang/updateDataHarga" class="formbarang" method="POST">

                        <div class="mb-3">
                            <label class="form-label">Kode Harga</label>
                            <input type="text" class="form-control" readonly name="kode_harga" id="kode_harga"
                                placeholder="Masukan Kode Harga" value="<?php echo $hr['kode_harga']; ?>">
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <select disabled name="kode_barang" class="form-control" id="kode_barang">
                                    <option value=" ">Pilih Barang...</option>
                                    <?php foreach ($barang as $b ){ ?>

                                    <option <?php if($hr['kode_barang']==$b->kode_barang){echo "selected";} ?>
                                        value="<?php echo $b->nama_barang; ?>">
                                        <?php echo $b->kode_barang."-".$b->nama_barang; ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Modal</label> // *** dibuat input hidden new code
                            <input type="text" class="form-control harga" id="harga_modal_view" placeholder=" Harga Modal"  value="<?php echo 'Rp. ',number_format($hr['harga_modal'], 0, ',','.')?>" type-currency="IDR">
                            <input type="hidden" class="form-control harga" name="harga_modal" id="harga_modal" placeholder=" Harga Modal" value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Bakul</label>
                            <input type="text" class="form-control harga" id="harga_bakul_view" placeholder="Masukan Harga Bakul" value="<?php echo 'Rp. ',number_format($hr['harga_bakul'], 0, ',','.')?>" type-currency="IDR">
                            <input type="hidden" class="form-control harga" name="harga_bakul" id="harga_bakul" placeholder="Masukan Harga Bakul" value="">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga Eceran</label>
                            <input type="text" class="form-control harga" id="harga_view" placeholder="Masukan Jual Barang" value="<?php echo 'Rp. ',number_format($hr['harga'], 0, ',','.')?>" type-currency="IDR">
                            <input type="hidden"  name="harga" id="harga" value="">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="text" disabled class="form-control" name="stok" id="harga"
                                placeholder="Masukan Stok Barang" value="<?php echo $hr['stok'];?>">
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="">Cabang</label>
                                <select disabled name="kode_cabang" class="form-control" id="kode_cabang">
                                    <option value=" ">Pilih Cabang...</option>
                                    <?php foreach ($cabang as $cb ){ ?>

                                    <option <?php if($hr['kode_cabang']==$cb->kode_cabang){echo "selected";} ?>
                                        value="<?php echo $cb->kode_cabang; ?>"><?php echo $cb->nama_cabang; ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                        <circle cx="12" cy="14" r="2" />
                                        <polyline points="14 4 14 8 8 8 8 4" />
                                    </svg>
                                    Simpan</button>
                            </div>
                        </div>

                    </form>

                    <?php endforeach; ?>
                    <a href="<?php echo base_url('barang/harga'); ?>" class="btn btn-warning btn-sm mb-3 mr-4 edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
                        </svg>
                        Kembali
                    </a>



                    <!-- ------ Close Tag Header ------            -->
                </div><!-- /.container-fluid -->

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>


<script>
    // awal new code
$(document).ready(function() {
    // Fungsi untuk mengupdate nilai harga_modal saat halaman dimuat
    function updateHargaModal() {
        var hargaModalView = $("#harga_modal_view").val();
        var hargaModal = parseInt(hargaModalView.replace(/[^0-9]/g, ''), 10);
        $("#harga_modal").val(hargaModal);
    }

    // Memanggil fungsi pertama kali saat halaman dimuat
    updateHargaModal();

    // Menambahkan event handler untuk mengupdate nilai saat harga_modal_view berubah
    $("#harga_modal_view").on('input', function() {
        updateHargaModal();
    });

    function updateHargabakul() {
        var hargabakulView = $("#harga_bakul_view").val();
        var hargabakul = parseInt(hargabakulView.replace(/[^0-9]/g, ''), 10);
        $("#harga_bakul").val(hargabakul);
    }

    // Memanggil fungsi pertama kali saat halaman dimuat
    updateHargabakul();

    // Menambahkan event handler untuk mengupdate nilai saat harga_bakul_view berubah
    $("#harga_bakul_view").on('input', function() {
        updateHargabakul();
    });

    function updateHarga() {
        var hargaView = $("#harga_view").val();
        var harga = parseInt(hargaView.replace(/[^0-9]/g, ''), 10);
        $("#harga").val(harga);
    }

    // Memanggil fungsi pertama kali saat halaman dimuat
    updateHarga();

    // Menambahkan event handler untuk mengupdate nilai saat harga__view berubah
    $("#harga_view").on('input', function() {
        updateHarga();
    });
});

</script>

// akhir new code

<script>
$(function() {


    $('#formtambahharga').submit(function() {
        var harga_modal = $("#harga_modal").val();
        var harga_bakul = $('#harga_bakul').val();
        var harga_jual = $('#harga').val();


        if (harga_bakul <= harga_modal) {
            swal.fire("Opps", "Harga Bakul Harus Lebih Besar Dari Harga Modal !", "warning");
            return false;
        } else if (harga_jual <= harga_modal) {
            swal.fire("Opps", "Harga Bakul Harus Lebih Besar Dari Harga Modal !", "warning");
            return false;

        } else if (harga_jual <= harga_bakul) {
            swal.fire("Opps", "Harga Jual Harus Lebih Besar Dari Harga Bakul !", "warning");
            return false;
        } else if (harga_bakul <= harga_jual) {
            swal.fire("Opps", "Harga Bakul Harus Lebih Besar Dari Harga Jual !", "warning");
        }
    });


});
</script>