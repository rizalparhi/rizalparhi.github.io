<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">FORM EDIT DATA PELANGGAN</h1>
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


                    <?php foreach ($pelanggan as $key) :?>

                    <form action="<?php echo base_url(); ?>pelanggan/editDataPelanggan" class="formbarang" method="POST">
                       
                        <div class="form-group mb-3">
                            <div class="mb-3">

                                <label class="form-label">Kode Pelanggan</label>
                                <input type="text" readonly class="form-control" name="kode_pelanggan"
                                    placeholder="Masukan Kode Pelanggan" value="<?php echo $key['kode_pelanggan']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Pelanggan</label>
                                <input type="text" class="form-control" name="nama_pelanggan"
                                    placeholder="Masukan Nama Pelanggan" value="<?php echo $key['nama_pelanggan']; ?>">
                            </div>

                          <div class="mb-3">
                            <label class="form-label">Alamat Pelanggan</label>
                            <textarea type="text" rows="3" class="form-control" name="alamat_pelanggan" placeholder="Masukan Alamat Pelanggan"
                             value=""> <?php echo $key['alamat_pelanggan']; ?></textarea>
                          </div>

                           <div class="mb-3">
                                <label class="form-label">No handphone</label>
                                <input type="text" class="form-control" name="no_hp"
                                    placeholder="Masukan No Handphone" value="<?php echo $key['no_hp']; ?>">
                            </div>

                          <div class="mb-3">
                            <div class="form-group">
                                <label for="">Cabang</label>
                                <select name="kode_cabang" class="form-control" id="exampleFormControlSelect1">
                                    <option >Pilih Cabang...</option>
                                    <?php foreach ($cabang as $cb ){ ?>

                                    <option <?php if($key['kode_cabang']==$cb->kode_cabang){echo "selected";} ?> value="<?php echo $cb->kode_cabang; ?>"><?php echo $cb->nama_cabang; ?> </option>

                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        
                            <div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" >
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
                    <a href="<?php echo base_url('pelanggan/index'); ?>" class="btn btn-warning btn-sm mb-3 mr-4 edit">
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