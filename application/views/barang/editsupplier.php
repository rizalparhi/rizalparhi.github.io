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
                    <?php foreach ($supplier as $s) :?>

                    <form action="<?php echo base_url(); ?>barang/editDataSupplier" class="formbarang" method="POST">

                        <div class="form-group mb-3">
                            <div class="mb-3">

                                <label class="form-label">ID SUPPLIER</label>
                                <input type="text" readonly class="form-control" name="id_supplier"
                                    placeholder="Masukan Kode cabang" value="<?php echo $s['id_supplier']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Supplier</label>
                                <input type="text" class="form-control" name="nama_supplier"
                                    placeholder="Masukan Nama cabang" value="<?php echo $s['nama_supplier']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat Supplier</label>
                                <textarea type="text area" rows="3" class="form-control" name="alamat_supplier"
                                    placeholder="Masukan Alamat Cabang"
                                    value=""> <?php echo $s['alamat_supplier']; ?></textarea>
                            </div>

                             <div class="mb-3">
                                <label class="form-label">No Telpon/Hp</label>
                                <input type="text" class="form-control" name="no_telp"
                                    placeholder="Masukan Nama cabang" value="<?php echo $s['no_telp']; ?>">
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
                    <a href="<?php echo base_url('barang/supplier'); ?>" class="btn btn-warning btn-sm mb-3 mr-4 edit">
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