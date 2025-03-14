<?php
class M_barang extends CI_Model{

	function hapus_barang($kode){
		$hsl=$this->db->query("DELETE FROM tbl_barang where barang_id='$kode'");
		return $hsl;
	}

	function update_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok,$tempat,$min_beli,$min_harga){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_barang SET barang_nama='$nabar',barang_satuan='$satuan',barang_harpok='$harpok',barang_harjul='$harjul',barang_harjul_grosir='$harjul_grosir',barang_stok='$stok',barang_min_stok='$min_stok',barang_tgl_last_update=NOW(),barang_kategori_id='$kat',id_tempat='$tempat',barang_user_id='$user_id', barang_min_beli='$min_beli', barang_min_harga='$min_harga' WHERE barang_id='$kobar'");
		return $hsl;
	}

	function tampil_barang(){
		$hsl=$this->db->query("SELECT a.barang_id,a.barang_nama,a.barang_satuan,a.barang_harpok,a.barang_harjul,a.barang_harjul_grosir,a.barang_stok,a.barang_min_stok,a.barang_min_beli,a.barang_min_harga,a.barang_kategori_id,a.id_tempat,b.kategori_nama,c.nama_tempat FROM tbl_barang a JOIN tbl_kategori b ON a.barang_kategori_id=b.kategori_id LEFT JOIN tbl_tempat c ON a.id_tempat=c.id_tempat");
		return $hsl;
	}

	function simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok,$tempat, $min_beli, $min_harga){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("INSERT INTO tbl_barang (barang_id,barang_nama,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_kategori_id,id_tempat,barang_user_id,barang_min_beli,
barang_min_harga) VALUES ('$kobar','$nabar','$satuan','$harpok','$harjul','$harjul_grosir','$stok','$min_stok','$kat','$tempat','$user_id','$min_beli','$min_harga')");
		return $hsl;
	}


	function get_barang($kobar){
		$hsl=$this->db->query("SELECT * FROM tbl_barang where barang_id='$kobar'");
		return $hsl;
	}

	function get_barang_all(){
		$hsl=$this->db->query("SELECT * FROM tbl_barang");
		return $hsl;
	}

	function get_edit_barang($kobar){
		$hsl=$this->db->query("SELECT a.barang_id,a.barang_nama,a.barang_satuan,a.barang_harpok,a.barang_harjul,a.barang_harjul_grosir,a.barang_stok,a.barang_min_stok,a.barang_min_beli,a.barang_min_harga,a.barang_kategori_id,a.id_tempat,b.kategori_nama,c.nama_tempat FROM tbl_barang a JOIN tbl_kategori b ON a.barang_kategori_id=b.kategori_id LEFT JOIN tbl_tempat c ON a.id_tempat=c.id_tempat where barang_id='$kobar'");
		return $hsl;
	}

	function get_index(){
		$this->db->select('barang_id, barang_nama');
		$this->db->from('tbl_barang');
		return $this->db->get();
	}

	function get_cart($kobar){
		$this->db->select('barang_id, barang_nama, barang_satuan, barang_harpok, barang_harjul, barang_min_beli, barang_min_harga');
		$this->db->from('tbl_barang');
		$this->db->where('barang_id', $kobar);
		return $this->db->get();
	}

	function get_kobar(){
		$q = $this->db->query("SELECT MAX(RIGHT(barang_id,6)) AS kd_max FROM tbl_barang");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "BR".$kd;
	}

	function cetak_harga(){

		$id_barang = $this->uri->segment(4);
		$hsl = $this->db->query("SELECT * FROM tbl_barang WHERE barang_id='$id_barang'");
		return $hsl;

	}

	function cetak_harga_all()
	{
		$hsl = $this->db->query("SELECT * FROM tbl_barang");
		return $hsl;
	}


}
