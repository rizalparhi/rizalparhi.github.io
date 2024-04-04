<style>
table(font-family : Arial;
)
</style>

<table>
    <tr>
        <td>

<!-- -------------------------------------------------------------------------------------------- -->
        <tr style="font-family: Arial; font-size:25px;  ">
              <td><b>MEKAR JAYA</b></td>
         </tr>
         <tr>
              <td>Jetak RT.001/002 Sindangwangi, Kec. Bantarkawung, Kab. Brebes 52274</td>
         </tr>
         <tr>
              <td>No. Handphone : 0857-1232-1270, email : Mekarjaya@gmail.com </td>
         </tr>
<!-- -------------------------------------------------------------------------------------------- -->

        </td>
    </tr>
   
</table>


<hr>
<center>
    <h4 style="font-family: Arial; font-size:16px;"> FAKTUR PENJUALAN </h4>
</center>



<table border="0" style="width:100%">
    <tr>
        <td>
            <table border="0">
                <tr>
                    <td>No Faktur</td>
                    <td>:</td>
                    <td><?php echo $penjualan['no_faktur']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><?php echo $penjualan['tgltransaksi']; ?></td>
                </tr>

            </table>
        </td>
        <td style="width:30%"> </td>
        <!-- kolom sebelah kanan -->
        <td>
            <table border="0">
                <tr>
                    <td>Kode Pelanggan</td>
                    <td>:</td>
                    <td><?php echo $penjualan['kode_pelanggan']; ?></td>
                </tr>
                <tr>
                    <td>Nama Pelanggan</td>
                    <td>:</td>
                    <td><?php echo $penjualan['nama_pelanggan']; ?></td>
                </tr>
                <tr>
                    <td>Alamat Pelanggan</td>
                    <td>:</td>
                    <td><?php echo $penjualan['alamat_pelanggan']; ?></td>
                </tr>

            </table>
        </td>

    </tr>
</table>

<br>
<br>
<table border="1" style="width:100%; border-collapse: collapse;"  >

    <tr>
        <td align="center">NO</td>
        <td align="center">KODE BARANG</td>
        <td align="center">NAMA BARANG</td>
        <td align="center">HARGA</td>
        <td align="center">QTY</td>
        <td align="center">SUBTOTAL</td>


    </tr>
    <?php
    $no=1;
    $total = 0;
    foreach($detail as $d ){
        $totalharga = $d->qty * $d->harga;
        $total = $total + $totalharga;
        ?>
    <tr>
        <td align="center"><?php echo $no++; ?></td>
        <td align="center"><?php echo $d->kode_barang; ?></td>
        <td align="center"><?php echo $d->nama_barang; ?></td>
        <td align="right"><?php echo "Rp ".number_format($d->harga,'0','','.'); ?></td>
        <td align="center"><?php echo $d->qty; ?></td>
        <td align="right"><?php echo "Rp ".number_format($totalharga,'0','','.'); ?></td>
    </tr>
    
    
    <?php } ?>
    <tr style=" border-collapse: collapse; fon-size:17px;" >
        <td  colspan="5"><b> TOTAL </b> </td>
        
        <td align="right" colspan="2"><b><?php echo "Rp ".number_format($total,'0','','.'); ?></b></td>
      
    </tr>
    <!-- <tr style="fon-size:19px;">
        <td  colspan="5">
            <i><b> <?php echo ucwords(terbilang($total)."Rupiah"); ?>  </b></i>
        </td>
    </tr> -->
</table>