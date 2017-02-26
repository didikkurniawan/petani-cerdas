<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/13/16
 * Time: 14:17
 */
class Form extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        header('Content-type: application/json');

        // load cdn library
        $this->load->library('cdn');
    }

    public function response_event()
    {
        echo json_encode(['response' => 'Ok!']);
    }

    public function submit()
    {
        if ($this->input->method('post')) {
            // cek file
            $response = $this->cdn->upload_image('file');
            if (is_array($response)) {

                $data['file'] = $response['file'];
                $data['input'] = $this->input->post();

                echo json_encode($data);
                exit;

            } else {
                throw new $response;
            }
        } else {
            throw new Exception('Method not Allowed');
        }
    }

}