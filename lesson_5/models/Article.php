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
    //добавление новости
    public function addNews($title, $text)
    {
        $sql = "INSERT INTO " . $this->getTable() . " (title, text, data_a) VALUES ('$title', '$text', NOW())";
        $result = $this->db->dbCheckErrorByQuery($sql);
        return $result;
    }
    //обновление существующей новости
    public function updateNews($id, $title, $text){
        $sql = "UPDATE " . $this->getTable() . " SET title ='" . $title . "', text ='" . $text . "' WHERE id='" . $id. "'";
        $result = $this->db->dbCheckErrorByQuery($sql);
        return $result;
    }

} 