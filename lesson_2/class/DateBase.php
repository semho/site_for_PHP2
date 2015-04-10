<?php

class DateBase
{
    public $site;
    public $login;
    public $pass;
    public $title;
    public $text;
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
        return $this->dbFindAllByQuery($sql)[0];
    }
    public function addNews($title, $text)
    {
        $this->title = $title;
        $this->text = $text;
        $this->title = mysql_real_escape_string($title);
        $this->text = mysql_real_escape_string($text);
        $query = "INSERT INTO news (title, text, data_a) VALUES ('$this->title', '$this->text', NOW())";
        $result = mysql_query($query);
        if(!$result){
            die(mysql_error());
        }else{
            return true;
        }
    }
} 