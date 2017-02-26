<?php

/**
* Created by PhpStorm.
* User: agungrizkyana
* Date: 12/29/16
* Time: 05:58
*/
class Pengaduan_customer extends API_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('pengaduan/pengaduan_customer_model');
        $this->load->model('auth/user_model');
    }
    
    public function index()
    {
        $data = $this->pengaduan_customer_model->datatables();
        echo $data;
    }


     public function add()
    {
        if ($this->input->method('post')) {
            $data = $this->pengaduan_customer_model->add(array(
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_pengaduan' => $this->input->post('id_pengaduan'),
            'urgensi' => $this->input->post('urgensi'),
            'pesan' => $this->input->post('pesan'),
            'penanganan' => 0,
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
            echo json_encode($this->pengaduan_customer_model->delete($id));
        } else {
            throw new Exception('Method not Allowed');
        }
    }
    public function update($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->pengaduan_customer_model->update($id, array(
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_pengaduan' => $this->input->post('id_pengaduan'),
            'urgensi' => $this->input->post('urgensi'),
            'pesan' => $this->input->post('pesan'),
            'updated_by' => $this->auth->userid(),
            'updated_at' => date('Y-m-d h:i:s')
            )));
        } else {
            throw new Exception('Method not Allowed');
        }
    }
    public function update_penanganan($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->pengaduan_customer_model->update_penanganan($id, array(
            'keterangan' => $this->input->post('keterangan'),
            'id_petugas' => $this->input->post('nama_petugas'),
            'penanganan' => $this->input->post('penanganan'),
            'updated_by' => $this->auth->userid(),
            'updated_at' => date('Y-m-d h:i:s')
            )));
        } else {
            throw new Exception('Method not Allowed');
        }
    }
    
    public function search()
    {
        $response = $this->user_model->get_all(10, 0);
        if ($this->input->get('q') || $this->input->post('q')) {
            $term = ($this->input->get('q')) ? $this->input->get('q') : $this->input->post('q');
            $response = $this->user_model->get_by_like($term);
        }
        echo json_encode(['items' => $response]);
    }
    
}