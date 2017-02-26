<?php

/**
* Created by PhpStorm.
* User: agungrizkyana
* Date: 12/26/16
* Time: 06:52
*/
class Detail_kalibrasi_model extends MY_Model
{
    protected $table = 't_detail_kalibrasi';
    protected $table_join_kalibrasi = 't_kalibrasi';
    protected $table_join_alat = 'm_alat';
    protected $table_join_serah_terima = 't_serah_terima';
    protected $table_join_detail_serah_terima = 't_detail_serah_terima';
    protected $table_join_pelanggan = 'm_pelanggan';
    protected $table_join_penawaran = 't_penawaran';
    protected $filter_fields = array('nama', 'telepon', 'alamat', 'email');
    
    public function __construct()
    {
        parent::__construct();
    }
    
    private function _get_select()
    {
        $select = $this->table . ".id, ";
        $select .= $this->table . ".status, ";
        $select .= $this->table_join_alat . ".id as id_alat, ";
        $select .= $this->table_join_alat . ".nama, ";
        $select .= $this->table_join_alat . ".harga, ";
        $select .= $this->table_join_alat . ".spesifikasi, ";
        $select .= $this->table . ".qty, ";
        $select .= $this->table_join_alat . ".bidang, ";
        $select .= $this->table . ".file_pengolahan_data, ";
        $select .= $this->table . ".file_sertifikat ";
        return $select;
    }
    
    public function get_where($where)
    {
        $this->db->select($this->_get_select());
        $this->db->from($this->table);
        $this->db->join($this->table_join_kalibrasi, $this->table.".id_kalibrasi = " . $this->table_join_kalibrasi . ".id", 'left');
        $this->db->join($this->table_join_detail_serah_terima, $this->table.".id_alat = " . $this->table_join_detail_serah_terima.".id", 'left');
        $this->db->join($this->table_join_alat, $this->table_join_detail_serah_terima.".id_alat = " . $this->table_join_alat.".id");
        
        $this->db->where($where);
        
        return $this->db->get()->result();
    }
    
    public function save($data)
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
        $this->db->update($this->table, $data, array('id' => $id));
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
}