<?php
class M_laporan extends CI_Model{
	function get_stok_barang(){
		$hsl=$this->db->query("SELECT kategori_id,kategori_nama,barang_nama,barang_stok FROM tbl_kategori JOIN tbl_barang ON kategori_id=barang_kategori_id GROUP BY kategori_id,barang_nama");
		return $hsl;
	}
	function get_stok_barang_perkategori()
	{
		$hsl = $this->db->query("SELECT kategori_id,kategori_nama FROM tbl_kategori ");
		return $hsl;
	}
	function stok_barang_perkategori($kategori)
	{
		$hsl = $this->db->query("SELECT kategori_id,barang_id,kategori_nama,barang_nama,barang_satuan,barang_harpok,barang_harjul,barang_stok, barang_harpok*barang_stok AS jumlah_pokok, barang_harjul*barang_stok AS jumlah_jual FROM tbl_kategori JOIN tbl_barang ON kategori_id=barang_kategori_id WHERE kategori_nama='$kategori'");
		return $hsl;
	}
	function get_stok_barang_pertempat()
	{
		$hsl = $this->db->query("SELECT id_tempat,nama_tempat FROM tbl_tempat ");
		return $hsl;
	}
	function stok_barang_pertempat($tempat)
	{
		$hsl = $this->db->query("SELECT a.id_tempat,a.barang_id,b.nama_tempat,a.barang_nama,a.barang_satuan,a.barang_harpok,a.barang_harjul,a.barang_stok, a.barang_harpok*a.barang_stok AS jumlah_pokok, a.barang_harjul*a.barang_stok AS jumlah_jual FROM tbl_tempat b JOIN tbl_barang a ON a.id_tempat=b.id_tempat WHERE b.nama_tempat='$tempat'");
		return $hsl;
	}
	function get_data_barang(){
		$hsl=$this->db->query("SELECT kategori_id,barang_id,kategori_nama,barang_nama,barang_satuan,barang_harpok,barang_harjul,barang_stok FROM tbl_kategori JOIN tbl_barang ON kategori_id=barang_kategori_id GROUP BY kategori_id,barang_nama");
		return $hsl;
	}
	function get_data_penjualan(){
		$hsl=$this->db->query("SELECT a.jual_nofak,DATE_FORMAT(a.jual_tanggal,'%d %M %Y') AS jual_tanggal,a.jual_total,a.jual_diskon, b.d_jual_barang_nama FROM tbl_jual a JOIN tbl_detail_jual b ON a.jual_nofak = b.d_jual_nofak ORDER BY jual_tanggal DESC");
		return $hsl;
	}
	function get_total_penjualan(){
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,sum(jual_total - jual_diskon) as total,jual_diskon FROM tbl_jual ORDER BY jual_nofak DESC");
		return $hsl;
	}
	function get_data_jual_pertanggal($tanggal,$shift){
		$hsl=$this->db->query("SELECT jual_nofak,jual_tanggal,jual_total,jual_diskon,DATE_FORMAT(jual_tanggal,'%H:%i') AS waktu FROM tbl_jual WHERE DATE(jual_tanggal)='$tanggal' AND DATE_FORMAT(jual_tanggal,'%H:%i') BETWEEN $shift ORDER BY jual_nofak ASC");
		return $hsl;
	}

	function get_retur_barang_tanggal($tanggal){
		$hsl=$this->db->query("SELECT sum(retur_subtotal) as jumlah_retur FROM tbl_retur WHERE DATE(retur_tanggal)='$tanggal'");
		return $hsl;
	}

	function get_retur_barang_bulan($bulan){
		$hsl=$this->db->query("SELECT sum(retur_subtotal) as jumlah_retur FROM tbl_retur WHERE DATE_FORMAT(retur_tanggal,'%M %Y')='$bulan'");
		return $hsl;
	}

	function get_retur_barang_tahun($tahun){
		$hsl=$this->db->query("SELECT sum(retur_subtotal) as jumlah_retur FROM tbl_retur WHERE YEAR(retur_tanggal)='$tahun'");
		return $hsl;
	}

