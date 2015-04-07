<?php

function all_news(){
    GLOBAL $db;
    $resultat = mysql_query("SELECT * FROM news ORDER BY data_a DESC", $db);
    if(!$resultat){
        die(mysql_error());
    }else{
        $array = mysql_fetch_array($resultat);
        return $array;
    }
}