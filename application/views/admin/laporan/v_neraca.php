<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Laporan data penjualan</title>
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
                <td colspan="2" style="width:800px; paddin-left:20px;">
                    <center>
                        <h2>LAPORAN PENJUALAN BARANG</h2>
                    </center><br />
                </td>
            </tr>

        </table>

        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>

        <table border="1" align="center" style="margin-bottom:20px;">
            <thead>
                <tr>
                    <th style="text-align:center;width:40px;">No</th>
                    <th>Transaksi Kode</th>
                    <th>Tanggal</th>
                    <th>Kegiatan</th>
                    <th>Kode Akun</th>
                    <th>Index</th>
                    <th>Keterangan</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($data->result_array() as $a) :
                    $no++;
                    $id_transaksi = $a['id_transaksi'];
                    $tanggal = $a['tanggal'];
                    $id_kegiatan = $a['kegiatan'];
                    $kode_akun = $a['akun'];
                    $id_index = $a['idx_ket'];
                    $keterangan = $a['keterangan'];
                    $debet = $a['debet'];
                    $kredit = $a['kredit'];

                    $query = $this->db->query("SELECT SUM(a.debet) as debit, SUM(a.kredit) AS kredit, SUM(a.debet - a.kredit) AS total from tbl_transaksi a");
                    $t = $query->row_array();
                    $totaldebit = $t['debit'];
                    $totalkredit = $t['kredit'];
                    $total = $t['total'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td><?php echo $id_transaksi; ?></td>
                        <td><?php echo $tanggal; ?></td>
                        <td><?php echo $id_kegiatan; ?></td>
                        <td><?php echo $kode_akun; ?></td>
                        <td><?php echo $id_index; ?></td>
                        <td><?php echo $keterangan; ?></td>
                        <td><?php echo "Rp. " . number_format($debet); ?></td>
                        <td><?php echo "Rp. " . number_format($kredit); ?></td>
                        <!-- <td><a href="<?php echo base_url() . 'admin/pembelian_harian/cetak/' . $id ?>" class="btn btn-success" target="_blank"><span class="fa fa-print"></span> Cetak</a></td>
                                <td><a class="btn btn-danger" href="<?php echo base_url() . 'admin/pembelian_harian/hapus/' . $id ?>" onclick="return confirm('Yakin Hapus ?')"><span class=" 	glyphicon glyphicon-remove-sign"></span> Hapus</a></td> -->
                    </tr>

                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">TOTAL SALDO = <?= "Rp. " . number_format($total); ?></td>
                    <td><?php echo "Rp. " . number_format($totaldebit); ?></td>
                    <td><?php echo "Rp. " . number_format($totalkredit); ?></td>
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

</html>