<?php

function addNews($title, $text)
{
    $db = new DateBase;
    $title = mysql_real_escape_string($title);
    $text = mysql_real_escape_string($text);
    $query = "INSERT INTO news (title, text, data_a) VALUES ('$title', '$text', NOW())";
    $result = mysql_query($query);
    if(!$result){
        die(mysql_error());
    }else{
        return true;
    }
}