<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/16/16
 * Time: 11:09
 */
class Crud_model extends MY_Model
{

    public function index()
    {

        // query data menjadi format datatable
        $this->datatables->select('id, nama_perusahaan, contact_person, alamat, created_by, created_at, updated_by, updated_at, visible')
            ->from('sample_crud')
            ->where('visible', 1);

        return $this->datatables->generate();

    }

    public function add($data)
    {

        $this->db->insert('sample_crud', $data);

        $id = $this->db->insert_id();
        $inserted = $this->db->get_where('sample_crud', array('id' => $id))->row();

        return $inserted;

    }

    public function update($id, $data)
    {

        $this->db->update('sample_crud', $data, array('id' => $id));

        $id = $this->db->insert_id();
        $updated = $this->db->get_where('sample_crud', array('id' => $id))->row();

        return $updated;

    }

    public function view($id)
    {

        $data = $this->db->get_where('sample_crud', array('id' => $id))->row();
        return $data;

    }

    public function delete($id)
    {
        $this->db->update('sample_crud', array('visible' => 0), array('id' => $id));
        $deleted = $this->db->get_where('sample_crud', array('id' => $id))->row();
        return $deleted;

    }

}