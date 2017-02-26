<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 10/1/16
 * Time: 05:58
 */

use Zend\Barcode\Barcode;

class Certificate extends Admin_Controller
{

    private $today;

    public function __construct()
    {
        parent::__construct();
        $this->load->vars(array(
            'angular' => true,
            'ui_controller' => 'UiController',
        ));

    }

    public function barcode($pos)
    {
        $barcode = Barcode::render(
            'code128',
            'image',
            [
                'text' => $pos . date('YmdHis'),
                'font' => 3,
            ]
        );

        echo imagejpeg($barcode);
    }

    public function index()
    {
        $this->load->vars(array(
            'page_title' => '<strong>CRM</strong> | Certificate',
            'page_icon' => '<a class="btn btn-primary" href="' . site_url('crm/certificate/add') . '"> <i class="fa fa-plus"></i> Add</a>',
        ));

        $this->template
            ->set_css(assets_url('css/plugins/angular-datatables/angular-bootstrap.datatables'))
            ->set_css(bower_url('select2/dist/css/select2.min'))
            ->set_css(assets_url('css/custom'))
            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
            ->set_js(bower_url('datatables/media/js/dataTables.bootstrap4.min'))
            ->set_js(bower_url('select2/dist/js/select2.full.min'))
            ->set_js('configs/datatables')
            ->set_js('controllers/crm/certificate/index')
            ->build('crm/certificate/index');
    }


    public function add($jenis_surat_pos)
    {
        $this->load->vars(array(
            'page_title' => 'Buat Surat pos',
            'page_icon' => '<button class="btn btn-primary" ng-click="save()" > <i class="fa fa-print"></i> Cetak</button>',

        ));
        $this->template
            ->set_js_script("var jenis_surat_pos = " . $jenis_surat_pos)
            ->set_css(bower_url('datatables/media/css/dataTables.bootstrap4.min'))
            ->set_css(bower_url('angularjs-toaster/toaster'))
            ->set_css(assets_url('css/custom'))
            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
            ->set_js(bower_url('datatables/media/js/dataTables.bootstrap4.min'))
            ->set_js(bower_url('angular-datatables/dist/angular-datatables.min'))
            ->set_js(bower_url('angular-animate/angular-animate'))
            ->set_js(bower_url('angularjs-toaster/toaster'))
            ->set_js(bower_url('angular-barcode/dist/angular-barcode.min'))
            ->set_js(assets_url('js/app/libs/angucomplete-alt'))
            ->set_js(assets_url('js/app/controller/crm/certificate/add'))
            ->build('crm/certificate/add');
    }

    public function update($id)
    {
        $this->load->vars(array(
            'page_title' => 'Update Surat pos',
            'page_icon' => '<a class="btn btn-primary" ng-click="vm.update()"> <i class="fa fa-edit"></i> Update</a>',


        ));
        $this->template
            ->set_js_script("var id = " . $id)
            ->set_css(bower_url('datatables/media/css/dataTables.bootstrap4.min'))
            ->set_css(bower_url('angularjs-toaster/toaster'))
            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
            ->set_js(bower_url('datatables/media/js/dataTables.bootstrap4.min'))
            ->set_js(bower_url('angular-datatables/dist/angular-datatables.min'))
            ->set_js(bower_url('angular-animate/angular-animate'))
            ->set_js(bower_url('angularjs-toaster/toaster'))
            ->set_js(assets_url('js/app/controller/crm/certificate/update'))
            ->build('crm/certificate/update');
    }

    public function delete($id)
    {
        $this->load->vars(array(
            'page_title' => 'Delete Surat pos',
            'page_icon' => '<a class="btn btn-danger" ng-click="vm.delete()"> <i class="fa fa-trash"></i> Hapus</a>',

        ));
        $this->template
            ->set_js_script("var id = " . $id)
            ->set_css(bower_url('datatables/media/css/dataTables.bootstrap4.min'))
            ->set_css(bower_url('angularjs-toaster/toaster'))
            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
            ->set_js(bower_url('datatables/media/js/dataTables.bootstrap4.min'))
            ->set_js(bower_url('angular-datatables/dist/angular-datatables.min'))
            ->set_js(bower_url('angular-animate/angular-animate'))
            ->set_js(bower_url('angularjs-toaster/toaster'))
            ->set_js(assets_url('js/app/controller/crm/certificate/delete'))
            ->build('crm/certificate/delete');
    }

    public function view($id)
    {
        $this->load->vars(array(
            'page_title' => 'View RT / RW',
            'id' => $id,
            'page_icon' => '<a class="btn btn-primary" href="' . site_url('crm/certificate/add') . '"> <i class="fa fa-plus"></i> Add</a>',
        ));
        $this->template
            ->set_js_script("var id = " . $id)
            ->set_css(bower_url('datatables/media/css/dataTables.bootstrap4.min'))
            ->set_css(bower_url('angularjs-toaster/toaster'))
            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
            ->set_js(bower_url('datatables/media/js/dataTables.bootstrap4.min'))
            ->set_js(bower_url('angular-datatables/dist/angular-datatables.min'))
            ->set_js(bower_url('angular-animate/angular-animate'))
            ->set_js(bower_url('angularjs-toaster/toaster'))
            ->set_js(assets_url('js/app/controller/crm/certificate/view'))
            ->build('crm/certificate/view');
    }

}