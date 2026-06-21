<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    private $table = 'users';

    public function cek_login($username, $password) {
        $this->db->select('id_user as id, username, role, password');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        return $this->db->get($this->table)->row();
    }

    public function register($data) {
        return $this->db->insert($this->table, $data);
    }

    public function get_last_id() {
        return $this->db->insert_id();
    }
}