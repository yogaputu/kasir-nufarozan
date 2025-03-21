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

    <style type="text/css">
        .bg {
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: -1;
            float: left;
            left: 0;
            margin-top: -20px;
        }
    </style>
</head>

<body>
    <img src="<?php echo base_url() . 'assets/img/bg2.jpg' ?>" alt="gambar" class="bg" />
    <!-- Navigation -->
    <?php
    $this->load->view('admin/menu');
    ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color:#fcc;">Welcome to
                    <small>Kasir Nufarozan Mart</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="mainbody-section text-center">
            <?php $h = $this->session->userdata('akses'); ?>
            <?php $u = $this->session->userdata('user'); ?>

            <!-- Projects Row -->
            <div class="row">
                <?php if ($h == '1' OR $h == '0') { ?>
                    <div class="col-md-3 portfolio-item">
                        <div class="menu-item blue" style="height:150px;">
                            <a href="<?php echo base_url() . 'admin/penjualan' ?>" data-toggle="modal">
                                <i class="fa fa-shopping-bag"></i>
                                <p style="text-align:left;font-size:14px;padding-left:5px;">Penjualan Eceran</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 portfolio-item">
                        <div class="menu-item green" style="height:150px;">
                            <a href="<?php echo base_url() . 'admin/opname' ?>" data-toggle="modal">
                                <i class="fa fa-cubes"></i>
                                <p style="text-align:left;font-size:14px;padding-left:5px;">Stok Opname</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 portfolio-item">
                        <div class="menu-item light-orange" style="height:150px;">
                            <a href="<?php echo base_url() . 'admin/suplier' ?>" data-toggle="modal">
                                <i class="fa fa-truck"></i>
                                <p style="text-align:left;font-size:14px;padding-left:5px;">Suplier</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 portfolio-item">
                        <div class="menu-item color" style="height:150px;">
                            <a href="<?php echo base_url() . 'admin/kategori' ?>" data-toggle="modal">
                                <i class="fa fa-sitemap"></i>
                                <p style="text-align:left;font-size:14px;padding-left:5px;">Kategori</p>
                            </a>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($h == '2') { ?>
                    <div class="col-md-12 portfolio-item">
                        <div class="menu-item blue" style="height:150px;">
                            <a href="<?php echo base_url() . 'admin/penjualan' ?>" data-toggle="modal">
                                <i class="fa fa-shopping-cart"></i>
                                <p style="text-align:left;font-size:14px;padding-left:5px;">Penjualan Eceran</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 portfolio-item">
                        <div class="menu-item purple" style="height:150px;">
                            <a href="<?php echo base_url() . 'admin/barang' ?>" data-toggle="modal">
                                <i class="fa fa-shopping-cart"></i>
                                <p style="text-align:left;font-size:14px;padding-left:5px;">Barang</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 portfolio-item">
                        <div class="menu-item blue" style="height:150px;">
                            <a href="<?php echo base_url() . 'admin/laporan' ?>" data-toggle="modal">
                                <i class="fa fa-bar-chart"></i>
                                <p style="text-align:left;font-size:14px;padding-left:5px;">Laporan</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 portfolio-item">
                        <div class="menu-item light-red" style="height:150px;">
                            <a href="<?php echo base_url() . 'admin/pembelian' ?>" data-toggle="modal">
                                <i class="fa fa-cubes"></i>
                                <p style="text-align:left;font-size:14px;padding-left:5px;">Pembelian</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 portofolio-item">
                        <div class="menu-item red" style="height: 150px;">
                            <a href="<?php echo base_url() . 'admin/pembelian_harian' ?>">
                                <i class="fa fa-shopping-cart"></i>
                                <p style="text-align:left;font-size:14px;padding-left:5px;">Pembelian Harian</p>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- /.row -->

            <!-- Projects Row -->
            <?php if ($h == '1' OR $h == '0') { ?>
            <div class="row">
                    <div class="col-md-3 portfolio-item">
                        <div class="menu-item purple" style="height:150px;">
                            <a href="<?php echo base_url() . 'admin/barang' ?>" data-toggle="modal">
                                <i class="fa fa-shopping-cart"></i>
                                <p style="text-align:left;font-size:14px;padding-left:5px;">Barang</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 portfolio-item">
                        <div class="menu-item red" style="height:150px;">
                            <a href="<?php echo base_url() . 'admin/pengguna' ?>" data-toggle="modal">
                                <i class="fa fa-users"></i>
                                <p style="text-align:left;font-size:14px;padding-left:5px;">Pengguna</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 portfolio-item">
                        <div class="menu-item blue" style="height:150px;">
                            <a href="<?php echo base_url() . 'admin/laporan' ?>" data-toggle="modal">
                                <i class="fa fa-bar-chart"></i>
                                <p style="text-align:left;font-size:14px;padding-left:5px;">Laporan</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 portfolio-item">
                        <div class="menu-item light-red" style="height:150px;">
                            <a href="<?php echo base_url() . 'admin/pembelian' ?>" data-toggle="modal">
                                <i class="fa fa-cubes"></i>
                                <p style="text-align:left;font-size:14px;padding-left:5px;">Pembelian</p>
                            </a>
                        </div>
                    </div>
                <?php } ?>

            </div>

            <?php if ($h == '1' OR $h == '0') { ?>
            <div class="row">
                    <div class="col-md-3 portofolio-item">
                        <div class="menu-item red" style="height: 150px;">
                            <a href="<?php echo base_url() . 'admin/pembelian_harian' ?>">
                                <i class="fa fa-shopping-cart"></i>
                                <p style="text-align:left;font-size:14px;padding-left:5px;">Pembelian Harian</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 portfolio-item">
                        <div class="menu-item color" style="height:150px;">
                            <a href="<?php echo base_url() . 'admin/kas' ?>" data-toggle="modal">
                                <i class="fa fa-bar-chart"></i>
                                <p style="text-align:left;font-size:14px;padding-left:5px;">Neraca</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 portfolio-item">
                        <div class="menu-item purple" style="height:150px;">
                            <a href="<?php echo base_url() . 'admin/member' ?>" data-toggle="modal">
                                <i class="fa fa-users"></i>
                                <p style="text-align:left;font-size:14px;padding-left:5px;">Member</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 portfolio-item">
                        <div class="menu-item color" style="height:150px;">
                            <a href="<?php echo base_url() . 'admin/tempat' ?>" data-toggle="modal">
                                <i class="fa fa-sitemap"></i>
                                <p style="text-align:left;font-size:14px;padding-left:5px;">Tempat</p>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>



            <!-- /.row -->

            <!-- /.container -->

            <!-- jQuery -->
            <script src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="<?php echo base_url() . 'assets/js/bootstrap.min.js' ?>"></script>

</body>

</html>
