<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // CEK LOGIN
        if (!$this->session->userdata('login')) {
            redirect('login');
        }

        // Load model
        $this->load->model('model_pendaftaran');
        $this->load->model('model_pasien');
        $this->load->model('model_dokter');
    }

    public function index() {
        $role = $this->session->userdata('role');
        
        if ($role == 'admin') {
            // Data admin
            $data['statistik'] = $this->model_pendaftaran->get_statistik();
            $data['total_pasien'] = $this->model_pasien->get_total();
            $data['total_dokter'] = count($this->model_dokter->get_all());
            $data['jadwal_hari_ini'] = $this->model_pendaftaran->get_jadwal_hari_ini();
            $data['pendaftaran_terbaru'] = $this->model_pendaftaran->get_all();
            
            // Template dosen
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/dashboard', $data);
            $this->load->view('templates/footer');
            
        } else {
            // Data pasien
            $data['pasien'] = $this->model_pasien->get_by_user_id($this->session->userdata('id_user'));
            if ($data['pasien']) {
                $data['pendaftaran'] = $this->model_pendaftaran->get_by_pasien_id($data['pasien']->id_pasien);
                $data['statistik'] = $this->get_pasien_statistik($data['pasien']->id_pasien);
            } else {
                $data['pendaftaran'] = array();
                $data['statistik'] = array('total' => 0, 'pending' => 0, 'disetujui' => 0, 'ditolak' => 0);
            }
            
            // Template dosen
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('pasien/dashboard', $data);
            $this->load->view('templates/footer');
        }
    }

    private function get_pasien_statistik($pasien_id) {
        $pendaftaran = $this->model_pendaftaran->get_by_pasien_id($pasien_id);
        $statistik = array('total' => 0, 'pending' => 0, 'disetujui' => 0, 'ditolak' => 0);
        
        $statistik['total'] = count($pendaftaran);
        
        foreach ($pendaftaran as $p) {
            if ($p->status == 'pending') $statistik['pending']++;
            else if ($p->status == 'disetujui') $statistik['disetujui']++;
            else if ($p->status == 'ditolak') $statistik['ditolak']++;
        }
        
        return $statistik;
    }
}