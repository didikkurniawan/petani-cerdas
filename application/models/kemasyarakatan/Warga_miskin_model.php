<?php

class Warga_miskin_model extends MY_Model {

    protected $table = 'warga_miskin';
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
//    public function getDataById($id) {
//        $this->db->select('warga_miskin.*, '
//                . 'nama_lengkap, '
//                . 'no_ktp, '
//                . 'no_rt, '
//                . 'no_rw, '
//                . 'username ');
//        $this->db->from('`warga_miskin`, warga, rtrw, tbl_users');
//        $this->db->where('warga_miskin.warga_id = warga.id and tbl_users.id = warga_miskin.created_by and warga_miskin.rtrw_id = rtrw.id and warga_miskin.id = ' . $id);
//        $query = $this->db->get();
//        return $query->result();
//    }
//
    public function getDataById($id) {
        $this->db->select('warga_miskin.*, warga.nama_lengkap, no_ktp');
        $this->db->from(' warga');
        $this->db->where('warga_miskin.warga_id = warga.id and warga_miskin.id = ' . $id);

        return parent::get_by_id($id);
    }

//
//    public function getWarga_miskin() {
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
        $this->db->insert('Warga_miskin', $data);
    }


    public function update($data, $id) {
        $this->db->update('Warga_miskin', $data, array('id' => $id));
        return true;
    }

    public function delete($id) {
        $this->db->delete('Warga_miskin', array('id' => $id));
        return true;
    }
}
