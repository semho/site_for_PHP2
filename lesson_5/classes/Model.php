<?php

require __DIR__ . '/../classes/DataBase.php';

abstract class Model
{

    protected static $table;

    public static function getTable()
    {
        return static::$table;
    }
    public static function allNews()
    {
        $class = static::class;
        $sql = 'SELECT * FROM ' .static::getTable() . ' ORDER BY data_a DESC';
        $db = new DataBase();
        return $db->dbFindAllByQuery($class, $sql);
    }
    public static function selectOneById($id)
    {
        $class = static::class;
        $sql = 'SELECT * FROM ' .static::getTable() . ' WHERE id=:id';
        $db = new DataBase();
        return $db->dbFindOneByQuery($class, $sql, [':id' => $id]);
    }
    //добавление новости
    public function addNews($title, $text)
    {
        $sql = "INSERT INTO " .static::getTable() . " (title, text, data_a) VALUES (:title, :text, NOW())";
        $db = new DataBase();
        $result = $db->dbCheckErrorByQuery($sql, [':title' => $title, ':text' => $text]);
        return $result;
    }
    //обновление существующей новости
    public function updateNews($id, $title, $text){
        $sql = "UPDATE " .static::getTable() . " SET title =:title, text =:text WHERE id=:id";
        $db = new DataBase();
        $result = $db->dbCheckErrorByQuery($sql,  [':id' => $id, ':title' => $title, ':text' => $text]);
        return $result;
    }
} 