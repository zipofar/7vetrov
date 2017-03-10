<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
mb_internal_encoding("UTF-8");

define("BASEPATH", __DIR__);

require_once (BASEPATH.'/app/router/web.php');

$route = new Router($_SERVER['REQUEST_URI']);