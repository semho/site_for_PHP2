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
    }
    public function actionSave(){
        if (isset($_POST['id_hidden']) && !empty($_POST['id_hidden'])) {
            $this->actionUpdateNews($_POST['id_hidden']);
        } else {
            $this->actionAddNews();
        }
    }
    public function actionViewFormNews(){
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $this->view->items = NewsArticle::findOne($_GET['id']);
        }
        $this->view->display('form');
    }
    public function actionAddNews()
    {
        $article = new NewsArticle();
        $title = $_POST['title'];
        $text = $_POST['text'];
        $article->title = $title;
        $article->text = $text;
        $article->insert();
        echo 'Новость добавлена';
       // header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_5_1/" );
    }
   public function actionUpdateNews($id)
    {
        $article = NewsArticle::findOne($id);
        $article->title = $_POST['title'];
        $article->text = $_POST['text'];
        $article->update();

    }
   /* public function actionDeleteNews()
    {
        $this->article->id = $_GET['id'];
        $this->article->delete();
        header("Location: http://" . $_SERVER['SERVER_NAME'] . "/lesson_5_1/" );
    }        */
}