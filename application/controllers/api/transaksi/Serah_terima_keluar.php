<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/29/16
 * Time: 05:58
 */
class Serah_terima_keluar extends API_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('transaksi/Serah_terima_keluar_model');
        $this->load->model('transaksi/detail_serah_terima_model');

        $this->load->model('transaksi/penawaran_model');

        $this->load->library('numbering');
    }

    public function index()
    {
        $data = $this->Serah_terima_keluar_model->datatables();
        echo $data;
    }

    public function serah_terima_detail($id)
    {
        $data = $this->serah_terima_keluar_model->datatables_serah_terima($id);
        echo $data;
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
        $data = json_decode($this->input->post('data'));
        $penawaran = $this->penawaran_model->view($data->id_penawaran);
//        echo $this->numbering->get_no_order(strtolower($penawaran->jenis_order));
//        exit;

        $param['id_penawaran'] = $data->id_penawaran;
        $param['no_order'] = $this->numbering->get_no_order(strtolower($penawaran->jenis_order));
        $param['jenis_order'] = $penawaran->jenis_order;
        $param['created_by'] = $this->auth->userid();

        // insert serah terima
        $serah_terima = $this->serah_terima_model->save($param);

        // insert detail penawaran
        $detail = [];
        foreach ($data->alat as $alat) {
            $param_detail['id_serah_terima'] = $serah_terima->id;
            $param_detail['id_alat'] = $alat->id_alat;
            $param_detail['qty'] = $alat->qty;
            $param_detail['is_terima'] = $alat->is_terima;
            $param_detail['visible'] = 1;
            $param_detail['created_by'] = $this->auth->userid();

            $_detail = $this->detail_serah_terima_model->save($param_detail);
            array_push($detail, $_detail);
        }
        echo json_encode(['response' => [
            'serah_terima' => $serah_terima,
            'detail' => $detail
        ]]);
    }

    public function get_detail($id_serah_terima)
    {
        $data = $this->detail_serah_terima_model->get_where('t_detail_serah_terima.id_serah_terima = ' . $id_serah_terima);
        echo json_encode(['response' => $data]);
    }
    
    public function delete($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->serah_terima_model->delete($id));
        } else {
            throw new Exception('Method not Allowed');
        }
    }

}