<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/26/16
 * Time: 06:52
 */
class Detail_ro_model extends MY_Model
{
    protected $table = 't_detail_ro';
    protected $table_join_ro = 't_ro';
    protected $filter_fields = array('nama', 'telepon', 'alamat', 'email');


    protected $NOT_DEAL = 0;
    protected $VISIBLE = 1;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_where($where)
    {
        $this->db->select($this->_get_select());
        $this->db->from($this->table);
        $this->db->join($this->table_join_ro, $this->table_join_ro . ".id = " . $this->table . ".id_ro");
        $this->db->where($where);
        $this->db->where($this->table . ".visible", 1);

        return $this->db->get()->result();
    }
    public function datatables_ro($id)
    {
        $this->datatables->select($this->_get_select());
        $this->datatables->from($this->table);
        $this->datatables->join($this->table_join_ro, $this->table_join_ro . ".id = " . $this->table . ".id_ro");
        $this->datatables->where("t_detail_ro.id_ro", $id);
        $this->datatables->where($this->table . ".visible", $this->VISIBLE);
        return $this->datatables->generate();
    }

    public function count_all()
    {
        $count = $this->db->count_all($this->table);
        return $count;
    }

    public function deal($id)
    {
        $this->db->update($this->table, array('is_deal' => 1), array('id' => $id));
        $data = $this->db->get_where($this->table, array('id' => $id))->row();
        return $data;
    }

    private function _get_select()
    {
        $select = $this->table . ".id, ";
        $select .= $this->table . ".item, ";
        $select .= $this->table . ".nominal, ";
        $select .= $this->table . ".keterangan, ";
        $select .= $this->table_join_ro . ".id_serah_terima, ";

        return $select;
    }

    public function datatables()
    {
        $this->datatables->select($this->_get_select());
        $this->datatables->from($this->table);
        $this->datatables->join($this->table_join_ro, $this->table . ".id_ro = " . $this->table_join_ro . ".id");
        $this->datatables->where($this->table . ".visible", $this->VISIBLE);

        return $this->datatables->generate();
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
        
        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('id' => $id))->row();
        
        return $updated;
        
    }

    public function view($id)
    {
        $data = $this->db->get_where($this->table, array('id' => $id))->row();
        return $data;
    }


    public function delete($id)
    {
        $this->db->update($this->table, array('visible' => 0), array('id' => $id));
        $deleted = $this->db->get_where($this->table, array('id' => $id))->row();
        return $deleted;
    }

    public function get_all($limit = 0, $offset = 0, $deal = 0)
    {


        $this->db->select($this->_get_select());
        $this->db->from($this->table);
        $this->db->join($this->table_join_pelanggan, $this->table . ".id_pelanggan = " . $this->table_join_pelanggan . ".id", 'left');
        $this->db->where($this->table . ".is_deal", $deal);
        $this->db->limit($limit);
        $this->db->offset($offset);
        $data = $this->db->get()->result();
        return $data;
    }

    public function get_by_like($term, $deal = 0)
    {
        $field_term = $this->table . 'id';

        foreach ($this->filter_fields as $val) {
            $field_term .= "," . $this->table . $val;
        }

        $this->db->select($this->_get_select());
        $this->db->from($this->table);
        $this->db->join($this->table_join_pelanggan, $this->table . ".id_pelanggan = " . $this->table_join_pelanggan . ".id", 'left');
        $this->db->where($this->table . ".is_deal", $deal);
        $this->db->where($this->table . ".no_penawaran" . " LIKE '%" . $term . "%'");
        $this->db->or_where($this->table_join_pelanggan . ".nama" . " LIKE '%" . $term . "%'");

        $data = $this->db->get()->result();
        return $data;


    }
}