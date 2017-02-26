<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Forms controller.
 *
 * @package Application
 * @category Controller
 * @author Agung Rizkyana
 */
class Ro extends Admin_Controller
{
    protected $class_name = 'Rancangan Operasional';

    public function __construct()
    {
        parent::__construct();
        $this->template
            ->set_css(assets_url('css/plugins/angular-datatables/angular-bootstrap.datatables'))
            ->set_css(bower_url('bootstrap-datepicker/dist/css/bootstrap-datepicker3.min'))
            ->set_css(bower_url('select2/dist/css/select2.min'))
            ->set_css(assets_url('css/custom'))
            ->set_css(bower_url('summernote/dist/summernote'))
            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
            ->set_js(bower_url('datatables/media/js/dataTables.bootstrap4.min'))
            ->set_js(bower_url('select2/dist/js/select2.full.min'))
            ->set_js(bower_url('summernote/dist/summernote'))
            ->set_js(bower_url('bootstrap-datepicker/dist/js/bootstrap-datepicker.min'))
            ->set_js(bower_url('bootstrap-datepicker/dist/locales/bootstrap-datepicker.id.min'))
            ->set_js(bower_url('jquery.inputmask/dist/jquery.inputmask.bundle'))
            ->set_js('configs/datatables');
    }

    public function index()
    {
        $this->load->vars(array(
            'page_title' => '<strong>' . $this->class_name . '</strong> | List',
            'page_icon' => "
                <a href='" . site_url('ro/add') . "' class='btn btn-primary' > <i class='fa fa-plus'></i> Tambah </a>
            "
        ));

        $this->template
            ->set_js('controllers/ro/index')
            ->build('ro/index');
    }


    public function verifikasi()
    {
        $this->load->vars(array(
            'page_title' => '<strong>ro</strong> | Verifikasi',
            'page_icon' => "
                <a href='" . site_url('ro/add') . "' class='btn btn-primary' > <i class='fa fa-plus'></i> Tambah </a>
            "
        ));

        $this->template
            ->set_js('controllers/ro/index')
            ->build('samples/blank_page');
    }

    public function add()
    {
        $this->load->vars(array(
            'page_title' => '<strong>Rancangan Operasional</strong> | Buat',
        ));

        $this->template
            ->set_js('controllers/ro/add')
            ->build('ro/add');
    }

    public function update($id)
    {
        $this->load->vars(array(
            'page_title' => '<strong>Sample</strong> | Update',
            'id' => $id
        ));
        $this->load->model('transaksi/ro_model');
        $date['detail_ro'] = $this->ro_model->view_detail($id);

        $this->template
            ->set_js('controllers/ro/update')
            ->build('ro/update',$date);
    }

    public function view($id)
    {
        $this->load->vars(array(
            'page_title' => '<strong>Rencana Oprasional</strong> | View',
            'id' => $id
        ));
        $this->load->model('transaksi/ro_model');
        $date['detail_ro'] = $this->ro_model->view_detail($id);

        $this->template
            ->set_js('controllers/ro/view')
            ->build('ro/view',$date);
    }

    public function delete($id)
    {
        $this->load->vars(array(
            'page_title' => '<strong>Sample</strong> | Delete',
            'id' => $id
        ));
        $this->load->model('transaksi/ro_model');
        $date['detail_ro'] = $this->ro_model->view_detail($id);

        $this->template
            ->set_js('controllers/ro/delete')
            ->build('ro/delete',$date);
    }

}
