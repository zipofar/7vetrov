<?php

defined('BASEPATH') or die;

require_once BASEPATH . '/app/controller/BaseController.php';
require_once BASEPATH . '/app/model/MTask3.php';

class Task3 extends BaseController
{

    public function createTable()
    {
        $model = new MTask3();
        $model->createTable();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function insert()
    {
        $model = new MTask3();
        $model->fillTable($this->prepareData(10, 5));
//        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function truncate()
    {
        $model = new MTask3();
        $model->truncateTable();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function showTree() {
        $model = new MTask3();
        $tree = $model->getTree();
        var_dump($tree);
        
    }

    private function prepareData($amount_rec, $deep)
    {
        $data = array();
        for ($i = 1; $i <= $amount_rec; $i++) {
            $data[$i]['name'] = $this->getRandomName();
            $data[$i]['parent'] = $this->getRandomParent($i, $data, $deep);
        }
        var_dump($data);
        return $data;

    }

    private function getRandomName()
    {

        $count = rand(2, 3);
        $letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N'];
        $count_letters = count($letters);
        $name = array();

        for ($i = 0; $i < $count; $i++) {
            $name[$i] = $letters[rand(0, $count_letters - 1)];
        }

        return implode('', $name);
    }

    private function getRandomParent($cur_id, $data, $deep)
    {
        $j = false;
        while ($j === false) {
            $parent = rand(0, $cur_id - 1);
            $j = $this->testParent($parent, $data, $deep);
//            var_dump($parent);

        }
//        var_dump('end');
        return $parent;
    }

    private function testParent($parent, $data, $deep)
    {
        for ($i = 0; $i < $deep; $i++) {
            if ($parent > 0 && $i === $deep - 1) {
                return false;
            } else if ($parent > 0) {
                $parent = $data[$parent]['parent'];
            } else {
                return true;
            }
        }
    }

}