<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By lynxitboyolali.com">
    <meta name="author" content="Lynx IT Boyolali">

    <title>Welcome To Kasir Nufarozan Mart</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/style.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/font-awesome.css' ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() . 'assets/css/4-col-portfolio.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/dataTables.bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/jquery.dataTables.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/dist/css/bootstrap-select.css' ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap-datetimepicker.min.css' ?>">
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
                <center><?php echo $this->session->flashdata('msg'); ?></center>
                <h1 class="page-header">Tambah
                    <small>Kas</small>

                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo base_url() . 'admin/kas/simpan_kas' ?>" method="post">
                    <div class="form-group row">
                        <label for="" class="control-label col-md-2">Kode Transaksi</label>
                        <div class="col-md-10">
                            <input type="text" name="kode_tr" id="" class="form-control" value="TRK<?php echo sprintf("%04s", $kode_transaksi) ?>" readonly>
                            <input type="hidden" name="jumlah" value="1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-2">Tanggal</label>
                        <div class="col-md-10">
                            <input type="date" name="tanggal" id="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-2">Jenis Transaksi</label>
                        <div class="col-md-10">
                            <select name="trx" class=" form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                <?php foreach ($keg1->result_array() as $k2) {
                                    $id_keg = $k2['id_kegiatan'];
                                    $nm_keg = $k2['nama_kegiatan'];
                                ?>
                                    <option value="<?php echo $id_keg; ?>"><?php echo $nm_keg; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-2">Keterangan</label>
                        <div class="col-md-10">
                            <input type="text" name="keterangan" id="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-2">Kode Akun</label>
                        <div class="col-md-10">
                            <select name="akun" class=" form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                <?php foreach ($akun->result_array() as $k2) {
                                    $id_keg = $k2['kode_akun'];
                                    $nm_keg = $k2['nama_akun'];
                                ?>
                                    <option value="<?php echo $id_keg; ?>"><?php echo $nm_keg; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-2">Index</label>
                        <div class="col-md-10">
                            <select name="idx" class=" form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                <?php foreach ($idx->result_array() as $k2) {
                                    $id_keg = $k2['id_index'];
                                    $nm_keg = $k2['keterangan'];
                                ?>
                                    <option value="<?php echo $id_keg; ?>"><?php echo $nm_keg; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-2">Debit / Masuk</label>
                        <div class="col-md-10">
                            <input type="text" name="debit" id="" class="form-control" value="0" min="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-2">Kredit / Keluar</label>
                        <div class="col-md-10">
                            <input type="text" name="kredit" id="" class="form-control" value="0" min="0">
                        </div>
                    </div>
                    <button type="submit" class="pull-right btn btn-sm btn-primary" style="margin-bottom: 10px;">Simpan</button>
                </form>
                
                <!-- <a href="<?php echo base_url() . 'admin/pembelian_harian/simpan_pembelian' ?>" class="btn btn-info btn-lg"><span class="fa fa-save"></span> Simpan</a> -->
            </div>
        </div>
        <!-- /.row -->

        <datalist id="barang">
            <?php foreach ($data->result_array() as $barang) { ?>
                <option value="<?php echo $barang['barang_id'] ?>"><?php echo $barang['barang_nama'] ?></option>
            <?php } ?>
        </datalist>
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
            $('#datepicker2').datetimepicker({
                format: 'YYYY-MM-DD',
            });

            $('#timepicker').datetimepicker({
                format: 'HH:mm'
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            //Ajax kabupaten/kota insert
            $("#kode_brg").focus();
            // $("#kode_brg").keyup(function(){
            //     var kobar = {kode_brg:$(this).val()};
            //        $.ajax({
            //    type: "POST",
            //    url : "<?php echo base_url() . 'admin/pembelian/get_barang'; ?>",
            //    data: kobar,
            //    success: function(msg){
            //    $('#detail_barang').html(msg);
            //    }
            // });
            // });

            $("#kode_brg").on("input", function() {
                var data = $('#kode_brg').val();
                $.get("<?php echo base_url() . 'admin/pembelian/get_stok/' ?>" + data, function(data1) {
                    var stok = "";
                    for (var i = 0; i < data1.length; i++) {
                        harpok = data1[i].harpok;
                        harjul = data1[i].harjul;
                        nama = data1[i].nama;
                        satuan = data1[i].satuan;
                    }
                    $("#harpok").val(harpok);
                    $("#harjul").val(harjul);
                    $("#nabar").val(nama);
                    $("#satuan").val(satuan);
                }, "json");
            });

            $("#kode_brg").keypress(function(e) {
                if (e.which == 13) {
                    $("#jumlah").focus();
                }
            });
        });
    </script>

</body>

</html>