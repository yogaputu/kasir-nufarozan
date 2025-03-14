<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By lynxitboyolali.com">
    <meta name="author" content="Lynx IT Boyolali">

    <title>Management data Laporan Penjualan</title>

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

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                  <?php
                  $b = $jml->row_array();

                  ?>
                    <thead>
                        <tr>
                            <th style="width:50px;">No</th>
                            <th>No Faktur</th>
                            <th>Tanggal</th>
                            <th>Harga Jual</th>
                            <th>Diskon</th>
                            <th>Total</th>
                            <th style="width:100px;text-align:center;">Aksi</th>
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

                                <td style="text-align:center;">
                                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/laporan/hapus_laporan' ?>" onsubmit="return confirm('Yakin Hapus?');">
                                        <input name="kode" type="hidden" value="<?php echo $nofak; ?>">
                                        <input name="tgl" type="hidden" value="<?php echo $i['jual_tanggal']; ?>">
                                        <button class="btn btn-xs btn-danger" type="submit"><span class="fa fa-close"></span> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                          <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->

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
