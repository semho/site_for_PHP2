<?php

require_once __DIR__ . '/AbstractController.php';
require_once __DIR__ . '/../models/NewsArticle.php';

class NewsController
    extends AbstractController
{
    function __construct()
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

    public function actionOneShow($id)
    {
        $item = $this->newsModel->selectOneById($id);
        $this->render('article', ['item' => $item]);
    }

    public function show() {

        if(!$this->arParams["ID"]) $this->actionAllShow();
        else $this->actionOneShow($this->arParams["ID"]);
    }
} 