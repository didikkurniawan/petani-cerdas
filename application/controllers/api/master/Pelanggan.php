<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/26/16
 * Time: 07:26
 */
class Pelanggan extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('master/pelanggan_model');
    }
     public function index()
    {
        $data = $this->pelanggan_model->datatables();
        echo $data;
    }

    public function add()
    {
        if ($this->input->method('post')) {
            $data = $this->pelanggan_model->add(array(
            'nama' => $this->input->post('nama'),
            'telepon' => $this->input->post('telepon'),
            'fax' => $this->input->post('fax'),
            'alamat' => $this->input->post('alamat'),
            'alamat_invoice' => $this->input->post('alamat_invoice'),
            'up' => $this->input->post('up'),
            'email' => $this->input->post('email'),
            'contact_person' => $this->input->post('contact_person'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kelurahan' => $this->input->post('kelurahan'),
            'kodepos' => $this->input->post('kodepos'),
            'visible' => 1,
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
            echo json_encode($this->pelanggan_model->update($id, array(
             'nama' => $this->input->post('nama'),
            'telepon' => $this->input->post('telepon'),
            'fax' => $this->input->post('fax'),
            'alamat' => $this->input->post('alamat'),
            'alamat_invoice' => $this->input->post('alamat_invoice'),
            'email' => $this->input->post('email'),
            'up' => $this->input->post('up'),
            'contact_person' => $this->input->post('contact_person'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kelurahan' => $this->input->post('kelurahan'),
            'kodepos' => $this->input->post('kodepos'),
            'updated_by' => $this->auth->userid(),
            'updated_at' => date('Y-m-d h:i:s')
            )));
        } else {
            throw new Exception('Method not Allowed');
        }
    }
    
    /**
    * Dik, method search ini tolong di jaga ya. Kalo master pelanggan butuh, coba ganti nama fungsi dan proses nya aja.
    **/

    public function search()
    {
        $response = $this->pelanggan_model->get_all(10, 0);
        if ($this->input->get('q') || $this->input->post('q')) {
            $term = ($this->input->get('q')) ? $this->input->get('q') : $this->input->post('q');
            $response = $this->pelanggan_model->get_by_like($term);
        }
        echo json_encode(['items' => $response]);
    }


    public function delete($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->pelanggan_model->delete($id));
        } else {
            throw new Exception('Method not Allowed');
        }
    }

  

}