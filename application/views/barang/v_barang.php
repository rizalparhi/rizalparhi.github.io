<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">DATA MASTER BARANG</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
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
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn  mb-3 mr-4" data-toggle="modal"
                        data-target="#tambahbarang"> <i class=" fas fa-plus"></i>
                        Tambah Data
                    </button>

                    <?php }?>
                    <!-- ------------------ -->
                    <table class="table table-striped table-bordered" id="tablebarang">
                        <!-- class=" " -->
                        <thead class="thead-dark">
                            <tr align="center" ;>
                                <th>NO</th>
                                <th>KODE BARANG</th>
                                <th>NAMA BARANG</th>
                                <th>SATUAN</th>
                                <th>SUPPLIER</th>
                                <?php if($this->session->userdata('level')=="administrator") { ?>
                                <th>AKSI</th>
                                <?php }?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                    $no=1;
                    foreach ($barang as $b) { ?>
                            <tr align="center" ;>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $b->kode_barang; ?></td>
                                <td><?php echo $b->nama_barang; ?></td>
                                <td><?php echo $b->satuan; ?></td>
                                <td><?php echo $b->supplier; ?></td>
                                <?php if($this->session->userdata('level')=="administrator") { ?>
                                <td>
                                    <a href="<?php echo base_url() ?>Barang/btn_edit_barang/<?php echo $b->kode_barang; ?>"
                                        class="btn btn-warning btn-sm mb-3" id="editbrng">
                                        <i class=" fas fa-edit"></i>
                                        Edit
                                    </a>

                                    <a href="<?php echo base_url()?>barang/hapus_barang/<?php echo $b->kode_barang;?>"
                                        class="btn btn-danger btn-sm mb-3"
                                        onclick="javascript: return confirm('Anda yakin ingin Menghapus?')">
                                        <i class=" fas fa-trash"></i>
                                        Hapus </a>
                                </td>
                                <?php } ?>
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>

                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>




<!-- Modal Tambah Barang-->
<div class="modal fade" id="tambahbarang" tabindex="-1" role="dialog" aria-labelledby="tambahbarangLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="tambahbarangLabel">Tambah Data Barang</h2>
                <button type="button" class="ms-2 btn btn-danger btn-sm close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?php echo base_url()?>barang/simpanbarang" class="formbarang" method="POST">

                    <div class="form-group mb-3">
                        <div class="mb-3">
                            <label class="form-label">Kode Barang</label>
                            <input type="text" readonly class="form-control" name="kode_barang"
                                value="<?php echo $kode_barang ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="namabarang" placeholder="Masukan Nama Barang">
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="">Satuan</label>
                                <select name="satuan" class="form-control" id="exampleFormControlSelect1">
                                    <option selected>Pilih...</option>
                                    <option value="Pcs">Pcs </option>
                                    <option value="Kaleng">Kaleng</option>
                                    <option value="Galon">Galon </option>
                                    <option value="Pail">Pail </option>
                                    <option value="Dus">Dus </option>
                                    <option value="Dus">Batang </option>
                                    <option value="Dus">Lembar </option>
                                    <option value="Dus">Sak </option>
                                    <option value="Kg">Kg </option>
                                    <option value="Ons">Ons </option>
                                    <option value="Meter">Meter </option>
                                    <option value="Meter">Cm </option>
                                    <option value="Set">Dus</option>
                                    <option value="Dus">Kubik </option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="">Supplier</label>
                                <select name="supplier" class="form-control" id="exampleFormControlSelect1">
                                    <option>Pilih Supplier..</option>
                                    <?php foreach ($supplier as $s ){ ?>

                                    <option value="<?php echo $s->nama_supplier; ?>"><?php echo $s->nama_supplier; ?>
                                    </option>

                                    <?php } ?>
                                </select>
                            </div>
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

                </form>
            </div>

        </div>
    </div>
</div>

<script>
$(function() {
    $('#tablebarang').DataTable({

    });
});
</script>