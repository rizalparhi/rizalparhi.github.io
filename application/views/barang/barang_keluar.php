
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">DATA HISTORI BARANG KELUAR</h1>
                </div>
            </div>
        </div>
    </div>
 
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
                        <th>NAMA BARANG</th>
                        <th>QTY</th>
                        <th>TANGGAL KELUAR</th>
                        <th>SUPPLIER</th>
                        <th>ID USER</th>
                        <!-- <th>AKSI</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1;
                    foreach ($barangkeluar as $b) { ?>
                    <tr align="center" ;>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $b->nama_barang; ?></td>
                        <td><?php echo $b->qty; ?></td>
                        <td><?php echo $b->tgltransaksi; ?></td>
                        <td><?php echo $b->supplier; ?></td>
                        <td><?php echo $b->id_user; ?></td>
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

</div>






<script type="text/javascript">
	
	$(document).ready(function() {
		var table = $('#tablebarang').DataTable({
			"order": [[ 1, "desc" ]],
			"ordering": true
		});
		$.fn.dataTable.ext.search.push(
			function(settings, data, dataIndex) {
			  var min = $('.date_range_filter').val();
			  var max = $('.date_range_filter2').val();
			  var createdAt = data[3];  // -> rubah angka 4 sesuai posisi tanggal pada tabelmu, dimulai dari angka 0
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


