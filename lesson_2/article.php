<?php
require __DIR__ . '/config.php';

$db = new DateBase;
$art = new News;
$article = $art->selectOneById($_GET['id']);

include __DIR__ . '/views/article.php';