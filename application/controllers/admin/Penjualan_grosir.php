<?php
class Penjualan_grosir extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_suplier');
		$this->load->model('m_penjualan');
		$this->load->library('escpos');
	}
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$data['data']=$this->m_barang->tampil_barang();
		$this->load->view('admin/v_penjualan_grosir',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function get_barang(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kobar=$this->input->post('kode_brg');
		$x['brg']=$this->m_barang->get_barang($kobar);
		$this->load->view('admin/v_detail_barang_jual_grosir',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function add_to_cart(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kobar=$this->input->post('kode_brg');
		$produk=$this->m_barang->get_barang($kobar);
		$i=$produk->row_array();
		$data = array(
               'id'       => $i['barang_id'],
               'name'     => $i['barang_nama'],
               'satuan'   => $i['barang_satuan'],
               'harpok'   => $i['barang_harpok'],
               'price'    => $i['barang_harjul_grosir']-$this->input->post('diskon'),
               'disc'     => $this->input->post('diskon'),
               'qty'      => $this->input->post('qty'),
               'amount'	  => $i['barang_harjul_grosir']
            );
	if(!empty($this->cart->total_items())){
		foreach ($this->cart->contents() as $items){
			$id=$items['id'];
			$qtylama=$items['qty'];
			$rowid=$items['rowid'];
			$kobar=$this->input->post('kode_brg');
			$qty=$this->input->post('qty');
			if($id==$kobar){
				$up=array(
					'rowid'=> $rowid,
					'qty'=>$qtylama+$qty
					);
				$this->cart->update($up);
			}else{
				$this->cart->insert($data);
			}
		}
	}else{
		$this->cart->insert($data);
	}
		redirect('admin/penjualan_grosir');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function remove(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('admin/penjualan_grosir');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function simpan_penjualan_grosir(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$total=$this->input->post('total');
		$jml_uang=str_replace(",", "", $this->input->post('jml_uang'));
		$kembalian=$jml_uang-$total;
		if(!empty($total) && !empty($jml_uang)){
			if($jml_uang < $total){
				echo $this->session->set_flashdata('msg','<label class="label label-danger">Jumlah Uang yang anda masukan Kurang</label>');
				redirect('admin/penjualan_grosir');
			}else{
				$nofak=$this->m_penjualan->get_nofak();
				$this->session->set_userdata('nofak',$nofak);
				$order_proses=$this->m_penjualan->simpan_penjualan_grosir($nofak,$total,$jml_uang,$kembalian);
				if($order_proses){
					try {

					     // $connector = new WindowsPrintConnector("prantrian");
					     $connector = new Mike42\Escpos\PrintConnectors\WindowsPrintConnector("smb://192.168.10.40/POS80");
					     //     //$connector = new WindowsPrintConnector("Receipt Printer");
					     //
					     //     /* Print a "Hello world" receipt" */
							 $printer = new Mike42\Escpos\Printer($connector);
							$printer->setJustification(Mike42\Escpos\Printer::JUSTIFY_CENTER);
							$printer -> setTextSize(2, 2);
							$printer -> text("KOPERASI RSUD PANDANARAN \n");
							$printer -> text("KABUPATEN BOYOLALI \n");
							$printer -> text("\n");
							$printer -> setTextSize(1, 1);
							$printer -> text($nofak." ". date('d/m/Y H:i:s')." \n");
							$printer -> text("\n");
							foreach ($this->cart->contents() as $items) {
								$printer->setJustification(Mike42\Escpos\Printer::JUSTIFY_LEFT);
								$printer -> text(number_format($items['qty'])."x ".number_format($items['amount']));
								$printer->setJustification(Mike42\Escpos\Printer::JUSTIFY_RIGHT);
								$printer -> text("Rp. ".number_format($items['subtotal'])."\n");
								$printer->setJustification(Mike42\Escpos\Printer::JUSTIFY_LEFT);
								$printer -> text($items['name']."\n");
							}

							$printer -> text("\n");

							$printer->setJustification(Mike42\Escpos\Printer::JUSTIFY_LEFT);
							$printer -> text("TOTAL ");
							$printer->setJustification(Mike42\Escpos\Printer::JUSTIFY_RIGHT);
							$printer -> setTextSize(2, 2);
							$printer -> text("Rp ".$total."\n");
							$printer->setJustification(Mike42\Escpos\Printer::JUSTIFY_LEFT);
							$printer -> setTextSize(1, 1);
							$printer -> text("Bayar ");
							$printer->setJustification(Mike42\Escpos\Printer::JUSTIFY_RIGHT);
							$printer -> text("Rp ".$jml_uang."\n");
							$printer->setJustification(Mike42\Escpos\Printer::JUSTIFY_LEFT);
							$printer -> setTextSize(1, 1);
							$printer -> text("Kembali ");
							$printer->setJustification(Mike42\Escpos\Printer::JUSTIFY_RIGHT);
							$printer -> text("Rp ".$kembalian."\n");

							$printer->setJustification(Mike42\Escpos\Printer::JUSTIFY_CENTER);

							$printer -> text("\n");

							$printer -> text("TERIMA KASIH \n");
							$printer -> text("ATAS KUNJUNGAN ANDA \n");

					         $printer -> cut();

					         /* Close printer */
					         $printer -> close();

									 $this->cart->destroy();
									 //$this->session->unset_userdata('nofak');
									 $this->session->unset_userdata('tglfak');
									 $this->session->unset_userdata('suplier');

									 redirect('admin/penjualan_grosir');

					     } catch (Exception $e) {
					         echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
					     }
					// $this->load->view('admin/alert/alert_sukses_grosir');
				}else{
					redirect('admin/penjualan_grosir');
				}
			}

		}else{
			echo $this->session->set_flashdata('msg','<label class="label label-danger">Penjualan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
			redirect('admin/penjualan_grosir');
		}

	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function cetak_faktur_grosir(){
		$x['data']=$this->m_penjualan->cetak_faktur();
		$this->load->view('admin/laporan/v_faktur_grosir',$x);
		//$this->session->unset_userdata('nofak');
	}

}
