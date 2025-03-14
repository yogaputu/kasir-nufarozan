<?php
class M_pembelian_harian extends CI_Model{

	function simpan_pembelian($id){
		foreach ($this->cart->contents() as $item) {
			$data=array(
				'id_beli_harian' 	=>	$id,
				'nama_brg'	    =>	$item['name'],
				'harga'		        =>	$item['price'],
				'jumlah'	    	=>	$item['qty'],
			);
			$this->db->insert('beli_harian_detil',$data);
		}
		return true;
	}

    function simpan(){
        $this->db->insert('beli_harian',[
            'user_id' => $this->session->userdata('idadmin')
        ]);

        return $this->db->insert_id();
    }

    function get_all()
    {
        $this->db->select('a.*, b.user_nama');
        $this->db->from('beli_harian a');
        $this->db->join('tbl_user b', 'a.user_id = b.user_id');

        return $this->db->get();
    }

    function get_detil($id)
    {
        $this->db->select('*');
        $this->db->from('beli_harian_detil');
        $this->db->where('id_beli_harian', $id);

        return $this->db->get();
    }

    function hapus($id)
    {
        $this->db->delete('beli_harian_detil', [
        'id_beli_harian' => $id
        ]);
        $this->db->delete('beli_harian', [
        'id' => $id
        ]);

        return true;
    }
}