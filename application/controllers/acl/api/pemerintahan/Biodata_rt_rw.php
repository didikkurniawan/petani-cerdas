<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 9/24/16
 * Time: 17:00
 */
class Biodata_rt_rw extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        header('Content-type: application/json');
        $this->datatables->select('biodata.id as biodata_id, '
                            . 'warga1.nama_lengkap as ketua_rt, '
                            . 'warga2.nama_lengkap as ketua_rw, '
                            . 'rtrw.no_rt as no_rt, '
                            . 'rtrw.no_rw as no_rw, '
                            . 'biodata.periode_dari as biodata_periode_dari, '
                            . 'biodata.periode_sampai as biodata_periode_sampai')
            ->from('`biodata_rt_rw` as biodata, warga as warga1, warga as warga2, rtrw')
            ->where('biodata.ketua_rt_id = warga1.id and biodata.ketua_rw_id = warga2.id and biodata.rtrw_id = rtrw.id')
            ->group_by('biodata.id');
        echo $this->datatables->generate();
    }
    
}
