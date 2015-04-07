<?php
$db = mysql_connect("localhost","mysql","mysql");
if(!$db){
    echo "Ошибка подключения к БД";
}else{
mysql_select_db("my_base",$db);
}
mysql_query("SET NAMES 'utf-8'");
?>