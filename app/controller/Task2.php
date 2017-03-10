<?php

defined('BASEPATH') or die;

require_once BASEPATH.'/app/controller/BaseController.php';

class Task2 extends BaseController
{

    private $test_data = 'Lorem tri: ipsum dolor sit raz: amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud dva: exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat tri: cupidatat non proident, sunt in culpa qui officia tri: deserunt mollit anim id est dva: laborum. Lorem ipsum dolor sit tri: amet, consectetur adipiscing elit, sed do eiusmod tempor.';

    public function index()
    {
        $key_val = array();

        $keys = array('raz:', 'dva:', 'tri:', 'chetire:');
        $string_keys = implode('|', $keys);

        foreach($keys as $key) {
            preg_match_all("/(($key)(.*?)($string_keys|$))/", $this->test_data, $matches);
            if(!empty($matches[3])) {
                $key_val[$key] = $matches[3][count($matches[3]) - 1];
            }
        }

        $this->view('task2', ['key_val' => $key_val, 'text' => $this->test_data]);

    }

}