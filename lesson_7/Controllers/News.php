<?php

namespace App\Controllers;

class News
    extends \AbstractController
{
    public $path;
    public  function __construct()
    {
        //путь до папки шаблонов
        $this->path = __DIR__ . '/../views/news/';
        parent::__construct();

    }
    public function actionAllShow()
    {
        $this->view->items = \App\models\News::findAll();
        $this->view->display('all');
    }
    public function actionOneShow()
    {
        $id = $_GET['id'];
        $this->view->items = \App\models\News::findOne($id);
        $this->view->display('article');
    }




}