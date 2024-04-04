    <?php 
                    $no=1;
                    foreach ($barang as $b) { ?>
    <tr align="center" ;>
        <td><?php echo $no++; ?></td>
        <td><?php echo $b->kode_barang; ?></td>
        <td><?php echo $b->nama_barang; ?></td>
        <td><?php echo $b->satuan; ?></td>
        <td><?php echo $b->supplier; ?></td>

        <td>
            <a href="#" class="btn btn-primary btn-sm mb-3 barang" id="pilihbarang"
                data-nambar="<?php echo $b->nama_barang; ?>" data-kodbar="<?php echo $b->kode_barang; ?>">Pilih </a>
        </td>
    </tr>
    <?php } ?>