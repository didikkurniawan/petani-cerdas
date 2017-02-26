<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/29/16
 * Time: 05:58
 */
class Penawaran_biaya extends API_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('transaksi/penawaran_model');
        $this->load->model('transaksi/detail_penawaran_model');

        $this->load->library('numbering');
    }

    public function index()
    {
        $data = $this->penawaran_model->datatables();
        echo $data;
    }

    public function penawaran_detail($id)
    {
        $data = $this->detail_penawaran_model->datatables_penawaran($id);
        echo $data;
    }

    public function search($deal = 0)
    {

        $response = $this->penawaran_model->get_all(10, 0, $deal);
        if ($this->input->get('q') || $this->input->post('q')) {
            $term = ($this->input->get('q')) ? $this->input->get('q') : $this->input->post('q');
            $response = $this->penawaran_model->get_by_like($term, $deal);
        }
        echo json_encode(['items' => $response]);
    }


    public function add()
    {
        $data = $this->input->post();
        $param = $data;

        echo json_encode($data); exit;

        unset($param['alat']);
        // insert penawaran
        $penawaran = $this->penawaran_model->save($param);
        

        // insert detail penawaran
        $detail = [];
        foreach ($data['alat'] as $alat) {
            $param_detail = $alat;
            if($alat['order'] == 'sk') $param_detail['sk'] = $alat['sk']['id'];
            $param_detail['id_penawaran'] = $penawaran->id;
            $param_detail['created_by'] = $this->auth->userid();

            $_detail = $this->detail_penawaran_model->save($param_detail);
            array_push($detail, $_detail);
        }
        echo json_encode(['response' => [
            'penawaran' => $penawaran,
            'detail' => $detail
        ]]);
    }

    public function deal()
    {
        if ($this->input->method('post')) {
            $param = $this->input->post();

            $data = $this->penawaran_model->deal($param);
            echo json_encode(['response' => $data]);
        } else {
            throw new Exception('Method not Allowed');
        }
    }

    public function view($id)
    {
        $response = $this->penawaran_model->view($id);
        echo json_encode(['response' => $response]);
    }

    public function get_detail($id_penawaran)
    {
        
        $data = $this->detail_penawaran_model->get_where('t_detail_penawaran.id_penawaran = ' . $id_penawaran);
        echo json_encode(['response' => $data]);
    }
    
    public function get_detail_update($id_penawaran)
    {
        $data = $this->detail_penawaran_model->datatables_update_serah_terima($id_penawaran);
        echo json_encode(['response' => $data]);
    }

    public function delete($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->penawaran_model->delete($id));
        } else {
            throw new Exception('Method not Allowed');
        }
    }

}