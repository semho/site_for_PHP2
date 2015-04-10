<?php
require __DIR__ . '/config.php';

$db = new DateBase;
$article = $db->selectOneById($_GET['id']);

include __DIR__ . '/views/article.php';