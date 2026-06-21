<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function peminjaman()
    {
        $bulan = $this->input->get('bulan');

        $this->db->select('peminjaman.*, anggota.nama');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'anggota.id = peminjaman.anggota_id');

        if($bulan){
            $this->db->where("DATE_FORMAT(tgl_pinjam, '%Y-%m') =", $bulan);
        }
        $data['data'] = $this->db->get()->result();
        $data['bulan'] = $bulan;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/peminjaman', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_peminjaman()
    {
        $bulan = $this->input->get('bulan');

        $this->db->select('peminjaman.*, anggota.nama');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'anggota.id = peminjaman.anggota_id');

        if($bulan){
            $this->db->where("DATE_FORMAT(tgl_pinjam, '%Y-%m') =", $bulan);
        }
        $data['data'] = $this->db->get()->result();
        $data['bulan'] = $bulan;

        $this->load->view('laporan/cetak_pinjam', $data);
    }

    public function buku()
    {
        $bulan = $this->input->get('bulan');
        
        $this->db->select('*');
        $this->db->from('buku');
        
        // Filter berdasarkan bulan (jika ada kolom created_at, sesuaikan)
        // Jika tidak ada kolom created_at, filter bisa dihapus atau pakai kolom lain
        if($bulan){
            // Jika tidak ada kolom tanggal, mungkin filter tidak perlu
            // Atau sesuaikan dengan kolom yang ada (misal: tahun)
            $this->db->where('tahun', $bulan);
        }
        
        $data['data'] = $this->db->get()->result();
        $data['bulan'] = $bulan;
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/buku', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_buku()
    {
        $bulan = $this->input->get('bulan');
        
        $this->db->select('*');
        $this->db->from('buku');
        
        if($bulan){
            $this->db->where('tahun', $bulan);
        }
        
        $data['data'] = $this->db->get()->result();
        $data['bulan'] = $bulan;
        
        $this->load->view('laporan/cetak_buku', $data);
    }
}