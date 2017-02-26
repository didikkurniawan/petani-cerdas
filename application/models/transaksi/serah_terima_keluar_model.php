<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/26/16
 * Time: 06:52
 */
class Serah_terima_keluar_model extends MY_Model
{
    protected $table = 't_serah_terima_keluar';
    protected $table_join_pelanggan = 'm_pelanggan';
    protected $table_join_penawaran = 't_penawaran';
    protected $filter_fields = array('nama', 'telepon', 'alamat', 'email');


    protected $NOT_DEAL = 0;
    protected $VISIBLE = 1;

    public function __construct()
    {
        parent::__construct();
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
        $select .= $this->table . ".visible, ";
        $select .= $this->table . ".created_at, ";
        $select .= $this->table . ".no_order, ";
        $select .= $this->table . ".jenis_order, ";
        $select .= $this->table_join_penawaran . ".no_penawaran, ";
        $select .= $this->table_join_penawaran . ".sub_total, ";
        $select .= $this->table_join_penawaran . ".pajak, ";
        $select .= $this->table_join_penawaran . ".diskon, ";
        $select .= $this->table_join_penawaran . ".created_at as tanggal_penawaran, ";
        $select .= $this->table_join_penawaran . ".total, ";
        $select .= $this->table_join_penawaran . ".total_deal, ";
        $select .= $this->table_join_penawaran . ".is_deal, ";
        $select .= $this->table_join_pelanggan . ".id as id_pelanggan, ";
        $select .= $this->table_join_pelanggan . ".nama, ";
        $select .= $this->table_join_pelanggan . ".telepon, ";
        $select .= $this->table_join_pelanggan . ".fax, ";
        $select .= $this->table_join_pelanggan . ".email, ";
        $select .= $this->table_join_pelanggan . ".alamat, ";
        $select .= "CONCAT(" . $this->table . ".no_order" . ", ' / ', " . $this->table_join_pelanggan . ".nama" . ") as nama_pelanggan";
        return $select;
    }

    public function datatables()
    {
        $this->datatables->select($this->_get_select());
        $this->datatables->from($this->table);
        $this->datatables->join($this->table_join_penawaran, $this->table . ".id_penawaran = " . $this->table_join_penawaran . ".id", 'left');
        $this->datatables->join($this->table_join_pelanggan, $this->table_join_penawaran . ".id_pelanggan = " . $this->table_join_pelanggan . ".id", 'left');
        $this->datatables->where($this->table . ".visible", $this->VISIBLE);
//        $this->datatables->where($this->table.".is_deal", $this->NOT_DEAL);
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
        if ($this->db->affected_rows() > 1) {
            $data = $this->db->get_where($this->table, array('id' => $id))->row();
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

    public function view_detail($id)
    {
        $this->db->select($this->_get_select());
        $this->db->from($this->table);
        $this->db->join($this->table_join_penawaran, $this->table . ".id_penawaran = " . $this->table_join_penawaran . ".id", 'left');
        $this->db->join($this->table_join_pelanggan, $this->table_join_penawaran . ".id_pelanggan = " . $this->table_join_pelanggan . ".id", 'left');
        $this->db->where($this->table .'.id', $id);
        $this->db->order_by('t_penawaran.id');
        $data = $this->db->get()->row();
        return $data;
    }


    public function delete($id)
    {
        $this->db->update($this->table, array('visible' => 0), array('id' => $id));
        $deleted = $this->db->get_where($this->table, array('id' => $id))->row();
        return $deleted;
    }

    public function get_all($limit = 0, $offset = 0, $where = "")
    {
        $this->db->select($this->_get_select());
        $this->db->from($this->table);
        $this->db->join($this->table_join_penawaran, $this->table . ".id_penawaran = " . $this->table_join_penawaran . ".id", 'left');
        $this->db->join($this->table_join_pelanggan, $this->table_join_penawaran . ".id_pelanggan = " . $this->table_join_pelanggan . ".id", 'left');
        $this->db->where($this->table . ".visible", $this->VISIBLE);
        
        if($where != ""){
            $this->db->where($where);
        }

        $this->db->limit($limit);
        $this->db->offset($offset);
        $data = $this->db->get()->result();
        return $data;
    }

    public function get_by_like($term, $where = "")
    {
        $this->db->select($this->_get_select());
        $this->db->from($this->table);
        $this->db->join($this->table_join_penawaran, $this->table . ".id_penawaran = " . $this->table_join_penawaran . ".id", 'left');
        $this->db->join($this->table_join_pelanggan, $this->table_join_penawaran . ".id_pelanggan = " . $this->table_join_pelanggan . ".id", 'left');
        $this->db->where($this->table . ".visible", $this->VISIBLE);
        
        if($where != ""){
            $this->db->where($where);
        }

        $this->db->where($this->table_join_pelanggan . ".nama LIKE '%" . $term . "%' ");
        $this->db->or_where($this->table . ".no_order LIKE '%" . $term . "%' ");
        $data = $this->db->get()->result();
        return $data;


    }
}