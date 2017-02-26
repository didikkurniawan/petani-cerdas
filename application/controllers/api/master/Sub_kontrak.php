<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/26/16
 * Time: 07:26
 */
class Sub_kontrak extends API_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/sub_kontrak_model');
    }
    
    public function index(){
        $data = $this->sub_kontrak_model->datatables();
        echo $data;
    }

    public function add()
    {
        if ($this->input->method('post')) {
            $data = $this->sub_kontrak_model->add(array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'up' => $this->input->post('up'),
            'contact_person' => $this->input->post('contact_person'),
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
            $response = $this->sub_kontrak_model->save($data);
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
            echo json_encode($this->sub_kontrak_model->update($id, array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'up' => $this->input->post('up'),
            'contact_person' => $this->input->post('contact_person'),
            'updated_by' => $this->auth->userid(),
            'updated_at' => date('Y-m-d h:i:s')
            )));
        } else {
            throw new Exception('Method not Allowed');
        }
    }

    public function view($id)
    {
        $response = $this->sub_kontrak_model->get_by_id($id);
        echo json_encode(['response' => $response]);
    }

     public function delete($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->sub_kontrak_model->delete($id));
        } else {
            throw new Exception('Method not Allowed');
        }
    }

    public function search()
    {
        $response = $this->sub_kontrak_model->get_all(10, 0);
        if ($this->input->get('q') || $this->input->post('q')) {
            $term = ($this->input->get('q')) ? $this->input->get('q') : $this->input->post('q');
            $response = $this->sub_kontrak_model->get_by_like($term);
        }
        echo json_encode(['items' => $response]);
    }

}