<?php

class Linmas_model extends MY_Model {

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
        $this->db->select('linmas.*, '
                . 'nama_lengkap, '
                . 'no_ktp, '
                . 'linmas.rtrw_id as id_rtrw, '
                . 'linmas.updated_by as updated_by, '
                . 'no_rt, '
                . 'no_rw, ');
        $this->db->from('`linmas`, warga, rtrw');
        $this->db->where('linmas.warga_id = warga.id and linmas.rtrw_id = rtrw.id and linmas.id = ' . $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    public function getData() {
        return $this->db->get('L')->result();
    }
//
//    public function getDataById($id) {
//        $this->db->select('linmas.*, '
//                . 'nama_lengkap, '
//                . 'no_rt, '
//                . 'no_rw, '
//                . 'username ');
//        $this->db->from('`linmas`, warga, rtrw, tbl_users');
//        $this->db->where('linmas.warga_id = warga.id and tbl_users.id = linmas.created_by and linmas.rtrw_id = linmas.id and linmas.id = ' . $id);
//        $this->db->group_by('linmas.id');
//
//        return parent::get_by_id($id);
//    }

//
//    public function getLinmas() {
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
        $this->db->insert('Linmas', $data);
    }


    public function update($id, $data) {
        $this->db->update('Linmas', $data, array('id' => $id));
        return true;
    }

    public function delete($id) {
        $this->db->delete('Linmas', array('id' => $id));
        return true;
    }
}
