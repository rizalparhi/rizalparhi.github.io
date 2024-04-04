<htmL>

<head>
    <title>Laporan Penjualan</title>
    <style>
    table,
    th,
    td {
        border-collapse: collapse;
        border: 2px solid black;
    }

    table,
    th,
    td {
        padding: 5px;
    }

    th {
        font-size: 14px;
        background-color: #2972ba;
        color: white;

    }
    </style>
</head>

<body>
    <h3><b>LAPORAN PENJUALAN </b>
        <?php if(empty($cabang)){
            echo "SEMUA CABANG";
        }else{
            echo "CABANG ".$cabang;
        }
       ?>
        <br>
        PERIODE <?php echo $dari; ?> s/d <?php echo $sampai; ?>
    </h3>
    <hr>
    <br>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>NO FAKTUR</th>
            <th>TGL TRANSAKSI</th>
            <th>KODE PELANGGAN</th>
            <th>NAMA PELANGGAN</th>
            <th>JENIS TRANSAKSI</th>
            <th>JATUH TEMPO</th>
            <th>TOTAL MODAL PENJUALAN</th>
            <th>TOTAL PENJUALAN</th>
            <th>TOTAL BAYAR</th>
            <th>SISA BAYAR</th>
            <th>KETERANGAN</th>
            <th>KASIR</th>


        </tr>
        <?php
          
        $totalpenjualan = 0;
        $totalmodal=0;
        $totalbayar = 0;
        $totalsisabayar = 0;
        $no = 1;
        foreach($laporanpnj as $d ){
           $totalpenjualan += $d->totalpenjualan;
           $totalmodal += $d->totalmodal;
           $totalbayar += $d->totalbayar;
           $sisabayar = $d->totalpenjualan - $d->totalbayar;
           $totalsisabayar += $sisabayar;
            if($sisabayar != 0){
                $keterangan = "Belum Lunas";
                $colorbg ="#ba2b4f" ;
                $colortext = "white";
            }else{
                $keterangan = "Lunas";
                $colorbg ="";
                $colortext ="";
            }
       
         ?>
        <tr style="background-color: <?php echo $colorbg ; ?>; color: <?php echo $colortext; ?>">
            <td><?php echo $no++; ?></td>
            <td><?php echo $d->no_faktur; ?></td>
            <td><?php echo $d->tgltransaksi; ?></td>
            <td><?php echo $d->kode_pelanggan; ?></td>
            <td><?php echo $d->nama_pelanggan; ?></td>
            <td><?php echo $d->jenistransaksi; ?></td>
            <td><?php echo $d->jatuhtempo; ?></td>
            <td ><?php 
            if($d->totalmodal==0){
                echo "Belum ada Pembayaran" ;
            }else{
            echo "Rp ".number_format($d->totalmodal,'0','','.'); 

            }
            // echo "Rp ".number_format($d->totalmodal,'0','','.'); 
            
            
            ?></td>
            <td ><?php echo "Rp ".number_format($d->totalpenjualan,'0','','.'); ?></td>
            <td ><?php echo "Rp ".number_format($totalbayar,'0','','.'); ?></td>
            <td ><?php echo "Rp ".number_format($sisabayar,'0','','.'); ?></td>
            <td><?php echo $keterangan; ?></td>
            <td><?php echo $d -> nama_lengkap; ?></td>
        </tr>

        <?php } ?>
        <tr style="background-color: yellow;  border: 2px solid black;">
            <td colspan="7" align="center" ><b> TOTAL </b></td>
            <td ><b><?php echo "Rp ".number_format($totalmodal,'0','','.'); ?></b></td>
            <td ><b><?php echo "Rp ".number_format($totalpenjualan,'0','','.'); ?></b></td>
            <td ><b><?php echo "Rp ".number_format($totalbayar,'0','','.'); ?></b></td>
            <td ><b><?php echo "Rp ".number_format($totalsisabayar,'0','','.'); ?></b></td>
            <td colspan="2"></td>
        </tr>
        <tr style="background-color: yellow;  border: 2px solid black;">
             <td colspan="7" align="center" ><b> KEUNTUNGAN/LABA </b></td>
            <td colspan="6" align="center"><b><?php echo "Rp ".number_format($totalpenjualan-$totalmodal,'0','','.'); ?></b></td>
        </tr>
    </table>




</body>

</htmL>