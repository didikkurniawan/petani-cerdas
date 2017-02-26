<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/26/16
 * Time: 07:26
 */
class Pengaduan extends API_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/pengaduan_model');
    }
    
    public function index(){
        $data = $this->pengaduan_model->datatables();
        echo $data;
    }

    public function add()
    {
        if ($this->input->method('post')) {
            $data = $this->pengaduan_model->add(array(
            'nama' => $this->input->post('nama'),
            'keterangan' => $this->input->post('keterangan'),
            'visible' => 1,
            'created_by' => $this->auth->userid()
            ));
            
            echo json_encode($data);
        } else {
            throw new Exception('Method not Allowed');
        }
        
    }


    public function save()
    {
        if ($this->input->method('post')) {
            $data = $this->input->post();
            $response = $this->pengaduan_model->save($data);
            if ($response) {
                echo json_encode(['response' => $response]);
            } else {
                throw new Exception('Null');
            }
        } else {
            throw new Exception('Method not allowed');
        }
    }

   public function update($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->pengaduan_model->update($id, array(
            'nama' => $this->input->post('nama'),
            'keterangan' => $this->input->post('keterangan'),
            'updated_by' => $this->auth->userid(),
            'updated_at' => date('Y-m-d h:i:s')
            )));
        } else {
            throw new Exception('Method not Allowed');
        }
    }

    public function view($id)
    {
        $response = $this->pengaduan_model->view($id);
        echo json_encode(['response' => $response]);
    }

     public function delete($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->pengaduan_model->delete($id));
        } else {
            throw new Exception('Method not Allowed');
        }
    }

    public function search()
    {
        $response = $this->pengaduan_model->get_all(10, 0);
        if ($this->input->get('q') || $this->input->post('q')) {
            $term = ($this->input->get('q')) ? $this->input->get('q') : $this->input->post('q');
            $response = $this->pengaduan_model->get_by_like($term);
        }
        echo json_encode(['items' => $response]);
    }

}