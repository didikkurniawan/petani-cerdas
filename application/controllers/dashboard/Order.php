<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 12/23/16
 * Time: 06:07
 */
class Order extends Admin_Controller
{
    public function __construct(){
        parent::__construct();
        $this->template->set_layout('order');
    }

    public function index(){
        $this->load->vars([
            'page_title' => 'Status Order',
            'page_icon' => '<div id="clock">...</div>'
        ]);
        $this->template->set_css(assets_url('css/plugins/angular-datatables/angular-bootstrap.datatables'))
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
        $this->template->build('dashboard/order');
    }

}