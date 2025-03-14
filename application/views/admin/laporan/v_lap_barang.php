<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>laporan data barang</title>
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
                        <h4>LAPORAN DATA BARANG</h4>
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
            $subtotal = 0;
            $subtotal1 = 0;
            $stok_total = 0;
            $harjul = 0;
            $group = '-';
            $tot_pokok = 0;
            $tot_jual = 0;
            $tot_pokok_all =0;
            $tot_jual_all = 0;
            foreach ($data->result_array() as $d) {
                $nomor++;
                $urut++;
                if ($group != '-' && $group != $d['kategori_nama']) {

                	echo "<tr>";
                    echo "<td colspan='4'></td>";
                    echo "<td>Rp ".number_format($tot_pokok)."</td>";
                    echo "<td>Rp ".number_format($tot_jual)."</td>";
                    echo "<td>$tots</td>";
                    echo "<td>Rp ".number_format($tot_pokok_all)."</td>";
                    echo "<td>Rp ".number_format($tot_jual_all)."</td>";
                    echo "</tr>";


                    $kat = $d['kategori_nama'];
                    $query = $this->db->query("SELECT kategori_id,kategori_nama,barang_nama,SUM(barang_stok) AS tot_stok,SUM(barang_harjul) AS harga_jual,SUM(barang_harpok) AS harga_pokok, barang_stok FROM tbl_kategori JOIN tbl_barang ON kategori_id=barang_kategori_id WHERE kategori_nama='$kat'");
                    $t = $query->row_array();

                    $tots = $t['tot_stok'];



                    $tot_pokok = 0;
		            $tot_jual = 0;
		            $tot_pokok_all =0;
		            $tot_jual_all = 0;



                    
                        echo "</table><br>";
                    echo "<table align='center' width='900px;' border='1'>";
                    echo "<tr><td colspan='6'><b>Kategori: $kat</b></td><td colspan='4'><b>Stok: $tots</b></td></tr>";
                    echo "<tr style='background-color:#ccc;'>
    <td width='4%' align='center'>No</td>
    <td width='10%' align='center'>Kode Barang</td>
    <td width='40%' align='center'>Nama Barang</td>
    <td width='10%' align='center'>Satuan</td>
    <td width='10%' align='center'>Harga Modal</td>
    <td width='10%' align='center'>Harga Jual</td>
    <td width='5%' align='center'>Stok</td>
    <td width='5%' align='center'>Total Pokok</td>
    <td width='5%' align='center'>Total Jual</td>

    </tr>";
                    $nomor = 1;
                }elseif ($group == '-' || $group != $d['kategori_nama']) {
                	                    $kat = $d['kategori_nama'];
                    $query = $this->db->query("SELECT kategori_id,kategori_nama,barang_nama,SUM(barang_stok) AS tot_stok,SUM(barang_harjul) AS harga_jual,barang_harpok, barang_stok FROM tbl_kategori JOIN tbl_barang ON kategori_id=barang_kategori_id WHERE kategori_nama='$kat'");
                    $t = $query->row_array();

                    $tots = $t['tot_stok'];
                    $tot_pokok = 0;
		            $tot_jual = 0;
		            $tot_pokok_all =0;
		            $tot_jual_all = 0;

                        echo "</table><br>";
                    echo "<table align='center' width='900px;' border='1'>";
                    echo "<tr><td colspan='6'><b>Kategori: $kat</b></td><td colspan='4'><b>Stok: $tots</b></td></tr>";
                    echo "<tr style='background-color:#ccc;'>
    <td width='4%' align='center'>No</td>
    <td width='10%' align='center'>Kode Barang</td>
    <td width='40%' align='center'>Nama Barang</td>
    <td width='10%' align='center'>Satuan</td>
    <td width='10%' align='center'>Harga Modal</td>
    <td width='10%' align='center'>Harga Jual</td>
    <td width='5%' align='center'>Stok</td>
    <td width='5%' align='center'>Total Pokok</td>
    <td width='5%' align='center'>Total Jual</td>

    </tr>";
                    $nomor = 1;
                }
                
                if ($urut == 500) {
                    $nomor = 0;
                    echo "<div class='pagebreak'> </div>";
                }

                $group = $d['kategori_nama'];
            ?>
                <tr>
                    <td style="text-align:center;vertical-align:center;text-align:center;"><?php echo $nomor; ?></td>
                    <td style="vertical-align:center;padding-left:5px;text-align:center;"><?php echo $d['barang_id']; ?></td>
                    <td style="vertical-align:center;padding-left:5px;"><?php echo $d['barang_nama']; ?></td>
                    <td style="vertical-align:center;text-align:center;"><?php echo $d['barang_satuan']; ?></td>
                    <td style="vertical-align:center;padding-right:5px;text-align:right;"><?php echo 'Rp ' . number_format($d['barang_harpok']); ?></td>
                    <td style="vertical-align:center;padding-right:5px;text-align:right;"><?php echo 'Rp ' . number_format($d['barang_harjul']); ?></td>
                    <td style="vertical-align:center;text-align:center;padding-right:5px;text-align:center;"><?php echo $d['barang_stok']; ?></td>
                    <td style="vertical-align:center;text-align:center;padding-right:5px;text-align:center;"><?php echo 'Rp ' . number_format($pokok = $d['barang_stok'] * $d['barang_harpok']); ?></td>
                    <td style="vertical-align:center;text-align:center;padding-right:5px;text-align:center;"><?php echo 'Rp ' . number_format($jual = $d['barang_stok'] * $d['barang_harjul']); ?></td>
                </tr>



            <?php
            $tot_pokok +=  $d['barang_harpok'];
            $tot_jual += $d['barang_harjul'];
            $tot_pokok_all += $pokok;
            $tot_jual_all += $jual;
            }

            echo "<tr>";
            echo "<td colspan='4'></td>";
            echo "<td>Rp ".number_format($tot_pokok)."</td>";
            echo "<td>Rp ".number_format($tot_jual)."</td>";
            echo "<td>$tots</td>";
            echo "<td>Rp ".number_format($tot_pokok_all)."</td>";
            echo "<td>Rp ".number_format($tot_jual_all)."</td>";
            echo "</tr>";

            ?>
        </table>
        <?php
        $query2 = $this->db->query("SELECT barang_nama,barang_harpok,barang_harjul,SUM(barang_stok) AS stok, barang_harpok*barang_stok AS jumlah_pokok, barang_harjul*barang_stok AS jumlah_jual, SUM(barang_harpok*barang_stok) AS pokok, SUM(barang_harjul*barang_stok) AS jual FROM tbl_barang");
        $t2 = $query2->row_array();
        $subtotal = $t2['pokok'];
        $subtotal1 = $t2['jual'];
        $stok_total += $t2['stok'];
        ?>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td>
                    <h3>TOTAL SEMUA ASET MODAL</h3>
                </td>
                <td>
                    <h3>: </h3>
                </td>
                <td>
                    <h3><?php echo 'Rp ' . number_format($subtotal); ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>TOTAL SEMUA ASET JUAL</h3>
                </td>
                <td>
                    <h3>: </h3>
                </td>
                <td>
                    <h3><?php echo 'Rp ' . number_format($subtotal1); ?> </h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>TOTAL SEMUA STOK BARANG </h3>
                </td>
                <td>
                    <h3>: </h3>
                </td>
                <td>
                    <h3> <?php echo number_format($stok_total) . "  items"; ?></h3>
                </td>
            </tr>
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