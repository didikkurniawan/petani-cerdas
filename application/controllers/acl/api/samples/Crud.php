<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/13/16
 * Time: 14:17
 */
class Crud extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        header('Content-type: application/json');

        // load cdn library
        $this->load->library('cdn');

        // load model 'crud'
        $this->load->model('samples/crud_model');
    }

    public function index()
    {
        echo $this->crud_model->index();
    }

    public function add()
    {
        if ($this->input->method('post')) {
            $data = $this->crud_model->add(array(
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'contact_person' => $this->input->post('contact_person'),
                'alamat' => $this->input->post('alamat'),
                'visible' => 1,
                'created_by' => $this->auth->userid()
            ));

            
            // echo json_encode($this->crud_model->add(array(
            //     'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            //     'contact_person' => $this->input->post('contact_person'),
            //     'alamat' => $this->input->post('alamat'),
            //     'visible' => 1,
            //     'created_by' => $this->auth->userid()
            // )));

            echo json_encode($data);
        } else {
            throw new Exception('Method not Allowed');
        }

    }

    public function update($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->crud_model->update($id, array(
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'contact_person' => $this->input->post('contact_person'),
                'alamat' => $this->input->post('alamat'),
                'updated_by' => $this->auth->userid(),
                'updated_at' => date('Y-m-d h:i:s')
            )));
        } else {
            throw new Exception('Method not Allowed');
        }
    }

    public function view($id)
    {
        if ($this->input->method('get')) {
            echo json_encode($this->crud_model->view($id));
        } else {
            throw new Exception('Method not Allowed');
        }
    }

    public function delete($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->crud_model->delete($id));
        } else {
            throw new Exception('Method not Allowed');
        }
    }

}