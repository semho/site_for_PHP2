<?php

require_once __DIR__ . '/AbstractController.php';
require_once __DIR__ . '/../models/NewsArticle.php';

class NewsController
    extends AbstractController
{
    public  $newsModel;

    function __construct()
    {
        $this->newsModel = new NewsArticle;
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

    public function actionShow() {

        if(!$this->arParams["id_get"]) {
            $this->actionAllShow();
        } else {
            $this->actionOneShow($this->arParams["id_get"]);
        }
    }
} 