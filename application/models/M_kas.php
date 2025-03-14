<?php
class M_kas extends CI_Model
{

    function simpan_kas($id)
    {
        foreach ($this->cart->contents() as $item) {
            $data = array(
                'id_kas'     =>    $id,
                'kode_tr' => $item['kode_tr'],
                'Tanggal' => $item['Tanggal'],
                'trx' => $item['trx'],
                'Keterangan' => $item['Keterangan'],
                'akun' => $item['akun'],
                'idx' => $item['idx'],
                'debit' => $item['debit'],
                'kredit' => $item['kredit'],
            );
            $this->db->insert('kas_detil', $data);
        }
        return true;
    }

    function simpan()
    {
        $this->db->insert('beli_harian', [
            'user_id' => $this->session->userdata('idadmin')
        ]);

        return $this->db->insert_id();
    }

    function get_all()
    {
        // $this->db->select('a.*, b.nama_kegiatan AS kegiatan, c.nama_akun AS akun, d.keterangan AS idx_ket, SUM(a.debet) AS tdebet, SUM(a.kredit) AS tkredit');
        // $this->db->from('tbl_transaksi a');
        // $this->db->join('tbl_kegiatan b', 'a.id_kegiatan = b.id_kegiatan');
        // $this->db->join('tbl_akun c', 'a.kode_akun = c.kode_akun');
        // $this->db->join('tbl_index d', 'a.id_index = d.id_index');
        // $this->db->group_by('a.tanggal');
        $hsl = $this->db->query('select a.*, b.nama_kegiatan AS kegiatan, c.nama_akun AS akun, d.keterangan AS idx_ket, SUM(a.debet) AS tdebit, SUM(a.kredit) AS tkredit from tbl_transaksi a join tbl_kegiatan b on a.id_kegiatan = b.id_kegiatan join tbl_akun c on a.kode_akun = c.kode_akun join tbl_index d on a.id_index = d.id_index GROUP BY a.tanggal, kegiatan, akun, idx_ket, a.id_kegiatan, a.keterangan ORDER BY a.id_transaksi DESC');
        return $hsl;

        // return $this->db->get();
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

    public function CreateCode()
    {
        $query = $this->db->query("SELECT MAX(id_transaksi) as kode_tr from tbl_transaksi");
        $hasil = $query->row();
        return $hasil->kode_tr;
    }

    function tampil_kegiatan()
    {
        $hsl = $this->db->query("select * from tbl_kegiatan order by id_kegiatan desc");
        return $hsl;
    }

    function tampil_akun()
    {
        $hsl = $this->db->query("select * from tbl_akun order by kode_akun desc");
        return $hsl;
    }

    function tampil_idx()
    {
        $hsl = $this->db->query("select * from tbl_index order by id_index desc");
        return $hsl;
    }

    function save($kode_tr, $tanggal, $trx, $keterangan, $akun, $idx, $debit, $kredit)
    {
        $this->db->insert('tbl_transaksi', [
            'id_transaksi' => $kode_tr,
            'tanggal' => date('Y-m-d', strtotime($tanggal)),
            'id_kegiatan' => $trx, 
            'kode_akun' => $akun, 
            'id_index' => $idx,
            'keterangan' => $keterangan, 
            'debet' => $debit,
            'kredit' => $kredit
        ]);
        return true;
    }
}
