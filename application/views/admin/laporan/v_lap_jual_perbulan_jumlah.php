<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Laporan Penjualan Pertanggal</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()">
<div id="laporan">
<table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<!--<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>-->
</table>

<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN PENJUALAN BARANG</h4></center><br/></td>
</tr>

</table>

<table border="0" align="center" style="width:900px;border:none;">
        <tr>
            <th style="text-align:left"></th>
        </tr>
</table>
<?php
    $b=$jml->row_array();
    $retur_subtotal = $retur->row_array();

?>
<table border="1" align="center" style="width:900px;margin-bottom:20px;">
<thead>
<tr>
<th colspan="9" style="text-align:left;">Bulan : <?php echo $b['bulan'];?></th>
</tr>
    <tr>
        <th style="width:50px;">No</th>
        <th>Tanggal</th>
        <th>Harga Jual</th>
        <th>Diskon</th>
        <th>Total</th>
    </tr>
    </tr>
</thead>
<tbody>
<?php
$no=0;
    foreach ($data->result_array() as $i) {
        $no++;
        $nofak=$i['jual_nofak'];
        $tgl=$i['jual_tanggal'];
        $barang_harjul=$i['jual_total'];
        $barang_diskon=$i['jual_diskon'];
        $barang_total=$barang_harjul-$barang_diskon;
?>
    <tr>
        <td style="text-align:center;"><?php echo $no;?></td>
        <td style="text-align:center;"><?php echo $tgl;?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($barang_harjul);?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($barang_diskon);?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($barang_total);?></td>
    </tr>
<?php }?>
</tbody>
<tfoot>

    <tr>
        <td colspan="4" style="text-align:center;"><b>Total</b></td>
        <td style="text-align:right;"><b><?php echo 'Rp '.number_format($b['total']);?></b></td>
    </tr>
    <tr>
            <td colspan="4" style="text-align:center;"><b>Total Retur</b></td>
            <td style="text-align:right;"><b><?php echo 'Rp ' . number_format($retur_subtotal['jumlah_retur']); ?></b></td>
    </tr>

    <tr>
            <td colspan="4" style="text-align:center;"><b>Total Jumlah Uang</b></td>
            <td style="text-align:right;"><b><?php
            $uang1 = $b['total']; $uang2 = $retur_subtotal['jumlah_retur']; $total_uang = $uang1 - $uang2; echo 'Rp ' . number_format($total_uang); ?></b></td>
    </tr>
</tfoot>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td></td>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="right">Boyolali, <?php echo date('d-M-Y')?></td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>

    <tr>
    <td><br/><br/><br/><br/></td>
    </tr>
    <tr>
        <td align="right">( <?php echo $this->session->userdata('nama');?> )</td>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <th><br/><br/></th>
    </tr>
    <tr>
        <th align="left"></th>
    </tr>
</table>
</div>
</body>
</html>
