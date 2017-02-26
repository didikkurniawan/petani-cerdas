<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/26/16
 * Time: 06:51
 */
class Detail_penawaran_model extends MY_Model
{
    protected $table = 't_detail_penawaran';
    protected $table_detail_serah_terima = 't_detail_serah_terima';
    protected $table_join_alat = 'm_alat';
    protected $filter_fields = array('nama', 'telepon', 'alamat', 'email');

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_select()
    {
        $select = $this->table . ".id , ";
        $select .= $this->table . ".id_penawaran, ";
        $select .= $this->table . ".nama, ";
        $select .= $this->table . ".spesifikasi, ";
        $select .= $this->table . ".qty, ";
        $select .= $this->table . ".harga, ";
        $select .= $this->table . ".order, ";
        $select .= $this->table . ".sk ";  
        // $select .= $this->table_detail_serah_terima . ".id as id_detail_serah_terima, ";
        // $select .= $this->table_detail_serah_terima . ".id_alat as alat_serah_terima ";

        return $select;
    }
    public function datatables_penawaran($id)
    {
        $this->datatables->select($this->_get_select().",m_sub_kontrak.nama as nama_kontraktor");
        $this->datatables->from($this->table);
        $this->datatables->join("m_sub_kontrak","m_sub_kontrak.id=".$this->table.".sk","left");
        $this->datatables->where("t_detail_penawaran.id_penawaran", $id);
        return $this->datatables->generate();
    }

    public function get_where($where)
    {
        $this->db->select($this->_get_select());
        $this->db->from($this->table);
        
        $this->db->where($where);

        return $this->db->get()->result();
    }

    public function datatables_update_serah_terima($id)
    {
        $this->datatables->select($this->_get_select());
        $this->datatables->from($this->table);
        $this->datatables->join($this->table_join_alat, $this->table . ".id_alat = " . $this->table_join_alat . ".id", 'left');
        $this->datatables->join('t_penawaran', 't_detail_penawaran.id_penawaran = t_penawaran.id');
        $this->datatables->join('t_serah_terima', 't_serah_terima.id_penawaran = t_penawaran.id');
        $this->datatables->join('t_detail_serah_terima', 't_detail_serah_terima.id_serah_terima = t_serah_terima.id');
        $this->datatables->where("t_detail_penawaran.id_penawaran", $id);
        $this->datatables->where("t_detail_penawaran.id_alat = t_detail_serah_terima.id_alat");
        $this->datatables->where("t_detail_serah_terima.is_terima",0);

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
}