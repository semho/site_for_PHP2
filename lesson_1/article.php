<?php
require __DIR__ . '/models/news.php';

$article = findOneById($_GET['id']);

include __DIR__ . 'views/article.php';