<?php

class App
{
    public static function getCurrentUser($id)
    {
        $class = static::class;
        $sql = 'SELECT * FROM users WHERE id=:id';
        $db = new DataBase();
        $res = $db->findOne($class, $sql, [':id' => $id]);
        return $res;
    }
    public static function isAdmin($id)
    {
        $access = App::getCurrentUser($id)->access;
        return ($access == 1);
    }
    public static function loadSession()
    {
        if($_SESSION['user']['id'] > 0) {

            App::getCurrentUser($_SESSION['user']['id']);
            return true;
        }
        return false;
    }
} 