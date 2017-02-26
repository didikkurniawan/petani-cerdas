<?php

/**
* Created by PhpStorm.
* User: agungrizkyana
* Date: 12/26/16
* Time: 06:53
*/
class Sertifikat_model extends MY_Model
{
    protected $table = 't_sertifikat';
    protected $filter_fields = array('nama', 'telepon', 'alamat', 'email');
    
    public function __construct()
    {
        parent::__construct();
        $this->db->set('created_by', $this->auth->userid());
    }
    
    public function add($data)
    {
        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() >= 1) {
            $id = $this->db->insert_id();
            $data = $this->db->get_where($this->table, array('id' => $id))->row();
            return $data;
        } else {
            return null;
        }
    }
    
    public function update($id, $data)
    {
        $this->db->set('updated_by', $this->auth->userid());
        $this->db->set('updated_at', date('Y-m-d h:i:s'));
        $this->db->update($this->table, $data, array('id' => $id))->row();
        if ($this->db->affected_rows() > 1) {
            $data = $this->db->get_where($this->table, array('id' => $id));
            return $data;
        } else {
            return null;
        }
        
    }
    
    public function view($id)
    {
        $data = $this->db->get_where($this->table, array('id' => $id))->row();
        return $data;
    }
    
    
    public function delete($id)
    {
        $this->db->update($this->table, array('visible' => 0), array('id' => $id));
        if ($this->db->affected_rows() >= 1) {
            $data = $this->db->get_where($this->table, array('id' => $id))->row();
            return $data;
        } else {
            return null;
        }
    }
    
    public function get_all($limit = 0, $offset = 0)
    {
        $data = $this->db->get($this->table)->limit($limit, $offset);
        return $data;
    }
    
    public function get_by_like($term)
    {
        $field_term = $this->table . 'id';
        
        foreach ($this->filter_fields as $val) {
            $field_term .= "," . $this->table . $val;
        }
        
        $this->db->select($field_term);
        $this->db->from($this->table);
        $this->db->where($this->table . $this->filter_fields[0] . " LIKE '%" . $term . "%'");
        $this->db->or_where($this->table . $this->filter_fields[1] . " LIKE '%" . $term . "%'");
        $this->db->or_where($this->table . $this->filter_fields[2] . " LIKE '%" . $term . "%'");
        $this->db->or_where($this->table . $this->filter_fields[3] . " LIKE '%" . $term . "%'");
        
        $data = $this->db->get()->result();
        return $data;
    }
    
    public function get_by_kalibrasi($id_kalibrasi){
        $sql = "SELECT DISTINCT id, jenis, file, catatan FROM ".$this->table." WHERE id_t_kalibrasi = '".$id_kalibrasi."' AND jenis = 'draft'";
        $data = $this->db->query($sql);
        $result = $data->result();
        return $result[count($result) - 1];
    }
}