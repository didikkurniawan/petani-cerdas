<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 9/16/16
 * Time: 16:19
 */
include_once(APPPATH . 'core/API_Controller.php');

class Data_warga extends API_Controller
{

    public function index()
    {
        header('Content-type: application/json');
        $this->datatables->select('warga.tempat_lahir, warga.tanggal_lahir, warga.pekerjaan, warga.status_kawin, warga.nama_lengkap, warga.created_date, warga.no_ktp, warga.no_kk, warga.jenis_kelamin, warga.id, CONCAT(`rtrw`.`no_rt`, " / " ,`rtrw`.`no_rw` ) as `alamat`, rtrw.no_rt, rtrw.no_rw')
            ->join('rtrw', 'warga.rtrw_id = rtrw.id')
            ->from('warga');
        if ($this->input->get('filter')) {
            $filter = json_decode($this->input->get('filter'));
            if (isset($filter->rt_rw)) {
                $this->datatables->where("rtrw.id", $filter->rt_rw);
            }
            if (isset($filter->golongan_darah)) {
                $this->datatables->where("warga.golongan_darah", $filter->golongan_darah);
            }
            if (isset($filter->warga_negara)) {
                $this->datatables->where("warga.warga_negara", "LIKE '%" . $filter->warga_negara . "%'");
            }
            if (isset($filter->agama)) {
                $this->datatables->where("warga.agama", $filter->agama);
            }
            if (isset($filter->pendidikan)) {
                $this->datatables->where("warga.pendidikan", $filter->pendidikan);
            }
            if (isset($filter->pekerjaan)) {
                $this->datatables->where("warga.pekerjaan", $filter->pekerjaan);
            }
            if (isset($filter->status_kawin)) {
                $this->datatables->where("warga.status_kawin", $filter->status_kawin);
            }
            if (isset($filter->status_warga)) {
                $this->datatables->where("warga.status_warga", $filter->status_warga);
            }

        }

        echo $this->datatables->generate();
    }

    public function test()
    {
        $filter = $this->input->get('filter');
        echo print_r(json_decode($filter));
    }

    public function save()
    {
        $data = json_decode(file_get_contents("php://input"));

        $this->db->insert('warga', array(
            'rtrw_id' => (isset($data->rtrw_id)) ? $data->rtrw_id : null,
            'nama_lengkap' => $data->nama_lengkap,
            'no_ktp' => $data->no_ktp,
            'tempat_lahir' => $data->tempat_lahir,
            'tanggal_lahir' => $data->tanggal_lahir_formatted,
            'jenis_kelamin' => $data->jenis_kelamin,
            'alamat' => $data->alamat,
            'agama' => $data->agama,
            'golongan_darah' => $data->golongan_darah,
            'warga_negara' => $data->warga_negara,
            'pendidikan' => $data->pendidikan,
            'pekerjaan' => $data->pekerjaan,
            'pekerjaan_lainnya' => (isset($data->pekerjaan_lainnya)) ? $data->pekerjaan_lainnya : null,
            'status_kawin' => $data->status_kawin,
            'status_warga' => $data->status_warga,
            'ktp_seumur_hidup' => $data->ktp_seumur_hidup,
            'jkn' => $data->jkn,
            'tgl_berlaku_ktp' => (isset($data->tgl_berlaku_ktp)) ? $data->tgl_berlaku_ktp_formatted : null,
            'status_keterangan_warga' => (isset($data->status_keterangan_warga)) ? $data->status_keterangan_warga : null,
            'status_aktif' => $data->status_aktif,
            'foto' => (isset($data->foto)) ? $data->foto : null,
            'created_by' => $this->auth->userid()
        ));
        $id = $this->db->insert_id();
        $rt = $this->db->get_where('warga', array('id' => $id))->result();
        echo json_encode(array(
            'response' => $rt
        ));
    }

