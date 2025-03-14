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

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Tambah Barang</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/barang/tambah_barang' ?>">
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3">Kode Barang</label>
                            <div class="col-xs-9">
                                <input name="kobar" class="form-control" type="text" placeholder="Kode Barang..." style="width:335px;" required autofocus id="kode_barang">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama Barang</label>
                            <div class="col-xs-9">
                                <input name="nabar" class="form-control" type="text" placeholder="Nama Barang..." style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Kategori</label>
                            <div class="col-xs-9">
                                <select name="kategori" class=" form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                    <?php foreach ($kat2->result_array() as $k2) {
                                        $id_kat = $k2['kategori_id'];
                                        $nm_kat = $k2['kategori_nama'];
                                    ?>
                                        <option value="<?php echo $id_kat; ?>"><?php echo $nm_kat; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-xs-3">Satuan</label>
                            <div class="col-xs-9">
                                <select name="satuan" class=" form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>
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
                                    <option>Kilogram</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label" for="">Tempat/Rak</label>
                            <div class="col-xs-9">
                                <select class="form-control" name="tempat">
                                    <?php foreach ($tmp->result_array() as $tempat) {
                                        $id_tempat = $tempat['id_tempat'];
                                        $nama_tempat = $tempat['nama_tempat'];

                                    ?>
                                        <option value="<?php echo $id_tempat; ?>"><?php echo $nama_tempat; ?></option>
                                    <?php } ?>
                                </select>


                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Harga Pokok</label>
                            <div class="col-xs-9">
                                <input name="harpok" class="harpok form-control" type="text" placeholder="Harga Pokok..." style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Harga (Eceran)</label>
                            <div class="col-xs-9">
                                <input name="harjul" class="harjul form-control" type="text" placeholder="Harga Jual Eceran..." style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Harga (Grosir)</label>
                            <div class="col-xs-9">
                                <input name="harjul_grosir" class="harjul form-control" type="text" placeholder="Harga Jual Grosir..." style="width:335px;" value="0">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Stok</label>
                            <div class="col-xs-9">
                                <input name="stok" class="form-control" type="number" placeholder="Stok..." style="width:335px;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Minimal Stok</label>
                            <div class="col-xs-9">
                                <input name="min_stok" class="form-control" type="number" placeholder="Minimal Stok..." style="width:335px;" value="0">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Minimal Beli</label>
                            <div class="col-xs-9">
                                <input name="min_beli" class="form-control" type="number" placeholder="Minimal Beli..." style="width:335px;" value="0">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Minimal Harga</label>
                            <div class="col-xs-9">
                                <input name="min_harga" class="form-control" type="number" placeholder="Minimal Harga..." style="width:335px;" value="0">
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