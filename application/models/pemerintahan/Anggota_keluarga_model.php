<?php

class Anggota_keluarga_model extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function getData() {
        $this->db->select('keluarga.*, COUNT(keluarga_id) as keluarga_id, no_rt, no_rw, nama_lengkap, is_kepala_keluarga');
        $this->db->from('keluarga, (SELECT * from anggota_keluarga ORDER BY keluarga_id, is_kepala_keluarga DESC) as anggota_keluarga, `warga` , `rtrw`');
        $this->db->where('`rtrw`.`id` = `keluarga`.`rtrw_id` AND `keluarga`.`id` = `anggota_keluarga`.`keluarga_id` AND `anggota_keluarga`.`warga_id` = `warga`.`id`');
        $this->db->group_by('keluarga_id');
        $query = $this->db->get();

        return $query->result();
    }

    public function getDataById($id) {
        $this->db->select('anggota_keluarga.id as anggota_keluarga_id, keluarga_id, is_kepala_keluarga, hubungan_keluarga, nama_lengkap, warga_id');
        $this->db->from('anggota_keluarga, warga');
        $this->db->where('`anggota_keluarga`.`warga_id` = `warga`.`id` AND anggota_keluarga.id = ' . $id.'');
        $query = $this->db->get();

        return $query->result();
    }

    public function getDataByIdKeluarga($id) {
        $this->db->select('anggota_keluarga.id as anggota_keluarga_id, keluarga_id, is_kepala_keluarga, hubungan_keluarga, nama_lengkap, warga_id');
        $this->db->from('anggota_keluarga, warga');
        $this->db->where('`anggota_keluarga`.`warga_id` = `warga`.`id` AND keluarga_id = ' . $id.'');
        $query = $this->db->get();

        return $query->result();
    }

    public function insert($data) {
        $this->db->insert('Anggota_keluarga', $data);
    }

    public function update($data, $id) {
        $this->db->update('Anggota_keluarga', $data, array('id_warga' => $id));
        return true;
    }

    public function delete($id) {
        $this->db->delete('Anggota_keluarga', array('id' => $id));
        return true;
    }

}