    public function view($id)
    {
        $this->db->select('warga.*, CONCAT(rtrw.no_rw, " / ", rtrw.no_rt) as rtrw')
            ->join('rtrw', 'warga.rtrw_id = rtrw.id')
            ->from('warga')
            ->where('warga.id', $id);
        $rt = $this->db->get()->result()[0];
        echo json_encode(array(
            'response' => $rt
        ));
    }

    public function update()
    {
        $data = json_decode(file_get_contents("php://input"));
        $this->db->update('warga', array(
            'rtrw_id' => (isset($data->rtrw_id)) ? $data->rtrw_id : null,
            'nama_lengkap' => $data->nama_lengkap,
            'no_ktp' => $data->no_ktp,
            'tempat_lahir' => $data->tempat_lahir,
            'tanggal_lahir' => $data->tanggal_lahir_formatted,
            'jenis_kelamin' => $data->jenis_kelamin,
            'alamat' => $data->alamat,
            'agama' => $data->agama,
            'golongan_darah' => $data->golongan_darah,
            'warga_negara' => $data->warga_negara,
            'pendidikan' => $data->pendidikan,
            'pekerjaan' => $data->pekerjaan,
            'pekerjaan_lainnya' => (isset($data->pekerjaan_lainnya)) ? $data->pekerjaan_lainnya : null,
            'status_kawin' => $data->status_kawin,
            'status_warga' => $data->status_warga,
            'ktp_seumur_hidup' => $data->ktp_seumur_hidup,
            'jkn' => $data->jkn,
            'tgl_berlaku_ktp' => (isset($data->tgl_berlaku_ktp)) ? $data->tgl_berlaku_ktp_formatted : null,
            'status_keterangan_warga' => (isset($data->status_keterangan_warga)) ? $data->status_keterangan_warga : null,
            'status_aktif' => $data->status_aktif,
            'foto' => (isset($data->foto)) ? $data->foto : null,
            'updated_by' => $this->auth->userid(),
            'updated_date' => date('Y-m-d H:i:s')
        ), array(
            'id' => $data->id
        ));
        $rt = $this->db->get_where('warga', array('id' => $data->id))->result();
        echo json_encode(array(
            'response' => $rt
        ));


    }

    public function delete()
    {
        $data = json_decode(file_get_contents("php://input"));
        $this->db->delete('warga', array(
            'id' => $data->id,
        ));
        echo json_encode(array(
            'response' => 'success'
        ));
    }

    public function search()
    {
        $s = $this->input->get('s');
        $this->db->select('warga.*, warga.id as id_warga, keluarga.nomor_kk')
            ->from('warga')
            ->join('keluarga', 'warga.no_kk = keluarga.nomor_kk')
            ->where("warga.nama_lengkap LIKE '%" . $s . "%'")
            ->or_where("warga.no_ktp LIKE  '%" . $s . "%'")
            ->or_where("warga.no_kk LIKE  '%" . $s . "%'");
        $response = $this->db->get()->result();
        header('Content-type: application/json');
        echo json_encode(['response' => $response]);
    }

    public function getWarga()
    {
//        $this->db->select('no_ktp, nama_lengkap, no_rw, no_rt');
//        $this->db->from('warga');
//        $this->db->join('rtrw', 'rtrw.id = warga.rtrw_id');
//        $query = $this->db->get();
//        return $query->result();
//        

        header('Content-type: application/json');
        $this->datatables->select('no_ktp as value, nama_lengkap as label, no_rw, no_rt')
            ->from('warga')
            ->join('rtrw', 'rtrw.id = warga.rtrw_id');
        echo $this->datatables->generate();
    }

    public function asosiasi_foto(){
        $this->db->select('warga.no_ktp, warga.foto, warga.id')
            ->from('warga');
        $warga = $this->db->get()->result();

        foreach($warga as $item){
            $this->db->update('warga', array(
                'foto' => '/uploads/foto/' . preg_replace('/\s+/', '', $item->no_ktp) . '.jpg'
            ), array(
                'id' => $item->id
            ));
        }

        $this->db->select('warga.no_ktp, warga.foto, warga.id')
            ->from('warga');
        $response = $this->db->get()->result();

        echo json_encode($response);
    }

}
