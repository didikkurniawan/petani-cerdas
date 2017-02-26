<?php

/**
* Created by PhpStorm.
* User: agungrizkyana
* Date: 12/29/16
* Time: 05:58
*/
class Serah_terima extends API_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('transaksi/serah_terima_model');
        $this->load->model('transaksi/detail_serah_terima_model');
        
        $this->load->model('transaksi/penawaran_model');
        
        $this->load->library('numbering');
    }
    
    public function index()
    {
        $data = $this->serah_terima_model->datatables();
        echo $data;
    }
    
    public function serah_terima_detail($id)
    {
        $data = $this->detail_serah_terima_model->datatables_serah_terima($id);
        echo $data;
    }
    
    public function serah_terima_update($id)
    {
        $data = $this->detail_serah_terima_model->update_serah_terima($id);
        echo json_encode(['response' => $data]);
    }
    
    public function search()
    {
        $response = $this->serah_terima_model->get_all(10, 0, "t_serah_terima.status = 0"); // Cek kalo order sudah selesai jangan di tampilkan
        if ($this->input->get('q') || $this->input->post('q')) {
            $term = ($this->input->get('q')) ? $this->input->get('q') : $this->input->post('q');
            $response = $this->serah_terima_model->get_by_like(trim($term), "t_serah_terima.status = 0");
        }
        echo json_encode(['items' => $response]);
    }
    
    public function search_unpaid()
    {
        $response = $this->serah_terima_model->get_all(10, 0, "t_serah_terima.status = -1"); // Cek kalo order sudah selesai tapi belum bayar
        if ($this->input->get('q') || $this->input->post('q')) {
            $term = ($this->input->get('q')) ? $this->input->get('q') : $this->input->post('q');
            $response = $this->serah_terima_model->get_by_like(trim($term), "t_serah_terima.status = 0");
        }
        echo json_encode(['items' => $response]);
    }
    
    public function add()
    {
        $data = $this->input->post();
        
        $ord = [];
        $ordn = [];
        $sk = [];
        
        $jenis_ord = FALSE;
        $jenis_ordn = FALSE;
        $jenis_sk = FALSE;
        
        $serah_terima_ord = null;
        $serah_terima_ordn = null;
        $serah_terima_sk = null;
        
        $_detail_ord = null;
        $_detail_ordn = null;
        $_detail_sk = null;
        
        $penawaran = $this->penawaran_model->view($data['id_penawaran']);
        
        
        
        // insert detail penawaran
        $detail = [];
        foreach ($data['alat'] as $alat) {
            
            if($alat['order'] == 'ord'){
                array_push($ord, $alat);
                $jenis_ord = TRUE;
            }else if($alat['order'] == 'ord-n'){
                array_push($ordn, $alat);
                $jenis_ordn = TRUE;
            }else {
                array_push($sk, $alat);
                $jenis_sk = TRUE;
            }
            
            
            
        }
        
        if($jenis_ord) {
            $param['id_penawaran'] = $data['id_penawaran'];
            $param['no_order'] = $this->numbering->get_no_order(strtolower('ord'));
            $param['jenis_order'] = 'ord';
            $param['created_by'] = $this->auth->userid();
            
            // insert serah terima
            $serah_terima_ord = $this->serah_terima_model->save($param);
        }
        
        if($jenis_ordn){
            $param['id_penawaran'] = $data['id_penawaran'];
            $param['no_order'] = $this->numbering->get_no_order(strtolower('ord-n'));
            $param['jenis_order'] = 'ord-n';
            $param['created_by'] = $this->auth->userid();
            
            // insert serah terima
            $serah_terima_ordn = $this->serah_terima_model->save($param);
        }
        
        if($jenis_sk){
            $param['id_penawaran'] = $data['id_penawaran'];
            $param['no_order'] = $this->numbering->get_no_order(strtolower('sk'));
            $param['jenis_order'] = 'sk';
            $param['created_by'] = $this->auth->userid();
            
            // insert serah terima
            $serah_terima_sk = $this->serah_terima_model->save($param);
        }
        
        // simpan ord
        foreach($ord as $alat_ord){
            $param_detail['id_serah_terima'] = $serah_terima_ord->id;
            $param_detail['id_alat'] = $alat_ord['id'];
            $param_detail['qty'] = $alat_ord['qty'];
            $param_detail['is_terima'] = $alat_ord['is_terima'];
            $param_detail['visible'] = 1;
            $param_detail['created_by'] = $this->auth->userid();
            
            $_detail_ord = $this->detail_serah_terima_model->save($param_detail);
            
        }
        
        // simpan ordn
        foreach($ordn as $alat_ordn){
            $param_detail['id_serah_terima'] = $serah_terima_ordn->id;
            $param_detail['id_alat'] = $alat_ordn['id'];
            $param_detail['qty'] = $alat_ordn['qty'];
            $param_detail['is_terima'] = $alat_ordn['is_terima'];
            $param_detail['visible'] = 1;
            $param_detail['created_by'] = $this->auth->userid();
            
            $_detail_ordn = $this->detail_serah_terima_model->save($param_detail);
        }
        
        // simpan sk
        foreach($sk as $alat_sk){
            $param_detail['id_serah_terima'] = $serah_terima_sk->id;
            $param_detail['id_alat'] = $alat_sk['id'];
            $param_detail['qty'] = $alat_sk['qty'];
            $param_detail['is_terima'] = $alat_sk['is_terima'];
            $param_detail['visible'] = 1;
            $param_detail['created_by'] = $this->auth->userid();
            
            $_detail_sk = $this->detail_serah_terima_model->save($param_detail);
        }
        
        
        echo json_encode(['response' => [
        'serah_terima' => array('ord' => $serah_terima_ord, 'ord-n' => $serah_terima_ordn, 'sk' => $serah_terima_sk),
        'detail' => array('detail_ord' => $_detail_ord, 'detail_ordn' => $_detail_ordn, 'detail_sk' => $_detail_sk)
        ]]);
    }
    
    
    public function update($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->detail_serah_terima_model->update($id, array(
            'qty' => $this->input->post('qty'),
            'is_terima' => 1,
            'updated_by' => $this->auth->userid(),
            'updated_at' => date('Y-m-d h:i:s')
            )));
        } else {
            throw new Exception('Method not Allowed');
        }
    }
    
    
    public function update_transaksi(){
        if($this->input->method('post')){
            $data = $this->serah_terima_model->update_transaksi();
            echo json_encode(['response' => $data]);
        }else{
            throw new Exception('Method not Allowed');
        }
    }
    
    
    
    public function get_detail($id_serah_terima)
    {
        $data = $this->detail_serah_terima_model->get_where('t_detail_serah_terima.id_serah_terima = ' . $id_serah_terima);
        
        $mapped_data = [];
        foreach($data as $val){
            $obj = new stdClass();
            $obj = $val;
            
            if(!empty($obj->data)){
                
                $selesai = 0;
                
                $kalibrasi = json_decode($obj->data);
                
                foreach($kalibrasi as $item_kalibrasi){
                    if($item_kalibrasi->tindakan == 'selesai'){
                        $selesai ++ ;
                    }
                }
                
                if($selesai == $obj->qty){
                    $obj->status_kalibrasi = 1;
                }else{
                    $obj->status_kalibrasi = 0;
                }
            }
            
            array_push($mapped_data, $obj);
            
        }
        
        echo json_encode(['response' => $mapped_data]);
    }
    
    public function delete($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->serah_terima_model->delete($id));
        } else {
            throw new Exception('Method not Allowed');
        }
    }
    
    public function update_detail($id){
        if($this->input->method('post')){
            $this->db->update('t_detail_serah_terima', array('data'=>json_encode($this->input->post('data'))), array('id'=>$id));
            $data = $this->db->get_where('t_detail_serah_terima', array('id' => $id))->row();
            echo json_encode($data);
        }else{
            throw new Exception('Method not Allowed');
        }
    }
}