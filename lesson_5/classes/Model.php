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
        $sql = "INSERT INTO " .static::getTable() . " ". $this->inFields . " VALUES " . $this->endFields;
        $db = new DataBase();
        return $db->getQueryId($sql, $this->arParams);
    }
    public function update()
    {
        $sql = "UPDATE " .static::getTable() . " SET " . $this->inFields . " WHERE " . $this->endFields;
        $db = new DataBase();
        return $db->getQuery($sql,  $this->arParams);
    }
    public function delete()
    {
        $sql = "DELETE FROM " .static::getTable() . " WHERE " . $this->endFields;
        $db = new DataBase();
        return $db->getQuery($sql,  $this->arParams);
    }

    /*
    public function findId()
    {
        $sql = 'SELECT id FROM ' .static::getTable() . ' WHERE title=:title AND text=:text';
        $db = new DataBase();
        return $db->getColumn($sql, [':title' => $this->title, ':text' => $this->text]);
    }*/
}