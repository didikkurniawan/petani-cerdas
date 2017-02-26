<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 10/1/16
 * Time: 05:58
 */

use Zend\Barcode\Barcode;

class Export extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->load->vars(array(
            'page_title' => '<strong>Sample</strong> | Export PDF / Excel dan Summernote (Text Editor)',
        ));

        $this->template
            ->set_css(assets_url('css/plugins/angular-datatables/angular-bootstrap.datatables'))
            ->set_css(bower_url('select2/dist/css/select2.min'))
            ->set_css(assets_url('css/custom'))
            ->set_css(bower_url('summernote/dist/summernote'))
            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
            ->set_js(bower_url('datatables/media/js/dataTables.bootstrap4.min'))
            ->set_js(bower_url('select2/dist/js/select2.full.min'))
            ->set_js(bower_url('summernote/dist/summernote'))
            ->set_js('configs/datatables')
            ->set_js('controllers/samples/export/index')
            ->build('samples/export/index');
    }


    public function export_pdf()
    {
        $html = $this->load->view('pos/order/export/pdf/report', [], TRUE);
        $mpdf = new mPDF();
        $mpdf->WriteHTML($html);
        $mpdf->Output("report_pdf", "I");
    }

    public function export_excel()
    {
        $obj_excel = new PHPExcel();
        $obj_excel->getProperties()->setCreator($_SESSION['username'])
            ->setLastModifiedBy($_SESSION['username'])
            ->setTitle("Report Order " . date('Y-m-d'))
            ->setSubject("Report Order " . date('Y-m-d'))
            ->setDescription("Test document for PHPExcel, generated using PHP classes.")
            ->setKeywords("office PHPExcel php")
            ->setCategory("Test result file");
        $obj_excel->setActiveSheetIndex(0)
//            header
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'No Purchase Order')
            ->setCellValue('C1', 'Tanggal Order')
            ->setCellValue('D1', 'Perusahaan')

//            content
            ->setCellValue('A2', '1')
            ->setCellValue('B2', 'PO/IND/001/XII/2016')
            ->setCellValue('C2', '13/12/2016')
            ->setCellValue('D2', 'PT. Angin Ribut')

            ->setCellValue('A3', '1')
            ->setCellValue('B3', 'PO/IND/001/XII/2016')
            ->setCellValue('C3', '13/12/2016')
            ->setCellValue('D3', 'PT. Angin Ribut')

            ->setCellValue('A4', '1')
            ->setCellValue('B4', 'PO/IND/001/XII/2016')
            ->setCellValue('C4', '13/12/2016')
            ->setCellValue('D4', 'PT. Angin Ribut');


        $objWriter = PHPExcel_IOFactory::createWriter($obj_excel, 'Excel5');

        $callStartTime = microtime(true);
        $callEndTime = microtime(true);
        $callTime = $callEndTime - $callStartTime;

        $file_save_location = APPPATH . "/views/pos/order/export/excel/" .  date('Ymd') . "_" . 'report_order.xlsx';
        $objWriter->save($file_save_location);

        if (file_exists($file_save_location)) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            header('Content-Type: ' . finfo_file($finfo, $file_save_location));
            $finfo = finfo_open(FILEINFO_MIME_ENCODING);
            header('Content-Transfer-Encoding: ' . finfo_file($finfo, $file_save_location));
            header('Content-disposition: attachment; filename="' . basename($file_save_location) . '"');
            readfile($file_save_location);
        } else {
            throw new Exception('File not found');
        }

    }

}