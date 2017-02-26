<?php

class Warga_model extends MY_Model {

    protected $table = 'warga';
    protected $role_table = 'acl_roles';
    private $ci;
    
    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_data() {
        $this->db->select('*', 'no_rw', 'no_rt');
        $this->db->from('warga');
        $this->db->join('rtrw', 'rtrw.id = warga.rtrw_id');
        $this->db->where('status_warga = "2"');
        $query = $this->db->get();
        
        return $query->result();
    }

    public function getIdByNoKtp($no_ktp) {
        $this->db->select('id');
        $this->db->from('warga');
        $this->db->where('no_ktp = "'.$no_ktp.'"');
        $query = $this->db->get();
        return $query->result();
    }

    public function getLansiaById($id) {
        $this->db->select('warga.*, rtrw.id as id_rtrw, no_rt, no_rw ');
        $this->db->join('rtrw','warga.rtrw_id = rtrw.id', 'left');
        
        return parent::get_by_id($id);
    }

    public function getWarga() {
        $this->db->select('no_ktp, nama_lengkap, no_rw, no_rt');
        $this->db->from('warga');
        $this->db->join('rtrw', 'rtrw.id = warga.rtrw_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getNoKtp() {
        $this->db->select('no_ktp');
        $this->db->from('warga');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert($data) {
        $this->db->insert('Warga', $data);
    }

    public function update($data, $id) {
        $this->db->update('Warga', $data, array('id' => $id));
        return true;
    }

    public function delete($id) {
        $this->db->delete('Warga', array('id' => $id));
        return true;
    }

}
