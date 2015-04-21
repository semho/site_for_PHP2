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
        $class = static::class;
        $sql = "INSERT INTO " .static::getTable() . " (title, text, data_a) VALUES (:title, :text, NOW())";
        $db = new DataBase();
        return $db->findOne($class, $sql, [':title' => $this->title, ':text' => $this->text]);
    }
    public function findId()
    {
        $sql = 'SELECT id FROM ' .static::getTable() . ' WHERE title=:title AND text=:text';
        $db = new DataBase();
        return $db->getColumn($sql, [':title' => $this->title, ':text' => $this->text]);
    }
    public function update()
    {
        $class = static::class;
        $sql = "UPDATE " .static::getTable() . " SET title =:title, text =:text WHERE id=:id";
        $db = new DataBase();
        return $db->findOne($class, $sql,  [':id' => $this->id, ':title' => $this->title, ':text' => $this->text]);
    }

}