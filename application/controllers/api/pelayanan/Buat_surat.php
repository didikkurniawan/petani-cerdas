<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 10/1/16
 * Time: 06:59
 */
use Zend\Barcode\Barcode;

include_once(APPPATH . 'core/API_Controller.php');

class Buat_surat extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }



    public function index()
    {
        header('Content-type: application/json');
        $data = $this->datatables->select('transaksi_surat_pelayanan.*, jenis_surat_pelayanan.template_name, jenis_surat_pelayanan.kode_surat, jenis_surat_pelayanan.id as id_template , warga.nama_lengkap, warga.id as id_warga, warga.no_ktp')
            ->join('warga', 'transaksi_surat_pelayanan.id_warga = warga.id')
            ->join('jenis_surat_pelayanan', 'transaksi_surat_pelayanan.id_template_surat = jenis_surat_pelayanan.id')
            ->from('transaksi_surat_pelayanan')
            ->generate();
        echo $data;
    }

    public function save(){
        $data = json_decode(file_get_contents("php://input"));
        $this->db->insert('transaksi_surat_pelayanan', array(
            'id_warga' => $data->warga->id,
            'id_template_surat' => $data->id_template_surat,
            'konten' => $data->konten,
            'petugas' => $this->auth->userid()
        ));
        $id = $this->db->insert_id();
        $jsp = $this->db->get_where('transaksi_surat_pelayanan', array('id'=>$id))->result()[0];
        echo json_encode(array(
            'response' => $jsp
        ));
    }

    public function view($id){
        $rt = $this->db->get_where('transaksi_surat_pelayanan', array('id'=>$id))->result()[0];
        echo json_encode(array(
            'response' => $rt
        ));
    }

    public function update(){
        $data = json_decode(file_get_contents("php://input"));
        $this->db->update('transaksi_surat_pelayanan',array(
            'id_warga' => $data->id_warga,
            'id_template_surat' => $data->id_template_surat,
            'konten' => $data->konten,
            'petugas' => $this->auth->userid()
        ), array(
            'id' => $data->id_transaksi
        ));
        $rt = $this->db->get_where('transaksi_surat_pelayanan', array('id'=>$data->id))->result()[0];
        echo json_encode(array(
            'response' => $rt
        ));
    }

    public function delete(){
        $data = json_decode(file_get_contents("php://input"));
        $this->db->delete('transaksi_surat_pelayanan', array(
            'id' => $data->id_transaksi,
        ));
        echo json_encode(array(
            'response' => 'success'
        ));
    }
}