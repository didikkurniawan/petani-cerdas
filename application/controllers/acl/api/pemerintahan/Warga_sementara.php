<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 9/24/16
 * Time: 17:00
 */
class Warga_sementara extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->datatables->select('ws.id as id, w.nama_lengkap, ws.pekerjaan, ws.datang_dari, ws.maksud_kedatangan, ws.alamat_yang_didatangi, ws.datang_tanggal, ws.created_date')
            ->join('warga w', 'ws.warga_id = w.id')
            ->from('warga_sementara ws');
        echo $this->datatables->generate();
    }

}
