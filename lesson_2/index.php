<?php
require __DIR__ . '/config.php';

require __DIR__ . '/models/news.php';

$news = allNews();

require __DIR__ . '/views/index.php';