<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">FORM EDIT DATA CABANG</h1>
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



                    <?php foreach ($cabang as $cb) :?>

                    <form action="<?php echo base_url(); ?>cabang/editDataCabang" class="formbarang" method="POST">

                        <div class="form-group mb-3">
                            <div class="mb-3">

                                <label class="form-label">Kode Cabang</label>
                                <input type="text" readonly class="form-control" name="kode_cabang"
                                    placeholder="Masukan Kode cabang" value="<?php echo $cb['kode_cabang']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama cabang</label>
                                <input type="text" class="form-control" name="nama_cabang"
                                    placeholder="Masukan Nama cabang" value="<?php echo $cb['nama_cabang']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat Cabang</label>
                                <textarea type="text" rows="3" class="form-control" name="alamat_cabang"
                                    placeholder="Masukan Alamat Cabang"
                                    value=""> <?php echo $cb['alamat_cabang']; ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">NO Telepon/HP</label>
                                <input type="text" class="form-control" name="telepon" placeholder="Masukan No Telepon"
                                    value="<?php echo $cb['telepon']; ?>">
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
                    <a href="<?php echo base_url('cabang/index'); ?>" class="btn btn-warning btn-sm mb-3 mr-4 edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
                        </svg>
                        Kembali
                    </a>
                </div>





                <!-- Close Header------------------------------------------------ -->
            </div><!-- /.container-fluid -->

        </div>
</div>
</section>
<!-- /.content -->
</div>