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
        $data = json_decode($this->input->post('data'));

        $param['id_serah_terima'] = $data->id_serah_terima;
        $param['catatan'] = $data->catatan;
        $param['created_by'] = $this->auth->userid();


        // insert kalibrasi
        $ro = $this->ro_model->save($param);

        // insert detail kalibrasi
        $detail = [];
        foreach ($data->ro as $val) {
            $temp = new stdClass;
            $temp = $val;
            $temp->created_by = $this->auth->userid();
            $temp->id_ro = $ro->id;
            $val = $temp;
            $_detail = $this->detail_ro_model->save($val);
            array_push($detail, $_detail);
        }
        echo json_encode(['response' => [
            'ro' => $ro,
            'detail' => $detail
        ]]);
    }

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

}