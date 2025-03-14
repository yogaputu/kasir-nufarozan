<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By lynxitboyolali.com">
    <meta name="author" content="Lynx IT Boyolali">

    <title>Stok Opname</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/style.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/font-awesome.css' ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() . 'assets/css/4-col-portfolio.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/dataTables.bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/jquery.dataTables.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/dist/css/bootstrap-select.css' ?>" rel="stylesheet">
    <style media="screen">
        p input {
            border: none;
            background: none;
            display: inline;
            font-family: inherit;
            font-size: inherit;
            padding: none;
            width: auto;
        }

        p input:focus {
            outline: none;
        }

        a input {
            border: none;
            background: none;
            display: inline;
            font-family: inherit;
            font-size: inherit;
            padding: none;
            width: auto;
        }

        a input:focus {
            outline: none;
        }
    </style>
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
                    <small>Stok Opname</small>
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
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Program</th>
                            <th>Jumlah Real</th>
                        </tr>
                    </thead>
                    <form class="" action="<?php echo base_url() . 'admin/opname/simpan' ?>" method="post">
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data->result_array() as $a) :
                                $no++;
                                $id = $a['barang_id'];
                                $nm = $a['barang_nama'];
                                $stok = $a['barang_stok'];
                            ?>
                                <tr>
                                    <td><?php echo $id ?><input type="hidden" name="kode_brg[]" value="<?php echo $id; ?>" readonly tabindex="-1"></td>
                                    <td><?php echo $nm ?><input type="hidden" name="nama_brg[]" value="<?php echo $nm; ?>" readonly tabindex="-1"></td>
                                    <td><?php echo $stok ?><input type="hidden" name="jumlah_program[]" value="<?php echo $stok; ?>" readonly tabindex="-1"></td>
                                    <td><input type="number" name="jumlah_real[]" value="" min="0" class="form-control"></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                </table>
                <div class="pull-right"><input type="submit" class="btn btn-success" value="Simpan"></div>
                </form>
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
            $('#mydata').DataTable({
                paging : false
            });
        } );
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