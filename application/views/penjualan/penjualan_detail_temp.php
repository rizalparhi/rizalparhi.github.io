<?php
// print_r($barangtemp);
// var_dump($barangtemp);
$totalpenjualan=0;
$totalpenjualanModal=0;
$totalpenjualanBakul=0;
$warna="0";
$jenis_harga="";

$no =1;
foreach ($barangtemp as $b){ $totalpenjualan= $totalpenjualan + $b->total;
$jenis_harga=$b->jenis_harga;

if($b->jenis_harga =="harga modal"){                             
        $warna= "badge-danger";
}else if($b->jenis_harga =="harga bakul"){
        $warna= "badge-warning";
}else if($b->jenis_harga =="harga eceran"){
      $warna= "badge-primary";
};
?>
<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $b->kode_barang; ?></td>
    <td><?php echo $b->nama_barang; ?></td>
  
    <td align="center"><?php
    if ($b->jenis_harga =="harga modal"){ 
        echo number_format($b->harga_modal,'0','','.'); 
    }else if($b->jenis_harga =="harga bakul"){
         echo number_format($b->harga_bakul,'0','','.'); 
    }else{
        echo number_format($b->harga,'0','','.'); 
    } ?>
    </td>
    <td><?php echo $b->qty; ?></td>
    <td><?php echo number_format($b->total,'0','','.'); ?></td>


    <td align="center">
        <a href="#" class="btn btn-danger btn-sm hapus" data-kodebarang="<?php echo $b->kode_barang; ?>"
            data-iduser="<?php echo $b->id_user; ?>">
            <i class="fa fa-trash"></i>
        </a>
    </td>
</tr>

<?php } ?>

<tr>
    <th colspan="3">JENIS HARGA :</th>
     <td align="center">
         <h4><b><span class="badge  font-weight-normal <?php echo $warna; ?>">
         <?php 
         if($jenis_harga==""){
              echo "";
         }else{
             echo ucwords($jenis_harga);
         }
        ?>
       </b> </span></h4>
    </td>
         
   
</tr>



<tr>
    <th colspan="5">GRAND TOTAL :</th>
 

    <td><b id="total"><?php echo "Rp "; echo number_format( $totalpenjualan,'0','','.'); ?></b></td>
    <td></td>
    
</tr>


<script>
function loadtotal() {
    var total = $("#total").text();
    $("#totalpenjualan").text(total);
}
loadtotal();




$(function() {
    $(".hapus").click(function() {
        var kodebarang = $(this).attr("data-kodebarang");
        var iduser = $(this).attr("data-iduser");
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>penjualan/hapusBarangtemp',
            data: {
                kodebarang: kodebarang,
                iduser: iduser
            },
            cache: false,
            success: function(respond) {
                if (respond == 1) {
                    swal.fire("Deleted", "Data Berhasil Dihapus", "success");
                    loadDataBarang();
                }

            }
        });
    });
});
</script>