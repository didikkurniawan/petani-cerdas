<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/26/16
 * Time: 06:52
 */
class Ro_model extends MY_Model
{
    protected $table = 't_ro';
    protected $table_join_pelanggan = 'm_pelanggan';
    protected $table_join_serah_terima = 't_serah_terima';
    protected $table_join_penawaran = 't_penawaran';
    protected $table_join_detail_serah_terima = 't_detail_serah_terima';
    protected $filter_fields = array('nama', 'telepon', 'alamat', 'email');


    protected $NOT_DEAL = 0;
    protected $VISIBLE = 1;

    public function __construct()
    {
        parent::__construct();
        $this->db->set('created_by', $this->auth->userid());
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
        $select .= $this->table . ".catatan, ";
        $select .= $this->table . ".visible, ";
        $select .= $this->table . ".created_at, ";
        $select .= $this->table_join_serah_terima . ".id as id_serah_terima, ";
        $select .= $this->table_join_serah_terima . ".no_order, ";
        $select .= $this->table_join_pelanggan . ".id as id_pelanggan, ";
        $select .= $this->table_join_pelanggan . ".nama, ";
        $select .= $this->table_join_pelanggan . ".telepon, ";
        $select .= $this->table_join_pelanggan . ".fax, ";
        $select .= $this->table_join_pelanggan . ".email, ";
        $select .= $this->table_join_pelanggan . ".alamat ";

        return $select;
    }

    public function datatables()
    {
        $this->datatables->select($this->_get_select());
        $this->datatables->from($this->table);
        $this->datatables->join($this->table_join_serah_terima, $this->table . ".id_serah_terima = " . $this->table_join_serah_terima . ".id", 'left');
        $this->datatables->join($this->table_join_penawaran, $this->table_join_serah_terima . ".id_penawaran = " . $this->table_join_penawaran . ".id", 'left');
        $this->datatables->join($this->table_join_pelanggan, $this->table_join_penawaran . ".id_pelanggan = " . $this->table_join_pelanggan . ".id", 'left');
        $this->datatables->where($this->table . ".visible", $this->VISIBLE);

        return $this->datatables->generate();
    }

    public function view_detail($id)
    {
        $this->db->select($this->_get_select());
        $this->db->from($this->table);
        $this->db->join($this->table_join_serah_terima, $this->table . ".id_serah_terima = " . $this->table_join_serah_terima . ".id", 'left');
        $this->db->join($this->table_join_penawaran, $this->table_join_serah_terima . ".id_penawaran = " . $this->table_join_penawaran . ".id", 'left');
        $this->db->join($this->table_join_pelanggan, $this->table_join_penawaran . ".id_pelanggan = " . $this->table_join_pelanggan . ".id", 'left');
        $this->db->where($this->table .'.id', $id);
        $data = $this->db->get()->row();
        return $data;
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
        $this->db->update($this->table, array('visible' => 0,'id_serah_terima' => 0), array('id' => $id));
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