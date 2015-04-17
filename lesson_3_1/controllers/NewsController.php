<?php

require_once __DIR__ . '/../models/NewsArticle.php';
require_once __DIR__ . '/../classes/View.php';

class NewsController
{
    protected $view;
    protected  $newsModel;
    public  function __construct()
    {
        $this->newsModel = new NewsArticle;
        $this->view = new View(__DIR__ . '/../views/news/');
    }
    public function actionAllShow()
    {
        $this->view->items = $this->newsModel->allNews();
        $this->view->render('all');
    }
    public function actionOneShow()
    {
        $id = $_GET['id'];
        $this->view->items = $this->newsModel->selectOneById($id);
        $this->view->render('article');
    }

} 