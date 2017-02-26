<?php

/**
* Created by PhpStorm.
* User: agungrizkyana
* Date: 12/29/16
* Time: 05:58
*/
class Sertifikat extends API_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('transaksi/sertifikat_model');
        $this->load->model('transaksi/kalibrasi_model');
        $this->load->model('transaksi/serah_terima_model');
        $this->load->model('transaksi/detail_kalibrasi_model');
        
    }
    
    public function index()
    {
        $data = $this->sertifikat_model->datatables();
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
        $response = $this->sertifikat_model->verifikasi($params);
        echo json_encode(['response' => $response]);
    }
    
    public function search()
    {
        
        $response = $this->sertifikat_model->get_all(10, 0);
        if ($this->input->get('q') || $this->input->post('q')) {
            $term = ($this->input->get('q')) ? $this->input->get('q') : $this->input->post('q');
            $response = $this->sertifikat_model->get_by_like($term);
        }
        echo json_encode(['items' => $response]);
    }
    
    
    public function add()
    {
        $data = json_decode($this->input->post('data'));
        $sertifikat = $this->sertifikat_model->add($data);
        
        $kalibrasi = $this->kalibrasi_model->update($data->id_t_kalibrasi, array(
        'is_verifikasi_draft_sertifikat' => 1
        ));
        
        
        foreach($data->files as $val){
            $this->detail_kalibrasi_model->update($val->id, array('file_sertifikat' => $val->file));
        }
        
        echo json_encode(['response' => array(
        'draft' => $sertifikat,
        'kalibrasi' => $kalibrasi
        )]);
    }
    
    public function setujui()
    {
        $data = json_decode($this->input->post('data'));
        $sertifikat = $this->sertifikat_model->add($data);
        
        
        $kalibrasi = $this->kalibrasi_model->update($data->id_t_kalibrasi, array(
        'is_verifikasi_sertifikat' => 1
        ));
        
        $serah_terima = $this->serah_terima_model->update($kalibrasi->id_serah_terima, array(
        'status' => -1
        ));
        
        echo json_encode(['response' => array(
        'sertifikat' => $sertifikat,
        'kalibrasi' => $kalibrasi
        )]);
    }
    
    public function deal()
    {
        if ($this->input->method('post')) {
            $id = $this->input->post('id');
            $data = $this->sertifikat_model->deal($id);
            echo json_encode(['response' => $data]);
        } else {
            throw new Exception('Method not Allowed');
        }
    }
    
    public function view($id)
    {
        $response = $this->sertifikat_model->view($id);
        echo json_encode(['response' => $response]);
    }
    
    public function get_detail($id_kalibrasi)
    {
        $data = $this->detail_sertifikat_model->get_where('t_kalibrasi.id = ' . $id_kalibrasi);
        echo json_encode(['response' => $data]);
    }
    
    public function get_by_kalibrasi($id_kalibrasi){
        $data = $this->sertifikat_model->get_by_kalibrasi($id_kalibrasi);
        echo json_encode(['response' => $data]);
    }
    
}