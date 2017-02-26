<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/24/16
 * Time: 09:07
 */
class Sub_kontrak_model extends MY_Model
{
    protected $table = 'm_sub_kontrak';

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_select(){
        $select = $this->table.".id, ";
        $select .= $this->table.".nama, ";
        $select .= $this->table.".alamat, ";
        $select .= $this->table.".up, ";
        $select .= $this->table.".contact_person, ";
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
            $data = $this->db->get_where($this->table, array('id' => $id))->row();
            return $data;
        } else {
            throw new Exception('Method not Allowed');
        }
    }

    public function get_all($limit = 0, $offset = 0)
    {
        $this->db->limit($limit);
        $this->db->offset($offset);

        $data = $this->db->get($this->table)->result();
        return $data;
    }

    public function get_by_like($term)
    {
        $this->db->select('id, nama, alamat, contact_person');
        $this->db->from($this->table);
        $this->db->where('nama LIKE "%' . $term . '%" ');
        $this->db->or_where('alamat LIKE "%' . $term . '%" ');
        $this->db->or_where('contact_person LIKE "%' . $term . '%" ');

        $data = $this->db->get()->result();
        return $data;
    }

}