	function get_data__total_jual_pertanggal($tanggal,$shift){
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,sum(jual_total - jual_diskon) as total,jual_diskon FROM tbl_jual WHERE DATE(jual_tanggal)='$tanggal' AND DATE_FORMAT(jual_tanggal,'%H:%i') BETWEEN $shift ORDER BY jual_nofak DESC");
		return $hsl;
	}
	function get_bulan_jual(){
		$hsl=$this->db->query("SELECT DISTINCT DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan FROM tbl_jual");
		return $hsl;
	}
	function get_tahun_jual(){
		$hsl=$this->db->query("SELECT DISTINCT YEAR(jual_tanggal) AS tahun FROM tbl_jual");
		return $hsl;
	}
	function get_jual_perbulan($bulan){
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,jual_total,jual_diskon,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan FROM tbl_jual WHERE DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan' ORDER BY jual_nofak ASC");
		return $hsl;
	}
	function get_jual_perbulan_jumlah($bulan){
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,SUM(jual_total) AS jual_total,jual_diskon,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan FROM tbl_jual WHERE DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan' GROUP BY DATE_FORMAT(jual_tanggal, '%d' ) ORDER BY jual_nofak ASC");
		return $hsl;
	}
	function get_total_jual_perbulan($bulan){
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,sum(jual_total - jual_diskon) as total,jual_diskon, DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan FROM tbl_jual WHERE DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan' ORDER BY jual_nofak DESC");
		return $hsl;
	}
	function get_jual_pertahun($tahun){
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,jual_total,jual_diskon,YEAR(jual_tanggal) AS tahun,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan FROM tbl_jual WHERE YEAR(jual_tanggal)='$tahun' ORDER BY DATE_FORMAT(jual_tanggal,'%d %M %Y') ASC");
		return $hsl;
	}
	function get_total_jual_pertahun($tahun){
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,sum(jual_total) as total,jual_diskon,YEAR(jual_tanggal) AS tahun,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan FROM tbl_jual WHERE YEAR(jual_tanggal)='$tahun' ORDER BY jual_nofak DESC");
		return $hsl;
	}
	//=========Laporan Laba rugi============
	function get_lap_laba_rugi($bulan){
		$hsl=$this->db->query("SELECT DATE_FORMAT(jual_tanggal,'%d %M %Y %H:%i:%s') as jual_tanggal,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,(d_jual_barang_harjul-d_jual_barang_harpok) AS keunt,d_jual_qty,d_jual_diskon,((d_jual_barang_harjul-d_jual_barang_harpok)*d_jual_qty)-(d_jual_qty*d_jual_diskon) AS untung_bersih FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan'");
		return $hsl;
	}
	function get_total_lap_laba_rugi($bulan){
		$hsl=$this->db->query("SELECT DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,(d_jual_barang_harjul-d_jual_barang_harpok) AS keunt,d_jual_qty,d_jual_diskon,SUM(((d_jual_barang_harjul-d_jual_barang_harpok)*d_jual_qty)-(d_jual_qty*d_jual_diskon)) AS total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan'");
		return $hsl;
	}

	//=========Laporan Laba rugi harian============
	function get_lap_laba_rugi_hari($hari)
	{
		$hsl = $this->db->query("SELECT DATE(jual_tanggal) as jual_tanggal,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,(d_jual_barang_harjul-d_jual_barang_harpok) AS keunt,d_jual_qty,d_jual_diskon,((d_jual_barang_harjul-d_jual_barang_harpok)*d_jual_qty)-(d_jual_qty*d_jual_diskon) AS untung_bersih FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE DATE(jual_tanggal)='$hari'");
		return $hsl;
	}
	function get_total_lap_laba_rugi_hari($hari)
	{
		$hsl = $this->db->query("SELECT DATE(jual_tanggal) AS hari,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,(d_jual_barang_harjul-d_jual_barang_harpok) AS keunt,d_jual_qty,d_jual_diskon,SUM(((d_jual_barang_harjul-d_jual_barang_harpok)*d_jual_qty)-(d_jual_qty*d_jual_diskon)) AS total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE DATE(jual_tanggal)='$hari'");
		return $hsl;
	}

	//LAPORAN NERACA//
	function neraca($bulan){
		$hsl = $this->db->query("SELECT a.*, b.nama_kegiatan AS kegiatan, c.nama_akun AS akun, d.keterangan AS idx_ket, SUM(a.debet) AS tdebit, SUM(a.kredit) AS tkredit FROM tbl_transaksi a join tbl_kegiatan b on a.id_kegiatan = b.id_kegiatan join tbl_akun c on a.kode_akun = c.kode_akun join tbl_index d on a.id_index = d.id_index WHERE DATE_FORMAT(tanggal,'%M %Y')='$bulan' GROUP BY a.tanggal, kegiatan, akun, idx_ket, a.id_kegiatan, a.keterangan  ORDER BY a.id_transaksi DESC");
		return $hsl;
	}

	//LAPORAN MODAL//
	function barang_modal($bulan)
	{
		$hsl = $this->db->query("SELECT a.*, b.*, c.*, d.* from tbl_beli a
		JOIN tbl_detail_beli b ON a.beli_kode = b.d_beli_kode
		JOIN tbl_suplier c ON a.beli_suplier_id = c.suplier_id
		JOIN tbl_barang d ON b.d_beli_barang_id = d.barang_id
		WHERE DATE_FORMAT(a.beli_tanggal,'%M %Y')='$bulan' ORDER BY a.beli_tanggal DESC");
		return $hsl;
	}

		//LAPORAN PEMBELIAN HARIAN//
	function barang_harian($bulan)
	{
		$hsl = $this->db->query("SELECT a.*, b.* from beli_harian a
		JOIN beli_harian_detil b ON a.id = b.id_beli_harian
		WHERE DATE_FORMAT(a.tgl,'%M %Y')='$bulan' ORDER BY a.tgl DESC");
		return $hsl;
	}


	function hapus_laporan($kode){
		$hsl=$this->db->query("DELETE FROM tbl_detail_jual where d_jual_nofak='$kode'");
		$hsl=$this->db->query("DELETE FROM tbl_jual where jual_nofak='$kode'");
		return mysqli_affected_rows($hsl);
	}
}
