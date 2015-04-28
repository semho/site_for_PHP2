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
        return __DIR__ . '/../Views/news/';
    }

    public function actionAddNews($title, $text)
    {
        return $this->newsModel->addNews($title, $text);
    }
    public function actionUpdateNews($id,$title, $text)
    {
        return $this->newsModel->updateNews($id, $title, $text);
    }
    public function validate()
    {
        if (!empty($this->arParams['id_get']) || !empty($this->arParams["id_hidden_post"])) {
            if ($this->arParams["hidden_post"] == "Y" && !empty($this->arParams["id_hidden_post"])) {
                if ($this->actionUpdateNews($this->arParams['id_hidden_post'], $this->arParams["title_post"], $this->arParams["text_post"])) {
                    $this->message = "Новость успешно обновлена";
                }
            }
        } else {
            if ($this->arParams["hidden_post"] == "Y" && empty($this->arParams["id_hidden_post"])) {
                if (!empty($this->arParams["title_post"]) && !empty($this->arParams["text_post"])) {
                    if ($this->actionAddNews($this->arParams["title_post"], $this->arParams["text_post"])) {

                        $this->message = "Новость успешно добавлена";
                    }
                } else {
                    $this->error = "Поля не заполненны";
                }
            }
        }
    }
    public function actionShow()
    {
        global $element;

        $this->validate();
        $element = $this;
        require $this->getTemplatePath() . '/form.php';
    }

}