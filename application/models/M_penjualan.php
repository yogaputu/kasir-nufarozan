<?php
class M_penjualan extends CI_Model{

	function hapus_retur($kode){
		$hsl=$this->db->query("DELETE FROM tbl_retur WHERE retur_id='$kode'");
		return $hsl;
	}

	function tampil_retur(){
		$hsl=$this->db->query("SELECT retur_id,DATE_FORMAT(retur_tanggal,'%d/%m/%Y') AS retur_tanggal,retur_barang_id,retur_barang_nama,retur_barang_satuan,retur_harjul,retur_qty,(retur_harjul*retur_qty) AS retur_subtotal,retur_keterangan FROM tbl_retur ORDER BY retur_id DESC");
		return $hsl;
	}

	function simpan_retur($kobar,$nabar,$satuan,$harjul,$qty,$subtotal,$keterangan){
		$hsl=$this->db->query("INSERT INTO tbl_retur(retur_barang_id,retur_barang_nama,retur_barang_satuan,retur_harjul,retur_qty,retur_subtotal,retur_keterangan) VALUES ('$kobar','$nabar','$satuan','$harjul','$qty','$subtotal','$keterangan')");
		return $hsl;
	}

	function simpan_penjualan($nofak,$total,$jml_uang,$kembalian,$total_diskon,$member){
		$idadmin=$this->session->userdata('idadmin');
		$tgl = date('Y-m-d');
		$created = '0';
	foreach ($this->cart->contents() as $br){
			$a1 = $br['qty'];
			$b1 = $br['minbeli'];
		}
		$this->db->query("INSERT INTO tbl_jual (jual_nofak,jual_total,jual_jml_uang,jual_kembalian,jual_diskon,jual_user_id,jual_keterangan,jual_member) VALUES ('$nofak','$total','$jml_uang','$kembalian','$total_diskon','$idadmin','eceran','$member')");
		foreach ($this->cart->contents() as $item) {
			// $a = $items['qty'];
			// $b = $items['minbeli'];
			if ($a1 >= $b1) {
				$data=array(
				'd_jual_nofak' 					=>	$nofak,
				'd_jual_barang_id'			=>	$item['id'],
				'd_jual_barang_nama'		=>	$item['name'],
				'd_jual_barang_satuan'	=>	$item['satuan'],
				'd_jual_barang_harpok'	=>	$item['harpok'],
				'd_jual_barang_harjul'	=>	$item['minharga'],
				'd_jual_qty'						=>	$item['qty'],
				'd_jual_diskon'					=>	$item['disc'],
				'd_jual_total'					=>	$item['subtotal']
			);
			} else {
				$data=array(
					'd_jual_nofak' 					=>	$nofak,
					'd_jual_barang_id'			=>	$item['id'],
					'd_jual_barang_nama'		=>	$item['name'],
					'd_jual_barang_satuan'	=>	$item['satuan'],
					'd_jual_barang_harpok'	=>	$item['harpok'],
					'd_jual_barang_harjul'	=>	$item['amount'],
					'd_jual_qty'						=>	$item['qty'],
					'd_jual_diskon'					=>	$item['disc'],
					'd_jual_total'					=>	$item['subtotal']
				);
			}
			$this->db->insert('tbl_detail_jual',$data);
			$this->db->query("update tbl_barang set barang_stok=barang_stok-'$item[qty]' where barang_id='$item[id]'");
		}
		return true;
	}
	function get_nofak(){
		$q = $this->db->query("SELECT MAX(RIGHT(jual_nofak,6)) AS kd_max FROM tbl_jual WHERE DATE(jual_tanggal)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return date('dmy').$kd;
	}


	function cetaklagi(){

		$query = $this->db->query("SELECT * FROM tbl_jual WHERE DATE(jual_tanggal) = CURDATE() ORDER BY jual_nofak DESC LIMIT 1");
		return $query;

	}

function get_cetak()
{
    $kodefak_query = $this->db->query("SELECT jual_nofak FROM tbl_jual WHERE DATE(jual_tanggal) = CURDATE() ORDER BY jual_nofak DESC LIMIT 1");

    if ($kodefak_query->num_rows() > 0) {
        $kodefak_row = $kodefak_query->row();
        $kodefak = $kodefak_row->jual_nofak;

        $query = $this->db->query("SELECT * FROM tbl_detail_jual WHERE d_jual_nofak = '$kodefak' ORDER BY d_jual_id DESC");

        return $query;
    } else {
        return null;
    }
}

	//=====================Penjualan grosir================================
	function simpan_penjualan_grosir($nofak,$total,$jml_uang,$kembalian){
		$idadmin=$this->session->userdata('idadmin');
		$this->db->query("INSERT INTO tbl_jual (jual_nofak,jual_total,jual_jml_uang,jual_kembalian,jual_user_id,jual_keterangan) VALUES ('$nofak','$total','$jml_uang','$kembalian','$idadmin','grosir')");
		foreach ($this->cart->contents() as $item) {
			$data=array(
				'd_jual_nofak' 			=>	$nofak,
				'd_jual_barang_id'		=>	$item['id'],
				'd_jual_barang_nama'	=>	$item['name'],
				'd_jual_barang_satuan'	=>	$item['satuan'],
				'd_jual_barang_harpok'	=>	$item['harpok'],
				'd_jual_barang_harjul'	=>	$item['amount'],
				'd_jual_qty'			=>	$item['qty'],
				'd_jual_diskon'			=>	$item['disc'],
				'd_jual_total'			=>	$item['subtotal']
			);
			$this->db->insert('tbl_detail_jual',$data);
			$this->db->query("update tbl_barang set barang_stok=barang_stok-'$item[qty]' where barang_id='$item[id]'");
		}
		return true;
	}

	function cetak_faktur(){
		$nofak=$this->session->userdata('nofak');
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d/%m/%Y %H:%i:%s') AS jual_tanggal,jual_total,jual_jml_uang,jual_kembalian,jual_keterangan,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,d_jual_total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE jual_nofak='$nofak'");
		return $hsl;
	}

}
