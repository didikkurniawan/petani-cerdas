<?php

/**
* Created by PhpStorm.
* User: agungrizkyana
* Date: 12/24/16
* Time: 09:09
*/
class Alat extends API_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('master/alat_model');
    }
    
    public function index()
    {
        $data = $this->alat_model->datatables();
        echo $data;
    }
    
    // bagian ini untuk pencarian , jangan di hapus dik
    
    public function search($limit = 0, $offset = 0)
    {
        $data = $this->alat_model->get_all($limit, $offset, "scope = 'ORD'");
        $response = ['response' => $data];
        
        $term = $this->input->get('q');
        if($term){
            $data = $this->alat_model->get_by_like($term);
            $response = ['items' => $data];
        }
        
        echo json_encode($response);
    }
    
    public function get_by_id($id)
    {
        if ($this->input->is_ajax_request() && $this->input->method('post')) {
            $data = $this->alat_model->get_by_id($id);
            echo json_encode(['response' => $data]);
        } else {
            throw new Exception('Method not Allowed');
        }
    }
    
    // - sampai sini
    
    public function add()
    {
        if ($this->input->method('post')) {
            $data = $this->alat_model->add(array(
            'bidang' => $this->input->post('bidang'),
            'nama' => $this->input->post('nama_barang'),
            'spesifikasi' => $this->input->post('spesifikasi'),
            'harga' => $this->input->post('harga'),
            'scope' => $this->input->post('scope'),
            'visible' => 1,
            'created_by' => $this->auth->userid()
            ));
            
            echo json_encode($data);
        } else {
            throw new Exception('Method not Allowed');
        }
        
    }
    public function delete($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->alat_model->delete($id));
        } else {
            throw new Exception('Method not Allowed');
        }
    }
    public function update($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->alat_model->update($id, array(
            'bidang' => $this->input->post('bidang'),
            'nama' => $this->input->post('nama_barang'),
            'spesifikasi' => $this->input->post('spesifikasi'),
            'harga' => $this->input->post('harga'),
            'scope' => $this->input->post('scope'),
            'updated_by' => $this->auth->userid(),
            'updated_at' => date('Y-m-d h:i:s')
            )));
        } else {
            throw new Exception('Method not Allowed');
        }
    }
    
}