<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/24/16
 * Time: 09:07
 */
class Pengaduan_model extends MY_Model
{
    protected $table = 'm_pengaduan';
    protected $table_petugas = 'auth_users';
    protected $filter_fields = array('nama', 'keterangan');
    protected $filter_fields_petugas = array('first_name','last_name');

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_select(){
        $select = $this->table.".id, ";
        $select .= $this->table.".nama, ";
        $select .= $this->table.".keterangan, ";
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


    public function get_by_id($id)
    {
        if ($this->input->is_ajax_request() && $this->input->method('post')) {
            $data = $this->db->get_where($this->table, array('id' => $id,'visible' => 1))->row();
            return $data;
        } else {
            throw new Exception('Method not Allowed');
        }
    }

    public function get_all($limit = 0, $offset = 0)
    {
        $field_term = $this->table . '.id';
        
        foreach ($this->filter_fields as $val) {
            $field_term .= "," . $this->table . "." . $val;
        }
        $this->db->select($field_term . "," . $this->table . ".created_at");
        $this->db->from($this->table);
        $this->db->where('visible',1);
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
        $this->db->where('visible',1);
        $this->db->where($this->table . "." . $this->filter_fields[0] . " LIKE '%" . $term . "%'");
        $this->db->or_where($this->table . "." . $this->filter_fields[1] . " LIKE '%" . $term . "%'");
        
        $data = $this->db->get()->result();
        return $data;
    }

}