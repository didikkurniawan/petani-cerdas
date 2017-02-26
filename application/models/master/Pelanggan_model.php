<?php

/**
* Created by PhpStorm.
* User: agungrizkyana
* Date: 12/26/16
* Time: 06:49
*/

class Pelanggan_model extends MY_Model
{
    protected $table = 'm_pelanggan';
    protected $table_join_wilayah = 'm_wilayah';
    protected $filter_fields = array('nama', 'telepon', 'alamat', 'email');
    
    public function __construct()
    {
        parent::__construct();
    }

    // start didik
     private function _get_select(){
        $select = $this->table.".id, ";
        $select .= $this->table.".nama, ";
        $select .= $this->table.".telepon, ";
        $select .= $this->table.".fax, ";
        $select .= $this->table.".email, ";
        $select .= $this->table.".alamat, ";
        $select .= $this->table.".up, ";
        $select .= $this->table.".alamat_invoice,";
        $select .= $this->table.".contact_person, ";
        $select .= $this->table.".provinsi, ";
        $select .= $this->table.".kota, ";
        $select .= $this->table.".kecamatan, ";
        $select .= $this->table.".kelurahan, ";
        $select .= $this->table.".kodepos, ";
        $select .= $this->table.".created_by, ";
        $select .= $this->table.".created_at, ";
        $select .= $this->table.".updated_by, ";
        $select .= $this->table.".updated_at, ";
        $select .= $this->table.".visible, ";
        // $select .= $this->table_join_wilayah . ".id as id_provinsi, ";
        // $select .= $this->table_join_wilayah.".nama as nama_wilayah, ";
        // $select .= $this->table_join_wilayah.".uid, ";
        // $select .= $this->table_join_wilayah.".kode, ";
        // $select .= $this->table_join_wilayah.".kodepos, ";
        // $select .= $this->table_join_wilayah.".jenis, ";
        // $select .= $this->table_join_wilayah.".created_at ";

        return $select;
    }

    public function datatables()
    {
        $this->datatables->select($this->_get_select());
        $this->datatables->from($this->table);
        // $this->datatables->join($this->table_join_wilayah, $this->table . ".id_provinsi = " . $this->table_join_wilayah . ".id");

        $this->datatables->where($this->table . ".visible", 1);
        return $this->datatables->generate();
    }

    public function add($data)
    {
        
        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();
        $inserted = $this->db->get_where($this->table, array('id' => $id))->row();
        
        return $inserted;
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




    // end didik
    
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
        
        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('id' => $id))->row();
        
        return $updated;
        
    }
    
    public function get_all($limit = 0, $offset = 0)
    {
        $field_term = $this->table . '.id';
        
        foreach ($this->filter_fields as $val) {
            $field_term .= "," . $this->table . "." . $val;
        }
        
        $this->db->select($field_term . "," . $this->table . ".created_at");
        $this->db->from($this->table);
        $this->db->limit($limit);
        $this->db->offset($offset);
        $data = $this->db->get()->result();
        return $data;
    }
    
    public function get_by_like($term)
    {
        $field_term = $this->table . '.id';
        
        foreach ($this->filter_fields as $val) {
            $field_term .= "," . $this->table . "." . $val;
        }
        
        $this->db->select($field_term);
        $this->db->from($this->table);
        $this->db->where($this->table . "." . $this->filter_fields[0] . " LIKE '%" . $term . "%'");
        $this->db->or_where($this->table . "." . $this->filter_fields[1] . " LIKE '%" . $term . "%'");
        $this->db->or_where($this->table . "." . $this->filter_fields[2] . " LIKE '%" . $term . "%'");
        $this->db->or_where($this->table . "." . $this->filter_fields[3] . " LIKE '%" . $term . "%'");
        
        $data = $this->db->get()->result();
        return $data;
        
        
    }
    
    
}