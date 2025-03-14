<?php
class Laporan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_tempat');
		$this->load->model('m_suplier');
		$this->load->model('m_pembelian');
		$this->load->model('m_penjualan');
		$this->load->model('m_laporan');
	}
	function index(){
	if($this->session->userdata('akses')=='1' OR $this->session->userdata('akses')=='0'){
		$data['data']=$this->m_barang->tampil_barang();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['tmp']=$this->m_tempat->tampil_tempat();
		$data['jual_bln']=$this->m_laporan->get_bulan_jual();
		$data['jual_thn']=$this->m_laporan->get_tahun_jual();
		$data['kategori'] = $this->m_laporan->get_stok_barang_perkategori();
		$data['tempat'] = $this->m_laporan->get_stok_barang_pertempat();
		$this->load->view('admin/v_laporan',$data);
	}
		if ($this->session->userdata('akses') == '2') {
			$data['data'] = $this->m_barang->tampil_barang();
			$data['kat'] = $this->m_kategori->tampil_kategori();
			$data['tmp']=$this->m_tempat->tampil_tempat();
			$data['jual_bln'] = $this->m_laporan->get_bulan_jual();
			$data['jual_thn'] = $this->m_laporan->get_tahun_jual();
			$data['kategori'] = $this->m_laporan->get_stok_barang_perkategori();
			$data['tempat'] = $this->m_laporan->get_stok_barang_pertempat();
			$this->load->view('admin/v_laporan', $data);
		}else{
        echo "";
    }
	}
	function lap_stok_barang(){
		$x['data']=$this->m_laporan->get_stok_barang();
		$this->load->view('admin/laporan/v_lap_stok_barang',$x);
	}
	function barang_perkategori()
	{
		$kate = $this->input->post('kategori');
		$x['data'] = $this->m_laporan->stok_barang_perkategori($kate);
		$this->load->view('admin/laporan/v_barang_perkategori', $x);
	}
	function barang_pertempat()
	{
		$kate = $this->input->post('tempat');
		$x['data'] = $this->m_laporan->stok_barang_pertempat($kate);
		$this->load->view('admin/laporan/v_barang_pertempat', $x);
	}
	function lap_data_barang(){
		$x['data']=$this->m_laporan->get_data_barang();
		$this->load->view('admin/laporan/v_lap_barang',$x);
	}
	function lap_data_penjualan(){
		$x['data']=$this->m_laporan->get_data_penjualan();
		$x['jml']=$this->m_laporan->get_total_penjualan();
		$this->load->view('admin/laporan/v_lap_penjualan',$x);
	}
	function lap_penjualan_pertanggal(){
		$tanggal=$this->input->post('tgl');
		$shift = $this->input->post('shift');
		$x['jml']=$this->m_laporan->get_data__total_jual_pertanggal($tanggal, $shift);
		$x['data']=$this->m_laporan->get_data_jual_pertanggal($tanggal, $shift);
		$x['retur'] = $this->m_laporan->get_retur_barang_tanggal($tanggal);
		$this->load->view('admin/laporan/v_lap_jual_pertanggal',$x);
	}
	function lap_penjualan_pertanggal_kasir()
	{
		$tanggal = $this->input->post('tgl');
		$shift = $this->input->post('shift');
		$x['jml'] = $this->m_laporan->get_data__total_jual_pertanggal($tanggal, $shift);
		$x['data'] = $this->m_laporan->get_data_jual_pertanggal($tanggal, $shift);
		$x['retur'] = $this->m_laporan->get_retur_barang_tanggal($tanggal);
		$this->load->view('admin/laporan/v_lap_jual_pertanggal_kasir', $x);
	}
	function lap_penjualan_perbulan(){
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_laporan->get_total_jual_perbulan($bulan);
		$x['data']=$this->m_laporan->get_jual_perbulan($bulan);
		$x['retur'] = $this->m_laporan->get_retur_barang_bulan($bulan);
		$this->load->view('admin/laporan/v_lap_jual_perbulan',$x);
	}
	function lap_penjualan_perbulan_jumlah(){
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_laporan->get_total_jual_perbulan($bulan);
		$x['data']=$this->m_laporan->get_jual_perbulan_jumlah($bulan);
		$x['retur'] = $this->m_laporan->get_retur_barang_bulan($bulan);
		$this->load->view('admin/laporan/v_lap_jual_perbulan_jumlah',$x);
	}
	function lap_penjualan_pertahun(){
		$tahun=$this->input->post('thn');
		$x['jml']=$this->m_laporan->get_total_jual_pertahun($tahun);
		$x['data']=$this->m_laporan->get_jual_pertahun($tahun);
		$x['retur'] = $this->m_laporan->get_retur_barang_tahun($tahun);
		$this->load->view('admin/laporan/v_lap_jual_pertahun',$x);
	}
	function lap_laba_rugi(){
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_laporan->get_total_lap_laba_rugi($bulan);
		$x['data']=$this->m_laporan->get_lap_laba_rugi($bulan);
		$this->load->view('admin/laporan/v_lap_laba_rugi',$x);
	}
	function lap_laba_rugi_hari()
	{
		$hari = $this->input->post('tgl');
		$x['jml'] = $this->m_laporan->get_total_lap_laba_rugi_hari($hari);
		$x['data'] = $this->m_laporan->get_lap_laba_rugi_hari($hari);
		$this->load->view('admin/laporan/v_lap_laba_rugi_hari', $x);
	}

	function neraca()
	{
		$bulan = $this->input->post('bln');
		$x['data'] = $this->m_laporan->neraca($bulan);
		$this->load->view('admin/laporan/v_neraca', $x);
	}

	function barang_modal()
	{
		$bulan = $this->input->post('bln');
		$x['data'] = $this->m_laporan->barang_modal($bulan);
		$this->load->view('admin/laporan/lap_pembelian_modal', $x);
	}

	function barang_harian()
	{
		$bulan = $this->input->post('bln');
		$x['data'] = $this->m_laporan->barang_harian($bulan);
		$this->load->view('admin/laporan/lap_pembelian_harian', $x);
	}

	function lap_edit(){
		$tanggal=$this->input->post('tgl');
		$shift = $this->input->post('shift');
		$x['jml']=$this->m_laporan->get_data__total_jual_pertanggal($tanggal, $shift);
		$x['data']=$this->m_laporan->get_data_jual_pertanggal($tanggal, $shift);
		$this->load->view('admin/laporan/lap_edit',$x);
	}

	function hapus_laporan(){
	if($this->session->userdata('akses')=='0'){
		$kode=$this->input->post('kode');
		$this->m_laporan->hapus_laporan($kode);
		redirect('admin/laporan');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}
