<?php
class Member extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_member');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_member->tampil_member();
		$this->load->view('admin/v_member',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_member(){
	if($this->session->userdata('akses')=='1'){
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$disc=$this->input->post('diskon');
		$this->m_member->simpan_member($nama,$alamat,$notelp,$disc);
		redirect('admin/member');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_member(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$disc=$this->input->post('diskon');
		$this->m_member->update_member($kode,$nama,$alamat,$notelp,$disc);
		redirect('admin/member');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_member(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_member->hapus_member($kode);
		redirect('admin/member');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}