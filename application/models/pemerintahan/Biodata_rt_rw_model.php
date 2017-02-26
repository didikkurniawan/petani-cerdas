<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_rt_rw_model extends MY_Model {

    protected $table = 'biodata_rt_rw';
    protected $role_table = 'acl_roles';
    private $ci;

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->ci = & get_instance();
        $this->ci->load->library('PasswordHash', array('iteration_count_log2' => 8, 'portable_hashes' => FALSE));
    }

    public function getDataById($id) {
        $this->db->select('biodata.*, tbl_users.username as updated_by');
        $this->db->from('tbl_users');
        $this->db->join('(select biodata.*, tbl_users.username as created_by
from (SELECT biodata.created_by as created, 
      biodata.updated_by as updated, 
      biodata.updated_date as updated_date, 
      biodata.created_date as created_date, 
      `biodata`.`id` as `biodata_id`, 
      `warga1`.`nama_lengkap` as `ketua_rt`, 
      `warga1`.`no_ktp` as `no_ktp_rt`, 
      `warga2`.`nama_lengkap` as `ketua_rw`, 
      `warga2`.`no_ktp` as `no_ktp_rw`, 
      `no_rt`, `no_rw`, 
      `rtrw`.`id` as `id_rtrw`, 
      `biodata`.`periode_dari` as `biodata_periode_dari`, 
      `biodata`.`periode_sampai` as `biodata_periode_sampai` 
      
      FROM `biodata_rt_rw` as `biodata`, `warga` as `warga1`, `warga` as `warga2`,`rtrw`, `biodata_rt_rw` WHERE `biodata`.`ketua_rt_id` = `warga1`.`id` and `biodata`.`ketua_rw_id` = `warga2`.`id` and `biodata`.`rtrw_id` = `rtrw`.`id`GROUP BY `biodata_id`) as biodata 
left join tbl_users
on tbl_users.id = biodata.created)as biodata', 'tbl_users.id = biodata.updated','right');
        $this->db->group_by('biodata_id');
        $this->db->where('biodata_id', $id);
        $query = $this->db->get();
        
        return $query->result();
    }

//    public function getData() {
//        return $this->db->get('Rtrw')->result();
//    }

    public function insert($data) {
        return parent::insert($data);
    }

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

//    public function delete($id) {
//        return parent::delete($id);
//    }
//    function datatable() {
//        $this->datatables->select('id, no_rt, no_rw, "" AS action')
//                ->from($this->table);
//        return $this->datatables->generate();
//    }
}
