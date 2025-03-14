<?php
class Kas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        };
        $this->load->model('m_kas');
    }

    function index()
    {
        if ($this->session->userdata('akses') == '1') {
            $x['data'] = $this->m_kas->get_all();
            $this->load->view('admin/v_kas', $x);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    function tambah_kas()
    {
        if ($this->session->userdata('akses') == '1') {
            $dariDB = $this->m_kas->CreateCode();
            // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
            $nourut = substr($dariDB, 3, 4);
            $kodeSekarang = $nourut + 1;
            $data = array('kode_transaksi' => $kodeSekarang);
            $data['keg1'] = $this->m_kas->tampil_kegiatan();
            $data['akun'] = $this->m_kas->tampil_akun();
            $data['idx'] = $this->m_kas->tampil_idx();
            $this->load->view("admin/v_tambah_kas", $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    function cetak($id)
    {
        $data['data'] = $this->m_kas->get_detil($id);
        $this->load->view('admin/laporan/v_beli_harian', $data);
    }

    function simpan_kas()
    {
        if ($this->session->userdata('akses') == '1') {
            $kode_tr = $this->input->post('kode_tr');
            $tgl = $this->input->post('tanggal');
            $tgl1 = new DateTime($tgl);
            $tanggal = date_format($tgl1, 'Y-m-d');
            $trx = $this->input->post('trx');
            $keterangan = $this->input->post('keterangan');
            $akun = $this->input->post('akun');
            $idx = $this->input->post('idx');
            $debit = $this->input->post('debit');
            $kredit = $this->input->post('kredit');
            $save = $this->m_kas->save($kode_tr, $tanggal, $trx, $keterangan, $akun, $idx, $debit, $kredit);
                redirect('admin/kas');
                echo sizeof($kode_tr);
            }
    }

    function hapus($id)
    {
        $hapus = $this->m_kas->hapus($id);
        if ($hapus) {
            redirect('admin/kas');
        }
    }
}
