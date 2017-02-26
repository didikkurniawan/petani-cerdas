<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 10/1/16
 * Time: 06:59
 */
include_once(APPPATH . 'core/API_Controller.php');

class Pelayanan_na extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function test(){

    }

    public function index()
    {
        $data = $this->datatables->select('jenis_surat_pelayanan.*')
            ->from('jenis_surat_pelayanan')
            ->generate();
        echo $data;
    }

    public function save(){
        $data = json_decode(file_get_contents("php://input"));
        $this->db->insert('jenis_surat_pelayanan', array(
            'jenis' => $data->jenis,
            'kode_surat' => $data->kode_surat,
            'template_name' => $data->template_name,
            'template' => $data->template,
            'custom_attributes' => $data->custom_attrs,
        ));
        $id = $this->db->insert_id();
        $jsp = $this->db->get_where('jenis_surat_pelayanan', array('id'=>$id))->result()[0];
        echo json_encode(array(
            'response' => $jsp
        ));
    }

    public function view($id){
        $rt = $this->db->get_where('jenis_surat_pelayanan', array('id'=>$id))->result()[0];
        echo json_encode(array(
            'response' => $rt
        ));
    }

    public function update(){
        $data = json_decode(file_get_contents("php://input"));
        $this->db->update('jenis_surat_pelayanan',array(
            'jenis' => $data->jenis,
            'kode_surat' => $data->kode_surat,
            'template_name' => $data->template_name,
            'template' => $data->template,
            'custom_attributes' => $data->custom_attrs
        ), array(
            'id' => $data->id
        ));
        $rt = $this->db->get_where('jenis_surat_pelayanan', array('id'=>$data->id))->result()[0];
        echo json_encode(array(
            'response' => $rt
        ));
    }

    public function delete(){
        $data = json_decode(file_get_contents("php://input"));
        $this->db->delete('jenis_surat_pelayanan', array(
            'id' => $data->id,
        ));
        echo json_encode(array(
            'response' => 'success'
        ));
    }
}