<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends API_Controller
{
    public function provinsi()
    {
        header('Content-type: application/json');
        $this->db->select('*');
        $this->db->from('m_wilayah');
        $this->db->where('parent_id', 0);
        $this->db->where('id <>', 0);
        if ($this->input->get('q')) {
            $this->db->where("nama LIKE '%" . $this->input->get('q') . "%'");
        }
        $data = $this->db->order_by('nama', 'asc');
        echo json_encode($data->get()->result());
    }

    public function kota()
    {
        header('Content-type: application/json');
        $parent_id = $_GET['provinsiId'];

        $this->db->select('*');
        $this->db->from('m_wilayah');
        $this->db->where('parent_id', $parent_id);
        $this->db->where('id <>', 0);
        if ($this->input->get('q')) {
            $this->db->where("nama LIKE '%" . $this->input->get('q') . "%'");
        }
        $data = $this->db->order_by('nama', 'asc');
        echo json_encode($data->get()->result());
    }
    public function kotaAll()
    {
        header('Content-type: application/json');
      
        $this->db->select('*');
        $this->db->from('m_wilayah');
      
        $data = $this->db->order_by('nama', 'asc');
        echo json_encode($data->get()->result());
    }

    public function kecamatan()
    {
        header('Content-type: application/json');
        $parent_id = $_GET['kotaId'];
        $this->db->select('*');
        $this->db->from('m_wilayah');
        $this->db->where('parent_id', $parent_id);
        $this->db->where('id <>', 0);
        if ($this->input->get('q')) {
            $this->db->where("nama LIKE '%" . $this->input->get('q') . "%'");
        }
        $data = $this->db->order_by('nama', 'asc');
        echo json_encode($data->get()->result());
    }

    public function kelurahan()
    {
        header('Content-type: application/json');
        $parent_id = $_GET['kecamatanId'];
        $this->db->select('*');
        $this->db->from('m_wilayah');
        $this->db->where('parent_id', $parent_id);
        $this->db->where('id <>', 0);
        if ($this->input->get('q')) {
            $this->db->where("nama LIKE '%" . $this->input->get('q') . "%'");
        }
        $data = $this->db->order_by('nama', 'asc');
        echo json_encode($data->get()->result());
    }

    public function kodepos()
    {
        header('Content-type: application/json');
        $parent_id = $_GET['kecamatanId'];
        $this->db->select('*');
        $this->db->from('m_wilayah');
        $this->db->limit(1);
        $this->db->where('parent_id', $parent_id);
        $this->db->where('id <>', 0);
        if ($this->input->get('q')) {
            $this->db->where("nama LIKE '%" . $this->input->get('q') . "%'");
        }
        $data = $this->db->order_by('kodepos', 'asc');
        echo json_encode($data->get()->result());
    }

    public function search()
    {
        header('Content-type: application/json');
        $parent_id = $_GET['id'];
        $this->db->select('*');
        $this->db->from('m_wilayah');
        $this->db->where('id', $parent_id);
        $this->db->where('id <>', 0);
        $data = $this->db->order_by('nama', 'asc');
        echo json_encode($data->get()->result());
    }

}
