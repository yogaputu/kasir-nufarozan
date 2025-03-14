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
                if ($group == '-' || $group != $d['beli_tanggal']) {
                    $b_tgl = $d['beli_tanggal'];
                    $query = $this->db->query("SELECT a.*, b.*, c.*, d.*, SUM(b.d_beli_jumlah) AS jumlah, SUM(b.d_beli_harga) AS harga, SUM(b.d_beli_total) AS bayar from tbl_beli a 
		JOIN tbl_detail_beli b ON a.beli_kode = b.d_beli_kode
		JOIN tbl_suplier c ON a.beli_suplier_id = c.suplier_id
		JOIN tbl_barang d ON b.d_beli_barang_id = d.barang_id 
		WHERE a.beli_tanggal ='$b_tgl'");
                    $t = $query->row_array();

                    $tgl = date('d-m-Y', strtotime($t['beli_tanggal']));
                    $harga = 'Rp ' . number_format($t['harga']);
                    $bayar = 'Rp ' . number_format($t['bayar']);
                    $jumlah = $t['jumlah'];

                    if ($group != '-')
                        echo "</table><br>";
                    echo "<table align='center' width='900px;' border='1'>";
                    echo "<tr><td colspan='5'><b>Tanggal: $tgl</b></td><td colspan='1' style='text-align:center;'><b>Total Beli: $harga </b></td> <td colspan='1' style='text-align:center;'><b>Total Jumlah: $jumlah </b></td><td colspan='2' style='text-align:center;'><b>Total Bayar: $bayar </b></td></tr>";
                    echo "<tr style='background-color:#ccc;'>
    <td width='4%' align='center'>No</td>
    <td width='10%' align='center'>Tanggal</td>
    <td width='20%' align='center'>Suplier</td>
    <td width='10%' align='center'>No Faktur</td>
    <td width='25%' align='center'>Nama Barang</td>
    <td width='10%' align='center'>Harga Beli</td>
    <td width='10%' align='center'>Jumlah Pembelian</td>
    <td width='10%' align='center'>Bayar</td>

    </tr>";
                    $nomor = 1;
                }
                $group = $d['beli_tanggal'];
                if ($urut == 500) {
                    $nomor = 0;
                    echo "<div class='pagebreak'> </div>";
                }
            ?>
                <tr>
                    <td style="text-align:center;vertical-align:center;text-align:center;"><?php echo $nomor; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($tgl)); ?></td>
                    <td><?php echo $d['suplier_nama']; ?></td>
                    <td><?php echo $d['d_beli_nofak']; ?></td>
                    <td><?php echo $d['barang_nama']; ?></td>
                    <td style="text-align:right;"><?php echo number_format($d['d_beli_harga']); ?></td>
                    <td style="text-align:right;"><?php echo $d['d_beli_jumlah']; ?></td>
                    <td style="text-align:right;"><?php echo number_format($d['d_beli_total']); ?></td>
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