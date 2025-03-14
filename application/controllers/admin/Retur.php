<?php
class Retur extends CI_Controller{
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
	}
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$data['barang']=$this->m_barang->tampil_barang();
		$data['retur']=$this->m_penjualan->tampil_retur();
		$data['data']=$this->m_barang->get_index();
		$this->load->view('admin/v_retur',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	public function get_brg_retur($kobar)
		{
			$data=$this->m_barang->get_barang($kobar);
			$b=$data->row_array();

			$barang = array();
			$barang[] = array('id'=>$b['barang_id'], 'nama'=>$b['barang_nama'],
			'stok'=>$b['barang_stok'], 'harga'=>number_format($b['barang_harjul']), 'satuan'=>$b['barang_satuan'], 'grosir'=>number_format($b['barang_harjul_grosir']));

			echo json_encode($barang);

		}

	function get_barang(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kobar=$this->input->post('kode_brg');
		$x['brg']=$this->m_barang->get_barang($kobar);
		$this->load->view('admin/v_detail_barang_retur',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function simpan_retur(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kobar=$this->input->post('kode_brg');
		$nabar=$this->input->post('nabar');
		$satuan=$this->input->post('satuan');
		$harjul=str_replace(",", "", $this->input->post('harjul'));
		$qty=$this->input->post('qty');
		$subtotal=$this->input->post('subtotal');
		$keterangan=$this->input->post('keterangan');
		$this->m_penjualan->simpan_retur($kobar,$nabar,$satuan,$harjul,$qty,$subtotal,$keterangan);
		redirect('admin/retur');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function hapus_retur(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$kode=$this->uri->segment(4);
		$this->m_penjualan->hapus_retur($kode);
		redirect('admin/retur');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

}
