<?php

class DateBase
{
    private $site;
    private $login;
    private $pass;

    public function __construct($site = 'localhost', $login = 'mysql', $pass = 'mysql')
    {
        $this->site = $site;
        $this->login = $login;
        $this->pass = $pass;
        $db = mysql_connect($this->site, $this->login, $this->pass);
        if (!$db) {
            echo "Ошибка подключения к БД";
        } else {
            mysql_selectdb('my_base');
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
            while ($array = mysql_fetch_array($result)) {
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