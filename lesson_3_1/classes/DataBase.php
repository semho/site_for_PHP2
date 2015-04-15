<?php
class DataBase
{
    public function __construct()
    {
        $config = include __DIR__ . '/../config/db.php';
        $db = mysql_connect($config['host'], $config['user'], $config['password']);
        if (!$db) {
            echo "Ошибка подключения к БД";
        } else {
            mysql_selectdb($config['dbname']);
        }
    }
    //возвращает массив записей
    public function dbFindAllByQuery($sql)
    {
        $result = mysql_query($sql);
        if (!$result) {
            die(mysql_error());
        } else {
            $arAllItems = [];
            while ($array = mysql_fetch_assoc($result)) {
                $arAllItems[] = $array;
            }
            return $arAllItems;
        }
    }
    //ввозвращает одну запись
    public function dbFindOneByQuery($sql)
    {
        return $this->dbFindAllByQuery($sql)[0];
    }
    //проверка того, что вернул переданный указатель в запросе от БД
    public function dbCheckErrorByQuery($sql)
    {
        $result = mysql_query($sql);
        if (!$result) {
            die(mysql_error());
        } else {
            return $result;
        }
    }
}