<?php
require __DIR__ . '/config.php';

$db = new DateBase;
$news = $db->allNews();

include __DIR__ . '/views/index.php';