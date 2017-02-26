<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/27/16
 * Time: 05:42
 */
class Test extends API_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('transaksi/penawaran_model');
        $this->load->model('transaksi/detail_penawaran_model');
    }

    public function index()
    {
        $data = json_decode($this->input->post('data'));

        $param['id_pelanggan'] = $data->id_pelanggan;
        $param['no_penawaran'] = 'tes';
        $param['created_by'] = $this->auth->userid();

        // insert penawaran
        $penawaran = $this->penawaran_model->save($param);

        // insert detail penawaran
        $detail = [];
        foreach ($data->alat as $alat) {
            $param_detail['id_penawaran'] = $penawaran->id;
            $param_detail['id_alat'] = $alat->id_alat;
            $param_detail['created_by'] = $this->auth->userid();

            $_detail = $this->detail_penawaran_model->save($param_detail);
            array_push($detail, $_detail);
        }
        echo json_encode(['response' => [
            'penawaran' => $penawaran,
            'detail' => $detail
        ]]);
    }
}