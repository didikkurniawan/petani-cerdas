<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/26/16
 * Time: 06:51
 */
class Detail_serah_terima_model extends MY_Model
{
   protected $table = 't_detail_serah_terima';
    protected $table_join_alat = 'm_alat';
    protected $table_join_detail_penawaran ='t_detail_penawaran';
    protected $filter_fields = array('no_order');

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_select()
    {
        $select = $this->table . ".id, ";
        $select .= $this->table . ".qty, ";
        $select .= $this->table . ".is_terima, ";
        $select .= $this->table_join_detail_penawaran . ".nama, ";
        $select .= $this->table_join_detail_penawaran . ".spesifikasi, ";
        $select .= $this->table_join_detail_penawaran . ".order, ";
        $select .= $this->table_join_detail_penawaran . ".harga, ";
        $select .= $this->table . ".status_kalibrasi, ";
        $select .= $this->table . ".data ";
        return $select;
        // .",t_detail_penawaran.nama,t_detail_penawaran.spesifikasi,t_detail_penawaran.spesifikasi,t_detail_penawaran.spesifikasi"
    }
    public function datatables_serah_terima($id)
    {
        $this->datatables->select($this->_get_select());
        $this->datatables->from($this->table);
        $this->datatables->join('t_serah_terima', $this->table . ".id_serah_terima = t_serah_terima.id");
        $this->datatables->join('t_detail_penawaran', $this->table . ".id_alat = t_detail_penawaran.id","left");
        $this->datatables->where("t_serah_terima.id", $id);
        // $this->datatables->where("t_detail_serah_terima.is_terima",1);

        return $this->datatables->generate();
    }

    public function update_serah_terima($id)
    {
        $this->db->select($this->_get_select());
        $this->db->from($this->table);
        $this->db->join('t_serah_terima', $this->table . ".id_serah_terima = t_serah_terima.id");
        $this->db->join('t_detail_penawaran', $this->table . ".id_alat = t_detail_penawaran.id","left");
        $this->db->where("t_serah_terima.id", $id);
        // $this->datatables->where("t_detail_serah_terima.is_terima",1);

        return $this->db->get()->result();
    }

    public function get_where($where)
    {
        $this->db->select($this->_get_select());
        $this->db->from($this->table);
        $this->db->join('t_detail_penawaran', $this->table . ".id_alat = t_detail_penawaran.id","left");
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

        $data = $this->db->get()->result();
        return $data;


    }
}