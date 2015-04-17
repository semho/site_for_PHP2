<?php

require_once __DIR__ . '/AbstractController.php';
require_once __DIR__ . '/../models/NewsArticle.php';

class AdminController
    extends AbstractController
{
    public $newsModel;
    public $message;
    public $error;

    public  function __construct()
    {
        parent::__construct();
    }

    protected function getTemplatePath()
    {
        return __DIR__ . '/../views/news/';
    }
    public function actionViewFormNews(){
        require $this->getTemplatePath() . '/form.php';
    }
    public function actionAddNews()
    {
        $title = ($_POST['title']);
        $text = ($_POST['text']);
        $item = $this->newsModel->addNews($title, $text);
        $this->render('form', ['item' => $item]);
    }
}