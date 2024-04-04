<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">DATA MASTER USERS</h1>
                </div><!-- /.col -->
                <!-- Notifikasi aleret -->

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

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn  mb-3 mr-4" data-toggle="modal"
                        data-target="#tambahuser"> <i class=" fas fa-plus"></i>
                        Tambah Data
                    </button>
                    <!-- ------------------ -->
                    <table class="table table-striped table-bordered" id="tablebarang">
                        <!-- class=" " -->
                        <thead class="thead-dark">
                            <tr align="center" ;>
                                <th>NO</th>
                                <th>ID USER</th>
                                <th>NAMA LENGKAP</th>
                                <th>NO HANDPHONE</th>
                                <th>USERNAME</th>
                                <th>PASSWORD</th>
                                <th>LEVEL</th>
                                <th>CABANG</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                    $no=1;
                    foreach ($user as $u) { ?>
                            <tr align="center" ;>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $u->id_user; ?></td>
                                <td><?php echo $u->nama_lengkap; ?></td>
                                <td><?php echo $u->no_hp; ?></td>
                                <td><?php echo $u->username; ?></td>
                                <td><?php echo $u->password; ?></td>
                                <td><?php echo $u->level; ?></td>
                                <td><?php echo $u->kode_cabang; ?></td>
                                <td>
                                    <a href="<?php echo base_url() ?>user/btn_edit_user/<?php echo $u->id_user; ?>"
                                        class="btn btn-warning btn-sm mb-3">
                                        <i class=" fas fa-edit"></i>
                                        Edit
                                    </a>

                                    <a href="<?php echo base_url()?>user/hapusUser/<?php echo $u->id_user; ?>"
                                        class="btn btn-danger btn-sm mb-3"
                                        onclick="javascript: return confirm('Anda yakin ingin Menghapus Data User?')">
                                        <i class=" fas fa-trash"></i>
                                        Hapus </a>
                                </td>
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
<div class="modal fade" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="tambahuserLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="tambahuserLabel">Tambah Data User</h2><br>


                <p> </p>
                <button type="button" class="ms-2 btn btn-danger btn-sm close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-header">

                <div>
                    <h4 class="text-danger">NOTE</h4> <br>

                    <ul>
                        <li>Untuk Level Kepala Toko Sebagai Administrator, Untuk Cabangnya Pilih <b>PST</b> (pusat) yang dapat menambahkan Data Barang, Data Harga, User</li>
                    </ul>
                </div>

            </div>
            <div class="modal-body">

                <form action="<?php echo base_url()?>user/simpanUser" class="formuser" method="POST">

                    <div class="form-group mb-3">
                        <div class="mb-3">
                            <label class="form-label">Id User</label>
                            <input type="text" readonly class="form-control" name="id_user"
                                value="<?php echo $id_user ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap"
                                placeholder="Masukan Nama Lengkap User Baru">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Handphone</label>
                            <input type="text" class="form-control" name="no_hp" placeholder="Masukan No Hanphone">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukan Username">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" placeholder="Masukan Password">
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="Level">Level</label>
                                <select name="level" class="form-control level" id="exampleFormControlSelect1">
                                    <option selected>Pilih Level...</option>
                                    <option value="kepala toko">kepala toko (Administrator) </option>
                                    <option value="karyawan toko">Karywan Toko</option>
                                    <option value="karyawan gudang">karyawan Gudang </option>
                                    <option value="pemilik toko">Pemilik Toko</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="">Cabang</label>
                                <select name="kode_cabang" class="form-control" id="exampleFormControlSelect1">
                                    <option>Pilih Cabang...</option>
                                    <?php foreach ($cabang as $key ){ ?>

                                    <option value="<?php echo $key->kode_cabang; ?>"><?php echo $key->kode_cabang; ?> -
                                        <?php echo $key->nama_cabang; ?>
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

$('.level').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nik: {
                    message: 'Lvel tidak Boleh Kosong !',
                    validators: {
                        notEmpty: {
                            message: 'NIK Harus Diisi !'
                        }


                    }
                },
            });
</script>