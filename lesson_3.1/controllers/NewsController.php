<?php

require_once __DIR__ . '/AbstractController.php';
require_once __DIR__ . '/../models/NewsArticle.php';

class NewsController
    extends AbstractController
{
    public  function __construct()
    {
        parent::__construct();
    }

    protected function getTemplatePath()
    {
        return __DIR__ . '/../views/news/';
    }

    public function actionAllShow()
    {
        $items = $this->newsModel->allNews();
        $this->render('all', ['items' => $items]);
    }

} 