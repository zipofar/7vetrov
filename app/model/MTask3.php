<?php

defined('BASEPATH') or die;

require_once BASEPATH . '/app/model/BaseModel.php';

class MTask3 extends BaseModel
{
    public function createTable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `tree` (`id` bigint NOT NULL AUTO_INCREMENT, `name` varchar(255) NOT NULL, `parent` bigint NOT NULL, PRIMARY KEY (`id`) )';
        $stmt = $this->DB->prepare($sql);
        $stmt->execute();
    }

    public function fillTable($data)
    {
        $sql = 'INSERT INTO `tree` SET name = :name, parent = :parent';

        foreach ($data as $item) {
            $stmt = $this->DB->prepare($sql);
            $stmt->execute($item);
        }

    }

    public function getTree()
    {
        $sql = 'SELECT * FROM `tree` ORDER BY `parent`';
        $stmt = $this->DB->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function truncateTable()
    {
        $sql = 'TRUNCATE tree';
        $stmt = $this->DB->prepare($sql);
        $stmt->execute();
    }
}