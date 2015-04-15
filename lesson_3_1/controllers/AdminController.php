<?php

require_once __DIR__ . '/AbstractController.php';
require_once __DIR__ . '/../models/AddForm.php';

class AdminController
    extends AbstractController
{
    public $newsModel;
    public $message;
    public $error;

    function __construct()
    {
        $this->newsModel = new AddForm();
    }

    protected function getTemplatePath()
    {
        return __DIR__ . '/../views/news/';
    }
    public function actionViewFormNews(){
        require $this->getTemplatePath() . '/form.php';
    }
    public function actionAddNews($title, $text)
    {
        $item = $this->newsModel->addNews($title, $text);
        $this->render('form', ['item' => $item]);
    }
}