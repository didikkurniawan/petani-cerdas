<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 9/17/16
 * Time: 07:52
 */


class API_Controller extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        header('Content-type: application/json');
    }

    public function save()
    {

    }

    public function update($id)
    {

    }

    public function view($id)
    {

    }

    public function delete($id)
    {

    }

    protected function get_all($limit = 0, $offset = 0)
    {

    }

    protected function search()
    {

    }

}