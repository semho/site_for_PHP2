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
                (' . implode(', ', $columns) . ', data_a)
                VALUES
                (' . implode(', ', $places) . ', NOW())
                ';
        $db = new DataBase();
        $db->execute($sql, $data);
        return $this->id = $db->getId();
    }
    public function update()
    {
        $properties = get_object_vars($this);
        $properties_no_id = $properties;
        unset($properties['data_a']);
        unset($properties_no_id['id'], $properties_no_id['data_a']);
        $columns = array_keys($properties_no_id);
        $places = [];
        foreach ($columns as $property) {
            $places[] = $property . '=:' .$property;
        }
        $columns = array_keys($properties);
        foreach ($columns as $property) {
            $data[':' . $property] = $this->$property;
        }
        $sql = 'UPDATE ' . static::getTable() . '
                SET ' . implode(', ', $places) . '
                WHERE id=:id';
        $db = new DataBase();
        return $db->execute($sql, $data);
    }
    public function delete()
    {
        $sql = "DELETE FROM " .static::getTable() . " WHERE id=:id";
        $db = new DataBase();
        return $db->execute($sql,  [':id' => $this->id]);
    }
}