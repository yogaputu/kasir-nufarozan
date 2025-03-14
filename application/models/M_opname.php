<?php
class M_opname extends CI_Model{

  function get_all(){
    $hsl = $this->db->query("SELECT * FROM stok_opname");
    return $hsl;
  }

  function save()
  {
    $tgl = date('Y-m-d');
    $save = $this->db->insert('stok_opname', [
      'tgl' => $tgl
    ]);
    $insert_id = $this->db->insert_id();

    return $insert_id;
  }

  function save_detil($id, $kode_brg, $jumlah_program, $jumlah_real)
  {
    for ($i=0; $i < sizeof($kode_brg); $i++) {
      $this->db->insert('opname_detil', [
        'id_opname' => $id,
        'barang_id' => $kode_brg[$i],
        'jumlah_program' => $jumlah_program[$i],
        'jumlah_real' => $jumlah_real[$i]
      ]);
    }

    return true;
  }

  function get_detil($id)
  {
    $this->db->select('a.jumlah_program, a.jumlah_real, b.barang_id, b.barang_nama');
    $this->db->from('opname_detil a');
    $this->db->join('tbl_barang b', 'a.barang_id=b.barang_id');
    $this->db->where('a.id_opname', $id);
    $this->db->order_by('b.barang_nama', 'ASC');
    return $this->db->get();

  }

  function hapus($id)
  {
    $this->db->delete('opname_detil', [
      'id_opname' => $id
    ]);
    $this->db->delete('stok_opname', [
      'id' => $id
    ]);

    return true;
  }

	function hapus_barang($kode){
		$hsl=$this->db->query("DELETE FROM tbl_barang where barang_id='$kode'");
		return $hsl;
	}

	function update_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_barang SET barang_nama='$nabar',barang_satuan='$satuan',barang_harpok='$harpok',barang_harjul='$harjul',barang_harjul_grosir='$harjul_grosir',barang_stok='$stok',barang_min_stok='$min_stok',barang_tgl_last_update=NOW(),barang_kategori_id='$kat',barang_user_id='$user_id' WHERE barang_id='$kobar'");
		return $hsl;
	}

	function tampil_barang(){
		$hsl=$this->db->query("SELECT barang_id,barang_nama,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_kategori_id,kategori_nama FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id");
		return $hsl;
	}

	function simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("INSERT INTO tbl_barang (barang_id,barang_nama,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_kategori_id,barang_user_id) VALUES ('$kobar','$nabar','$satuan','$harpok','$harjul','$harjul_grosir','$stok','$min_stok','$kat','$user_id')");
		return $hsl;
	}


	function get_barang($kobar){
		$hsl=$this->db->query("SELECT * FROM tbl_barang where barang_id='$kobar'");
		return $hsl;
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

}
