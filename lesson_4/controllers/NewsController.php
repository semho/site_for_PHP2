<?php
require_once __DIR__ . '/AbstractController.php';
require_once __DIR__ . '/../models/NewsArticle.php';
require_once __DIR__ . '/../classes/View.php';

class NewsController
    extends AbstractController
{
    public $path;
    public  function __construct()
    {
       $this->path = __DIR__ . '/../Views/news/';
       parent::__construct();

    }
    public function actionAllShow()
    {
        $this->view->items = $this->newsModel->allNews();
        $this->view->display('all');
    }
    public function actionOneShow()
    {
        $id = $_GET['id'];
        $this->view->items = $this->newsModel->selectOneById($id);
        $this->view->display('article');
    }

} 