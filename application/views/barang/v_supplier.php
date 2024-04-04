<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">DATA SUPPLIER</h1>
                </div>

            </div>
        </div>
    </div>




    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Notifikasi aleret -->



            <?php echo $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-body">
                    <div class="content">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn  mb-3 mr-4" data-toggle="modal"
                            data-target="#tambahsupplier"> <i class=" fas fa-plus"></i>
                            Tambah Data
                        </button>
                        <!-- ------------------ -->
                        <table class="table table-striped table-bordered" id="tablesupplier" align="center">
                            <!-- class=" " -->
                            <thead class="thead-dark" align="center">
                                <tr align="center" ;>
                                    <th scope="col">NO</th>
                                    <th scope="col">ID supplier</th>
                                    <th scope="col">NAMA supplier</th>
                                    <th scope="col">ALAMAT supplier</th>
                                    <th scope="col">NO HP/TELPON</th>
                                   <?php if($this->session->userdata('level')=="administrator") { ?>
                                <th scope="col">AKSI</th>
                                <?php }?>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                    $no=1;
                    foreach ($supplier as $s) { ?>
                                <tr align="center" ;>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $s->id_supplier; ?></td>
                                    <td><?php echo $s->nama_supplier; ?></td>
                                    <td><?php echo $s->alamat_supplier; ?></td>
                                    <td><?php echo $s->no_telp; ?></td>
                                    <?php if($this->session->userdata('level')=="administrator") { ?>
                                    <td>
                                        <a href="<?php echo base_url() ?>barang/btnEditDataSupplier/<?php echo $s->id_supplier; ?>"
                                            class="btn btn-warning btn-sm mb-3">
                                            <i class=" fas fa-edit"></i>
                                            Edit
                                        </a>

                                        <a href="<?php echo base_url() ?>barang/hapusDataSupplier/<?php echo $s->id_supplier;?>"
                                            class="btn btn-danger btn-sm mb-3"
                                            onclick="javascript: return confirm('Anda yakin ingin Menghapus Data supplier?')">
                                            <i class=" fas fa-trash"></i>
                                            Hapus </a>
                                    </td>
                                     <?php }?>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>

                    </div> <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>




<!-- Modal Tambah Supplier-->
<div class="modal fade" id="tambahsupplier" tabindex="-1" role="dialog" aria-labelledby="tambahbarangLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="tambahsupplier">Tambah Data Supplier</h2>
                <button type="button" class="ms-2 btn btn-danger btn-sm close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?php echo base_url()?>barang/tambahDatasupplier" class="formbarang" method="POST">


                    <div class="mb-3">
                        <label class="form-label">Nama supplier</label>
                        <input type="text" class="form-control" name="nama_supplier"
                            placeholder="Masukan Nama supplier">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat supplier</label>
                        <textarea type="textarea" rows="3" class="form-control" name="alamat_supplier"
                            placeholder="Masukan Alamat supplier"> </textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No HP/TELPON</label>
                        <input type="text" class="form-control" name="no_telp" placeholder="Masukan No Hp/Telpon">
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
    $('#tablesupplier').DataTable({

    });

});
</script>