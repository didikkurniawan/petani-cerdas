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
        $data = json_decode($this->input->post('data'));

        $param['id_pelanggan'] = $data->id_pelanggan;
        $param['no_penawaran'] = $this->numbering->get_no_penawaran();
        $param['total'] = $data->total;
        $param['sub_total'] = $data->sub_total;
        $param['pajak'] = $data->pajak;
        $param['diskon'] = $data->diskon;
        $param['jenis_order'] = $data->jenis_order;
        $param['created_by'] = $this->auth->userid();

        // insert penawaran
        $penawaran = $this->penawaran_model->save($param);

        // insert detail penawaran
        $detail = [];
        foreach ($data->alat as $alat) {
            $param_detail['id_penawaran'] = $penawaran->id;
            $param_detail['id_alat'] = $alat->id_alat;
            $param_detail['qty'] = $alat->qty;
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
            $id = $this->input->post('id');
            $total_deal = $this->input->post('total_deal');
            $pajak_deal = $this->input->post('pajak_deal');
            $data = $this->penawaran_model->deal($id, $total_deal, $pajak_deal);
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

}