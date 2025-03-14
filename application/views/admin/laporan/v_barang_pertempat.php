<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>LAPORAN BARANG</title>
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
                        <?php foreach ($data->result_array() as $d) {
                            $katego = $d['nama_tempat'];
                            $query = $this->db->query("SELECT a.id_tempat,a.nama_tempat FROM tbl_barang b JOIN tbl_tempat a ON a.id_tempat=b.id_tempat WHERE a.nama_tempat='$katego' GROUP BY a.nama_tempat");
                            $t = $query->row_array();
                        $kt = $t['nama_tempat'];
                        ?>
                        <?php echo "<h4>LAPORAN DATA BARANG PERTEMPAT $kt </h4>";
                      }
                        ?>
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
            <thead>
                <tr>
                    <td align='center'>No</td>
                    <td align='center'>Kode Barang</td>
                    <td align='center'>Nama Barang</td>
                    <td align='center'>Satuan</td>
                    <td align='center'>Harga Modal</td>
                    <td align='center'>Harga Jual</td>
                    <td align='center'>Stok</td>
                    <td align='center'>Jumlah Pokok</td>
                    <td align='center'>Jumlah Jual</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                $subtotal = 0;
                $subtotal1 = 0;
                $stok = 0;
                foreach ($data->result_array() as $a) {
                    $no++;
                    $nm = $a['barang_nama'];
                    // $harga = $a['harga'];
                    // $jumlah = $a['jumlah'];
                    $stok += $a['barang_stok'];
                    $subtotal += $a['jumlah_pokok'];
                    $subtotal1 += $a['jumlah_jual'];
                ?>
                    <tr>
                        <td style="text-align:center;vertical-align:center;text-align:center;"><?php echo $no; ?></td>
                        <td style="vertical-align:center;padding-left:5px;text-align:center;"><?php echo $a['barang_id']; ?></td>
                        <td style="vertical-align:center;padding-left:5px;"><?php echo $nm; ?></td>
                        <td style="vertical-align:center;text-align:center;"><?php echo $a['barang_satuan']; ?></td>
                        <td style="vertical-align:center;padding-right:5px;text-align:right;"><?php echo 'Rp ' . number_format($a['barang_harpok']); ?></td>
                        <td style="vertical-align:center;padding-right:5px;text-align:right;"><?php echo 'Rp ' . number_format($a['barang_harjul']); ?></td>
                        <td style="vertical-align:center;text-align:center;padding-right:5px;text-align:center;"><?php echo $a['barang_stok']; ?></td>
                        <td style="vertical-align:center;text-align:center;padding-right:5px;text-align:right;"><?php echo 'Rp ' . number_format($a['jumlah_pokok']); ?></td>
                        <td style="vertical-align:center;text-align:center;padding-right:5px;text-align:right;"><?php echo 'Rp ' . number_format($a['jumlah_jual']); ?></td>
                    </tr>


                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" style="text-align:center;"><b>Total</b></td>
                    <td style="vertical-align:center;text-align:center;padding-right:5px;text-align:center;"><b><?php echo $stok; ?></b></td>
                    <td style="text-align:right;"><b><?php echo 'Rp ' . number_format($subtotal); ?></b></td>
                    <td style="text-align:right;"><b><?php echo 'Rp ' . number_format($subtotal1); ?></b></td>
                </tr>
            </tfoot>
        </table>
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

</html>_
