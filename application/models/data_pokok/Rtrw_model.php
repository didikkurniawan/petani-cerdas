<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rtrw_model extends MY_Model {

    protected $table = 'rtrw';
    protected $role_table = 'acl_roles';
    private $ci;

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->ci = & get_instance();
        $this->ci->load->library('PasswordHash', array('iteration_count_log2' => 8, 'portable_hashes' => FALSE));
    }

    public function getDataById($id) {
        $this->db->select('`rtrw`.`id` as `id_rtrw`, `no_rt`, `no_rw`, `ketua_rt`,`ketua_rw`, `id_biodata`, biodata.rtrw_id ');
        $this->db->from('`rtrw`');
        $this->db->join('(select `warga`.`nama_lengkap` as `ketua_rt`, `warga2`.`nama_lengkap` as `ketua_rw`, `biodata_rt_rw`.`id` as `id_biodata`, biodata_rt_rw.rtrw_id FROM `warga`, `biodata_rt_rw`, `warga` as `warga2` WHERE `warga`.`id` = `biodata_rt_rw`.`ketua_rt_id` and `warga2`.`id` = `biodata_rt_rw`.`ketua_rw_id`) as biodata', 'rtrw.id = biodata.rtrw_id', 'left');
        $this->db->where('rtrw.id = "'. $id.'"');
        $this->db->group_by('rtrw.id');
        return $this->db->get()->result();
    }

    public function getData() {
        return $this->db->get('Rtrw')->result();
    }

//
//    public function insert($data) {
//        $this->db->insert('Rtrw', $data);
//    }
//
//    public function update($data, $rt, $rw) {
//        $this->db->update('Rtrw', $data, array('no_rt' => $rt, 'no_rw' => $rw));
//        return true;
//    }
//
//    public function view($id) {
//        return parent::delete($id);
//    }
    
    public function update($id, $data) {
        return parent::update($id, $data);
    }

    public function delete($id) {
        return parent::delete($id);
    }

}
