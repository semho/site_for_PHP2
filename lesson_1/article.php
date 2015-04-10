<?php
require __DIR__ . '/models/news.php';

$article = selectOneById($_GET['id']);

include __DIR__ . '/views/article.php';