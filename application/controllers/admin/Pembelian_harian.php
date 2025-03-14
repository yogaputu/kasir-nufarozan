<?php
class Pembelian_harian extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_pembelian_harian');
	}

	function index(){
	if($this->session->userdata('akses')=='1'){
        $x['data']=$this->m_pembelian_harian->get_all();
		$this->load->view('admin/v_pembelian_harian',$x);
	}if($this->session->userdata('akses')=='2'){
        $x['data']=$this->m_pembelian_harian->get_all();
		$this->load->view('admin/v_pembelian_harian',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

    function tambah_pembelian(){
	if($this->session->userdata('akses')=='1'){
		$this->load->view('admin/v_tambah_pembelian_harian');
	}if($this->session->userdata('akses')=='2'){
		$this->load->view('admin/v_tambah_pembelian_harian');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
    
    function cetak($id)
    {
        $data['data'] = $this->m_pembelian_harian->get_detil($id);
        $this->load->view('admin/laporan/v_beli_harian', $data);
    }

	function add_to_cart(){
	if($this->session->userdata('akses')=='1'){
		$data = array(
               'id'       => rand(),
               'name'     => $this->input->post('nama_brg'),
               'price'    => $this->input->post('harga'),
               'qty'      => $this->input->post('jumlah')
            );

		$this->cart->insert($data);
		redirect('admin/pembelian_harian/tambah_pembelian');
	}if($this->session->userdata('akses')=='2'){
		$data = array(
               'id'       => rand(),
               'name'     => $this->input->post('nama_brg'),
               'price'    => $this->input->post('harga'),
               'qty'      => $this->input->post('jumlah')
            );

		$this->cart->insert($data);
		redirect('admin/pembelian_harian/tambah_pembelian');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function remove(){
	if($this->session->userdata('akses')=='1'){
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('admin/pembelian_harian/tambah_pembelian');
	}if($this->session->userdata('akses')=='2'){
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('admin/pembelian_harian/tambah_pembelian');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function simpan_pembelian(){
	if($this->session->userdata('akses')=='1'){
			$simpan = $this->m_pembelian_harian->simpan();
			$order_proses = $this->m_pembelian_harian->simpan_pembelian($simpan);
			if($order_proses){
				$this->cart->destroy();
				echo $this->session->set_flashdata('msg','<label class="label label-success">Pembelian Berhasil di Simpan ke Database</label>');
				redirect('admin/pembelian_harian');
			}else{
				redirect('admin/pembelian_harian');
			}
	}if($this->session->userdata('akses')=='2'){
			$simpan = $this->m_pembelian_harian->simpan();
			$order_proses = $this->m_pembelian_harian->simpan_pembelian($simpan);
			if($order_proses){
				$this->cart->destroy();
				echo $this->session->set_flashdata('msg','<label class="label label-success">Pembelian Berhasil di Simpan ke Database</label>');
				redirect('admin/pembelian_harian');
			}else{
				redirect('admin/pembelian_harian');
			}
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

    function hapus($id)
    {
        $hapus = $this->m_pembelian_harian->hapus($id);
        if ($hapus) {
        redirect('admin/pembelian_harian');
        }
    }
}
