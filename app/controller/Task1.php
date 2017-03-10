<?php

defined('BASEPATH') or die;

require_once BASEPATH.'/app/controller/BaseController.php';

class Task1 extends BaseController
{

    private $test_data = '[tag1:options-tag1]This is TAG 1[/tag1] Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna  aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea [tag2]This is TAG 2[/tag2] commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat [tag3:options-tag3]This is TAG 3[/tag3] cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum [tag4:options-tag4]This is TAG 4[/tag4].';

    public function index()
    {
        $key_val = array();
        $key_opt = array();

        preg_match_all('/\[.+?\].+?\[\/.+?\]/', $this->test_data, $all_tags);

        foreach ($all_tags[0] as $tag) {
            preg_match('/\[(.+?)((:(.+?)\])|\])(.+?)\[\/.+?\]/', $tag, $matches);

            // $matches[1] = tag name; $matches[4] = tag option; $matches[5] = tag value;
            $key_val[$matches[1]] = $matches[5];
            $key_opt[$matches[1]] = $matches[4];
        }

        $this->view('task1', ['key_val' => $key_val, 'key_opt' => $key_opt, 'text' => $this->test_data]);

    }

}