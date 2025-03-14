<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By lynxitboyolali.com">
    <meta name="author" content="Lynx IT Boyolali">

    <title>KAS</title>

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
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data
                    <small>Data Kas</small>
                    <div class="pull-right"><a href="<?php echo base_url() . 'admin/kas/tambah_kas' ?>" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Tambah Kas</a></div>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                    <thead>
                        <tr>
                            <th style="text-align:center;width:40px;">No</th>
                            <th>id_transaksi</th>
                            <th>tanggal</th>
                            <th>id_kegiatan</th>
                            <th>kode_akun</th>
                            <th>id_index</th>
                            <th>keterangan</th>
                            <th>debet</th>
                            <th>kredit</th>
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
                            $totalkredit= $t['kredit'];
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
                                <td><?php echo "Rp. ". number_format($debet); ?></td>
                                <td><?php echo "Rp. ". number_format($kredit); ?></td>
                                <!-- <td><a href="<?php echo base_url() . 'admin/pembelian_harian/cetak/' . $id ?>" class="btn btn-success" target="_blank"><span class="fa fa-print"></span> Cetak</a></td>
                                <td><a class="btn btn-danger" href="<?php echo base_url() . 'admin/pembelian_harian/hapus/' . $id ?>" onclick="return confirm('Yakin Hapus ?')"><span class=" 	glyphicon glyphicon-remove-sign"></span> Hapus</a></td> -->
                            </tr>

                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="7">TOTAL SALDO = <?= "Rp. ". number_format($total); ?></td>
                            <td><?php echo "Rp. ". number_format($totaldebit); ?></td>
                            <td><?php echo "Rp. ". number_format($totalkredit); ?></td>
                        </tr>
                    </tfoot>
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