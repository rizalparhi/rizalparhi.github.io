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


                    <?php foreach ($barang as $key) :?>

                    <form action="<?php echo base_url(); ?>barang/update_barang" class="formbarang" method="POST">

                        <div class="form-group mb-3">
                            <div class="mb-3">
                                <label class="form-label">Kode Barang</label>
                                <input type="text" readonly class="form-control" name="kodebarang"
                                    value="<?php echo $key['kode_barang']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" name="namabarang"
                                    placeholder="Masukan Nama Barang" value="<?php echo $key['nama_barang']; ?>">
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="">Satuan</label>
                                    <select name="satuan" class="form-control" id="exampleFormControlSelect1">
                                        <option>Pilih...</option>
                                        <option value="Pcs" <?php echo ($key['satuan'] == "Pcs") ? 'selected' : ' '; ?>>
                                            Pcs
                                        </option>
                                        <option value="Kaleng"
                                            <?php echo ($key['satuan'] == "Kaleng") ? 'selected' : ' '; ?>>Kaleng
                                        </option>
                                        <option value="Galon"
                                            <?php echo ($key['satuan'] == "Galon") ? 'selected' : ' '; ?>>
                                            Galon </option>
                                        <option value="Pail"
                                            <?php echo ($key['satuan'] == "Pail") ? 'selected' : ' '; ?>>
                                            Pail </option>
                                        <option value="Dus" <?php echo ($key['satuan'] == "Dus") ? 'selected' : ' '; ?>>
                                            Dus
                                        </option>
                                        <option value="Dus"
                                            <?php echo ($key['satuan'] == "Batang") ? 'selected' : ' '; ?>>
                                            Batang </option>
                                        <option value="Dus"
                                            <?php echo ($key['satuan'] == "Pail") ? 'selected' : ' '; ?>>
                                            Lembar </option>
                                        <option value="Kg" <?php echo ($key['satuan'] == "Kg") ? 'selected' : ' '; ?>>Kg
                                        </option>
                                        <option value="Ons" <?php echo ($key['satuan'] == "Ons") ? 'selected' : ' '; ?>>
                                            Ons
                                        </option>
                                        <option value="Meter"
                                            <?php echo ($key['satuan'] == "Meter") ? 'selected' : ' '; ?>>
                                            Meter </option>
                                        <option value="Meter"
                                            <?php echo ($key['satuan'] == "Cm") ? 'selected' : ' '; ?>>Cm
                                        </option>
                                        <option value="Set" <?php echo ($key['satuan'] == "Dus") ? 'selected' : ' '; ?>>
                                            Dus
                                        </option>
                                    </select>
                                </div>

                                

                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="">Cabang</label>
                                        <select name="supplier" class="form-control" id="exampleFormControlSelect1">
                                            <option>Pilih Supplier...</option>
                                            <?php foreach ($supplier as $s){ ?>

                                            <option <?php if($s['nama_supplier']==$key['supplier']){echo "selected";} ?>
                                                value="<?php echo $s['nama_supplier']; ?>">
                                                <?php echo $s['nama_supplier']; ?> </option>

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

</div>