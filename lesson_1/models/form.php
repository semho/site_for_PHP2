<?php
require __DIR__ . '/../db/db.php';

function addNews($title, $text)
{
    dbConnect();
    $title = mysql_real_escape_string($title);
    $text = mysql_real_escape_string($text);
    $query = "INSERT INTO news (title, text, data_a) VALUES ('$title', '$text', NOW())";
    return mysql_query($query);
}