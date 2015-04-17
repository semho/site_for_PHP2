<?php

require_once __DIR__ . '/../models/NewsArticle.php';
require_once __DIR__ . '/../classes/View.php';

class AdminController
    extends View
{
    protected $view;
    protected  $newsModel;
    public function __construct()
    {
        $this->newsModel = new NewsArticle;
        $this->view = new View(__DIR__ . '/../views/news/');
    }
    public function actionViewFormNews(){
        $this->view->render('form');
    }
    public function actionAddNews()
    {
        $title = ($_POST['title']);
        $text = ($_POST['text']);
        $this->view->items = $this->newsModel->addNews($title, $text);
        $this->view->render('form');
    }
}