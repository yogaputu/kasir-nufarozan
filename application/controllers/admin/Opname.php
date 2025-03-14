<?php
class Opname extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_opname');
		$this->load->model('m_barang');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_opname->get_all();
		$this->load->view('admin/v_opname',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

  function tambah_opname(){
  if($this->session->userdata('akses')=='1'){
    $data['data']=$this->m_barang->tampil_barang();
    $this->load->view('admin/v_tambah_opname',$data);
  }else{
        echo "Halaman tidak ditemukan";
    }
  }

  function simpan(){
    $kode_brg = $this->input->post('kode_brg');
    $jumlah_program = $this->input->post('jumlah_program');
    $jumlah_real = $this->input->post('jumlah_real');
    $save = $this->m_opname->save();
    $save_detil = $this->m_opname->save_detil($save, $kode_brg, $jumlah_program, $jumlah_real);

    if ($save && $save_detil) {
      redirect('admin/opname');
    }
    echo sizeof($kode_brg);
  }

  function cetak($id, $tgl)
  {
    $data['data'] = $this->m_opname->get_detil($id);
    $data['tgl'] = $tgl;
    $this->load->view('admin/laporan/v_stok_opname', $data);
  }

  function hapus($id)
  {
    $hapus = $this->m_opname->hapus($id);
    if ($hapus) {
      redirect('admin/opname');
    }
  }

	function index_tambah_barang(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_barang->tampil_barang();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['kat2']=$this->m_kategori->tampil_kategori();
		$this->load->view('admin/v_tambah_barang',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_barang(){
	if($this->session->userdata('akses')=='1'){
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$this->m_barang->simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok);

		redirect('admin/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_barang(){
	if($this->session->userdata('akses')=='1'){
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$this->m_barang->update_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok);
		redirect('admin/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_barang(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_barang->hapus_barang($kode);
		redirect('admin/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}
