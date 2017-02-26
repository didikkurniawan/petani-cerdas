<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Forms controller.
 *
 * @package App
 * @category Controller
 * @author Ardi Soebrata
 */
class Pengkajian_ulang extends Admin_Controller
{
    protected $class_name = "Pengkajian Ulang";

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
                <a href='" . site_url('penerimaan_sample/penawaran_biaya/add') . "' class='btn btn-primary' > <i class='fa fa-plus'></i> Tambah </a>
            "
        ));

        $this->template
            ->set_js('controllers/penerimaan_sample/penawaran_biaya/index')
            ->build('samples/blank_page');
    }

    public function add()
    {
        $this->load->vars(array(
            'page_title' => '<strong>' . $this->class_name . '</strong> | Add',
        ));

        $this->template
            ->set_js('controllers/penerimaan_sample/penawaran_biaya/add')
            ->build('penerimaan_sample/penawaran_biaya/add');
    }

    public function update($id)
    {
        $this->load->vars(array(
            'page_title' => '<strong>' . $this->class_name . '</strong> | Update',
            'id' => $id,
            'data' => $this->db->get_where('penawaran', array('id' => $id))->row()
        ));

        $this->template
            ->set_js('controllers/penerimaan_sample/penawaran_biaya/update')
            ->build('penerimaan_sample/penawaran_biaya/update');
    }

    public function view($id)
    {
        $this->load->vars(array(
            'page_title' => '<strong>' . $this->class_name . '</strong> | View',
            'id' => $id,
            'data' => $this->db->get_where('sample_crud', array('id' => $id))->row()
        ));

        $this->template
            ->set_js('controllers/penerimaan_sample/penawaran_biaya/view')
            ->build('penerimaan_sample/penawaran_biaya/view');
    }

    public function delete($id)
    {
        $this->load->vars(array(
            'page_title' => '<strong>' . $this->class_name . '</strong> | Delete',
            'id' => $id,
            'data' => $this->db->get_where('sample_crud', array('id' => $id))->row()
        ));

        $this->template
            ->set_js('controllers/penerimaan_sample/penawaran_biaya/delete')
            ->build('penerimaan_sample/penawaran_biaya/delete');
    }

}
