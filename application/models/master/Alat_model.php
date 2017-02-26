<?php

/**
* Created by PhpStorm.
* User: agungrizkyana
* Date: 12/24/16
* Time: 09:07
* @konvensi : setiap fungsi dengan modifier private, diawali _ (underscore)
*/



class Alat_model extends MY_Model
{
    
    // nama table nya di simpen jadi variable
    protected $table = 'm_alat';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
    * @desc 'select' table pake fungsi seperti ini. Modifier nya private, nama fungsi di awali _ (underscore).
    * @return String
    **/
    private function _get_select(){
        $select = $this->table.".id, ";
        $select .= $this->table.".bidang, ";
        $select .= $this->table.".nama, ";
        $select .= $this->table.".spesifikasi, ";
        $select .= $this->table.".harga, ";
        $select .= $this->table.".scope, ";
        $select .= $this->table.".created_by, ";
        $select .= $this->table.".created_at, ";
        $select .= $this->table.".updated_at, ";
        $select .= $this->table.".visible ";
        return $select;
    }
    
    public function datatables()
    {
        $this->datatables->select($this->_get_select())
        ->from($this->table)
        ->where('visible', 1);
        
        return $this->datatables->generate();
    }
    public function add($data)
    {
        
        $this->db->insert($this->table, $data);
        
        $id = $this->db->insert_id();
        $inserted = $this->db->get_where($this->table, array('id' => $id))->row();
        
        return $inserted;
        
    }
    
    public function get_by_id($id)
    {
        $data = $this->db->get_where($this->table, array('id' => $id))->row();
        return $data;
    }
    
    public function get_all($limit = 0, $offset = 0, $where = "")
    {
        $data = $this->db->get($this->table)->result();
        // if($where != ""){
            $data = $this->db->where('visible',1)->get($this->table)->result();
        // }
        return $data;
    }
    
    public function get_by_like($term)
    {
        $this->db->select($this->_get_select());
        $this->db->from($this->table);
        $this->db->where('scope', 'ORD');
        $this->db->where('nama LIKE "%' . $term . '%" ');
        $this->db->or_where('bidang LIKE "%' . $term . '%" ');
        
        $data = $this->db->get()->result();
        return $data;
    }
    public function delete($id)
    {
        $this->db->update($this->table, array('visible' => 0), array('id' => $id));
        $deleted = $this->db->get_where($this->table, array('id' => $id))->row();
        return $deleted;
        
    }
    public function update($id, $data)
    {
        $this->db->update($this->table, $data, array('id' => $id));
        
        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('id' => $id))->row();
        
        return $updated;
        
    }
    
}