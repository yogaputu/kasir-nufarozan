<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Stok Opname</title>
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
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>STOK OPNAME <?php echo $tgl; ?></h4></center><br/></td>
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
        <th style="width:50px;">No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Jumlah Program</th>
        <th>Jumlah Real</th>
        <th>Selisih</th>
    </tr>
</thead>
<tbody>
<?php
$no=0;
    foreach ($data->result_array() as $a) {
        $no++;
        $id=$a['barang_id'];
        $nm=$a['barang_nama'];
        $program = $a['jumlah_program'];
        $real = $a['jumlah_real'];
        $selisih = $real - $program;
?>
    <tr>
        <td style="text-align:center;"><?php echo $no;?></td>
        <td><?php echo $id; ?></td>
        <td><?php echo $nm; ?></td>
        <td><?php echo $program; ?></td>
        <td><?php echo $real; ?></td>
        <td><?php echo $selisih; ?></td>
    </tr>
<?php }?>
</tbody>
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
</html>_
