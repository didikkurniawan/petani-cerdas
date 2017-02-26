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
                            . 'warga.nama_lengkap, '
                            . 'warga.no_ktp, '
                            . 'no_rt, '
                            . 'no_rw ')
            ->from('`linmas`, warga , rtrw')
            ->where('linmas.warga_id = warga.id and linmas.rtrw_id = rtrw.id');
        echo $this->datatables->generate();
    }
    
}
