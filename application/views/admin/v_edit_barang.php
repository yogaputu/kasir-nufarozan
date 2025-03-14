<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By lynxitboyolali.com">
    <meta name="author" content="Lynx IT Boyolali">

    <title>Management data barang</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/style.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/font-awesome.css' ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() . 'assets/css/4-col-portfolio.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/dataTables.bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/jquery.dataTables.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/dist/css/bootstrap-select.css' ?>" rel="stylesheet">
</head>

<body>

    <!-- Navigation -->
    <?php
    $this->load->view('admin/menu');
    ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <!-- /.row -->
        <!-- Projects Row -->

        <!-- /.row -->
        <!-- ============ MODAL ADD =============== -->

        <?php
        foreach ($data->result_array() as $a) {
            $id = $a['barang_id'];
            $nm = $a['barang_nama'];
            $satuan = $a['barang_satuan'];
            $harpok = $a['barang_harpok'];
            $harjul = $a['barang_harjul'];
            $harjul_grosir = $a['barang_harjul_grosir'];
            $stok = $a['barang_stok'];
            $min_stok = $a['barang_min_stok'];
            $kat_id = $a['barang_kategori_id'];
            $tmp_id = $a['id_tempat'];
            $kat_nama = $a['kategori_nama'];
            $min_beli = $a['barang_min_beli'];
            $min_harga = $a['barang_min_harga'];
        ?>

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/barang/edit_barang' ?>">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Kode Barang</label>
                                <div class="col-xs-9">
                                    <input name="kobar" class="form-control" type="text" value="<?php echo $id; ?>" placeholder="Kode Barang..." style="width:335px;" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Nama Barang</label>
                                <div class="col-xs-9">
                                    <input name="nabar" class="form-control" type="text" value="<?php echo $nm; ?>" placeholder="Nama Barang..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Kategori</label>
                                <div class="col-xs-9">
                                    <select name="kategori" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                        <?php foreach ($kat2->result_array() as $k2) {
                                            $id_kat = $k2['kategori_id'];
                                            $nm_kat = $k2['kategori_nama'];
                                            if ($id_kat == $kat_id)
                                                echo "<option value='$id_kat' selected>$nm_kat</option>";
                                            else
                                                echo "<option value='$id_kat'>$nm_kat</option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Tempat</label>
                                <div class="col-xs-9">
                                    <select name="tempat" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Tempat" data-width="80%" placeholder="Pilih Tempat" required>
                                        <?php foreach ($tmp->result_array() as $tempat) {
                                            $id_tmp = $tempat['id_tempat'];
                                            $nm_tmp = $tempat['nama_tempat'];
                                            if ($id_tmp == $tmp_id)
                                                echo "<option value='$id_tmp' selected>$nm_tmp</option>";
                                            else
                                                echo "<option value='$id_tmp'>$nm_tmp</option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Satuan</label>
                                <div class="col-xs-9">
                                    <select name="satuan" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>
                                        <?php if ($satuan == 'Unit') : ?>
                                            <option selected>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Kotak') : ?>
                                            <option>Unit</option>
                                            <option selected>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Botol') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option selected>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Butir') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option selected>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Buah') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option selected>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Biji') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option selected>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Sachet') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option selected>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Bks') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option selected>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Roll') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option selected>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'PCS') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option selected>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Box') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option selected>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Meter') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option selected>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Centimeter') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option selected>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Liter') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option selected>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'CC') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option selected>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Mililiter') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option selected>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Lusin') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option selected>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Gross') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option selected>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Kodi') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option selected>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Rim') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option selected>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Dozen') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option selected>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Kaleng') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option selected>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Lembar') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option selected>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Helai') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option selected>Helai</option>
                                            <option>Gram</option>
                                            <option>Kilogram</option>
                                        <?php elseif ($satuan == 'Gram') : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option selected>Gram</option>
                                            <option>Kilogram</option>
                                        <?php else : ?>
                                            <option>Unit</option>
                                            <option>Kotak</option>
                                            <option>Botol</option>
                                            <option>Butir</option>
                                            <option>Buah</option>
                                            <option>Biji</option>
                                            <option>Sachet</option>
                                            <option>Bks</option>
                                            <option>Roll</option>
                                            <option>PCS</option>
                                            <option>Box</option>
                                            <option>Meter</option>
                                            <option>Centimeter</option>
                                            <option>Liter</option>
                                            <option>CC</option>
                                            <option>Mililiter</option>
                                            <option>Lusin</option>
                                            <option>Gross</option>
                                            <option>Kodi</option>
                                            <option>Rim</option>
                                            <option>Dozen</option>
                                            <option>Kaleng</option>
                                            <option>Lembar</option>
                                            <option>Helai</option>
                                            <option>Gram</option>
                                            <option selected>Kilogram</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Harga Pokok</label>
                                <div class="col-xs-9">
                                    <input name="harpok" class="harpok form-control" type="text" value="<?php echo $harpok; ?>" placeholder="Harga Pokok..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Harga (Eceran)</label>
                                <div class="col-xs-9">
                                    <input name="harjul" class="harjul form-control" type="text" value="<?php echo $harjul; ?>" placeholder="Harga Jual..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Harga (Grosir)</label>
                                <div class="col-xs-9">
                                    <input name="harjul_grosir" class="harjul form-control" type="text" value="<?php echo $harjul_grosir; ?>" placeholder="Harga Jual Grosir..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Stok</label>
                                <div class="col-xs-9">
                                    <input name="stok" class="form-control" type="number" value="<?php echo $stok; ?>" placeholder="Stok..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Minimal Stok</label>
                                <div class="col-xs-9">
                                    <input name="min_stok" class="form-control" type="number" value="<?php echo $min_stok; ?>" placeholder="Minimal Stok..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Minimal Beli</label>
                                <div class="col-xs-9">
                                    <input name="min_beli" class="form-control" type="number" placeholder="Minimal Beli..." style="width:335px;" value="<?php echo $min_beli; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Minimal Harga</label>
                                <div class="col-xs-9">
                                    <input name="min_harga" class="form-control" type="number" placeholder="Minimal Harga..." style="width:335px;" value="<?php echo $min_harga; ?>">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</a>
                            <button class="btn btn-success" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>


        <!--END MODAL-->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="text-align:center;">Copyright &copy; <?php echo '2022'; ?> by <a href="http://lynxitboyolali.com/">Lynx IT Boyolali</a></p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() . 'assets/dist/js/bootstrap-select.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/bootstrap.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/dataTables.bootstrap.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/jquery.dataTables.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/jquery.price_format.min.js' ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('.harpok').priceFormat({
                prefix: '',
                //centsSeparator: '',
                centsLimit: 0,
                thousandsSeparator: ','
            });
            $('.harjul').priceFormat({
                prefix: '',
                //centsSeparator: '',
                centsLimit: 0,
                thousandsSeparator: ','
            });
        });
        $('#largeModal').on('shown.bs.modal', function() {
            $('#kode_barang').focus();
            // console.log('coba');
        })
    </script>

</body>

</html>