<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">DATA HISTORI BARANG MASUK</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
       
            <?php echo $this->session->flashdata('message'); ?>

     <div class="card">
       <div class="card-body">

              

       <div class="row mb-3">
				<div class="col-md-2">
				  <span>Pilih dari tanggal</span>
				  <div class="input-group">
				    <input type="text" class="form-control pickdate date_range_filter" name="" >
				    <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar"></span></span>
				  </div>
				</div>
				<div class="col-md-2">
				  <span>Sampai tanggal</span>
				  <div class="input-group">
				    <input type="text" class="form-control pickdate date_range_filter2" name="">
				    <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar"></span></span>
				  </div>
				</div>
			</div>
            <!-- ------------------ -->
            <table class="table table-striped table-bordered" id="tablebarang">
                <!-- class=" " -->
                <thead class="thead-dark">
                    <tr align="center" ;>
                        <th>NO</th>
                        <th>ID BARANG MASUK</th>
                        <th>NAMA BARANG</th>
                        <th>SUPPLIER</th>
                        <th>STOK YANG DI TAMBAHKAN</th>
                        <th>TANGGAL MASUK</th>
                        <th>CABANG</th>
                        <!-- <th>AKSI</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1;
                    foreach ($barangmsk as $b) { ?>
                    <tr align="center" ;>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $b->id_barang_masuk; ?></td>
                        <td><?php echo $b->nama_barang; ?></td>
                        <td><?php echo $b->supplier; ?></td>
                        <td><?php echo $b->tmbhstok; ?></td>
                        <td><?php echo $b->tgl_masuk; ?></td>
                        <td><?php echo $b->kode_cabang; ?></td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
         <div class="mb-3">
                <a href="<?php echo base_url()?>barang/formHistoribarang" class="btn btn-success btn-lg mb-3"> Kembali </a>
         </div>
  
        </div><!-- /.container-fluid -->
       </div>
     </div>   
    </section>
    <!-- /.content -->
</div>






<script type="text/javascript">


	// unutuk Filter Tanggal
	$(document).ready(function() {
		var table = $('#tablebarang').DataTable({
			"order": [[ 1, "desc" ]],
			"ordering": true
		});
		$.fn.dataTable.ext.search.push(
			function(settings, data, dataIndex) {
			  var min = $('.date_range_filter').val();
			  var max = $('.date_range_filter2').val();
			  var createdAt = data[5];  // -> rubah angka 4 sesuai posisi tanggal pada tabelmu, dimulai dari angka 0
			  if (
			    (min == "" || max == "") ||
			    (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
			  ) {
			    return true;
			  }
			  return false;
			}
		);
	    $('.pickdate').each(function() {
	        $(this).datepicker({format: 'mm/dd/yyyy'});
	     });
		$('.pickdate').change(function() {
	        table.draw();
	    });		
	});


</script>


