<?php

/**
* Created by PhpStorm.
* User: agungrizkyana
* Date: 10/16/16
* Time: 17:18
*/
class Cdn
{
    
    private $_IMAGES = [];
    private $_DOCS = [];
    
    private $folder_path = 'uploads/';
    
    private $JPEG = 'jpeg';
    private $PNG = 'png';
    private $JPG = 'jpg';
    private $DOCX = 'docx';
    private $DOCS = 'docs';
    private $PDF = 'pdf';
    private $XLS = 'xls';
    private $XLSX = 'xlsx';
    
    
    private $MAX_SIZE = 1000000000;
    
    private $IMAGE_FORMAT_EXCEPTION_MESSAGE = 'File harus berformat png/jpg/jpeg untuk ';
    private $DOCS_FORMAT_EXCEPTION_MESSAGE = 'File harus DOCS/DOCX/PDF untuk ';
    private $SIZE_EXCEED_LIMIT_EXCEPTION_MESSAGE = 'File melebih dari 1 Gb';
    private $UPLOAD_FAILED_EXCEPTION_MESSAGE = 'Gagal Upload File';
    
    public function __construct()
    {
        $this->_DOCS = [$this->DOCS, $this->DOCX, $this->PDF];
        $this->_IMAGES = [$this->JPEG, $this->JPG, $this->PNG];
        
    }
    
    private function is_image($type)
    {
        $index = array_search($type, $this->_IMAGES);
        if ($index == false) {
            return false;
        } else {
            return true;
        }
    }
    
    private function is_docs($type)
    {
        $index = array_search($type, $this->_IMAGES);
        if ($index == false) {
            return false;
        } else {
            return true;
        }
    }
    
    private function is_max_size($size)
    {
        if ($size < $this->MAX_SIZE) {
            return true;
        } else {
            return false;
        }
        
    }
    
    private function do_upload($file_name, $file_tmp_name)
    {
        $temp = explode(".", $file_name);
        $newfilename = substr(md5(time()), 0, 100) . '.' . end($temp);
        move_uploaded_file($file_tmp_name, $this->folder_path . $newfilename);
        return $this->folder_path . $newfilename;
    }
    
    public function upload_multiple_image($file_index)
    {
        
        $files_container = [];
        $i = 0;
        if (isset($_FILES[$file_index])) {
            foreach ($_FILES[$file_index]['name'] as $file) {
                $type = pathinfo($_FILES[$file_index]['name'][$i]);
                $size = $_FILES[$file_index]['size'][$i];
                
                // check file status
                if ($_FILES[$file_index]['error'][$i] != 0) {
                    return new Exception($this->UPLOAD_FAILED_EXCEPTION_MESSAGE);
                    break;
            }
            //
            //                //check image type
            if (!$this->is_image($type['extension'])) {
                return new Exception($this->IMAGE_FORMAT_EXCEPTION_MESSAGE);
                break;
        }
        //
        //                //check file size exceed
        if (!$this->is_max_size($_FILES[$file_index]['size'][$i])) {
            return new Exception($this->SIZE_EXCEED_LIMIT_EXCEPTION_MESSAGE);
            break;
    }
    
    // do upload
    $temp = explode(".", $_FILES[$file_index]["name"][$i]);
    $newfilename = substr(md5(time()), 0, 100) . '.' . end($temp);
    $is_upload = move_uploaded_file($_FILES[$file_index]['tmp_name'][$i], $this->folder_path . $newfilename);
    if ($is_upload) {
        array_push($files_container, $is_upload);
    } else {
        return new Exception($this->UPLOAD_FAILED_EXCEPTION_MESSAGE);
        break;
}


$i++;
}
} else {
    return new Exception($this->UPLOAD_FAILED_EXCEPTION_MESSAGE);
}

return $files_container;
}

public function upload_image($file_index, $filename = null)
{
    $ext = pathinfo($_FILES[$file_index]['name']);
    $size = $_FILES[$file_index]['size'];
    
    if ($ext['extension'] == $this->PNG || $ext['extension'] == $this->JPG || $ext['extension'] == $this->JPEG) {
        if ($size > $this->MAX_SIZE) { // 1000000000 byte = 1 gb
            return new Exception($this->SIZE_EXCEED_LIMIT_EXCEPTION_MESSAGE . $file_index);
        }
        
        if (isset($_FILES[$file_index]) && $_FILES[$file_index]['error'] == 0) {
            $temp = explode(".", $_FILES[$file_index]["name"]);
            $newfilename = ($filename == null) ? substr(md5(time()), 0, 10) : $filename . '.' . end($temp);
            move_uploaded_file($_FILES[$file_index]['tmp_name'], $this->folder_path . $newfilename);
            return [
            'file' => base64_encode($this->folder_path . $newfilename)
            ];
            
        } else {
            return new Exception($this->UPLOAD_FAILED_EXCEPTION_MESSAGE . $file_index);
            
        }
        
    } else {
        return new Exception($this->IMAGE_FORMAT_EXCEPTION_MESSAGE);
    }
    
}

public function upload_docs($file_index)
{
    
    $ext = pathinfo($_FILES[$file_index]['name']);
    $size = $_FILES[$file_index]['size'];
    if ($ext['extension'] == $this->XLS || $ext['extension'] == $this->XLSX || $ext['extension'] == $this->DOCS || $ext['extension'] == $this->DOCX || $ext['extension'] == $this->PDF) {
        
        if ($size > $this->MAX_SIZE) { // 1000000000 byte = 1 gb
            return new Exception($this->SIZE_EXCEED_LIMIT_EXCEPTION_MESSAGE . $file_index);
        }
        
        if (isset($_FILES[$file_index]) && $_FILES[$file_index]['error'] == 0) {
            $temp = explode(".", $_FILES[$file_index]["name"]);
            $newfilename = substr(md5(time()), 0, 10) . '.' . end($temp);
            move_uploaded_file($_FILES[$file_index]['tmp_name'], $this->folder_path . $newfilename);
            return [
            'file' => base64_encode($this->folder_path . $newfilename)
            ];
            
        } else {
            return new Exception($this->UPLOAD_FAILED_EXCEPTION_MESSAGE . $file_index);
        }
    } else {
        return new Exception($this->DOCS_FORMAT_EXCEPTION_MESSAGE);
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
}