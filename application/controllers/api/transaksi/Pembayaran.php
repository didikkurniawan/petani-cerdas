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
        $this->load->model('transaksi/penawaran_model');
        $this->load->model('transaksi/serah_terima_model');
        $this->load->model('transaksi/detail_penawaran_model');
    }
    
    public function update($id){
        $data = $this->input->post();
        $response = $this->pembayaran_model->update($data, $id);
        echo json_encode($response);
    }
    
    public function index(){
        $data = $this->pembayaran_model->datatables();
        echo $data;
    }
    
    public function view($id){
        $data = $this->pembayaran_model->view($id);
        echo json_encode($data);
    }
    
    public function get_list_order($id_order){
        $data = $this->pembayaran_model->get_list_order($id_order);
        $serah_terima = $this->serah_terima_model->view($id_order);
        $penawaran = $this->penawaran_model->view($serah_terima->id_penawaran);
        $detail_penawaran = $this->detail_penawaran_model->get_where("t_detail_penawaran.id_penawaran = " . $penawaran->id);
        echo json_encode(['response' => $detail_penawaran, 'total_deal' => $penawaran->total_deal]);
    }

    public function get_alamat_customer(){
        $id_pembayaran = $this->input->get('id_pembayaran');
        $alamat = $this->input->get('alamat');
        $data = $this->pembayaran_model->get_alamat_customer($id_pembayaran, $alamat);
        echo json_encode(['response' => $data]);
    }
    
    
    
}