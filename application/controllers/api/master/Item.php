<?php

/**
* Created by PhpStorm.
* User: agungrizkyana
* Date: 12/24/16
* Time: 09:09
*/
class Item extends API_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/item_model');
    }

    public function index(){
      $data = $this->item_model->get_all(0,0);
      echo json_encode(['response' => $data]);
    }
    
    public function add(){
      $data = $this->item_model->add($this->input->post());
      echo json_encode(['response' => $data]);
    }


    
}