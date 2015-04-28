<?php

namespace App\Controllers;
use App\Models\News as Model;
class News
    extends AbstractController
{
    public $path;
    public  function __construct()
    {
        //путь до папки шаблонов
        $this->path = __DIR__ . '/../Views/news/';
        parent::__construct();

    }
    public function actionAllShow()
    {
        $this->view->items = Model::findAll();
        $this->view->display('all');
    }
    public function actionOneShow()
    {
        $id = $_GET['id'];
        $this->view->items = Model::findOne($id);
        $this->view->display('article');
    }
}