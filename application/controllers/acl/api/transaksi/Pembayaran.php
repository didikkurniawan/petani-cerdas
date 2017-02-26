<?php

/**
* Created by PhpStorm.
* User: agungrizkyana
* Date: 12/29/16
* Time: 05:58
*/
class Pembayaran extends API_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi/pembayaran_model');
    }

    public function get_list_order($id_order){
      $data = $this->pembayaran_model->get_list_order($id_order);
      echo json_encode(['response' => $data]);
    }
    
    
    
}