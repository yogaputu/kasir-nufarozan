<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Laporan Penjualan Pertanggal</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css') ?>" />
</head>

<body onload="window.print()">
    <div id="laporan">
        <table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
            <!--<tr>
</tr>-->
        </table>

        <table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
            <tr>
                <td colspan="2" style="width:800px;">
                    <center>
                        <h4>LAPORAN PENJUALAN BARANG</h4>
                    </center><br />
                </td>
            </tr>

        </table>

        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>
        <?php
        $b = $jml->row_array();
        $retur_subtotal = $retur->row_array();

        ?>
        <?php $h = $this->session->userdata('akses'); ?>
        <?php $u = $this->session->userdata('user'); ?>
        <?php if ($h == '1' OR $h == '0') { ?>
            <table border="1" align="center" style="width:900px;margin-bottom:20px;">
                <thead>
                    <tr>
                        <th colspan="11" style="text-align:left;">Tanggal : <?php echo $b['jual_tanggal']; ?> || Tanggal Cetak : <?php echo date('d F Y H:i:s') ?></th>

                    </tr>
                    <tr>
                        <th style="width:50px;">No</th>
                        <th>No Faktur</th>
                        <th>Tanggal</th>
                        <th>Harga Jual</th>
                        <th>Diskon</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($data->result_array() as $i) {
                        $no++;
                        $nofak = $i['jual_nofak'];
                        $tgl = date('d F Y H:i', strtotime($i['jual_tanggal']));
                        $barang_harjul = $i['jual_total'];
                        $barang_diskon = $i['jual_diskon'];
                        $barang_total = $barang_harjul - $barang_diskon;
                    ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $no; ?></td>
                            <td style="padding-left:5px;"><?php echo $nofak; ?></td>
                            <td style="text-align:center;"><?php echo $tgl; ?></td>
                            <td style="text-align:right;"><?php echo 'Rp ' . number_format($barang_harjul); ?></td>
                            <td style="text-align:right;"><?php echo 'Rp ' . number_format($barang_diskon); ?></td>
                            <td style="text-align:right;"><?php echo 'Rp ' . number_format($barang_total); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>

                    <tr>
                        <td colspan="5" style="text-align:center;"><b>Total</b></td>
                        <td style="text-align:right;"><b><?php echo 'Rp ' . number_format($b['total']); ?></b></td>
                    </tr>
                    <tr>
                            <td colspan="5" style="text-align:center;"><b>Total Retur</b></td>
                            <td style="text-align:right;"><b><?php echo 'Rp ' . number_format($retur_subtotal['jumlah_retur']); ?></b></td>
                    </tr>

                    <tr>
                            <td colspan="5" style="text-align:center;"><b>Total Jumlah Uang</b></td>
                            <td style="text-align:right;"><b><?php
                            $uang1 = $b['total']; $uang2 = $retur_subtotal['jumlah_retur']; $total_uang = $uang1 - $uang2; echo 'Rp ' . number_format($total_uang); ?></b></td>
                    </tr>
                </tfoot>
            </table>
        <?php } ?>

        <?php if ($h == '2') {
            $date = date('H:i');
                if ($date <= '14:15' ) {
                    $sf = "Shift 1";
                }else if($date >= '14:16') {
                    $sf = "Shift 2";
                }else {
                    $sf = " ";
                }
            ?>
            <table border="1" align="center" style="width:900px;margin-bottom:20px;">
                <thead>
                    <tr>
                        <th colspan="11" style="text-align:left;">Tanggal : <?php echo $b['jual_tanggal']; ?> || Tanggal Cetak : <?php echo date('d F Y H:i:s') ."||". $sf; ?> </th>

                    </tr>
                    <tr>
                            <td colspan="5" style="text-align:center;"><b>Total Penjualan</b></td>
                            <td style="text-align:right;"><b><?php echo 'Rp ' . number_format($b['total']); ?></b></td>
                    </tr>
                    <tr>
                            <td colspan="5" style="text-align:center;"><b>Total Retur</b></td>
                            <td style="text-align:right;"><b><?php echo 'Rp ' . number_format($retur_subtotal['jumlah_retur']); ?></b></td>
                    </tr>

                    <tr>
                            <td colspan="5" style="text-align:center;"><b>Total Jumlah Uang</b></td>
                            <td style="text-align:right;"><b><?php
                            $uang1 = $b['total']; $uang2 = $retur_subtotal['jumlah_retur']; $total_uang = $uang1 - $uang2; echo 'Rp ' . number_format($total_uang); ?></b></td>
                    </tr>
                    </tfoot>
            </table>
        <?php } ?>

        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td></td>
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
