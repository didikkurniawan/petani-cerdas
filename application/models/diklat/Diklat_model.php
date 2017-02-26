<?php

/**
* Created by PhpStorm.
* User: agungrizkyana
* Date: 12/26/16
* Time: 06:52
*/
class Diklat_model extends MY_Model
{
    protected $table = 't_diklat';
    protected $table_join_pelanggan = 'm_pelanggan';
    protected $filter_fields = array('nama');
    
    
    protected $NOT_DEAL = 0;
    protected $VISIBLE = 1;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('numbering');
        
        $this->db->set('created_by', $this->auth->userid());
    }
    
    // public function count_all()
    // {
    //     $count = $this->db->count_all($this->table);
    //     return $count;
    // }
    
    public function deal($param)
    {
        $this->db->update($this->table, array('is_deal' => 1, 'total_deal' => $param['total_deal'], 'pajak_deal' => $param['pajak_deal']), array('id' => $param['id']));
        
    }

    public function tanggalDeal($param)
    {
        $this->db->update($this->table, array('tanggal_mulai' => $param['tanggal_mulai'], 'tanggal_selesai' => $param['tanggal_selesai']), array('id' => $param['id']));
        
    }
    
    
    private function _get_select()
    {
        $select = $this->table . ".id, ";
        $select .= $this->table . ".no_diklat, ";
        $select .= $this->table . ".jenis_pelatihan, ";
        $select .= $this->table . ".nama_kegiatan, ";
        $select .= $this->table . ".jumlah_peserta, ";
        $select .= $this->table . ".jumlah_hari, ";
        $select .= $this->table . ".lokasi, ";
        $select .= $this->table . ".tarif, ";
        $select .= $this->table . ".subtotal, ";
        $select .= $this->table . ".pajak, ";
        $select .= $this->table . ".total, ";
        $select .= $this->table . ".is_deal, ";
        $select .= $this->table . ".tanggal_mulai, ";
        $select .= $this->table . ".tanggal_selesai, ";
        $select .= $this->table . ".total_deal, ";
        $select .= $this->table . ".created_at, ";
        $select .= $this->table . ".visible, ";
        $select .= $this->table_join_pelanggan . ".id as id_pelanggan, ";
        $select .= $this->table_join_pelanggan . ".nama, ";
        $select .= $this->table_join_pelanggan . ".telepon, ";
        $select .= $this->table_join_pelanggan . ".fax, ";
        $select .= $this->table_join_pelanggan . ".email, ";
        $select .= $this->table_join_pelanggan . ".alamat, ";
        return $select;
    }
    
    public function datatables()
    {
        $this->datatables->select($this->_get_select());
        $this->datatables->from($this->table);
        $this->datatables->join($this->table_join_pelanggan, $this->table . ".id_pelanggan = " . $this->table_join_pelanggan . ".id");
        $this->datatables->where($this->table . ".visible", $this->VISIBLE);
        return $this->datatables->generate();
    }
     
     
    public function add($data)
    {
        $this->db->set('no_diklat', $this->numbering->get_no_diklat());
        $this->db->insert($this->table, $data);
        
        $id = $this->db->insert_id();
        $inserted = $this->db->get_where($this->table, array('id' => $id))->row();
        
        return $inserted;
        
    }

    public function view_detail($id)
    {
        $this->db->select($this->_get_select().',m_pelatihan.nama as nama_pelatihan,m_pelatihan.id as id_pelatihan');
        $this->db->from($this->table);
        $this->db->join('m_pelatihan', $this->table . ".jenis_pelatihan = m_pelatihan.id");
        $this->db->join($this->table_join_pelanggan, $this->table . ".id_pelanggan = " . $this->table_join_pelanggan . ".id");
        $this->db->where($this->table .'.id', $id);
        $data = $this->db->get()->row();
        return $data;
    }
    
    public function update($id, $data)
    {
        $this->db->update($this->table, $data, array('id' => $id));
        
        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('id' => $id))->row();
        
        return $updated;
        
    }
    // public function save($data)
    // {
    //     $this->db->set('no_penawaran', $this->numbering->get_no_penawaran());
    //     $this->db->insert($this->table, $data);
    //     if ($this->db->affected_rows() >= 1) {
    //         $id = $this->db->insert_id();
    //         $data = $this->db->get_where($this->table, array('id' => $id))->row();
    //         return $data;
    //     } else {
    //         return null;
    //     }
    // }
    
    // public function update($id, $data)
    // {
    //     $this->db->update($this->table, $data, array('id' => $id))->row();
    //     if ($this->db->affected_rows() > 1) {
    //         $data = $this->db->get_where($this->table, array('id' => $id));
    //         return $data;
    //     } else {
    //         return null;
    //     }
        
    // }
    
    // public function view($id)
    // {
    //     $data = $this->db->get_where($this->table, array('id' => $id))->row();
    //     return $data;
    // }
    
    // public function view_detail($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from($this->table);
    //     $this->db->join($this->table_join_pelanggan,  $this->table . ".id_pelanggan = " . $this->table_join_pelanggan . ".id");
    //     $this->db->where($this->table .'.id', $id);
    //     $this->db->order_by('t_penawaran.id');
    //     $data = $this->db->get()->row();
    //     return $data;
    // }
    
    
    // public function delete($id)
    // {
    //     $this->db->update($this->table, array('visible' => 0), array('id' => $id));
    //     $deleted = $this->db->get_where($this->table, array('id' => $id))->row();
    //     return $deleted;
        
    // }
    
    // public function get_all($limit = 0, $offset = 0)
    // {
    //     $this->db->select('m_pelatihan.nama','m_pelatihan.id');
    //     $this->db->from(m_pelatihan);
    //     $this->db->limit($limit);
    //     $this->db->offset($offset);
        
    //     $data = $this->db->get()->result();
    //     console.log($data);
    //     return $data;
    // }
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
        $field_term = 'm_pelatihan.id';
        
        foreach ($this->filter_fields as $val) {
            $field_term .= ",m_pelatihan." . $val;
        }
        
        $this->db->select('m_pelatihan.nama,m_pelatihan.id');
        $this->db->from('m_pelatihan');
        $this->db->limit($limit);
        $this->db->offset($offset);
        $data = $this->db->get()->result();
        return $data;
    }

    public function get_by_like($term)
    {
        $field_term = 'm_pelatihan.id';
        
        foreach ($this->filter_fields as $val) {
            $field_term .= ",m_pelatihan." . $val;
        }
        
        $this->db->select('m_pelatihan.nama,m_pelatihan.id');
        $this->db->from('m_pelatihan');
        $this->db->where("m_pelatihan." . $this->filter_fields[0] . " LIKE '%" . $term . "%'");
        
        $data = $this->db->get()->result();
        return $data;
        
    }

    public function addPelatihan($data)
    {
        $this->db->insert('m_pelatihan', $data);
        
        $id = $this->db->insert_id();
        $inserted = $this->db->get_where('m_pelatihan', array('id' => $id))->row();
        
        return $inserted;
        
    }
    
}