<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">DATA HARGA BARANG</h1>
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Notifikasi aleret -->

            <?php echo $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-body">

                    <?php if($this->session->userdata('level')=="administrator") { ?>

                    <button
                        type="button"
                        id="tambahharga"
                        class="btn btn-primary btn  mb-3 mr-4"
                        data-toggle="modal">
                        <i class=" fas fa-plus"></i>
                        Tambah Data Harga Barang
                    </button>

                    <?php }?>

                    <table class="table table-striped table-bordered" id="tableharga">
                        <!-- class=" " -->
                        <thead class="thead-dark">
                            <tr align="center" ;=";">
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
                                <?php if($this->session->userdata('level')=="administrator") { ?>
                                <th>AKSI</th>
                                <?php }?>
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
                            <tr align="center" ;=";">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $hr->kode_harga; ?></td>
                                <td><?php echo $hr->kode_barang; ?></td>
                                <td><?php echo $hr->nama_barang; ?></td>
                                <td><?php echo $hr->satuan; ?></td>
                                <td align="right"><?php echo 'Rp. ', number_format($hr->harga_modal,'0','','.'); ?></td>
                                <td align="right"><?php echo 'Rp. ', number_format($hr->harga_bakul,'0','','.'); ?></td>
                                <td align="right"><?php echo 'Rp. ', number_format($hr->harga,'0','','.'); ?></td>
                                <td align="center">
                                    <h4>
                                        <span class="badge  font-weight-normal <?php echo $warna; ?>">
                                            <?php echo $hr->stok; ?>
                                        </span>
                                    </h4>
                                </td>
                                <td><?php echo $hr->kode_cabang; ?></td>

                                <?php if($this->session->userdata('level')=="administrator") { ?>
                                <td>

                                    <a
                                        href="<?php echo base_url() ?>barang/tambahStok/<?php echo $hr->kode_harga; ?>"
                                        class="btn btn-primary btn-sm mb-3">
                                        <i class=" fas fa-plus"></i>
                                        Tambah stok
                                    </a>

                                    <a
                                        href="<?php echo base_url() ?>barang/editHarga/<?php echo $hr->kode_harga; ?>"
                                        class="btn btn-warning btn-sm mb-3">
                                        <i class=" fas fa-edit"></i>
                                        Edit
                                    </a>

                                    <a
                                        href="<?php echo base_url()?>barang/hapusDataHarga/<?php echo $hr->kode_harga;?>"
                                        class="btn btn-danger btn-sm mb-3"
                                        onclick="javascript: return confirm('Anda yakin ingin Menghapus Data?')">
                                        <i class=" fas fa-trash"></i>
                                        Hapus
                                    </a>

                                </td>

                                <?php }?>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                    <!-- /.row (main row) -->
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<!-- Modal Tambah Barang-->

