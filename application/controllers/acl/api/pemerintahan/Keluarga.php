<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 9/24/16
 * Time: 17:00
 */
class Keluarga extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        header('Content-type: application/json');
        $this->datatables->select('rtrw_id, rtrw.`no_rt` as no_rt , rtrw.`no_rw` as no_rw, keluarga.`nomor_kk` as nomor_kk, `anggota_keluarga_id`, keluarga.`jumlah_keluarga` as jumlah_keluarga,`keluarga_id`, keluarga.`alamat` as alamat, keluarga.`tanggal_pembuatan_kk` as tanggal_pembuatan_kk, `keluarga`.`created_date` as created_date, keluarga.`nama_lengkap` as nama_lengkap, keluarga.`is_kepala_keluarga` as is_kepala_keluarga')
                ->from('(
    SELECT `nomor_kk`, `anggota_keluarga_id`, `jumlah_keluarga`, `keluarga`.`id` as `keluarga_id`, `alamat`, `tanggal_pembuatan_kk`, `keluarga`.`created_date`, `nama_lengkap`, `is_kepala_keluarga`, keluarga.rtrw_id as rtrw_id
	FROM `keluarga`
	LEFT JOIN (
		SELECT 	keluarga_id, count(anggota_keluarga.id) as jumlah_keluarga, `is_kepala_keluarga`, 				`anggota_keluarga`.`id` as `anggota_keluarga_id`, `warga`.`id`, `nama_lengkap`
		FROM 	(
            select * 
            from anggota_keluarga 
            order by keluarga_id, is_kepala_keluarga desc
        		) as anggota_keluarga
		LEFT JOIN warga
		ON 		anggota_keluarga.warga_id = warga.id
		GROUP BY keluarga_id) as anggota_keluarga2 
    ON `keluarga`.`id` = `anggota_keluarga2`.`keluarga_id`
	GROUP BY `nomor_kk`
		)as keluarga')
                ->join('rtrw', 'rtrw.id = keluarga.rtrw_id', 'left')
                ->group_by('keluarga_id');
        echo $this->datatables->generate();
    }

    public function test_autocomplete() {
        $data = json_decode(file_get_contents("php://input"));

        $term = $this->input->get('term');

        $this->db->select("warga.id as id_warga,"
                        . "nama_lengkap, "
                        . "no_ktp, "
                        . "alamat, "
                        . "no_rt, "
                        . "no_rw")
                ->from('warga')
                ->join('rtrw', 'warga.id = rtrw.id', 'left')
                ->like('no_ktp', $term)
                ->or_like('nama_lengkap', $term)
                ->or_like('alamat', $term)
                ->limit(10);
        $response = $this->db->get()->result();

        echo json_encode(
                $response
        );
    }

}
