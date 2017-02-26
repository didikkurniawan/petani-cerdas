<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 10/16/16
 * Time: 17:18
 */
class File extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cdn');
    }

    public function test_index(){
        $array = array(0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red');

        $key1 = array_search('green', $array); // $key = 2;
        $key2 = array_search('yello', $array);   // $key = 1;

        echo $this->json_response([
            'key1' => $key1,
            'key2' => $key2
        ]);
    }

    public function upload_multiple_image($file_index){
        $response = $this->cdn->upload_multiple_image($file_index);
        if (is_array($response)) {
            echo $this->json_response($response);
            exit;
        } else {
            throw new $response;
        }

    }

    public function upload_image()
    {

        $response = $this->cdn->upload_image('file');
        if (is_array($response)) {
            echo json_encode($response);
            exit;
        } else {
            throw new $response;
        }

    }

    public function upload_docs($file_index, $filename = null)
    {

        $response = $this->cdn->upload_docs($file_index, $filename);
        if (is_array($response)) {
            echo json_encode($response);
            exit;
        } else {
            throw new $response;
        }

    }

    public function download()
    {
        $file = $this->input->get('file');
        if (!$file) {
            throw new Exception('Cannot find file');
        }

        $path = base64_decode($file);

        if (file_exists($path)) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            header('Content-Type: ' . finfo_file($finfo, $path));
            $finfo = finfo_open(FILEINFO_MIME_ENCODING);
            header('Content-Transfer-Encoding: ' . finfo_file($finfo, $path));
            header('Content-disposition: attachment; filename="' . basename($path) . '"');
            readfile($path);
        } else {
            throw new Exception('File not found');
        }

    }

    private function json_response($response){
        header('Content-type: application/json');
        echo json_encode($response);
    }
}