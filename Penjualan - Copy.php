<?php
class Penjualan extends CI_Controller{
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
		// $this->set_timezone();
		date_default_timezone_set("Asia/Jakarta");
	}
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$data['data']=$this->m_barang->tampil_barang();
		$this->load->view('admin/v_penjualan',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function get_barang(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kobar=$this->input->post('kode_brg');
		$x['brg']=$this->m_barang->get_barang($kobar);
		$this->load->view('admin/v_detail_barang_jual',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function get_barang_select2(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kobar=$this->input->post('search');
		$data=$this->m_barang->get_barang($kobar);
		$list = array();
		$key=0;

		foreach ($data->result_array() as $a) {
			$list[$key]['id'] = $a['barang_id'];
			$list[$key]['text'] = $a['barang_id'];
		}
		echo json_encode($list);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	public function get_stok($kobar)
		{
			$data=$this->m_barang->get_barang($kobar);
			$b=$data->row_array();

			$barang = array();
			$barang[] = array('id'=>$b['barang_id'], 'nama'=>$b['barang_nama'], 'stok'=>$b['barang_stok'], 'harga'=>number_format($b['barang_harjul']), 'satuan'=>$b['barang_satuan'], 'grosir'=>number_format($b['barang_harjul_grosir']));

			echo json_encode($barang);

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
               'price'    => $i['barang_harjul']-$this->input->post('diskon'),
               'disc'     => $this->input->post('diskon'),
               'qty'      => $this->input->post('qty'),
               'amount'	  => $i['barang_harjul']
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

		redirect('admin/penjualan');
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
		redirect('admin/penjualan');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function simpan_penjualan(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$total=$this->input->post('total');
		$jml_uang=str_replace(",", "", $this->input->post('jml_uang'));
		$kembalian=$jml_uang-$total;
		if(!empty($total) && !empty($jml_uang)){
			if($jml_uang < $total){
				echo $this->session->set_flashdata('msg','<label class="label label-danger">Jumlah Uang yang anda masukan Kurang</label>');
				redirect('admin/penjualan');
			}else{
				$nofak=$this->m_penjualan->get_nofak();
				$this->session->set_userdata('nofak',$nofak);
				$order_proses=$this->m_penjualan->simpan_penjualan($nofak,$total,$jml_uang,$kembalian);
				if($order_proses){
					try {

						// $connector = new WindowsPrintConnector("prantrian");
						$connector = new Mike42\Escpos\PrintConnectors\WindowsPrintConnector("smb://192.168.0.4/KASIR");
						//     //$connector = new WindowsPrintConnector("Receipt Printer");
						//
						//     /* Print a "Hello world" receipt" */
						$printer = new Mike42\Escpos\Printer($connector);
						$printer->setJustification(Mike42\Escpos\Printer::JUSTIFY_CENTER);
						$printer -> setTextSize(1, 2);
						$printer -> text("KOPERASI \n");
						$printer -> text("DHARMA HUSADA \n");
						$printer -> text("RSUD PANDANARAN \n");
						$printer -> text("KABUPATEN BOYOLALI \n");
						$printer -> text("\n");
						$printer -> setTextSize(1, 1);
						$printer -> text($nofak." ". date('d/m/Y H:i:s')." \n");
						$printer -> text("\n");
						foreach ($this->cart->contents() as $items) {
							$printer->setJustification(Mike42\Escpos\Printer::JUSTIFY_LEFT);
							$printer -> text(number_format($items['qty'])."x ".number_format($items['amount'])."        Rp. ".number_format($items['subtotal'])."\n");
							$printer -> text($items['name']."\n");
						}

						$printer -> text("\n");

						$printer->setJustification(Mike42\Escpos\Printer::JUSTIFY_LEFT);
						$printer -> text("TOTAL              Rp ".$total."\n");
						$printer -> text("Bayar              Rp ".$jml_uang."\n");
						$printer -> text("Kembali            Rp ".$kembalian."\n");

						$printer->setJustification(Mike42\Escpos\Printer::JUSTIFY_CENTER);

						$printer -> text("\n");

						$printer -> text("TERIMA KASIH \n");
						$printer -> text("ATAS KUNJUNGAN ANDA \n");
						$printer -> text("\n");
						$printer -> text("\n");
						$printer -> text("\n");

						$printer -> cut();

						/* Close printer */
						$printer -> close();

						$this->cart->destroy();

						$this->session->unset_userdata('tglfak');
						$this->session->unset_userdata('suplier');
						redirect('admin/penjualan');

					} catch (Exception $e) {
						echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
					}
					// $this->load->view('admin/alert/alert_sukses');

				}else{
					redirect('admin/penjualan');
				}
			}

		}else{
			echo $this->session->set_flashdata('msg','<label class="label label-danger">Penjualan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
			redirect('admin/penjualan');
		}

	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function cetak_faktur(){
		$x['data']=$this->m_penjualan->cetak_faktur();
		$this->load->view('admin/laporan/v_faktur',$x);
		//$this->session->unset_userdata('nofak');
	}


}
