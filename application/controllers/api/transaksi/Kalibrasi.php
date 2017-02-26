<?php

/**
* Created by PhpStorm.
* User: agungrizkyana
* Date: 12/29/16
* Time: 05:58
*/
class Kalibrasi extends API_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('transaksi/kalibrasi_model');
        $this->load->model('transaksi/detail_kalibrasi_model');
    }
    
    public function index()
    {
        $data = $this->kalibrasi_model->datatables();
        echo $data;
    }
    
    public function verifikasi($is_verifikasi){
        $data = json_decode($this->input->post('data'));
        $params = array(
        'id_t_kalibrasi' => $data->id_t_kalibrasi,
        'is_verifikasi' => $is_verifikasi,
        'tanggal_verifikasi' => date('Y-m-d h:i:s'),
        'keterangan' => (isset($data->keterangan)) ? $data->keterangan : '-',
        'catatan' => (isset($data->catatan)) ? $data->catatan : '-'
        );
        $response = $this->kalibrasi_model->verifikasi($params);
        echo json_encode(['response' => $response]);
    }
    
    public function search()
    {
        
        $response = $this->kalibrasi_model->get_all(10, 0, "t_serah_terima.status = 0");
        if ($this->input->get('q') || $this->input->post('q')) {
            $term = ($this->input->get('q')) ? $this->input->get('q') : $this->input->post('q');
            $response = $this->kalibrasi_model->get_by_like($term, "t_serah_terima = 0");
        }
        echo json_encode(['items' => $response]);
    }
    
    
    public function add()
    {
        $data = json_decode($this->input->post('data'));
        
        $param['id_serah_terima'] = $data->id_serah_terima;
        $param['catatan'] = $data->catatan;
        $param['created_by'] = $this->auth->userid();
        
        // insert kalibrasi
        $kalibrasi = $this->kalibrasi_model->save($param);
        
        // insert detail kalibrasi
        $detail = [];
        foreach ($data->alat as $alat) {
            $param_detail['id_kalibrasi'] = $kalibrasi->id;
            $param_detail['id_alat'] = $alat->id_alat;
            $param_detail['qty'] = $alat->qty;
            $param_detail['status'] = $alat->status;
            $param_detail['created_by'] = $this->auth->userid();
            $param_detail['file_pengolahan_data'] = $alat->file_pengolahan_data;
            
            $_detail = $this->detail_kalibrasi_model->save($param_detail);
            array_push($detail, $_detail);
        }
        echo json_encode(['response' => [
        'kalibrasi' => $kalibrasi,
        'detail' => $detail
        ]]);
    }
    
    public function deal()
    {
        if ($this->input->method('post')) {
            $id = $this->input->post('id');
            $data = $this->kalibrasi_model->deal($id);
            echo json_encode(['response' => $data]);
        } else {
            throw new Exception('Method not Allowed');
        }
    }
    
    public function view($id)
    {
        $response = $this->kalibrasi_model->view($id);
        echo json_encode(['response' => $response]);
    }
    
    public function get_detail($id_kalibrasi)
    {
        $data = $this->detail_kalibrasi_model->get_where('t_kalibrasi.id = ' . $id_kalibrasi);
        echo json_encode(['response' => $data]);
    }
    
}