<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>laporan data barang modal</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css') ?>" />
</head>

<body onload="window.print()">
    <div id="laporan">
        <table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
            <!--<tr>
    <td><img src="<? php // echo base_url().'assets/img/kop_surat.png'
                    ?>"/></td>
</tr>-->
        </table>

        <table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
            <tr>
                <td colspan="2" style="width:800px;paddin-left:20px;">
                    <center>
                        <h4>LAPORAN DATA BARANG MODAL</h4>
                    </center><br />
                </td>
            </tr>

        </table>

        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>

        <table border="1" align="center" style="width:900px;margin-bottom:20px;">
            <?php
            $urut = 0;
            $nomor = 0;
            $group = '-';
            foreach ($data->result_array() as $d) :
                $nomor++;
                $urut++;
                $harga1 = $d['harga'];
                $jumlah1 = $d['jumlah'];
                $total1 = $harga1 * $jumlah1;

                if ($group == '-' || $group != $d['tgl']) {
                    $b_tgl = $d['tgl'];
                    $query = $this->db->query("SELECT a.*, b.nama_brg, SUM(b.harga) AS harga_b, SUM(b.jumlah) AS jumlah_b, SUM(b.harga*b.jumlah) AS tot_bayar from beli_harian a 
		JOIN beli_harian_detil b ON a.id = b.id_beli_harian
		WHERE a.tgl ='$b_tgl'");
                    $t = $query->row_array();

                    $tgl = date('d-m-Y', strtotime($d['tgl']));
                    $b_harga = 'Rp ' . number_format($t['harga_b']);
                    $b_jumlah = 'Rp ' . number_format($t['jumlah_b']);
                    $total_bayar = 'Rp ' . number_format($t['tot_bayar']);


                    if ($group != '-')
                        echo "</table><br>";
                    echo "<table align='center' width='900px;' border='1'>";
                    echo "<tr><td colspan='3'><b>Tanggal: $tgl</b></td><td colspan='1' style='text-align:center;'><b>Total Beli: $b_harga </b></td> <td colspan='1' style='text-align:center;'><b>Total Jumlah: $b_jumlah </b></td><td colspan='2' style='text-align:center;'><b>Total Bayar: $total_bayar</b></td></tr>";
                    echo "<tr style='background-color:#ccc;'>
    <td width='4%' align='center'>No</td>
    <td width='10%' align='center'>Tanggal</td>
    <td width='25%' align='center'>Nama Barang</td>
    <td width='10%' align='center'>Harga Beli</td>
    <td width='10%' align='center'>Jumlah Pembelian</td>
    <td width='10%' align='center'>Bayar</td>

    </tr>";
                    $nomor = 1;
                }
                $group = $d['tgl'];
                if ($urut == 500) {
                    $nomor = 0;
                    echo "<div class='pagebreak'> </div>";
                }
            ?>
                <tr>
                    <td style="text-align:center;vertical-align:center;text-align:center;"><?php echo $nomor; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($tgl)); ?></td>
                    <td><?php echo $d['nama_brg']; ?></td>
                    <td style="text-align:right;"><?php echo number_format($d['harga']); ?></td>
                    <td style="text-align:right;"><?php echo $d['jumlah']; ?></td>
                    <td style="text-align:right;"><?php echo number_format($total1); ?></td>
                </tr>

            <?php endforeach; ?>

        </table>

        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td align="right">Boyolali, <?php echo date('d F Y') ?></td>
            </tr>
            <tr>
                <td align="right"></td>
            </tr>

            <tr>
                <td><br /><br /><br /><br /></td>
            </tr>
            <tr>
                <td align="right">( <?php echo $this->session->userdata('nama'); ?> )</td>
            </tr>
            <tr>
                <td align="center"></td>
            </tr>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <th><br /><br /></th>
            </tr>
            <tr>
                <th align="left"></th>
            </tr>
        </table>
    </div>
</body>

</html>