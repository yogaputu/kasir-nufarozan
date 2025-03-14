<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Cetak Harga</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css') ?>" />
</head>


<body onload="window.print()">
    <div id="laporan">

        <table border="1">
            <!-- <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>

                </tr>
            </thead>
            <tbody> -->
            <?php
            $no = 0;
            foreach ($data->result_array() as $a) {
                $no++;
                $id = $a['barang_id'];
                $nm = $a['barang_nama'];
                $harga = $a['barang_harjul'];
                $tgl = date("dmy");
            ?>
                <tr>
                    <td style="font-size: 50px;" align="right"><?php echo "Rp. " . number_format($harga); ?></td>
                </tr>
                <tr>
                    <td style="font-size: 20px;"> <?php echo $nm; ?></td>
                </tr>
                <tr>
                    <td align="right"> <?php echo $tgl; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>