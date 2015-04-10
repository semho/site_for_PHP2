<?php

class DateBase
{
    public $site;
    public $login;
    public $pass;
    public function __construct($site = 'localhost', $login = 'mysql', $pass = 'mysql')
    {
        $this->site = $site;
        $this->login = $login;
        $this->pass = $pass;
        $db = mysql_connect($this->site,  $this->login, $this->pass);
        if(!$db){
        echo "Ошибка подключения к БД";
        }else {
            mysql_selectdb('my_base');
        }
    }
    public function dbFindAllByQuery($sql)
    {
        $result = mysql_query($sql);
        if(!$result){
            die(mysql_error());
        }else{
            $arAllItems = [];
            while($array = mysql_fetch_array($result)) {
                $arAllItems[] = $array;
            }
            return $arAllItems;
        }
    }

    public function dbFindOneByQuery($sql)
    {
        return dbFindAllByQuery($sql)[0];
    }
} 