<?php
require __DIR__ . '/config.php';

$db = new DateBase;
$all = new News;
$news = $all->allNews();

include __DIR__ . '/views/index.php';