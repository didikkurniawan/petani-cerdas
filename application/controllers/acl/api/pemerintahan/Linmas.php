<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 9/24/16
 * Time: 17:00
 */
class Linmas extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        header('Content-type: application/json');
        $this->datatables->select('linmas.*, '
                            . 'warga.nama_lengkap as nama_lengkap, '
                            . 'warga.no_ktp as no_ktp, '
                            . 'linmas.status as status,  '
                            . 'linmas.periode_dari as periode_dari, '
                            . 'linmas.periode_sampai as periode_sampai, '
                            . 'rtrw.no_rt as no_rt, '
                            . 'rtrw.no_rw as no_rw')
            ->from('`linmas`, warga , rtrw')
            ->where('linmas.warga_id = warga.id and linmas.rtrw_id = rtrw.id');
        echo $this->datatables->generate();
    }
    
}
