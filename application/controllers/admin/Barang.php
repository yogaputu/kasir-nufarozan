<?php
class Barang extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_tempat');
		$this->load->library('barcode');
		$this->load->library('escpos');
		// $this->set_timezone();
		date_default_timezone_set("Asia/Jakarta");
	}
	function index(){
	if($this->session->userdata('akses')=='1' OR $this->session->userdata('akses')=='0'){
		$data['data']=$this->m_barang->tampil_barang();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['kat2']=$this->m_kategori->tampil_kategori();
		$data['tmp']=$this->m_tempat->tampil_tempat();
		$this->load->view('admin/v_barang',$data);
	}if($this->session->userdata('akses')=='2'){
		$data['data']=$this->m_barang->tampil_barang();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['kat2']=$this->m_kategori->tampil_kategori();
		$data['tmp']=$this->m_tempat->tampil_tempat();
		$this->load->view('admin/v_barang',$data);
	}else{
        echo "";
    }
	}
	function index_tambah_barang(){
	if($this->session->userdata('akses')=='1' OR $this->session->userdata('akses')=='0'){
		$data['data']=$this->m_barang->tampil_barang();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['kat2']=$this->m_kategori->tampil_kategori();
		$data['tmp']=$this->m_tempat->tampil_tempat();
		$this->load->view('admin/v_tambah_barang',$data);
	}if($this->session->userdata('akses')=='2'){
		$data['data']=$this->m_barang->tampil_barang();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['kat2']=$this->m_kategori->tampil_kategori();
		$data['tmp']=$this->m_tempat->tampil_tempat();
		$this->load->view('admin/v_tambah_barang',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
		function index_edit_barang($kobar){
	if($this->session->userdata('akses')=='1' OR $this->session->userdata('akses')=='0'){
		$data['data']=$this->m_barang->get_edit_barang($kobar);
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['kat2']=$this->m_kategori->tampil_kategori();
		$data['tmp']=$this->m_tempat->tampil_tempat();
		$this->load->view('admin/v_edit_barang',$data);
	}
	if($this->session->userdata('akses')=='2'){
		$data['data']=$this->m_barang->get_edit_barang($kobar);
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['kat2']=$this->m_kategori->tampil_kategori();
		$data['tmp']=$this->m_tempat->tampil_tempat();
		$this->load->view('admin/v_edit_barang',$data);
	}else{
        echo "";
    }
	}
	function tambah_barang(){
	if($this->session->userdata('akses')=='1' OR $this->session->userdata('akses')=='0'){
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$tempat=$this->input->post('tempat');
		$min_beli = $this->input->post('min_beli');
		$min_harga = $this->input->post('min_harga');
		$this->m_barang->simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok,$tempat,$min_beli,$min_harga);

		redirect('admin/barang/index_tambah_barang');
	}if($this->session->userdata('akses')=='2'){
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$tempat=$this->input->post('tempat');
			$min_beli = $this->input->post('min_beli');
			$min_harga = $this->input->post('min_harga');
		$this->m_barang->simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok,$tempat,$min_beli,$min_harga);

		redirect('admin/barang/index_tambah_barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_barang(){
	if($this->session->userdata('akses')=='1' OR $this->session->userdata('akses')=='0'){
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$tempat=$this->input->post('tempat');
			$min_beli = $this->input->post('min_beli');
			$min_harga = $this->input->post('min_harga');
		$this->m_barang->update_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok,$tempat,$min_beli,$min_harga);
		redirect('admin/barang');
	}if($this->session->userdata('akses')=='2'){
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$tempat=$this->input->post('tempat');
			$min_beli = $this->input->post('min_beli');
			$min_harga = $this->input->post('min_harga');
		$this->m_barang->update_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok,$tempat,$min_beli,$min_harga);
		redirect('admin/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_barang(){
	if($this->session->userdata('akses')=='1' OR $this->session->userdata('akses')=='0'){
		$kode=$this->input->post('kode');
		$this->m_barang->hapus_barang($kode);
		redirect('admin/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function c_harga(){

		$x['data'] = $this->m_barang->cetak_harga();
		$this->load->view('admin/laporan/v_cetak_harga', $x);
		//$this->session->unset_userdata('nofak');
	}

	function c_harga_semua()
	{

		$x['data'] = $this->m_barang->cetak_harga_all();
		$this->load->view('admin/laporan/v_cetak_harga_semua', $x);
		//$this->session->unset_userdata('nofak');
	}
}
