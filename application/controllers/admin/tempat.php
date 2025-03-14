tempat<?php
class Tempat extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_tempat');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_tempat->tampil_tempat();
		$this->load->view('admin/v_tempat',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_tempat(){
	if($this->session->userdata('akses')=='1'){
		$kat=$this->input->post('tempat');
		$this->m_tempat->simpan_tempat($kat);
		redirect('admin/tempat');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_tempat(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$kat=$this->input->post('tempat');
		$this->m_tempat->update_tempat($kode,$kat);
		redirect('admin/tempat');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_tempat(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_tempat->hapus_tempat($kode);
		redirect('admin/tempat');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}
