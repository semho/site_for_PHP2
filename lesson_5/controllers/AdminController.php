<?php
require_once __DIR__ . '/AbstractController.php';
require_once __DIR__ . '/../models/NewsArticle.php';
require_once __DIR__ . '/../classes/View.php';

class AdminController
    extends AbstractController
{
    public $path;
    public $article;
    public  function __construct()
    {
        //путь до папки шаблонов
        $this->path = __DIR__ . '/../views/news/';
        parent::__construct();
        $this->article = new NewsArticle();

    }
    public function actionViewFormNews(){
        $this->view->display('form');
    }
    public function actionAddNews()
    {
        $title = ($_POST['title']);
        $text = ($_POST['text']);
        $this->article->title = $title;
        $this->article->text = $text;
        $this->article->insert();
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_5/" );
    }
}