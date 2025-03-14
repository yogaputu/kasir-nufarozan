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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>

<body>

    <!-- Navigation -->
   <?php
        $this->load->view('admin/menu');
   ?>

   <?php
$message = $this->session->flashdata('message');
if (isset($message) && $message != "") {
    echo '<script>alert("'.$message.'")</script>';
     $this->session->unset_userdata('message');
}

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
            <form action="<?php echo base_url().'admin/penjualan/add_to_cart'?>" method="post">
            <table>
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Qty</th>
                </tr>
                <tr>
                    <td >
                      <input  name="kode_brg" id="kode_brg" class="form-control input-sm" style="margin-right:5px;" autofocus list="barang">
                      <!-- <select name="kode_brg" id="kode_brg" class="form-control input-sm" style="width:200px;margin-right:5px;" autofocus> -->
                      <!-- </select> -->
                    </td>

                    <td><input type="text" name="nabar" value="" style="margin-right:5px;" class="form-control input-sm" readonly id="nabar"></td>
                    <td><input type="text" name="satuan" value="" style="margin-right:5px;" class="form-control input-sm" readonly id="satuan"></td>
                    <td><input type="text" name="stok" value="" style="margin-right:5px;" class="form-control input-sm" readonly id="stok"></td>
                    <td><input type="text" name="harjul" value="" style="margin-right:5px;text-align:right;" class="form-control input-sm" readonly id="harjul"></td>
                    <td><input type="number" name="diskon" id="diskon" value="0" min="0" class="form-control input-sm" style="margin-right:5px;" required></td>
                    <td><input type="number" name="qty" id="qty" value="1" min="1" max="" class="form-control input-sm" style="margin-right:5px;" required></td>
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
                         <?php if ($items['qty'] >= $items['minbeli']) { ?>
                           <td style="text-align:right;"><?php echo number_format($items['minharga']);?></td>
                         <?php } else { ?>
                         <td style="text-align:right;"><?php echo number_format($items['amount']);?></td>
                       <?php } ?>
                         <td style="text-align:right;"><?php echo number_format($items['disc']);?></td>
                         <td style="text-align:center;">
                           <span class="edit"><?php echo number_format($items['qty']);?></span>
                           <input type="text" class="txtedit" data-id="<?=$items['rowid'];?>" data-field="qty" id="qtytxt_<?=$items['rowid'];?>" value="<?php echo $items['qty'];?>" style="display:none; width:30%">
                           <!-- <?php echo number_format($items['qty']);?> -->
                         </td>
                         <?php if ($items['qty'] >= $items['minbeli']) {

                           $a = $items['qty'] * $items['minharga'] ;?>
                           <td style="text-align:right;"><?php echo number_format($a);?></td>
                         <?php } else { ?>
                         <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>
                       <?php } ?>

                         <td style="text-align:center;"><a href="<?php echo base_url().'admin/penjualan/remove/'.$items['rowid'];?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                    </tr>

                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form action="<?php echo base_url().'admin/penjualan/simpan_penjualan'?>" method="post">
                <table>
                <tr>
                  <td style="width:140px;">Cari Member</td>
                  <th>
                    <select class="form-control" name="member" id="member">
                      <option value="">Silahkan Pilih Member</option>
                    </select>
                  </th>
                </tr>
              </table>
              <br>

            <table>
                <tr>
                    <td style="width:760px;" rowspan="2">
                      <a class="btn btn-info btn-lg" onclick="uang_pas()">Uang Pas</a>
                      <button type="submit" class="btn btn-success btn-lg" id="simpan"> Simpan</button>
                    </td>
                    <th style="width:140px;">Total Belanja(Rp)</th>
                    <th style="text-align:right;width:140px;"><input type="text" name="total2" value="<?php echo number_format($this->cart->total());?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                    <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                </tr>
                <tr>
                    <th>Diskon(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="jml_diskon" name="jml_diskon" class="jml_diskon form-control input-sm" style="text-align:right;margin-bottom:5px;" required value="0"></th>
                    <input type="hidden" id="jml_diskon2" name="jml_diskon2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required value="0">
                </tr>
                <tr>
                  <td></td>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script type="text/javascript">
  $(document).ready(function() {
    $("#simpan").click(function() {
      $.ajax({
        url: '<?php echo site_url("admin/alert/alert_sukses"); ?>',
        type: 'POST',
        dataType: 'json',
              success: function(response) {
                // Handle the response and show the notification
                toastr.success(response.message, 'Notification');
              },
              error: function(xhr, status, error) {
                // Handle any errors that occur during the AJAX request
                console.log(error);
              }
            });
          });
        });    
          
    

     $(document).ready(function(){

       // On text click
       $('.edit').click(function(){
          // Hide input element
          $('.txtedit').hide();

          // Show next input element
          $(this).next('.txtedit').show().focus().select();

          // Hide clicked element
          $(this).hide();
       });

       // Focus out from a textbox
       $('.txtedit').focusout(function(){
          // Get edit id, field name and value
          var edit_id = $(this).data('id');
          var fieldname = $(this).data('field');
          var value = $(this).val();

          // assign instance to element variable
          var element = this;

          // Send AJAX request
          $.ajax({
            url: '<?= base_url().'admin/penjualan/update_cart/' ?>',
            type: 'post',
            data: { field:fieldname, value:value, id:edit_id },
            success:function(response){

              // // Hide Input element
              // $(element).hide();
              //
              // // Update viewing value and display it
              // $(element).prev('.edit').show();
              // $(element).prev('.edit').text(value);
              location.reload();
            }
          });
        });
      });
      </script>

    <script type="text/javascript">
        $(function(){
            $('#jml_uang').on("change",function(){
                var total=$('#total').val();
                var jumuang=$('#jml_uang').val();
                var jumdis=$('#jml_diskon2').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_uang2').val(hsl);
                $('#kembalian').val(hsl-(total-parseInt(jumdis)));
            });

            $('#jml_diskon').on("change",function(){
                var total=$('#total').val();
                var jumdis=$('#jml_diskon').val();
                var hsl=jumdis.replace(/[^\d]/g,"");
                $('#jml_diskon2').val(hsl);
                // $('#kembalian').val(hsl-total);
                // console.log(hsl);
            });

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
            $('#jml_diskon').priceFormat({
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
                          harga = data1[i].harga;
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
    $(function(){
       $('#member').select2({
           minimumInputLength: 2,
           allowClear: true,
           placeholder: 'Masukkan Nomor Member',
           ajax: {
             type: "post",
              dataType: 'json',
              url: '<?php echo base_url().'admin/penjualan/get_member';?>',
              delay: 100,
              data: function(params) {
                return {
                  search: params.term
                }
              },
              processResults: function (data, page) {
              return {
                results: data
              };
            },
          }
      });
      // $('#member').select2('open');
 });

 $('#member').on('select2:select', function (e) {
   var data = $('#member').val();
   $.get("<?php echo base_url().'admin/penjualan/get_diskon/' ?>"+data,function(data1){
           var diskon = "";
           for(var i=0;i<data1.length;i++){
             diskon = data1[i].diskon;
           }
           var total = $('#total').val();
           var total_diskon = total * diskon / 100;
           console.log(total_diskon);
           $('#jml_diskon').val(total_diskon).change();
           $('#jml_diskon2').val(total_diskon);
         },"json");
   });

   function uang_pas() {
     var total = $('#total').val();
     var diskon = $('#jml_diskon2').val();
     var akhir = total - diskon;
     $('#jml_uang').val(akhir).change();
     $('#jml_uang').priceFormat({
             prefix: '',
             //centsSeparator: '',
             centsLimit: 0,
             thousandsSeparator: ','
     });
   }

   function total_diskon() {
     var total = $('#total').val();
     $('#jml_diskon').val(total).change();
     $('#jml_diskon').priceFormat({
             prefix: '',
             //centsSeparator: '',
             centsLimit: 0,
             thousandsSeparator: ','
     });
     $('#jml_uang').val('0').change();
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
