<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">FORM TAMBAH STOK BARANG BARANG</h1>
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


            <?php foreach ($harga as $hr) :?>

                <form action="<?php echo base_url(); ?>barang/historiBarangmasuk" class="formbarang" method="POST">

                        <div class="mb-3">
                            <label class="form-label">Kode Harga</label>
                            <input type="text" class="form-control" readonly name="kode_harga" id="kode_harga"
                                placeholder="Masukan Kode Harga" value="<?php echo $hr['kode_harga']; ?>" >
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <select  disabled readonly class="form-control" id="nama_barang">
                                    <?php foreach ($barang as $b ){ ?>

                                    <option <?php if($hr['kode_barang']==$b->kode_barang){echo "selected";} ?> value="<?php echo $b->nama_barang; ?>"><?php echo $b->kode_barang." ".$b->nama_barang; ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                          
                                <select name="nama_barang" hidden  readonly class="form-control" id="nama_barang">
                                    <?php foreach ($barang as $b ){ ?>

                                    <option <?php if($hr['kode_barang']==$b->kode_barang){echo "selected";} ?> value="<?php echo $b->nama_barang; ?>"><?php echo $b->kode_barang." ".$b->nama_barang; ?></option>

                                    <?php } ?>
                                </select>
                         

                      <div class="mb-3">
                            <div class="form-group">
                                <label for="">Supplier</label>
                                <select disabled readonly class="form-control" >
                                    <?php foreach ($barang as $b ){ ?>

                                    <option <?php if($hr['kode_barang']==$b->kode_barang){echo "selected";} ?> value="<?php echo $b->supplier; ?>"><?php echo $b->supplier ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <select fix  name="supplier" hidden readonly class="form-control" id="nama_barang">
                                    <?php foreach ($barang as $b ){ ?>

                                    <option <?php if($hr['kode_barang']==$b->kode_barang){echo "selected";} ?> value="<?php echo $b->supplier; ?>"><?php echo $b->supplier ?></option>

                                    <?php } ?>
                         </select>


                            
            

                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="text" readonly class="form-control" name="stok" id="harga"
                            placeholder="Masukan Stok Barang" value="<?php echo $hr['stok'];?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tambah Stok Barang</label>
                            <input type="text" class="form-control" name="tmbhstok" id="tmbhstok"
                            placeholder="Masukan Jumlah Stok Barang Yang ingin Di tambah" value="">
                        </div>

                        <label class="form-label mr-3">Tanggal Barang Masuk : </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend date" data-provide="datepicker">
                                            <span class="input-group-text"><i class="fas  fa-calendar"></i></span>
                                        </div>
                                        <input type="text" name="tgl_masuk" class="form-control"
                                            placeholder="Tanggal Barang Masuk" id="tgl_masuk"
                                            value="<?php echo date("Y/m/d"); ?>" >
                        </div>


                         <div class="mb-3">
                            <div class="form-group">
                                <label for="">Cabang</label>
                                <select   disabled class="form-control" >
                                    <option value=" ">Pilih Cabang...</option>
                                    <?php foreach ($cabang as $cb ){ ?>

                                    <option <?php if($hr['kode_cabang']==$cb->kode_cabang){echo "selected";} ?> value="<?php echo $cb->kode_cabang; ?>"><?php echo $cb->nama_cabang; ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                         </div>
                          <select name="kode_cabang" hidden class="form-control" id="kode_cabang">
                                
                                    <?php foreach ($cabang as $cb ){ ?>

                                    <option <?php if($hr['kode_cabang']==$cb->kode_cabang){echo "selected";} ?> value="<?php echo $cb->kode_cabang; ?>"><?php echo $cb->nama_cabang; ?></option>

                                    <?php } ?>
                           </select>
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
                    <a href="<?php echo base_url('barang/harga'); ?>" class="btn btn-warning btn-sm mb-3 mr-4 edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
                        </svg>
                        Kembali
                    </a>
             


                <!-- ------ Close Tag Header ------            -->
            </div><!-- /.container-fluid -->

        </div>
</div>
</section>
<!-- /.content -->
</div>


<script>
$('#tglbrgmasuk').datepicker({
    format: 'yyyy/mm/dd',
    todayHighlight: true,
    autoclose: true,
    
});
</script>
