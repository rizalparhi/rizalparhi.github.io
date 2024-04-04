<form method="POST" action="<?php echo base_url(); ?>penjualan/simpanbayar" id="formBayar" ?>

    <input type="text" value="<?php echo $no_faktur; ?>" name="no_faktur">
    <input type="text" value="<?php echo $grandtotal; ?>" name="totalpenj" id="totalpenj">
    <input type="text" value="<?php echo $totalbayar; ?>" name="totalbayar" id="totalbayar">
    <input type="text" value="<?php echo $totalmodal; ?>" name="totalmodal" id="totalmodal">

    <?php
            //   $persen= ($totalbayar/$grandtotal)*100; 
            //    $persenToDesimal=$persen/100;
            //    $hargaModalTerbayar= $persenToDesimal*$hargamodal;
            //  
              
               $persen=round($totalbayar/$grandtotal*100,2);  
               $persenToDesimal=round($persen/100,2);
               $hargaModalTerbayar= $persenToDesimal*$totalmodal;
               echo $persen,PHP_EOL; 
               echo $persenToDesimal,PHP_EOL;
               echo $hargaModalTerbayar ;
   ?>

    <label class="form-label mr-3">Tanggal Bayar : </label>
    <div class="input-group mb-3">
        <div class="input-group-prepend date" data-provide="datepicker">
            <span class="input-group-text"><i class="fas  fa-calendar"></i></span>
        </div>
        <input type="date" name="tglbayar" class="form-control" placeholder="Tanggal Bayar" id="tglbayar"
            value="<?php echo date("Y/m/d"); ?>">
    </div>
    <label class="form-label mr-3">Jumalh Bayar : </label>
    <div class="input-group mb-3">
        <div class="input-group-prepend date" data-provide="datepicker">
            <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
        </div>
        <input type="text" name="jmlbayar" class="form-control bayar" placeholder="Jumlah Bayar" id="jmlbayar" value="">
    </div>

    <input type="text" name="inputHargamodal" class="form-control bayar"
        placeholder="ini harga modal dari transaksi ini" id="inputHargamodal"
        value="<?php echo $hargaModalTerbayar; ?>">



    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100"> <i class="fa fa-send mr-2 ">BAYAR</i></button>
    </div>

</form>


<script>
$(document).ready(function() {

    // / Format mata uang.
    //    $( '.bayar' ).mask('000.000.000', {reverse: true});

})
$(function() {
    $("#formBayar").submit(function() {
        var jmlbayar = $("#jmlbayar").val();
        var totalpenj = $("#totalpenj").val();
        var totalbayar = $("#totalbayar").val();
        var sisabayar = parseInt(totalpenj) - parseInt(totalbayar);
        if (jmlbayar == "" || jmlbayar == 0) {
            swal.fire("Opps", "Jumlah Bayar Tidak Boleh Kosong", "warning");
            return false;
        } else if (parseInt(jmlbayar) > parseInt(sisabayar)) {
            swal.fire("Opps",
                "Jumlah Bayar Tidak Boleh Melebihi Sisa Bayar, Sisa Bayar Anda Adalah Rp" +
                sisabayar, "warning");
            return false;
        } else {
            return true;
        };
    });











});
</script>