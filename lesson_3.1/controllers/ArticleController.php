<?php

require_once __DIR__ . '/AbstractController.php';
require_once __DIR__ . '/../models/NewsArticle.php';

class ArticleController
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

    public function actionOneShow($id)
    {
        $item = $this->newsModel->selectOneById($id);
        $this->render('article', ['item' => $item]);
    }
} 