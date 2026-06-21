<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_dokter extends CI_Model {

    private $table = 'dokter';

    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id_dokter' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->update($this->table, $data, ['id_dokter' => $id]);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ['id_dokter' => $id]);
    }

    public function get_total() {
        return $this->db->count_all($this->table);
    }

    public function get_options() {
        $dokter = $this->get_all();
        $options = array();
        foreach ($dokter as $d) {
            $options[$d->id_dokter] = $d->nama_dokter . ' - ' . $d->spesialis;
        }
        return $options;
    }
}