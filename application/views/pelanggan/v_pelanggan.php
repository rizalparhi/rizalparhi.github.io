<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">DATA PELANGGAN</h1>
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
                            data-target="#tambahPelanggan"> <i class=" fas fa-plus"></i>
                            Tambah Data
                        </button>
                        <!-- ------------------ -->
                        <table class="table table-striped table-bordered" id="tablepelanggan" align="center">
                            <!-- class=" " -->
                            <thead class="thead-dark" align="center">
                                <tr align="center" ;>
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
                    foreach ($pelanggan as $key) { ?>
                                <tr align="center" ;>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $key->kode_pelanggan; ?></td>
                                    <td><?php echo $key->nama_pelanggan; ?></td>
                                    <td><?php echo $key->alamat_pelanggan; ?></td>
                                    <td><?php echo $key->no_hp; ?></td>
                                    <td><?php echo $key->nama_cabang; ?></td>
                                    <td>
                                        <?php if($key->kode_pelanggan=="PLG00001"){  }else{ ?>


                                       
                                        
                                        <a href="<?php echo base_url() ?>pelanggan/btnEditDataPelanggan/<?php echo $key->kode_pelanggan; ?>"
                                            class="btn btn-warning btn-sm mb-3">
                                            <i class=" fas fa-edit"></i>
                                            Edit
                                        </a>

                                       

                                        <a href="<?php echo base_url() ?>pelanggan/hapusDataPelanggan/<?php echo $key->kode_pelanggan;?>"
                                            class="btn btn-danger btn-sm mb-3"
                                            onclick="javascript: return confirm('Anda yakin ingin Menghapus Data Pelanggan?')">
                                            <i class=" fas fa-trash"></i>
                                            Hapus </a>
                                            <?php } ?>
                                    </td>
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




<!-- Modal Data Pelanggan-->
<div class="modal fade" id="tambahPelanggan" tabindex="-1" role="dialog" aria-labelledby="tambahbarangLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="tambahPelanggan">Tambah Data Pelanggan</h2>
                <button type="button" class="ms-2 btn btn-danger btn-sm close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?php echo base_url()?>pelanggan/simpanDataPelanggan" class="formbarang" method="POST">

                    <div class="form-group mb-3">
                        <div class="mb-3">
                            <label class="form-label">Kode Pelanggan</label>
                            <input type="text" readonly class="form-control" name="kode_pelanggan"
                                value="<?php echo $kode_pelanggan ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="nama_pelanggan"
                                placeholder="Masukan Nama Pelanggan">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat Pelanggan</label>
                            <textarea type="text" rows="3" class="form-control" name="alamat_pelanggan"
                                placeholder="Masukan Alamat Pelanggan"> </textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No Handphone</label>
                            <input type="text" class="form-control" name="no_hp" placeholder="Masukan Nama Pelanggan">
                        </div>

                        <?php if($this->session->userdata('level')=="administrator") { ?>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="">Cabang</label>
                                <select name="kode_cabang" class="form-control" id="exampleFormControlSelect1">
                                    <option>Pilih Cabang...</option>
                                    <?php foreach ($cabang as $key ){ ?>

                                    <?php if($key->kode_cabang== "PST"){ continue; }else{ ?>

                                    <option value="<?php echo $key->kode_cabang; ?>"><?php echo $key->nama_cabang; ?>

                                    <?php } ?>

                                    </option>

                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <input type="hidden" name="kode_cabang"
                            value="<?php echo $this->session->userdata('kode_cabang'); ?>">
                        <?php } ?>

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
    $('#tablepelanggan').DataTable({

    });

});
</script>