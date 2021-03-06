<?php

defined('BASEPATH') or die;

class BaseController
{
    private $data = array();

    protected function view($view_name, array $data) {
        $this->data = $data;
        unset($data);
        extract($this->data);
        require_once BASEPATH."/view/".$view_name.".php";
    }
}