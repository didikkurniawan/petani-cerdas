<?php

class Warga_sementara_model extends MY_Model {

    protected $table = 'warga_sementara';
    protected $role_table = 'acl_roles';
    private $ci;

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

//
//    public function get_data() {
//        $this->db->select('*', 'no_rw', 'no_rt');
//        $this->db->from('warga');
//        $this->db->join('rtrw', 'rtrw.id = warga.rtrw_id');
//        $this->db->where('status_warga = "2"');
//        $query = $this->db->get();
//        
//        return $query->result();
//    }
//
    public function getDataById($id) {
        $this->db->select('ws.*, username');
        $this->db->from('tbl_users');
        $this->db->join('(select warga.*, warga_sementara.id as ws_id, warga_id, pekerjaan, datang_dari, maksud_kedatangan, alamat_yang_didatangi,datang_tanggal, created_date, created_by, updated_date, updated_by
        FROM `warga_sementara`
        LEFT JOIN
        (SELECT warga.pekerjaan as pekerjaan_warga, warga.id as id_warga,rtrw_id, `nama_lengkap`, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, `no_ktp`, `no_rt`,  `no_rw`
        FROM warga
        LEFT JOIN`rtrw`
        ON `warga`.`rtrw_id` = `rtrw`.`id`) AS warga
        ON `warga_sementara`.`warga_id` = warga.id_warga) as ws', 'ws.created_by = tbl_users.id');
        $this->db->where('ws_id = '.$id);
        $query = $this->db->get();
        return $query->result();
    }

//
//    public function getDataById($id) {
//        $this->db->select('warga_sementara.*, '
//                . 'nama_lengkap, '
//                . 'no_rt, '
//                . 'no_rw, '
//                . 'username ');
//        $this->db->from('`warga_sementara`, warga, rtrw, tbl_users');
//        $this->db->where('warga_sementara.warga_id = warga.id and tbl_users.id = warga_sementara.created_by and warga_sementara.rtrw_id = warga_sementara.id and warga_sementara.id = ' . $id);
//        $this->db->group_by('warga_sementara.id');
//
//        return parent::get_by_id($id);
//    }
//
//    public function getWarga_sementara() {
//        $this->db->select('no_ktp, nama_lengkap, no_rw, no_rt');
//        $this->db->from('warga');
//        $this->db->join('rtrw', 'rtrw.id = warga.rtrw_id');
//        $query = $this->db->get();
//        return $query->result();
//    }
//    
//    public function getNoKtp() {
//        $this->db->select('no_ktp');
//        $this->db->from('warga');
//        $query = $this->db->get();
//        return $query->result();
//    }

    public function insert($data) {
        $this->db->insert('Warga_sementara', $data);
    }

    public function update($data, $id) {
        $this->db->update('Warga_sementara', $data, array('id' => $id));
        return true;
    }

    public function delete($id) {
        $this->db->delete('Warga_sementara', array('id' => $id));
        return true;
    }

}
