<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/26/16
 * Time: 06:53
 */
class Verifikasi_model
{
    protected $table = 't_verifikasi';
    protected $filter_fields = array('nama', 'telepon', 'alamat', 'email');

    public function __construct()
    {
        parent::__construct();
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