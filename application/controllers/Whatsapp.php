<?php
defined('BASEPATH') OR exit('No direct script access allowe');

class Whatsapp extends CI_Controller{

public function kirim_notifikasi($id)
{
    $this->db->select('
    peminjaman.*,
    anggota.nama,
    anggota.telepon
    ');

    $this->db->from('peminjaman');

    $this->db->join(
        'anggota',
        'anggota.id = peminjaman.anggota_id'
    );

    // berdasarkan id peminjaman
    $this->db->where('peminjaman.id', $id);

    $d = $this->db->get()->row();

    if(!$d){
        show_404();
    }

    $today = date('Y-m-d');

    $selisih = strtotime($today) - strtotime($d->tgl_jatuh_tempo);

    $terlambat = $selisih > 0
    ? floor($selisih / 86400)
    : 0;

    // hanya kirim jika telat
    if($terlambat > 0){

        $pesan = 
        "Halo ".$d->nama.", ".
        "Anda terlambat mengembalikan buku selama ".
        $terlambat." hari ". 
        "Mohon segera di kembalikan ke perpustakaan.";

        $this->kirim_wa(
            $d->telepon,
            $pesan
        );

        $this->session->set_flashdata(
            'success',
            'Notifikasi WA berhasil dikirim'
        );
        

    } else {

        $this->session->set_flashdata(
            'error',
            'Anggota belum terlambat'
        );
    }

    redirect('peminjaman');
}

    private function kirim_wa($target, $message)
    {
        $token = "wA9ix1FLxTzC1s4DGSQv";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => $message,
            ),

            CURLOPT_HTTPHEADER => array(
                'Authorization: '.$token
            ),
        ));

        $response = curl_exec($curl);

        return $response;
    }
}