<?php
class M_pembelian extends CI_Model{

	function simpan_pembelian($nofak,$tglfak,$suplier,$beli_kode){
		$idadmin=$this->session->userdata('idadmin');
		$this->db->query("INSERT INTO tbl_beli (beli_nofak,beli_tanggal,beli_suplier_id,beli_user_id,beli_kode) VALUES ('$nofak','$tglfak','$suplier','$idadmin','$beli_kode')");
		foreach ($this->cart->contents() as $item) {
			$data=array(
				'd_beli_nofak' 		=>	$nofak,
				'd_beli_barang_id'	=>	$item['id'],
				'd_beli_harga'		=>	$item['price'],
				'd_beli_jumlah'		=>	$item['qty'],
				'd_beli_total'		=>	$item['subtotal'],
				'd_beli_kode'		=>	$beli_kode
			);
			$this->db->insert('tbl_detail_beli',$data);
			$this->db->query("update tbl_barang set barang_stok=barang_stok+'$item[qty]',barang_harpok='$item[price]',barang_harjul='$item[harga]' where barang_id='$item[id]'");
		}
		return true;
	}
	function get_kobel(){
		$q = $this->db->query("SELECT MAX(RIGHT(beli_kode,6)) AS kd_max FROM tbl_beli");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "BL".date('dmy').$kd;
	}

	function get_all()
	{
		$hsl = $this->db->query("SELECT a.*, b.*, c.*, d.* from tbl_beli a 
		JOIN tbl_detail_beli b ON a.beli_kode = b.d_beli_kode
		JOIN tbl_suplier c ON a.beli_suplier_id = c.suplier_id
		JOIN tbl_barang d ON b.d_beli_barang_id = d.barang_id ORDER BY a.beli_tanggal DESC");
		return $hsl;
	}
}