<?php

/**
* Created by PhpStorm.
* User: agungrizkyana
* Date: 12/24/16
* Time: 09:07
* @konvensi : setiap fungsi dengan modifier private, diawali _ (underscore)
*/



class Item_model extends MY_Model
{
    
    // nama table nya di simpen jadi variable
    protected $table = 'm_item';
    
    public function __construct()
    {
        parent::__construct();
        $this->db->set('created_by', $this->auth->userid());      
    }
  
    public function get_all($limit = 0, $offset = 0){
        $this->db->order_by('created_at', 'desc');
        $data = $this->db->get($this->table)->result();
        
        return $data;
    }
    
    public function add($data){
        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();
        $data = $this->db->get_where($this->table, array('id' => $id))->row();
        return $data;
    }
    
    
    
    
    
}