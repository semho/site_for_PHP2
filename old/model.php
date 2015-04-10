<?php

function all_news(){
    GLOBAL $db;
    $resultat = mysql_query("SELECT * FROM news ORDER BY data_a DESC", $db);
    if(!$resultat){
        die(mysql_error());
    }else{
        $arAllItems = array();
        while($array = mysql_fetch_array($resultat)) {
            $arAllItems[] = $array;
        }
        return $arAllItems;
    }
}

function view_new($id){
    GLOBAL $db;
    $resultat = mysql_query("SELECT * FROM news WHERE id = '$id'", $db);
    if(!$resultat){
        die(mysql_error());
    }else{
        $array = mysql_fetch_array($resultat);
        return $array;
    }
}
function add_new($title, $text){
    GLOBAL $db;
    $title = trim($title);
    $content = trim($text);
    $resultat = mysql_query("INSERT INTO news (title, text, data_a) VALUE ('$title', '$content', NOW())", $db);
    if(!$resultat){
        die(mysql_error());
    }else{
       return true;
    }
}