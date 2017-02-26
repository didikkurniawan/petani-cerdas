<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/29/16
 * Time: 05:58
 */
class Diklat extends API_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('transaksi/penawaran_model');
        $this->load->model('transaksi/detail_penawaran_model');
        $this->load->model('diklat/diklat_model');

        $this->load->library('numbering');
    }

    public function index()
    {
        $data = $this->diklat_model->datatables();
        echo $data;
    }

    public function penawaran_detail($id)
    {
        $data = $this->detail_penawaran_model->datatables_penawaran($id);
        echo $data;
    }

    public function add()
    {
        if ($this->input->method('post')) {
            $data = $this->diklat_model->add(array(
            'id_pelanggan' => $this->input->post('nama_perusahaan'),
            'jenis_pelatihan' => $this->input->post('jenis_pelatihan'),
            'nama_kegiatan' => $this->input->post('nama_kegiatan'),
            'jumlah_peserta' => $this->input->post('jumlah_peserta'),
            'lokasi' => $this->input->post('lokasi'),
            'jumlah_hari' => $this->input->post('jumlah_hari'),
            'tarif' => $this->input->post('tarif'),
            'subtotal' => $this->input->post('subtotal'),
            'pajak' => $this->input->post('pajak'),
            'total' => $this->input->post('total'),
            'created_by' => $this->auth->userid()
            ));
            
            echo json_encode($data);
        } else {
            throw new Exception('Method not Allowed');
        }
    }
    public function update($id)
    {
        if ($this->input->method('post')) {
            $data = $this->diklat_model->update($id,array(
            'id_pelanggan' => $this->input->post('nama_perusahaan'),
            'jenis_pelatihan' => $this->input->post('jenis_pelatihan'),
            'nama_kegiatan' => $this->input->post('nama_kegiatan'),
            'jumlah_peserta' => $this->input->post('jumlah_peserta'),
            'lokasi' => $this->input->post('lokasi'),
            'jumlah_hari' => $this->input->post('jumlah_hari'),
            'tarif' => $this->input->post('tarif'),
            'subtotal' => $this->input->post('subtotal'),
            'pajak' => $this->input->post('pajak'),
            'total' => $this->input->post('total'),
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'tanggal_selesai' => $this->input->post('tanggal_selesai'),
            'updated_by' => $this->auth->userid(),
            'updated_at' => date('Y-m-d h:i:s')
            ));
            
            echo json_encode($data);
        } else {
            throw new Exception('Method not Allowed');
        }
    }

    public function deal()
    {
        if ($this->input->method('post')) {
            $param = $this->input->post();

            $data = $this->diklat_model->deal($param);
            echo json_encode(['response' => $data]);
        } else {
            throw new Exception('Method not Allowed');
        }
    }

    public function setTanggal()
    {
        if ($this->input->method('post')) {
            $param = $this->input->post();

            $data = $this->diklat_model->tanggalDeal($param);
            echo json_encode(['response' => $data]);
        } else {
            throw new Exception('Method not Allowed');
        }
    }

    // public function view($id)
    // {
    //     $response = $this->penawaran_model->view($id);
    //     echo json_encode(['response' => $response]);
    // }

    // public function get_detail($id_penawaran)
    // {
        
    //     $data = $this->detail_penawaran_model->get_where('t_detail_penawaran.id_penawaran = ' . $id_penawaran);
    //     echo json_encode(['response' => $data]);
    // }
    
    // public function get_detail_update($id_penawaran)
    // {
    //     $data = $this->detail_penawaran_model->datatables_update_serah_terima($id_penawaran);
    //     echo json_encode(['response' => $data]);
    // }
    
    public function delete($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->diklat_model->delete($id));
        } else {
            throw new Exception('Method not Allowed');
        }
    }

     public function search()
    {
        $response = $this->diklat_model->get_all(10, 0);
        if ($this->input->get('q') || $this->input->post('q')) {
            $term = ($this->input->get('q')) ? $this->input->get('q') : $this->input->post('q');
            $response = $this->diklat_model->get_by_like($term);
        }
        echo json_encode(['items' => $response]);
    }

    public function addJenisPelatihan()
    {
        if ($this->input->method('post')) {
            $data = $this->diklat_model->addPelatihan(array(
            'nama' => $this->input->post('nama'),
            'created_by' => $this->auth->userid()
            ));
            
            echo json_encode($data);
        } else {
            throw new Exception('Method not Allowed');
        }
        
    }

}