<?php
require_once __DIR__ . '/AbstractController.php';
require_once __DIR__ . '/../models/NewsArticle.php';
require_once __DIR__ . '/../classes/View.php';

class AdminController
    extends AbstractController
{
    public $path;
    public  function __construct()
    {
        $this->path = __DIR__ . '/../Views/news/';
        parent::__construct();

    }
    public function actionViewFormNews(){
        $this->view->display('form');
    }
    public function actionAddNews()
    {
        $title = ($_POST['title']);
        $text = ($_POST['text']);
        $this->newsModel->addNews($title, $text);
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_4/" );
    }
}