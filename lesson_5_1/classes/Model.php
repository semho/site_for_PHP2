<?php

require __DIR__ . '/../classes/DataBase.php';

abstract class Model
{

    protected static $table;

    public $id;

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
        $properties = get_object_vars($this);
        unset($properties['id']);
        $columns = array_keys($properties);
        $places = [];
        $data = [];
        foreach ($columns as $property) {
            $places[] = ':' . $property;
            $data[':' . $property] = $this->$property;
        }
        $sql = 'INSERT INTO ' . static::getTable() . '
                (' . implode(', ', $columns) . ')
                VALUES
                (' . implode(', ', $places) . ')
                ';
        $db = new DataBase();
        $db->execute($sql, $data);
        $this->id = $db->getId();
        return true;
    }
    public function update()//копировать $properties и убрать id
    {
        $properties = get_object_vars($this);
        unset($properties['data_a']);
        unset($properties['id']);
        $columns = array_keys($properties);
        $places = [];
        foreach ($columns as $property) {
            $places[] = $property . '=:' .$property;
        }
        $sql = 'UPDATE ' . static::getTable() . '
                SET ' . implode(', ', $places) . '
                WHERE
                id=:id
                ';

        $db = new DataBase();
        $db->execute($sql, [':id' => $this->id, ':title' => $this->title, ':text' => $this->text]);
        return true;


    }
}