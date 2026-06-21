<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_dokter');
        $this->load->model('model_pendaftaran');
        $this->load->model('model_pasien');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        $data['title'] = 'Rumah Sakit Sehat Sejahtera';
        $data['dokter'] = $this->model_dokter->get_all();
        $data['total_pasien'] = $this->model_pasien->get_total();
        $data['total_pendaftaran'] = $this->model_pendaftaran->get_statistik();
        
        $this->load->view('public/landing', $data);
    }

    public function tentang() {
        $data['title'] = 'Tentang Kami - Rumah Sakit Sehat';
        $this->load->view('public/tentang', $data);
    }

    public function kontak() {
        $data['title'] = 'Kontak Kami - Rumah Sakit Sehat';
        $this->load->view('public/kontak', $data);
    }

    public function pendaftaran() {
        // CEK APAKAH SUDAH LOGIN
        if (!$this->session->userdata('login')) {
            // Simpan URL tujuan ke session biar setelah login balik ke sini
            $this->session->set_userdata('redirect_after_login', 'pendaftaran');
            $this->session->set_flashdata('warning', 'Silakan login terlebih dahulu untuk mengakses halaman pendaftaran.');
            redirect('login');
        }

        // CEK ROLE PASIEN
        if ($this->session->userdata('role') != 'pasien') {
            $this->session->set_flashdata('error', 'Hanya pasien yang bisa mengakses halaman pendaftaran.');
            redirect('dashboard');
        }

        // Ambil data pasien
        $pasien = $this->model_pasien->get_by_user_id($this->session->userdata('id_user'));
        if ($pasien) {
            $data['pasien'] = $pasien;
        } else {
            // Jika pasien belum punya data, arahkan ke profil
            $this->session->set_flashdata('warning', 'Silakan lengkapi profil Anda terlebih dahulu.');
            redirect('pasien/profil');
        }
        
        $data['title'] = 'Pendaftaran Online - Rumah Sakit Sehat';
        $data['dokter'] = $this->model_dokter->get_all();
        $this->load->view('public/pendaftaran', $data);
    }

    public function proses_pendaftaran() {
        // CEK LOGIN
        if (!$this->session->userdata('login')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu.');
            redirect('login');
        }

        // CEK ROLE PASIEN
        if ($this->session->userdata('role') != 'pasien') {
            $this->session->set_flashdata('error', 'Hanya pasien yang bisa mendaftar.');
            redirect('dashboard');
        }

        $this->form_validation->set_rules('keluhan_penyakit', 'Keluhan Penyakit', 'required');
        $this->form_validation->set_rules('id_dokter', 'Dokter', 'required');
        $this->form_validation->set_rules('tanggal_kunjungan', 'Tanggal Kunjungan', 'required');
        $this->form_validation->set_rules('jam_kunjungan', 'Jam Kunjungan', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->pendaftaran();
        } else {
            // Ambil data pasien
            $pasien = $this->model_pasien->get_by_user_id($this->session->userdata('id_user'));
            $id_pasien = $pasien->id_pasien;
            
            // Data pendaftaran
            $pendaftaran_data = array(
                'id_pasien' => $id_pasien,
                'id_dokter' => $this->input->post('id_dokter'),
                'keluhan_penyakit' => $this->input->post('keluhan_penyakit'),
                'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
                'jam_kunjungan' => $this->input->post('jam_kunjungan'),
                'status' => 'pending',
                'created_at' => date('Y-m-d H:i:s')
            );
            
            $this->model_pendaftaran->insert($pendaftaran_data);
            
            $this->session->set_flashdata('success', 'Pendaftaran berhasil! Silakan cek status pendaftaran Anda.');
            redirect('pasien/status');
        }
    }
}