<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Cek login
        if (!$this->session->userdata('login')) {
            redirect('login');
        }
        
        // Cek role admin
        if ($this->session->userdata('role') != 'admin') {
            show_error('Akses ditolak!', 403);
        }
        
        $this->load->model('model_pasien');
        $this->load->model('model_pendaftaran');
        $this->load->model('model_dokter');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    // ===================== DATA PASIEN =====================
    
    public function pasien() {
        $data['title'] = 'Data Pasien';
        $data['pasien'] = $this->model_pasien->get_all();
        $data['statistik'] = $this->model_pendaftaran->get_statistik();
        $data['total_pasien'] = $this->model_pasien->get_total();
        $data['total_dokter'] = count($this->model_dokter->get_all());
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_pasien', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_pasien() {
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            $this->pasien();
        } else {
            // Buat user
            $username = strtolower(str_replace(' ', '', $this->input->post('nama_lengkap'))) . rand(100, 999);
            $password = md5('password123');
            
            $user_data = array(
                'username' => $username,
                'password' => $password,
                'role' => 'pasien',
                'created_at' => date('Y-m-d H:i:s')
            );
            
            $this->db->insert('users', $user_data);
            $id_user = $this->db->insert_id();
            
            // Data pasien
            $pasien_data = array(
                'id_user' => $id_user,
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'alamat' => $this->input->post('alamat'),
                'no_telepon' => $this->input->post('no_telepon'),
                'email' => $this->input->post('email')
            );
            
            $this->model_pasien->insert($pasien_data);
            
            $this->session->set_flashdata('success', 'Data pasien berhasil ditambahkan!');
            redirect('admin/pasien');
        }
    }

    public function edit_pasien($id) {
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            $this->pasien();
        } else {
            $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'alamat' => $this->input->post('alamat'),
                'no_telepon' => $this->input->post('no_telepon'),
                'email' => $this->input->post('email')
            );
            
            $this->model_pasien->update($id, $data);
            $this->session->set_flashdata('success', 'Data pasien berhasil diupdate!');
            redirect('admin/pasien');
        }
    }

    public function hapus_pasien($id) {
        $pasien = $this->model_pasien->get_by_id($id);
        if ($pasien) {
            $this->db->where('id_user', $pasien->id_user);
            $this->db->delete('users');
            $this->model_pasien->delete($id);
            $this->session->set_flashdata('success', 'Data pasien berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data pasien tidak ditemukan!');
        }
        redirect('admin/pasien');
    }

    // ===================== DATA DOKTER =====================

    public function dokter() {
        $data['title'] = 'Data Dokter';
        $data['dokter'] = $this->model_dokter->get_all();
        $data['statistik'] = $this->model_pendaftaran->get_statistik();
        $data['total_pasien'] = $this->model_pasien->get_total();
        $data['total_dokter'] = count($this->model_dokter->get_all());
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_dokter', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_dokter() {
        $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required');
        $this->form_validation->set_rules('spesialis', 'Spesialis', 'required');
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->dokter();
        } else {
            $data = array(
                'nama_dokter' => $this->input->post('nama_dokter'),
                'spesialis' => $this->input->post('spesialis'),
                'no_telepon' => $this->input->post('no_telepon')
            );
            
            $this->model_dokter->insert($data);
            $this->session->set_flashdata('success', 'Data dokter berhasil ditambahkan!');
            redirect('admin/dokter');
        }
    }

    public function edit_dokter($id) {
        $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required');
        $this->form_validation->set_rules('spesialis', 'Spesialis', 'required');
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->dokter();
        } else {
            $data = array(
                'nama_dokter' => $this->input->post('nama_dokter'),
                'spesialis' => $this->input->post('spesialis'),
                'no_telepon' => $this->input->post('no_telepon')
            );
            
            $this->model_dokter->update($id, $data);
            $this->session->set_flashdata('success', 'Data dokter berhasil diupdate!');
            redirect('admin/dokter');
        }
    }

    public function hapus_dokter($id) {
        $this->model_dokter->delete($id);
        $this->session->set_flashdata('success', 'Data dokter berhasil dihapus!');
        redirect('admin/dokter');
    }

    // ===================== DATA PENDAFTARAN =====================

    public function pendaftaran() {
        $data['title'] = 'Data Pendaftaran';
        $data['pendaftaran'] = $this->model_pendaftaran->get_all();
        $data['dokter'] = $this->model_dokter->get_all();
        $data['statistik'] = $this->model_pendaftaran->get_statistik();
        $data['total_pasien'] = $this->model_pasien->get_total();
        $data['total_dokter'] = count($this->model_dokter->get_all());
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_pendaftaran', $data);
        $this->load->view('templates/footer', $data);
    }

    public function setujui($id) {
        $this->model_pendaftaran->update_status($id, 'disetujui');
        $this->session->set_flashdata('success', 'Pendaftaran berhasil disetujui!');
        redirect('admin/pendaftaran');
    }

    public function tolak($id) {
        $this->model_pendaftaran->update_status($id, 'ditolak');
        $this->session->set_flashdata('success', 'Pendaftaran berhasil ditolak!');
        redirect('admin/pendaftaran');
    }

    public function hapus_pendaftaran($id) {
        $this->model_pendaftaran->delete($id);
        $this->session->set_flashdata('success', 'Data pendaftaran berhasil dihapus!');
        redirect('admin/pendaftaran');
    }

    // ===================== LAPORAN =====================

public function laporan() {
    $data['title'] = 'Laporan';
    $data['page'] = 'laporan';  // <-- TAMBAHKAN INI
    $data['statistik'] = $this->model_pendaftaran->get_statistik();
    $data['pendaftaran'] = $this->model_pendaftaran->get_all();
    $data['total_pasien'] = $this->model_pasien->get_total();
    $data['total_dokter'] = count($this->model_dokter->get_all());
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/laporan', $data);
    $this->load->view('templates/footer', $data);
}

public function download_pdf() {
    // Load library pdf (pastikan sudah diinstall dompdf)
    $this->load->library('pdf');
    
    $data['pendaftaran'] = $this->model_pendaftaran->get_all();
    $data['statistik'] = $this->model_pendaftaran->get_statistik();
    $data['total_pasien'] = $this->model_pasien->get_total();
    $data['total_dokter'] = count($this->model_dokter->get_all());
    
    $html = $this->load->view('admin/laporan_pdf', $data, TRUE);
    $this->pdf->loadHtml($html);
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->render();
    $this->pdf->stream("Laporan_Pendaftaran_" . date('Y-m-d') . ".pdf", array("Attachment" => 0));
}

public function download_csv() {
    $pendaftaran = $this->model_pendaftaran->get_all();
    
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="Laporan_Pendaftaran_' . date('Y-m-d') . '.csv"');
    
    $output = fopen('php://output', 'w');
    // Tambahkan BOM untuk UTF-8
    fwrite($output, "\xEF\xBB\xBF");
    
    // Header CSV
    fputcsv($output, array('ID', 'Nama Pasien', 'No Telepon', 'Email', 'Dokter', 'Spesialis', 'Keluhan', 'Tanggal Kunjungan', 'Jam', 'Status'));
    
    // Data
    foreach ($pendaftaran as $row) {
        fputcsv($output, array(
            $row->id_pendaftaran,
            $row->nama_lengkap,
            $row->no_telepon,
            $row->email,
            $row->nama_dokter,
            $row->spesialis,
            $row->keluhan_penyakit,
            date('d-m-Y', strtotime($row->tanggal_kunjungan)),
            substr($row->jam_kunjungan, 0, 5),
            $row->status
        ));
    }
    
    fclose($output);
    exit;
}
}