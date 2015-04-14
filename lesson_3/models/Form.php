<?php

require_once __DIR__ . '/../classes/DataBase.php';

abstract class Form
{
    protected $db;
    protected $title;
    protected $text;
    protected $id;

    abstract protected function getTable();

    public function __construct()
    {
        $this->db = new DataBase();
    }

    //���������� �������
    public function addNews($title, $text)
    {
        $sql = "INSERT INTO " . $this->getTable() . " (title, text, data_a) VALUES ('$title', '$text', NOW())";
        $result = $this->db->dbCheckErrorByQuery($sql);
        return $result;
    }
    //���������� ������������ �������
    public function updateNews($id, $title, $text){
        $sql = "UPDATE " . $this->getTable() . " SET title ='" . $title . "', text ='" . $text . "' WHERE id='" . $id. "'";
        $result = $this->db->dbCheckErrorByQuery($sql);
        return $result;
    }

} 