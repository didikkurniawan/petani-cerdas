<?php

class Keluarga_model extends MY_Model {

    protected $table = 'keluarga';
    protected $role_table = 'acl_roles';
    private $ci;
    
    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function getData() {
        $this->db->select('nomor_kk, 
                anggota_keluarga_id, 
                jumlah_keluarga, 
                keluarga.id as keluarga_id, alamat, 
                tanggal_pembuatan_kk, 
                keluarga.created_date,
                nama_lengkapa,
                anggota_keluarga_id,
                is_kepala_keluarga, 
                no_rt, 
                no_rw, 
                "" as rt_rw,
                anggota_keluarga2.rtrw_id');
        $this->db->from('keluarga');
        $this->db->join('(SELECT warga.id as warga_id, nama_lengkap, keluarga_id, count(anggota_keluarga.id) as jumlah_keluarga, is_kepala_keluarga, anggota_keluarga.id as anggota_keluarga_id, rtrw.id as rtrw_id, no_rt, no_rw 
            FROM warga, anggota_keluarga, rtrw 
            where warga.id = anggota_keluarga.warga_id and warga.rtrw_id = rtrw.id group by keluarga_id) as anggota_keluarga2', 'keluarga.id = anggota_keluarga2.keluarga_id', 'left');
        $this->db->group_by('nomor_kk');
        $query = $this->db->get();
        
        return $query->result(); 
    }

    public function getDataById($id) {
        $this->db->select('keluarga.*, keluarga.rtrw_id as rtrw_id, rtrw.no_rt as no_rt, rtrw.no_rw as no_rw, rtrw.id as id_rtrw');
        $this->db->from('keluarga');
        $this->db->join('rtrw','`rtrw`.`id` = `keluarga`.`rtrw_id`', 'left');
        $this->db->where('keluarga.id = '.$id);
        $query = $this->db->get();
        
        return parent::get_by_id($id);
    }

    public function insert($data) {
        $this->db->insert('Keluarga', $data);
    }

    public function update($data, $id) {
        $this->db->update('Keluarga', $data, array('id' => $id));
        return true;
    }

    public function delete($id) {
        $this->db->delete('Keluarga', array('id' => $id));
        return true;
    }

}
