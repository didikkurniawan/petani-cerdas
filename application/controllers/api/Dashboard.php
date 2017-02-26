<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends API_Controller
{
    public function __construct(){
        parent::__construct();
    }
    
    public function order(){
        $this->db->select("t_serah_terima.no_order, t_serah_terima.jenis_order, m_alat.nama,
        t_detail_serah_terima.status_kalibrasi, t_kalibrasi.is_verifikasi_pengolahan_data, t_kalibrasi.is_verifikasi_draft_sertifikat, t_kalibrasi.is_verifikasi_sertifikat");
        $this->db->join("t_serah_terima", "t_detail_serah_terima.id_serah_terima = t_serah_terima.id", "left");
        $this->db->join("m_alat", "t_detail_serah_terima.id_alat = m_alat.id");
        $this->db->join("t_kalibrasi", "t_serah_terima.id = t_kalibrasi.id_serah_terima");
        $this->db->group_by("t_serah_terima.no_order");
        $this->db->from("t_detail_serah_terima");
        

        $data = $this->db->get()->result();
        echo json_encode($data);

        
    }
}