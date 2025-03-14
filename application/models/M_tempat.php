<?php
class M_tempat extends CI_Model{

	function hapus_tempat($kode){
		$hsl=$this->db->query("DELETE FROM tbl_tempat where id_tempat='$kode'");
		return $hsl;
	}

	function update_tempat($kode,$kat){
		$hsl=$this->db->query("UPDATE tbl_tempat set nama_tempat='$kat' where id_tempat='$kode'");
		return $hsl;
	}

	function tampil_tempat(){
		$hsl=$this->db->query("select * from tbl_tempat order by id_tempat desc");
		return $hsl;
	}

	function simpan_tempat($kat){
		$hsl=$this->db->query("INSERT INTO tbl_tempat(nama_tempat) VALUES ('$kat')");
		return $hsl;
	}

}
