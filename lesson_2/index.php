<?php
require __DIR__ . '/models/news.php';

require __DIR__ . '/config.php';

$news = allNews();

require __DIR__ . '/views/index.php';