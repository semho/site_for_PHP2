<?php
function dbConnect()
{
    $db = mysql_connect('localhost', 'mysql', 'mysql');
    if(!$db){
        echo "Ошибка подключения к БД";
    }else {
        mysql_selectdb('my_base');
    }
}

function dbFindAllByQuery($sql)
{
    dbConnect();
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

function dbFindOneByQuery($sql)
{
    return dbFindAllByQuery($sql)[0];
}