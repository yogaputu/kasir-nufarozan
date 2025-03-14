<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By lynxitboyolali.com">
    <meta name="author" content="Lynx IT Boyolali">

    <title>Welcome To Kasir Nufarozan</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/style.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/font-awesome.css' ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() . 'assets/css/4-col-portfolio.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/dataTables.bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/jquery.dataTables.min.css' ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap-datetimepicker.min.css' ?>">
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
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data
                    <small>Laporan</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <?php $h = $this->session->userdata('akses'); ?>
        <?php $u = $this->session->userdata('user'); ?>
        <!-- Projects Row -->
        <?php if ($h == '1') { ?>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
                        <thead>
                            <tr>
                                <th style="text-align:center;width:40px;">No</th>
                                <th>Laporan</th>
                                <th style="width:100px;text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">1</td>
                                <td style="vertical-align:middle;">Laporan Data Barang</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="<?php echo base_url() . 'admin/laporan/lap_data_barang' ?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">2</td>
                                <td style="vertical-align:middle;">Laporan Stok Barang</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="<?php echo base_url() . 'admin/laporan/lap_stok_barang' ?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">3</td>
                                <td style="vertical-align:middle;">Laporan Stok Barang Per Kategori</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#lap_barang_kategori" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">3</td>
                                <td style="vertical-align:middle;">Laporan Stok Barang Per Tempat</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#lap_barang_tempat" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">4</td>
                                <td style="vertical-align:middle;">Laporan Penjualan</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="<?php echo base_url() . 'admin/laporan/lap_data_penjualan' ?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">5</td>
                                <td style="vertical-align:middle;">Laporan Penjualan PerTanggal</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#lap_jual_pertanggal" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">6</td>
                                <td style="vertical-align:middle;">Laporan Rincian Penjualan PerBulan</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#lap_jual_perbulan" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">7</td>
                                <td style="vertical-align:middle;">Laporan Penjualan PerBulan</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#lap_jual_perbulan_jumlah" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">8</td>
                                <td style="vertical-align:middle;">Laporan Penjualan PerTahun</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#lap_jual_pertahun" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">9</td>
                                <td style="vertical-align:middle;">Laporan Laba/Rugi</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#lap_laba_rugi" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">10</td>
                                <td style="vertical-align:middle;">Laporan Laba/Rugi Harian</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#lap_laba_rugi_hari" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">11</td>
                                <td style="vertical-align:middle;">Pembelian Barang Modal</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#beli_modal" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">12</td>
                                <td style="vertical-align:middle;">Pembelian Barang Harian</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#beli_harian" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">13</td>
                                <td style="vertical-align:middle;">Neraca</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#neraca" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>
        <?php if ($h == '0') { ?>
          <div class="row">
              <div class="col-lg-12">
                  <table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
                      <thead>
                          <tr>
                              <th style="text-align:center;width:40px;">No</th>
                              <th>Laporan</th>
                              <th style="width:100px;text-align:center;">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>

                          <tr>
                              <td style="text-align:center;vertical-align:middle">1</td>
                              <td style="vertical-align:middle;">Laporan Data Barang</td>
                              <td style="text-align:center;">
                                  <a class="btn btn-sm btn-default" href="<?php echo base_url() . 'admin/laporan/lap_data_barang' ?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                              </td>
                          </tr>

                          <tr>
                              <td style="text-align:center;vertical-align:middle">2</td>
                              <td style="vertical-align:middle;">Laporan Stok Barang</td>
                              <td style="text-align:center;">
                                  <a class="btn btn-sm btn-default" href="<?php echo base_url() . 'admin/laporan/lap_stok_barang' ?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                              </td>
                          </tr>

                          <tr>
                              <td style="text-align:center;vertical-align:middle">3</td>
                              <td style="vertical-align:middle;">Laporan Stok Barang Per Kategori</td>
                              <td style="text-align:center;">
                                  <a class="btn btn-sm btn-default" href="#lap_barang_kategori" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                              </td>
                          </tr>

                          <tr>
                              <td style="text-align:center;vertical-align:middle">3</td>
                              <td style="vertical-align:middle;">Laporan Stok Barang Per Tempat</td>
                              <td style="text-align:center;">
                                  <a class="btn btn-sm btn-default" href="#lap_barang_tempat" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                              </td>
                          </tr>

                          <tr>
                              <td style="text-align:center;vertical-align:middle">4</td>
                              <td style="vertical-align:middle;">Laporan Penjualan</td>
                              <td style="text-align:center;">
                                  <a class="btn btn-sm btn-default" href="<?php echo base_url() . 'admin/laporan/lap_data_penjualan' ?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                              </td>
                          </tr>

                          <tr>
                              <td style="text-align:center;vertical-align:middle">5</td>
                              <td style="vertical-align:middle;">Laporan Penjualan PerTanggal</td>
                              <td style="text-align:center;">
                                  <a class="btn btn-sm btn-default" href="#lap_jual_pertanggal" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                              </td>
                          </tr>

                          <tr>
                              <td style="text-align:center;vertical-align:middle">6</td>
                              <td style="vertical-align:middle;">Laporan Penjualan PerBulan</td>
                              <td style="text-align:center;">
                                  <a class="btn btn-sm btn-default" href="#lap_jual_perbulan" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                              </td>
                          </tr>

                          <tr>
                              <td style="text-align:center;vertical-align:middle">7</td>
                              <td style="vertical-align:middle;">Laporan Penjualan PerTahun</td>
                              <td style="text-align:center;">
                                  <a class="btn btn-sm btn-default" href="#lap_jual_pertahun" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                              </td>
                          </tr>

                          <tr>
                              <td style="text-align:center;vertical-align:middle">8</td>
                              <td style="vertical-align:middle;">Laporan Laba/Rugi</td>
                              <td style="text-align:center;">
                                  <a class="btn btn-sm btn-default" href="#lap_laba_rugi" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                              </td>
                          </tr>

                          <tr>
                              <td style="text-align:center;vertical-align:middle">9</td>
                              <td style="vertical-align:middle;">Laporan Laba/Rugi Harian</td>
                              <td style="text-align:center;">
                                  <a class="btn btn-sm btn-default" href="#lap_laba_rugi_hari" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                              </td>
                          </tr>

                          <tr>
                              <td style="text-align:center;vertical-align:middle">10</td>
                              <td style="vertical-align:middle;">Pembelian Barang Modal</td>
                              <td style="text-align:center;">
                                  <a class="btn btn-sm btn-default" href="#beli_modal" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                              </td>
                          </tr>

                          <tr>
                              <td style="text-align:center;vertical-align:middle">10</td>
                              <td style="vertical-align:middle;">Pembelian Barang Harian</td>
                              <td style="text-align:center;">
                                  <a class="btn btn-sm btn-default" href="#beli_harian" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                              </td>
                          </tr>

                          <tr>
                              <td style="text-align:center;vertical-align:middle">11</td>
                              <td style="vertical-align:middle;">Neraca</td>
                              <td style="text-align:center;">
                                  <a class="btn btn-sm btn-default" href="#neraca" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                              </td>
                          </tr>

                          <tr>
                              <td style="text-align:center;vertical-align:middle">12</td>
                              <td style="vertical-align:middle;">LAPORAN EDIT</td>
                              <td style="text-align:center;">
                                  <a class="btn btn-sm btn-default" href="#editlaporan" data-toggle="modal"><span class="fa fa-print"></span> CEK</a>
                              </td>
                          </tr>

                      </tbody>
                  </table>
              </div>
          </div>
          <?php } ?>

        <?php if ($h == '2') { ?>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
                        <thead>
                            <tr>
                                <th style="text-align:center;width:40px;">No</th>
                                <th>Laporan</th>
                                <th style="width:100px;text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">1</td>
                                <td style="vertical-align:middle;">Laporan Data Barang</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="<?php echo base_url() . 'admin/laporan/lap_data_barang' ?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">2</td>
                                <td style="vertical-align:middle;">Laporan Stok Barang</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="<?php echo base_url() . 'admin/laporan/lap_stok_barang' ?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">3</td>
                                <td style="vertical-align:middle;">Laporan Stok Barang Per Kategori</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#lap_barang_kategori" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">4</td>
                                <td style="vertical-align:middle;">Laporan Penjualan</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="<?php echo base_url() . 'admin/laporan/lap_data_penjualan' ?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">5</td>
                                <td style="vertical-align:middle;">Laporan Penjualan PerTanggal</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#lap_jual_pertanggal" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">6</td>
                                <td style="vertical-align:middle;">Laporan Rincian Penjualan PerBulan</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#lap_jual_perbulan" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">7</td>
                                <td style="vertical-align:middle;">Laporan Penjualan PerTahun</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#lap_jual_pertahun" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">8</td>
                                <td style="vertical-align:middle;">Laporan Laba/Rugi</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#lap_laba_rugi" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">9</td>
                                <td style="vertical-align:middle;">Laporan Laba/Rugi Harian</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#lap_laba_rugi_hari" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;vertical-align:middle">10</td>
                                <td style="vertical-align:middle;">Pembelian Barang Modal</td>
                                <td style="text-align:center;">
                                    <a class="btn btn-sm btn-default" href="#beli_modal" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>

        <!-- /.row -->

        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="lap_barang_kategori" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Pilih Kategori</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/laporan/barang_perkategori' ?>" target="_blank">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Kategori</label>
                                <div class="col-xs-9">
                                    <select name="kategori" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" required />
                                    <?php foreach ($kategori->result_array() as $k) {
                                        $ket = $k['kategori_nama'];
                                    ?>
                                        <option><?php echo $ket; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="lap_barang_tempat" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Pilih Tempat</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/laporan/barang_pertempat' ?>" target="_blank">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Tempat</label>
                                <div class="col-xs-9">
                                    <select name="tempat" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Tempat" data-width="80%" required />
                                    <?php foreach ($tempat->result_array() as $k) {
                                        $ket = $k['nama_tempat'];
                                    ?>
                                        <option><?php echo $ket; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="beli_modal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/laporan/barang_modal' ?>" target="_blank">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Bulan</label>
                                <div class="col-xs-9">
                                    <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required />
                                    <?php foreach ($jual_bln->result_array() as $k) {
                                        $bln = $k['bulan'];
                                    ?>
                                        <option><?php echo $bln; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="beli_harian" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/laporan/barang_harian' ?>" target="_blank">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Bulan</label>
                                <div class="col-xs-9">
                                    <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required />
                                    <?php foreach ($jual_bln->result_array() as $k) {
                                        $bln = $k['bulan'];
                                    ?>
                                        <option><?php echo $bln; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="neraca" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/laporan/neraca' ?>" target="_blank">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Bulan</label>
                                <div class="col-xs-9">
                                    <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required />
                                    <?php foreach ($jual_bln->result_array() as $k) {
                                        $bln = $k['bulan'];
                                    ?>
                                        <option><?php echo $bln; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============ MODAL ADD =============== -->
        <?php if ($h == 1 OR $h == 0) { ?>
            <div class="modal fade" id="lap_jual_pertanggal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Pilih Tanggal</h3>
                        </div>

                        <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/laporan/lap_penjualan_pertanggal' ?>" target="_blank">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Tanggal</label>
                                    <div class="col-xs-9">
                                        <div class='input-group date' id='datepicker' style="width:300px;">
                                            <input type='text' name="tgl" class="form-control" value="" placeholder="Tanggal..." required />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Shift</label>
                                    <div class="col-xs-9">
                                        <select name="shift" id="" class="selectpicker show-tick form-control">
                                            <option value="'00:00' AND '23:59'">Semua</option>
                                            <option value="'03:00' AND '14:00:00'">Shift 1</option>
                                            <option value="'14:01:00' AND '23:00'">Shift 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if ($h == 2) { ?>
            <div class="modal fade" id="lap_jual_pertanggal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Pilih Tanggal</h3>
                        </div>

                        <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/laporan/lap_penjualan_pertanggal_kasir' ?>" target="_blank">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Tanggal</label>
                                    <div class="col-xs-9">
                                        <div class='input-group date' id='datepicker' style="width:300px;">
                                            <input type='text' name="tgl" class="form-control" value="" placeholder="Tanggal..." required />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">Shift</label>
                                    <div class="col-xs-9">
                                        <select name="shift" id="" class="selectpicker show-tick form-control">
                                            <option value="'00:00' AND '23:59'">Semua</option>
                                            <option value="'03:00' AND '14:00:00'">Shift 1</option>
                                            <option value="'14:01:00' AND '23:00'">Shift 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="lap_jual_perbulan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/laporan/lap_penjualan_perbulan' ?>" target="_blank">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Bulan</label>
                                <div class="col-xs-9">
                                    <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required />
                                    <?php foreach ($jual_bln->result_array() as $k) {
                                        $bln = $k['bulan'];
                                    ?>
                                        <option><?php echo $bln; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="lap_jual_perbulan_jumlah" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/laporan/lap_penjualan_perbulan_jumlah' ?>" target="_blank">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Bulan</label>
                                <div class="col-xs-9">
                                    <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required />
                                    <?php foreach ($jual_bln->result_array() as $k) {
                                        $bln = $k['bulan'];
                                    ?>
                                        <option><?php echo $bln; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="lap_jual_pertahun" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Pilih Tahun</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/laporan/lap_penjualan_pertahun' ?>" target="_blank">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Tahun</label>
                                <div class="col-xs-9">
                                    <select name="thn" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Tahun" data-width="80%" required />
                                    <?php foreach ($jual_thn->result_array() as $t) {
                                        $thn = $t['tahun'];
                                    ?>
                                        <option><?php echo $thn; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============ MODAL LAPORAN EDIT =============== -->
        <div class="modal fade" id="editlaporan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Pilih Tanggal</h3>
                    </div>

                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/laporan/lap_edit' ?>" target="_blank">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Tanggal</label>
                                <div class="col-xs-9">
                                    <div class='input-group date' id='datepicker4' style="width:300px;">
                                        <input type='text' name="tgl" class="form-control" value="" placeholder="Tanggal..." required />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Shift</label>
                                <div class="col-xs-9">
                                    <select name="shift" id="" class="selectpicker show-tick form-control">
                                        <option value="'00:00' AND '23:59'">Semua</option>
                                        <option value="'03:00' AND '14:00:00'">Shift 1</option>
                                        <option value="'14:01:00' AND '23:00'">Shift 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="lap_laba_rugi" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/laporan/lap_laba_rugi' ?>" target="_blank">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Bulan</label>
                                <div class="col-xs-9">
                                    <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required />
                                    <?php foreach ($jual_bln->result_array() as $k) {
                                        $bln = $k['bulan'];
                                    ?>
                                        <option><?php echo $bln; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="lap_laba_rugi_hari" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Pilih Tanggal</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/laporan/lap_laba_rugi_hari' ?>" target="_blank">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Tanggal</label>
                                <div class="col-xs-9">
                                    <div class='input-group date' id='datepicker1' style="width:300px;">
                                        <input type='text' name="tgl" class="form-control" value="" placeholder="Tanggal..." required />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--END MODAL-->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="text-align:center;">Copyright &copy; <?php echo '2022'; ?> by <a href="http://lynxitboyolali.com/">Lynx IT Boyolali</a> </p>
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
    <script src="<?php echo base_url() . 'assets/js/moment.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/bootstrap-datetimepicker.min.js' ?>"></script>
    <script type="text/javascript">
        $(function() {
            $('#datetimepicker').datetimepicker({
                format: 'DD MMMM YYYY HH:mm',
            });

            $('#datepicker').datetimepicker({
                format: 'YYYY-MM-DD',
            });
            $('#datepicker1').datetimepicker({
                format: 'YYYY-MM-DD',
            });
            $('#datepicker2').datetimepicker({
                format: 'YYYY-MM-DD',
            });
            $('#datepicker4').datetimepicker({
                format: 'YYYY-MM-DD',
            });

            $('#timepicker').datetimepicker({
                format: 'HH:mm'
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        });
    </script>

</body>

</html>
