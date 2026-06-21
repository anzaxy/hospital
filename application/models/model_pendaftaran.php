<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_pendaftaran extends CI_Model {

    private $table = 'pendaftaran';

    public function get_all() {
        $this->db->select('pendaftaran.*, pasien.nama_lengkap, pasien.no_telepon, pasien.email, dokter.nama_dokter, dokter.spesialis');
        $this->db->join('pasien', 'pasien.id_pasien = pendaftaran.id_pasien');
        $this->db->join('dokter', 'dokter.id_dokter = pendaftaran.id_dokter');
        $this->db->order_by('tanggal_kunjungan', 'DESC');
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id) {
        $this->db->select('pendaftaran.*, pasien.nama_lengkap, pasien.no_telepon, dokter.nama_dokter, dokter.spesialis');
        $this->db->join('pasien', 'pasien.id_pasien = pendaftaran.id_pasien');
        $this->db->join('dokter', 'dokter.id_dokter = pendaftaran.id_dokter');
        $this->db->where('id_pendaftaran', $id);
        return $this->db->get($this->table)->row();
    }

    public function get_by_pasien_id($pasien_id) {
        $this->db->select('pendaftaran.*, dokter.nama_dokter, dokter.spesialis');
        $this->db->join('dokter', 'dokter.id_dokter = pendaftaran.id_dokter');
        $this->db->where('id_pasien', $pasien_id);
        $this->db->order_by('tanggal_kunjungan', 'DESC');
        return $this->db->get($this->table)->result();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update_status($id, $status) {
        return $this->db->update($this->table, ['status' => $status], ['id_pendaftaran' => $id]);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ['id_pendaftaran' => $id]);
    }

    public function get_statistik() {
        $data = array();
        $data['total'] = $this->db->count_all($this->table);
        
        $this->db->where('status', 'pending');
        $data['pending'] = $this->db->count_all_results($this->table);
        
        $this->db->where('status', 'disetujui');
        $data['disetujui'] = $this->db->count_all_results($this->table);
        
        $this->db->where('status', 'ditolak');
        $data['ditolak'] = $this->db->count_all_results($this->table);
        
        return $data;
    }

    public function get_jadwal_hari_ini() {
        $today = date('Y-m-d');
        $this->db->where('tanggal_kunjungan', $today);
        $this->db->where('status', 'disetujui');
        $this->db->join('pasien', 'pasien.id_pasien = pendaftaran.id_pasien');
        $this->db->join('dokter', 'dokter.id_dokter = pendaftaran.id_dokter');
        $this->db->order_by('jam_kunjungan', 'ASC');
        return $this->db->get($this->table)->result();
    }
}