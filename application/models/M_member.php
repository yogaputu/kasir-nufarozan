<?php
class M_member extends CI_Model{

	function hapus_member($kode){
		$hsl=$this->db->query("DELETE FROM tbl_member where member_id='$kode'");
		return $hsl;
	}

	function update_member($kode,$nama,$alamat,$notelp,$diskon){
		$hsl=$this->db->query("UPDATE tbl_member set member_nama='$nama',member_alamat='$alamat',member_notelp='$notelp', member_diskon='$diskon' where member_id='$kode'");
		return $hsl;
	}

	function tampil_member(){
		$hsl=$this->db->query("select * from tbl_member order by member_id desc");
		return $hsl;
	}

	function simpan_member($nama,$alamat,$notelp,$diskon){
		$hsl=$this->db->query("INSERT INTO tbl_member(member_nama,member_alamat,member_notelp,member_diskon) VALUES ('$nama','$alamat','$notelp','$diskon')");
		return $hsl;
	}

	function get_member($id)
  {
    $this->db->from('tbl_member');
    $this->db->where('member_id',$id);
    $this->db->or_where('member_nama like','%'.$id.'%');
    return $this->db->get();
  }

  function get_diskon($id)
  {
    $this->db->select('member_diskon');
    $this->db->from('tbl_member');
    $this->db->where('member_id',$id);
    return $this->db->get();
  }

}