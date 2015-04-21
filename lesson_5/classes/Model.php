<?php

require __DIR__ . '/../classes/DataBase.php';

abstract class Model
{

    protected static $table;

    public static function getTable()
    {
        return static::$table;
    }
    public static function findAll()
    {
        $class = static::class;
        $sql = 'SELECT * FROM ' .static::getTable();
        $db = new DataBase();
        return $db->findAll($class, $sql);
    }
    public static function findOne($id)
    {
        $class = static::class;
        $sql = 'SELECT * FROM ' .static::getTable() . ' WHERE id=:id';
        $db = new DataBase();
        return $db->findOne($class, $sql, [':id' => $id]);
    }
    public function insert()
    {
        $sql = "INSERT INTO " .static::getTable() . " (title, text, data_a) VALUES (:title, :text, NOW())";
        $db = new DataBase();
        return $db->dbCheckErrorByQuery($sql, [':title' => $this->title, ':text' => $this->text]);
    }
    public function update()
    {
        $sql = "UPDATE " .static::getTable() . " SET title =:title, text =:text WHERE id=:id";
        $db = new DataBase();
        return $db->dbCheckErrorByQuery($sql,  [':id' => $this->id, ':title' => $this->title, ':text' => $this->text]);
    }

}