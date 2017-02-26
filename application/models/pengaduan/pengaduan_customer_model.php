<?php

/**
* Created by PhpStorm.
* User: agungrizkyana
* Date: 12/26/16
* Time: 06:52
*/
class Pengaduan_customer_model extends MY_Model
{
    protected $table = 't_pengaduan';
    protected $table_join_pelanggan = 'm_pelanggan';
    protected $table_join_jenis_pengaduan = 'm_pengaduan';
    // protected $filter_fields = array('nama', 'telepon', 'alamat', 'email');
    
    
    // protected $NOT_DEAL = 0;
    // protected $VISIBLE = 1;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->db->set('created_by', $this->auth->userid());
    }
    
    // public function verifikasi($params){
        
    //     // update status verifikasi t_kalibrasi
    //     $this->db->update($this->table, array('is_verifikasi_pengolahan_data' => $params['is_verifikasi']), array('id' => $params['id_t_kalibrasi']));
        
    //     $this->db->insert($this->table_join_verifikasi, $params);
    //     $id = $this->db->insert_id();
    //     $data = $this->db->get_where($this->table_join_verifikasi, array('id' => $id))->row();
    //     return $data;
    // }
    
    // public function count_all()
    // {
    //     $count = $this->db->count_all($this->table);
    //     return $count;
    // }
    
    // public function deal($id)
    // {
    //     $this->db->update($this->table, array('is_deal' => 1), array('id' => $id));
    //     $data = $this->db->get_where($this->table, array('id' => $id))->row();
    //     return $data;
    // }
    
    private function _get_select()
    {
        $select = $this->table . ".id, ";
        $select .= $this->table . ".urgensi, ";
        $select .= $this->table . ".pesan, ";
        $select .= $this->table . ".penanganan, ";
        $select .= $this->table . ".created_at, ";
        
        $select .= $this->table_join_jenis_pengaduan . ".id as id_jenis_pengaduan, ";
        $select .= $this->table_join_jenis_pengaduan . ".nama as nama_pengaduan, ";
        
        $select .= $this->table_join_pelanggan . ".id as id_pelanggan, ";
        $select .= $this->table_join_pelanggan . ".nama, ";
        $select .= $this->table_join_pelanggan . ".telepon, ";
        $select .= $this->table_join_pelanggan . ".fax, ";
        $select .= $this->table_join_pelanggan . ".email, ";
        $select .= $this->table_join_pelanggan . ".alamat, ";
        // $select .= "CONCAT(" . $this->table_join_serah_terima . ".no_order" . ", ' / ', " . $this->table_join_pelanggan . ".nama" . ") as nama_pelanggan";
        
        return $select;
    }
    
    public function datatables()
    {
        $this->datatables->select($this->_get_select());
        $this->datatables->from($this->table);
        $this->datatables->join($this->table_join_jenis_pengaduan, $this->table.".id_pengaduan = ".$this->table_join_jenis_pengaduan.".id", 'left');
        $this->datatables->join($this->table_join_pelanggan, $this->table.".id_pelanggan = ".$this->table_join_pelanggan.".id", 'left');
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
    public function view_detail($id)
    {
        $this->db->select($this->_get_select());
        $this->db->from($this->table);
        $this->db->join($this->table_join_jenis_pengaduan, $this->table.".id_pengaduan = ".$this->table_join_jenis_pengaduan.".id", 'left');
        $this->db->join($this->table_join_pelanggan, $this->table.".id_pelanggan = ".$this->table_join_pelanggan.".id", 'left');
        $this->db->where($this->table .'.id', $id);
        $this->db->order_by($this->table. '.id');
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
        $this->db->update($this->table, $data, array('id' => $id));
        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('id' => $id))->row();
        
        return $updated;
        
    }

    public function update_penanganan($id, $data)
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
    
    public function get_all($limit = 0, $offset = 0, $where = "")
    {
        
        $this->db->select($this->_get_select());
        $this->db->from($this->table);
        $this->db->join($this->table_join_serah_terima, $this->table.".id_serah_terima = ". $this->table_join_serah_terima.".id", "left");
        $this->db->join($this->table_join_penawaran, $this->table_join_serah_terima.".id_penawaran = " . $this->table_join_penawaran . ".id", "left");
        $this->db->join($this->table_join_pelanggan, $this->table_join_penawaran.".id_pelanggan = " . $this->table_join_pelanggan.".id", "left");
        
        if($where != ""){
            $this->db->where($where);
        }
        
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