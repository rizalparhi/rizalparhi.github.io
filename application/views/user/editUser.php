<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">FORM EDIT DATA USER</h1>
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


                    <?php foreach ($user as $u) :?>

                   
                <form action="<?php echo base_url()?>user/updateDatauser" class="formuser" method="POST">

                    <div class="form-group mb-3">
                        <div class="mb-3">
                            <label class="form-label">id User</label>
                            <input type="text" class="form-control" readonly name="id_user" placeholder="Masukan id user (tidak boleh sama dengan yang sbelumnya)"
                            value="<?php echo $u['id_user']; ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukan Nama Lengkap User Baru" 
                             value="<?php echo $u['nama_lengkap']; ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Handphone</label>
                            <input type="text" class="form-control" name="no_hp" placeholder="Masukan Nama No Handphone" 
                             value="<?php echo $u['no_hp']; ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukan Username"
                             value="<?php echo $u['username']; ?>" >
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" placeholder="Masukan Password"
                             value="<?php echo $u['password']; ?>">
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="">Level</label>
                                <select name="level" class="form-control" id="exampleFormControlSelect1">
                                    <option >Pilih Level...</option>
                                    <option value="administrator"<?php echo ($u['level'] == "administrator") ? 'selected' : ' '; ?>>Kepala Toko</option>
                                    <option value="karyawan"<?php echo ($u['level'] == "karyawan") ? 'selected' : ' '; ?>>Karywan Toko</option>
                                    <option value="gudang"<?php echo ($u['level'] == "gudang") ? 'selected' : ' '; ?>>Kepala Gudang</option>
                                    <option value="pemilik toko">Pemilik Toko (Owner)</option>
                                </select>
                            </div>
                        </div>

                        
                         <div class="mb-3">
                            <div class="form-group">
                                <label for="">Cabang</label>
                                <select  name="kode_cabang" class="form-control" id="kode_cabang">
                                    <option value=" ">Pilih Cabang...</option>
                                    <?php foreach ($cabang as $cb ){ ?>

                                    <option <?php if($u['kode_cabang']==$cb->kode_cabang){echo "selected";} ?> value="<?php echo $cb->kode_cabang; ?>"><?php echo $cb->kode_cabang; ?> - <?php echo $cb->nama_cabang; ?></option>

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

                    <?php endforeach; ?>
                    <a href="<?php echo base_url('barang/index'); ?>" class="btn btn-warning btn-sm mb-3 mr-4 edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
                        </svg>
                        Kembali
                    </a>
                </div>


                <!-- ------ Close Tag Header ------            -->
            </div><!-- /.container-fluid -->

        </div>
</div>
</section>
<!-- /.content -->
</div>