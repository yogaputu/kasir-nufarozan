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
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>">
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
            <center><?php echo $this->session->flashdata('msg');?></center>
                <h1 class="page-header">Pembelian
                    <small>Barang</small>

                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
            <form action="<?php echo base_url().'admin/pembelian_harian/add_to_cart'?>" method="post">
            <div class="form-group row">
                <label for="" class="control-label col-md-2">Nama Barang</label>
                <div class="col-md-10">
                    <input type="text" name="nama_brg" id="" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="control-label col-md-2">Harga Satuan</label>
                <div class="col-md-10">
                    <input type="text" name="harga" id="" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="control-label col-md-2">Jumlah</label>
                <div class="col-md-10">
                    <input type="text" name="jumlah" id="" class="form-control">
                </div>
            </div>
            <button type="submit" class="pull-right btn btn-sm btn-primary" style="margin-bottom: 10px;">Ok</button>
             </form>
            <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th style="text-align:center;">Harga Pokok</th>
                        <th style="text-align:center;">Jumlah Beli</th>
                        <th style="text-align:center;">Sub Total</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $items): ?>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                    <tr>
                         <td><?=$items['name'];?></td>
                         <td style="text-align:right;"><?php echo number_format($items['price']);?></td>
                         <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>
                         <td style="text-align:center;"><a href="<?php echo base_url().'admin/pembelian_harian/remove/'.$items['rowid'];?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" style="text-align:center;">Total</td>
                        <td style="text-align:right;">Rp. <?php echo number_format($this->cart->total());?></td>
                    </tr>
                </tfoot>
            </table>
            <a href="<?php echo base_url().'admin/pembelian_harian/simpan_pembelian'?>" class="btn btn-info btn-lg"><span class="fa fa-save"></span> Simpan</a>
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
                    <p style="text-align:center;">Copyright &copy; <?php echo '2022';?> by <a href="http://lynxitboyolali.com/">Lynx IT Boyolali</a></p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>
    <script type="text/javascript">
            $(function () {
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
        $(document).ready(function(){
            //Ajax kabupaten/kota insert
            $("#kode_brg").focus();
            // $("#kode_brg").keyup(function(){
            //     var kobar = {kode_brg:$(this).val()};
            //        $.ajax({
            //    type: "POST",
            //    url : "<?php echo base_url().'admin/pembelian/get_barang';?>",
            //    data: kobar,
            //    success: function(msg){
            //    $('#detail_barang').html(msg);
            //    }
            // });
            // });

            $("#kode_brg").on("input",function(){
              var data = $('#kode_brg').val();
                $.get("<?php echo base_url().'admin/pembelian/get_stok/' ?>"+data,function(data1){
                        var stok = "";
                        for(var i=0;i<data1.length;i++){
                          harpok = data1[i].harpok;
                          harjul = data1[i].harjul;
                          nama = data1[i].nama;
                          satuan = data1[i].satuan;
                        }
                        $("#harpok").val(harpok);
                        $("#harjul").val(harjul);
                        $("#nabar").val(nama);
                        $("#satuan").val(satuan);
                      },"json");
            });

            $("#kode_brg").keypress(function(e){
                if(e.which==13){
                    $("#jumlah").focus();
                }
            });
        });
    </script>

</body>

</html>
