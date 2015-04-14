<?php

require_once __DIR__ . '/../classes/DataBase.php';

abstract class Article
{
    protected $db;

    abstract protected function getTable();

    public function __construct()
    {
        $this->db = new DataBase();
    }
    public function allNews()
    {
        $sql = 'SELECT * FROM ' . $this->getTable() . ' ORDER BY data_a DESC';
        $ret = $this->db->dbFindAllByQuery($sql);
        return $ret;
    }
    public function selectOneById($id)
    {
        $sql = 'SELECT * FROM ' . $this->getTable() . ' WHERE id=' . $id;
        $ret = $this->db->dbFindOneByQuery($sql);
        return $ret;
    }

} 