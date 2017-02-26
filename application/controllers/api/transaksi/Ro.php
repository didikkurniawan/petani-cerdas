<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/29/16
 * Time: 05:58
 */
class Ro extends API_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('transaksi/ro_model');
        $this->load->model('transaksi/detail_ro_model');
    }

    public function index()
    {
        $data = $this->ro_model->datatables();
        echo $data;
    }
    public function detail_ro($id)
    {
        $data = $this->detail_ro_model->datatables_ro($id);
        echo $data;
    }


    public function search($deal = 0)
    {

        $response = $this->ro_model->get_all(10, 0, $deal);
        if ($this->input->get('q') || $this->input->post('q')) {
            $term = ($this->input->get('q')) ? $this->input->get('q') : $this->input->post('q');
            $response = $this->ro_model->get_by_like($term, $deal);
        }
        echo json_encode(['items' => $response]);
    }


    public function add()
    {
        $data = $this->input->post();
        $param = $data;

        unset($param['ro']);


        // insert kalibrasi
        $ro = $this->ro_model->save($param);

        // insert detail kalibrasi
        $detail = [];
        foreach ($data['ro'] as $val) {
            $temp = array();
            $temp = $val;
            $temp['created_by'] = $this->auth->userid();
            $temp['id_ro'] = $ro->id;
            
            $_detail = $this->detail_ro_model->save($temp);
            array_push($detail, $_detail);
        }
        echo json_encode(['response' => [
            'ro' => $ro,
            'detail' => $detail
        ]]);
    }

     public function update($id)
    {
        $data = $this->input->post();
        $param = $data;

        unset($param['ro']);


        // insert kalibrasi
        $ro = $this->ro_model->save($param);

        // insert detail kalibrasi
        $detail = [];
        foreach ($data['ro'] as $val) {
            $temp = array();
            $temp = $val;
            $temp['created_by'] = $this->auth->userid();
            $temp['id_ro'] = $ro->id;
            
            $_detail = $this->detail_ro_model->save($temp);
            array_push($detail, $_detail);
        }
        echo json_encode(['response' => [
            'ro' => $ro,
            'detail' => $detail
        ]]);
    }




    // public function update()
    // {
    //     $data = $this->input->post();
    //     $param = $data;

    //     unset($param['ro']);


    //     // insert kalibrasi
    //     $ro = $this->ro_model->save($param);

    //     // insert detail kalibrasi
    //     $detail = [];
    //     foreach ($data['ro'] as $val) {
    //         $temp = array();
    //         $temp = $val;
    //         $temp['created_by'] = $this->auth->userid();
    //         $temp['id_ro'] = $ro->id;
            
    //         $_detail = $this->detail_ro_model->save($temp);
    //         array_push($detail, $_detail);
    //     }
    //     echo json_encode(['response' => [
    //         'ro' => $ro,
    //         'detail' => $detail
    //     ]]);
    // }

    

    

    public function deal()
    {
        if ($this->input->method('post')) {
            $id = $this->input->post('id');
            $data = $this->ro_model->deal($id);
            echo json_encode(['response' => $data]);
        } else {
            throw new Exception('Method not Allowed');
        }
    }

    public function view($id)
    {
        $response = $this->ro_model->view($id);
        echo json_encode(['response' => $response]);
    }

    public function get_detail($id_serah_terima)
    {
        $data = $this->detail_ro_model->get_where('t_ro.id_serah_terima = ' . $id_serah_terima);
        echo json_encode(['response' => $data]);
    }

    public function delete($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->ro_model->delete($id));
        } else {
            throw new Exception('Method not Allowed');
        }
    }

    public function delete_item($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->detail_ro_model->delete($id));
        } else {
            throw new Exception('Method not Allowed');
        }
    }
    public function update_item($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->detail_ro_model->update($id, array(
            'item' => $this->input->post('nama'),
            'nominal' => $this->input->post('nominal'),
            'keterangan' => $this->input->post('keterangan'),
            'updated_by' => $this->auth->userid(),
            'updated_at' => date('Y-m-d h:i:s')
            )));
        } else {
            throw new Exception('Method not Allowed');
        }
    }


    

  
    

}