<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Forms controller.
 *
 * @package Application
 * @category Controller
 * @author Agung Rizkyana
 */
class pengaduan extends Admin_Controller
{

    public function index()
    {
        $this->load->vars(array(
            'page_title' => '<strong>Master</strong> | jenis Pengaduan',
            'page_icon' => "
                <a href='" . site_url('master/pengaduan/add') . "' class='btn btn-primary' > <i class='fa fa-plus'></i> Tambah </a>
            "
        ));

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
            ->set_js('configs/datatables')
            ->set_js('controllers/master/pengaduan/index')
            ->build('master/pengaduan/index');
    }

    public function add()
    {
        $this->load->vars(array(
            'page_title' => '<strong>jenis Pengaduan</strong> | Tambah',
        ));

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
            ->set_js('configs/datatables')
            ->set_js('controllers/master/pengaduan/add')
            ->build('master/pengaduan/add');
    }

    public function update($id)
    {
        $this->load->vars(array(
            'page_title' => '<strong>jenis Pengaduan</strong> | Ubah',
            'id' => $id,
            'data' => $this->db->get_where('m_pengaduan', array('id' => $id))->row()
        ));

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
            ->set_js('configs/datatables')
            ->set_js('controllers/master/pengaduan/update')
            ->build('master/pengaduan/update');
    }

    public function view($id)
    {
        $this->load->vars(array(
            'page_title' => '<strong>jenis Pengaduan</strong> | View',
            'id' => $id,
            'data' => $this->db->get_where('m_pengaduan', array('id' => $id))->row()
        ));

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
            ->set_js('configs/datatables')
            ->set_js('controllers/master/pengaduan/view')
            ->build('master/pengaduan/view');
    }

    public function delete($id)
    {
        $this->load->vars(array(
            'page_title' => '<strong>jenis Pengaduan</strong> | Haous',
            'id' => $id,
            'data' => $this->db->get_where('m_pengaduan', array('id' => $id))->row()
        ));

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
            ->set_js('configs/datatables')
            ->set_js('controllers/master/pengaduan/delete')
            ->build('master/pengaduan/delete');
    }

}
