<?php

/**
* Created by PhpStorm.
* User: agungrizkyana
* Date: 12/26/16
* Time: 06:52
*/
class Pembayaran_model extends MY_Model
{
    protected $table = 't_pembayaran';
    protected $table_join_detail_kalibrasi = 't_detail_kalibrasi';
    protected $table_join_detail_serah_terima = 't_detail_serah_terima';
    protected $table_join_alat = 'm_alat';
    protected $table_join_serah_terima = 't_serah_terima';
    protected $table_join_penawaran = 't_penawaran';
    protected $table_join_kalibrasi = 't_kalibrasi';
    protected $table_join_pelanggan = 'm_pelanggan';
    protected $table_join_detail_penawaran = 't_detail_penawaran';
    protected $filter_fields = array('nama', 'telepon', 'alamat', 'email');
    
    public function __construct()
    {
        parent::__construct();
        $this->db->set('created_by', $this->auth->userid());
    }
    
    public function update($data, $id){
        $this->db->update($this->table, $data, array('id'=>$id));
        $data = $this->db->get_where($this->table, array('id'=>$id))->row();
        return $data;
    }
    
    private function _get_select(){
        $select = $this->table.".id, ";
        $select .= $this->table.".no_invoice, ";
        $select .= $this->table.".jenis_pembayaran, ";
        $select .= $this->table.".alat_pembayaran, ";
        $select .= $this->table.".file_bukti_pembayaran, ";
        $select .= $this->table.".via, ";
        $select .= $this->table.".pajak, ";
        $select .= $this->table.".total, ";
        $select .= $this->table.".dp, ";
        $select .= $this->table.".created_at, ";
        $select .= $this->table.".is_invoice, ";
        $select .= $this->table.".file_invoice, ";
        $select .= $this->table.".due_date, ";
        $select .= $this->table.".is_lunas, ";
        $select .= $this->table.".informasi_pembayaran, ";
        $select .= $this->table_join_pelanggan.".nama, ";
        $select .= $this->table_join_pelanggan.".id as id_pelanggan, ";
        $select .= $this->table_join_penawaran. ".no_penawaran";
        return $select;
    }
    
    public function datatables(){
        $this->datatables->select($this->_get_select());
        $this->datatables->from($this->table);
        $this->datatables->join($this->table_join_pelanggan, $this->table.".id_pelanggan = " . $this->table_join_pelanggan.".id", 'left');
        $this->datatables->join($this->table_join_penawaran, $this->table.".id_penawaran = ".$this->table_join_penawaran.".id", 'left');
        return $this->datatables->generate();
    }
    
    public function view($id){
        $pembayaran = $this->db->get_where($this->table, array('id'=>$id))->row();
        $penawaran = $this->db->get_where($this->table_join_penawaran, array('id'=>$pembayaran->id_penawaran))->row();
        $pelanggan = $this->db->get_where($this->table_join_pelanggan, array('id'=>$penawaran->id_pelanggan))->row();
        $serah_terima = $this->db->get_where($this->table_join_serah_terima, array('id_penawaran'=>$penawaran->id))->row();
        
        
        $detail_penawaran = $this->db->get_where($this->table_join_detail_penawaran, array('id_penawaran' => $penawaran->id))->result();
        
        $obj = new stdClass();
        $obj->pembayaran = $pembayaran;
        $obj->penawaran = $penawaran;
        $obj->pelanggan = $pelanggan;
        $obj->serah_terima = $serah_terima;
        $obj->detail_penawaran = $detail_penawaran;
        return $obj;
    }
    
    public function get_list_order($id_order){
        
        $select = $this->table_join_kalibrasi.".is_verifikasi_pengolahan_data, ";
        $select .= $this->table_join_kalibrasi.".is_verifikasi_draft_sertifikat, ";
        $select .= $this->table_join_kalibrasi.".is_verifikasi_sertifikat, ";
        $select .= $this->table_join_detail_serah_terima.".qty, ";
        $select .= $this->table_join_detail_kalibrasi.".status, ";
        $select .= $this->table_join_detail_kalibrasi.".id as id_detail_kalibrasi, ";
        $select .= $this->table_join_alat.".nama, ";
        $select .= $this->table_join_alat.".harga, ";
        $select .= $this->table_join_alat.".bidang, ";
        $select .= $this->table_join_alat.".spesifikasi, ";
        $select .= $this->table_join_serah_terima.".no_order, ";
        $select .= $this->table_join_serah_terima.".jenis_order, ";
        
        $this->db->select($select);
        
        $this->db->join($this->table_join_detail_kalibrasi, $this->table_join_detail_kalibrasi.".id_kalibrasi = " . $this->table_join_kalibrasi.".id", 'left');
        $this->db->join($this->table_join_detail_serah_terima, $this->table_join_detail_kalibrasi.".id_alat = " . $this->table_join_detail_serah_terima.".id", 'left');
        $this->db->join($this->table_join_alat, $this->table_join_detail_serah_terima.".id_alat = " .$this->table_join_alat.".id", 'left');
        $this->db->join($this->table_join_serah_terima, $this->table_join_serah_terima.".id = " . $this->table_join_detail_serah_terima.".id_serah_terima", 'left');
        
        $this->db->where($this->table_join_serah_terima.".id", $id_order);
        
        $this->db->from($this->table_join_kalibrasi);
        return $this->db->get()->result();
    }

    public function get_alamat_customer($id_pembayaran, $alamat){
        $pembayaran = $this->db->get_where($this->table, array('id' => $id_pembayaran))->row();
        $penawaran = $this->db->get_where($this->table_join_penawaran, array('id' => $pembayaran->id_penawaran))->row();
        $pelanggan = $this->db->get_where($this->table_join_pelanggan, array('id' => $penawaran->id_pelanggan))->row();

        $alamat_pelanggan = ($alamat == 1) ? $pelanggan->alamat_invoice : $pelanggan->alamat;
        return $alamat_pelanggan;
    }
    
}