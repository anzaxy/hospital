<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

    public function __construct()
    {
        parent ::__construct();
        $this->load->model('Auth_model');
        $this->load->model('model_pasien');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // Jika sudah login, redirect ke landing page (bukan dashboard)
        if ($this->session->userdata('login')) {
            redirect('landing');
        }
        $this->load->view('auth/login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->Auth_model->cek_login($username, $password);

        if($user){
            $data=[
                'id_user' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
                'login' => TRUE
            ];

            $this->session->set_userdata($data);

            // CEK APAKAH ADA REDIRECT AFTER LOGIN (dari pendaftaran)
            $redirect_url = $this->session->userdata('redirect_after_login');
            if ($redirect_url) {
                // Hapus session redirect setelah dipakai
                $this->session->unset_userdata('redirect_after_login');
                redirect($redirect_url);
            } else {
                // Jika tidak ada redirect khusus, balik ke landing page
                redirect('landing');
            }
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('landing');
    }

    public function register()
    {
        // Jika sudah login, redirect ke landing page
        if ($this->session->userdata('login')) {
            redirect('landing');
        }
        
        $this->load->view('auth/register');
    }

    public function proses_register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->register();
        } else {
            // Data user
            $user_data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'role' => 'pasien',
                'created_at' => date('Y-m-d H:i:s')
            );

            $this->Auth_model->register($user_data);
            $id_user = $this->Auth_model->get_last_id();

            if ($id_user) {
                $pasien_data = array(
                    'id_user' => $id_user,
                    'nama_lengkap' => $this->input->post('nama_lengkap'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'alamat' => $this->input->post('alamat'),
                    'no_telepon' => $this->input->post('no_telepon'),
                    'email' => $this->input->post('email')
                );

                $this->model_pasien->insert($pasien_data);

                $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
                redirect('login');
            } else {
                $this->session->set_flashdata('error', 'Registrasi gagal! Silakan coba lagi.');
                redirect('register');
            }
        }
    }
}