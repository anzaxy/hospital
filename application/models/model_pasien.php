<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_pasien extends CI_Model {

    private $table = 'pasien';

    public function get_all() {
        $this->db->select('pasien.*, users.username');
        $this->db->join('users', 'users.id_user = pasien.id_user', 'left');
        $this->db->order_by('id_pasien', 'DESC');
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id_pasien' => $id])->row();
    }

    public function get_by_user_id($user_id) {
        return $this->db->get_where($this->table, ['id_user' => $user_id])->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->update($this->table, $data, ['id_pasien' => $id]);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ['id_pasien' => $id]);
    }

    public function get_total() {
        return $this->db->count_all($this->table);
    }
}