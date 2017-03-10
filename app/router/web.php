<?php

defined('BASEPATH') or die;

class Router
{
    /*
     * $uri /controller_name/function_name
     */
    public function __construct($uri) {

        $uri =  mb_substr($uri, 1);
        $controller_name = ucfirst(mb_substr($uri, 0, mb_stripos($uri, '/')));
        $function_name = mb_substr($uri, mb_stripos($uri, '/')+1);

        if(empty($controller_name)) { require_once BASEPATH.'/view/main.php'; return; }

        $controller = BASEPATH . '/app/controller/' . $controller_name . '.php';

        if(file_exists($controller)) {

            require_once $controller;

            $class = $controller_name;

            $obj = new $class();

            if(method_exists($obj, $function_name)) {
                $obj->$function_name();
            } else { echo 'No method'; }



        } else { echo 'No controller'; }


    }
}