<div
    class="modal fade"
    id="modaltambahharga"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modaltambahharga"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modaltambahharga">Tambah Data harga</h2>
                <button
                    type="button"
                    class="ms-2 btn btn-danger btn-sm close"
                    data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form
                    action="<?php echo base_url()?>barang/inputHarga"
                    class="formbarang"
                    method="POST"
                    id="formtambahharga">

                    <div class="mb-3">
                        <label class="form-label">Kode Harga</label>
                        <input
                            type="text"
                            class="form-control"
                            readonly="readonly"
                            name="kode_harga"
                            id="kode_harga"
                            placeholder="Masukan Kode Harga">
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <select
                                name="kode_barang"
                                class="selectbarang form-control kode_barang"
                                id="kode_barang">

                                <?php $no=1; foreach ($barang as $b ){ ?>
                                <option value="<?php echo $b->kode_barang; ?>">
                                    <?php echo $no++.".".$b->kode_barang."-".$b->nama_barang; ?>
                                </option>
                                <?php } ?>
                            </select>

                        </div>

                        <!-- <input type="text" name="kode_barang" id="kode_barang"> -->
                        <input
                            type="hidden"
                            name="tgl_masuk"
                            id="tgl_masuk"
                            value="<?php echo date("Y/m/d"); ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga Modal</label>
                        <input
                            type="text"
                            class="form-control harga"
                            id="harga_modal_view"
                            placeholder=" Harga Modal"
                            type-currency="IDR">
                        <input
                            type="hidden"
                            class="form-control harga"
                            name="harga_modal"
                            id="harga_modal">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga Bakul</label>
                        <input
                            type="text"
                            class="form-control harga"
                            id="harga_bakul_view"
                            placeholder="Masukan Harga Bakul"
                            type-currency="IDR">
                        <input
                            type="hidden"
                            class="form-control harga"
                            name="harga_bakul"
                            id="harga_bakul"
                            type-currency="IDR">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga Eceran</label>
                        <input
                            type="text"
                            class="form-control harga"
                            id="harga_view"
                            placeholder="Masukan Jual Barang"
                            type-currency="IDR">
                        <input
                            type="hidden"
                            class="form-control harga"
                            name="harga"
                            id="harga"
                            type-currency="IDR">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input
                            type="text"
                            class="form-control"
                            name="stok"
                            id="stok"
                            placeholder="Masukan Jumlah Stok Barang">
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="">Pilih Cabang</label>
                            <div class="mb-1">
                                Data Harga ini akan disimpan di Cabang mana, Jika Barang Di simpan digudang
                                pilih gudang
                            </div>
                            <select name="kode_cabang" class="form-control" id="kode_cabang">
                                <option value="">Pilih Cabang...</option>
                                <?php foreach ($cabang as $cb ){ 
                                    if($cb->kode_cabang== "PST"){
                                        continue;
                                    }
                                    
                                    ?>
                                <option value="<?php echo $cb->kode_cabang; ?>"><?php echo $cb->nama_cabang; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-warning">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon"
                                    width="24"
                                    height="24"
                                    viewbox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 12v-3a3 3 0 0 1 3 -3h13m-3 -3l3 3l-3 3"/>
                                    <path d="M20 12v3a3 3 0 0 1 -3 3h-13m3 3l-3-3l3-3"/>
                                </svg>Reset
                            </button>

                            <button type="submit" class="btn btn-primary">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon"
                                    width="24"
                                    height="24"
                                    viewbox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M7 12l5 5l10 -10"/>
                                    <path d="M2 12l5 5m5 -5l5 -5"/>
                                </svg>Simpan
                            </button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script>
    // awal dari kode memberikan nilai di input hidden
    $(document).ready(function () {
        // Fungsi untuk mengupdate nilai harga_modal saat halaman dimuat
        function updateHargaModal() {
            var hargaModalView = $("#harga_modal_view").val();
            var hargaModal = parseInt(hargaModalView.replace(/[^0-9]/g, ''), 10);
            $("#harga_modal").val(hargaModal);
        }

        // Memanggil fungsi pertama kali saat halaman dimuat
        updateHargaModal();

        // Menambahkan event handler untuk mengupdate nilai saat harga_modal_view
        // berubah
        $("#harga_modal_view").on('input', function () {
            updateHargaModal();
        });

        function updateHargabakul() {
            var hargabakulView = $("#harga_bakul_view").val();
            var hargabakul = parseInt(hargabakulView.replace(/[^0-9]/g, ''), 10);
            $("#harga_bakul").val(hargabakul);
        }

        // Memanggil fungsi pertama kali saat halaman dimuat
        updateHargabakul();

        // Menambahkan event handler untuk mengupdate nilai saat harga_bakul_view
        // berubah
        $("#harga_bakul_view").on('input', function () {
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
        $("#harga_view").on('input', function () {
            updateHarga();
        });
    });
    // akhir dari kode memberikan nilai di input hidden

    $(function () {
        $(document).ready(function () {
            $('.kode_barang').select2()
        });
    });
</script>

<script>

    $(function () {

        $('#tableharga').DataTable({});
        $('#tablebarang').DataTable({});

        $("#tambahharga").click(function () {
            $("#modaltambahharga").modal("show");
        });

        function loadkodeharga() {

            var kode_barang = $('#kode_barang').val();
            // var kodebar = nama_barang.substring(0, 7); ambil kode barangnya saja mulai
            // index ke 0-ke 7 var harga_modal = nama_barang.substring(7, 30); ambil kode
            // barangnya saja mulai index ke 7-ke 30
            var kode_cabang = $('#kode_cabang').val();
            var kode_harga = kode_barang + kode_cabang; //tampung di var harga
            $('#kode_harga').val(kode_harga);

        }

        $("#kode_barang").change(function () {
            loadkodeharga();
        });
        $("#kode_cabang").change(function () {
            loadkodeharga();
        });

        $('#formtambahharga').submit(function () {
            var harga_modal = $("#harga_modal").val();
            var harga_bakul = $('#harga_bakul').val();
            var harga_jual = $('#harga').val();

            if (harga_bakul <= harga_modal) {
                swal.fire(
                    "Opps",
                    "Harga Bakul Harus Lebih Besar Dari Harga Modal !",
                    "warning"
                );
                return false;
            } else if (harga_jual <= harga_modal) {
                swal.fire(
                    "Opps",
                    "Harga Eceran Harus Lebih Besar Dari Harga Modal !",
                    "warning"
                );
                return false;

            } else if (harga_jual <= harga_bakul) {
                swal.fire(
                    "Opps",
                    "Harga Eceran Harus Lebih Besar Dari Harga Bakul !",
                    "warning"
                );
                return false;
            } else if (harga_bakul >= harga_jual) {
                swal.fire(
                    "Opps",
                    "Harga Bakul Harus Lebih Kecil Dari Harga Eceran !",
                    "warning"
                );
                return false;
            } else {};
        });

    });
</script>