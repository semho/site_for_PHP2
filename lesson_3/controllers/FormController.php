<?php

require_once __DIR__ . '/AbstractController.php';
require_once __DIR__ . '/../models/AddForm.php';

class FormController
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

    public function actionAddNews($title, $text)
    {
        return $this->newsModel->addNews($title, $text);
    }
    public function validate()
    {
        /*if (!empty($_REQUEST['id']) || !empty($_POST['id_hidden'])) {
            $this->id = $_REQUEST['id_hidden'];
            if ($_POST['hidden'] == "Y" && !empty($_POST['id_hidden'])) {
                $this->title = $_POST['title'];
                $this->text = $_POST['text'];
                if ($this->updateNews($this->id, $this->title, $this->text)) {
                    $this->message = "Новость успешно обновлена";
                }
            }
        } else {*/

        if ($this->arParams["hidden_post"] == "Y" && empty($this->arParams["id_hidden_post"])) {
            if (!empty($this->arParams["title_post"]) && !empty($this->arParams["text_post"])) {
                if ($this->actionAddNews($this->arParams["title_post"], $this->arParams["text_post"])) {

                    $this->message = "Новость успешно добавлена";
                }
            } else {
                $this->error = "Поля не заполненны";
            }
        }
        // }
    }
    public function show()
    {
        global $element;

        $this->validate();
        $element = $this;
        require $this->getTemplatePath() . '/form.php';
    }

}