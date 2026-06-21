<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Cek login
        if (!$this->session->userdata('login')) {
            redirect('login');
        }
        
        // Cek role pasien
        if ($this->session->userdata('role') != 'pasien') {
            show_error('Akses ditolak!', 403);
        }
        
        $this->load->model('model_pasien');
        $this->load->model('model_pendaftaran');
        $this->load->model('model_dokter');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'Dashboard Pasien';
        
        $data['pasien'] = $this->model_pasien->get_by_user_id($this->session->userdata('id_user'));
        
        if ($data['pasien']) {
            $data['pendaftaran'] = $this->model_pendaftaran->get_by_pasien_id($data['pasien']->id_pasien);
            $data['statistik'] = $this->get_statistik($data['pasien']->id_pasien);
        } else {
            $data['pendaftaran'] = array();
            $data['statistik'] = array('total' => 0, 'pending' => 0, 'disetujui' => 0, 'ditolak' => 0);
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pasien/dashboard', $data);
        $this->load->view('templates/footer', $data);
    }

    public function status() {
        $data['title'] = 'Status Pendaftaran';
        
        $pasien = $this->model_pasien->get_by_user_id($this->session->userdata('id_user'));
        if ($pasien) {
            $data['pendaftaran'] = $this->model_pendaftaran->get_by_pasien_id($pasien->id_pasien);
        } else {
            $data['pendaftaran'] = array();
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pasien/status', $data);
        $this->load->view('templates/footer', $data);
    }

    public function profil() {
        $data['title'] = 'Profil Pasien';
        
        $data['pasien'] = $this->model_pasien->get_by_user_id($this->session->userdata('id_user'));
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pasien/profil', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update_profil() {
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            $this->profil();
        } else {
            $id = $this->input->post('id_pasien');
            $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'alamat' => $this->input->post('alamat'),
                'no_telepon' => $this->input->post('no_telepon'),
                'email' => $this->input->post('email')
            );
            
            $this->model_pasien->update($id, $data);
            $this->session->set_flashdata('success', 'Profil berhasil diupdate!');
            redirect('pasien/profil');
        }
    }

    private function get_statistik($pasien_id) {
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