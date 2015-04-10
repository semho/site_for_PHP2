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
    $resultat = mysql_query($sql);
    if(!$resultat){
        die(mysql_error());
    }else{
        $arAllItems = [];
        while($array = mysql_fetch_array($resultat)) {
            $arAllItems[] = $array;
        }
        return $arAllItems;
    }
}

function dbFindOneByQuery($sql)
{
    return dbFindAllByQuery($sql)[0];
}