<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Forms controller.
 *
 * @package Application
 * @category Controller
 * @author Agung Rizkyana
 */
class Pengaduan_customer extends Admin_Controller
{

    protected $class_name = "Pengaduan Customer";
    protected $table = '';


    public function __construct(){
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
                <a href='" . site_url('pengaduan_customer/add') . "' class='btn btn-primary' > <i class='fa fa-plus'></i> Tambah </a>
            "
        ));

        $this->template

            ->set_js('controllers/pengaduan_customer/index')
            ->build('pengaduan_customer/index');
    }

    public function add()
    {
        $this->load->vars(array(
            'page_title' => '<strong>' . $this->class_name . '</strong> | Add',
        ));

        $this->template

            ->set_js('controllers/pengaduan_customer/add')
            ->build('pengaduan_customer/add');
    }

    public function update($id)
    {
        $this->load->vars(array(
            'page_title' => '<strong>' . $this->class_name . '</strong> | Update',
            'id' => $id
        ));
        $this->load->model('pengaduan/pengaduan_customer_model');
        $date['detail_pengaduan'] = $this->pengaduan_customer_model->view_detail($id);
        $this->template

            ->set_js('controllers/pengaduan_customer/update')
            ->build('pengaduan_customer/update', $date);
    }

    public function view($id)
    {
        $this->load->vars(array(
            'page_title' => '<strong>' . $this->class_name . '</strong> | View',
            'id' => $id
        ));
        $this->load->model('pengaduan/pengaduan_customer_model');
        $date['detail_pengaduan'] = $this->pengaduan_customer_model->view_detail($id);

        $this->template
            ->set_js('controllers/pengaduan_customer/view')
            ->build('pengaduan_customer/view',$date);
    }

    public function delete($id)
    {
        $this->load->vars(array(
            'page_title' => '<strong>' . $this->class_name . '</strong> | Delete',
            'id' => $id
        ));
        $this->load->model('pengaduan/pengaduan_customer_model');
        $date['detail_pengaduan'] = $this->pengaduan_customer_model->view_detail($id);

        $this->template
            ->set_js('controllers/pengaduan_customer/delete')
            ->build('pengaduan_customer/delete',$date);
    }

}
