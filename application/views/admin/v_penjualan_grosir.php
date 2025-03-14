<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By lynxitboyolali.com">
    <meta name="author" content="Lynx IT Boyolali">

    <title>Transaksi Penjualan</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/select2/css/select2.min.css'?>">
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
                <h1 class="page-header">Transaksi
                    <small>Penjualan (Eceran)</small>
                    <a href="#" data-toggle="modal" data-target="#largeModal" class="pull-right"><small>Cari Produk!</small></a>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
            <form action="<?php echo base_url().'admin/penjualan_grosir/add_to_cart'?>" method="post">
            <table>
                <tr>
                    <th>Kode Barang</th>
                </tr>
                <tr>
                    <td >
                      <input type="text" name="kode_brg" id="kode_brg" class="form-control input-sm" style="width:200px;margin-right:5px;" autofocus>
                      <!-- <select name="kode_brg" id="kode_brg" class="form-control input-sm" style="width:200px;margin-right:5px;" autofocus> -->
                      </select>
                    </td>

                    <td><input type="text" name="nabar" value=""  class="form-control input-sm" readonly id="nabar"></td>
                    <td><input type="text" name="satuan" value=""  class="form-control input-sm" readonly id="satuan"></td>
                    <td><input type="text" name="stok" value=""  class="form-control input-sm" readonly id="stok"></td>
                    <td><input type="text" name="harjul" value=""  class="form-control input-sm" readonly id="harjul"></td>
                    <td><input type="number" name="diskon" id="diskon" value="0" min="0" class="form-control input-sm"  required></td>
                    <td><input type="number" name="qty" id="qty" value="1" min="1" max="" class="form-control input-sm"  required></td>
                    <td><button type="submit" class="btn btn-sm btn-primary">Ok</button></td>
                </tr>
                    <!-- <div id="detail_barang" style="position:absolute;">
                    </div> -->
            </table>
             </form>
            <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th style="text-align:center;">Satuan</th>
                        <th style="text-align:center;">Harga(Rp)</th>
                        <th style="text-align:center;">Diskon(Rp)</th>
                        <th style="text-align:center;">Qty</th>
                        <th style="text-align:center;">Sub Total</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $items): ?>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                    <tr>
                         <td><?=$items['id'];?></td>
                         <td><?=$items['name'];?></td>
                         <td style="text-align:center;"><?=$items['satuan'];?></td>
                         <td style="text-align:right;"><?php echo number_format($items['amount']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['disc']);?></td>
                         <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>

                         <td style="text-align:center;"><a href="<?php echo base_url().'admin/penjualan_grosir/remove/'.$items['rowid'];?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                    </tr>

                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form action="<?php echo base_url().'admin/penjualan_grosir/simpan_penjualan_grosir'?>" method="post">
            <table>
                <tr>
                    <td style="width:760px;" rowspan="2">
                      <a class="btn btn-info btn-lg" onclick="uang_pas()">Uang Pas</a>
                      <button type="submit" class="btn btn-success btn-lg"> Simpan</button>
                    </td>
                    <th style="width:140px;">Total Belanja(Rp)</th>
                    <th style="text-align:right;width:140px;"><input type="text" name="total2" value="<?php echo number_format($this->cart->total());?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                    <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                </tr>
                <tr>
                    <th>Tunai(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                    <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                </tr>
                <tr>
                    <td></td>
                    <th>Kembalian(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                </tr>

            </table>
            </form>
            <hr/>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="text-align:center;">Copyright &copy; <?php echo '2022';?> by <a href="http://lynxitboyolali.com/">Lynx IT Boyolali</a> </p>

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
    <script src="<?php echo base_url().'assets/select2/js/select2.min.js'?>"></script>
    <script type="text/javascript">
        $(function(){
            $('#jml_uang').on("change",function(){
                var total=$('#total').val();
                var jumuang=$('#jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_uang2').val(hsl);
                $('#kembalian').val(hsl-total);
            })

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(function(){
            $('.jml_uang').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('#jml_uang2').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ''
            });
            $('#kembalian').priceFormat({
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
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
          // $('#kode_brg').select2('open');
            //Ajax kabupaten/kota insert
            $("#kode_brg").focus();
            $("#kode_brg").on("input",function(){
              var data = $('#kode_brg').val();
                $.get("<?php echo base_url().'admin/penjualan/get_stok/' ?>"+data,function(data1){
                        var stok = "";
                        for(var i=0;i<data1.length;i++){
                          stok = data1[i].stok;
                          harga = data1[i].grosir;
                          nama = data1[i].nama;
                          satuan = data1[i].satuan;
                        }
                        $("#stok").val(stok);
                        $("#harjul").val(harga);
                        $("#nabar").val(nama);
                        $("#satuan").val(satuan);
                        $("#qty").attr({
                           "max" : parseInt(stok),        // substitute your own
                        });
                      },"json");
            });

            $("#kode_brg").keypress(function(e){
                // if(e.which==13){
                //     $("#jumlah").focus();
                // }
            });
        });
    </script>

    <script type="text/javascript">
 //    $(function(){
 //       $('#kode_brg').select2({
 //           minimumInputLength: 2,
 //           allowClear: true,
 //           placeholder: 'Masukkan Kode Barang',
 //           ajax: {
 //             type: "post",
 //              dataType: 'json',
 //              url: '<?php echo base_url().'admin/penjualan/get_barang_select2';?>',
 //              delay: 100,
 //              data: function(params) {
 //                return {
 //                  search: params.term
 //                }
 //              },
 //              processResults: function (data, page) {
 //              return {
 //                results: data
 //              };
 //            },
 //          }
 //      });
 //      $('#kode_brg').select2('open');
 // });

 // $('#kode_brg').on('select2:select', function (e) {
 //   var data = $('#kode_brg').val();
 //   $.get("<?php echo base_url().'admin/penjualan/get_stok/' ?>"+data,function(data1){
 //           var stok = "";
 //           for(var i=0;i<data1.length;i++){
 //             stok = data1[i].stok;
 //             harga = data1[i].harga;
 //             nama = data1[i].nama;
 //             satuan = data1[i].satuan;
 //           }
 //           $("#stok").val(stok);
 //           $("#harjul").val(harga);
 //           $("#nabar").val(nama);
 //           $("#satuan").val(satuan);
 //         },"json");
 //         $("#qty").focus();
 //              $("#qty").select();
 //              // $('#kode_brg').select2('open');
 //   });

   function uang_pas() {
     var total = $('#total').val();
     $('#jml_uang').val(total).change();
     $('#jml_uang').priceFormat({
             prefix: '',
             //centsSeparator: '',
             centsLimit: 0,
             thousandsSeparator: ','
     });
   }
</script>


</body>

</html>
