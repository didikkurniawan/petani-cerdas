<?php

/**
 *
 */
class Migrate extends CI_Controller
{

    public function __construct()
    {
        echo "working migrate : " .APPPATH. "\n";
        parent::__construct();
        if($this->input->is_cli_request() == FALSE){
            show_404();
        }
        $this->load->library('migration');
        $this->load->dbforge();

    }

    public function message($message){
        echo "Hello, " . $message . PHP_EOL;
    }

    public function latest(){
        $this->migration->latest();
        echo "Migrate Success ! " . $this->migration->error_string() . PHP_EOL;
    }

    public function version($version){
        $migration = $this->migration->version($version);
        if(!$migration){
            echo $this->migration->error_string();
        }else{
            echo "Migration done : " . PHP_EOL;
        }
    }

    public function generate($name = false)
    {
        if(!$name)
        {
            echo "Please define migration name". PHP_EOL;
            return;
        }

        if (!preg_match('/^[a-z_]+$/i', $name)) {
            if (strlen($name) < 4) {
                echo "Migration must be at least 4 characters long" . PHP_EOL;
                return;
            }
            echo "Wrong migration name, allowed characters: a-z and _\nExample: first_migration" . PHP_EOL;
            return;
        }
        $filename = date('YmdHis') . '_' . $name . '.php';
        try {
            $folderPath = APPPATH . 'migrations';
            if (!is_dir($folderPath)) {
                try{
                    mkdir($folderPath);
                }
                catch(Exception $e) {
                    echo "Error:\n" . $e->getMessage() . PHP_EOL;
                }
            }
            $filepath = APPPATH . 'migrations/' . $filename;
            if (file_exists($filepath)) {
                echo "File allredy exists:\n" . $filepath . PHP_EOL;
                return;
            }
            $data['className'] = ucfirst($name);
            $template = $this->load->view('migration/template', $data, TRUE);
            //Create file
            try{
                $file = fopen($filepath, "w");
                $content = "<?php\n" . $template;
                fwrite($file, $content);
                fclose($file);
            }
            catch(Exception $e){
                echo "Error:\n" . $e->getMessage() . PHP_EOL;
            }
            echo "Migration created successfully!\nLocation: " . $filepath . PHP_EOL;
        } catch (Exception $e) {
            echo "Can't create migration file!\nError: " . $e->getMessage() . PHP_EOL;
        }
    }


}