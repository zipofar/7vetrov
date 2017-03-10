<?php

defined('BASEPATH') or die;

class BaseModel
{
    protected $DB;

    private function getDbConfig()
    {
        require_once BASEPATH . "/config/db.php";
        return $db_conf;
    }

    public function __construct()
    {
        extract($this->getDbConfig());
        $this->DB = new PDO ("mysql:host=$host; dbname=$database; charset=$charset", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
}