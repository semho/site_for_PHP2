<?php

class Form {
    public $title;
    public $text;
    public $id;
    public $message;
    public $error;
    //добавление новости
    public function addNews($title, $text)
    {
        $db = new DateBase;
        $sql = "INSERT INTO news (title, text, data_a) VALUES ('$title', '$text', NOW())";
        $result = $db->dbCheckErrorByQuery($sql);
        return $result;
    }
    //обновление существующей новости
    public function updateNews($id, $title, $text){
        $db = new DateBase;
        $sql = "UPDATE news SET title ='" . $title . "', text ='" . $text . "' WHERE id='" . $id. "'";
        $result = $db->dbCheckErrorByQuery($sql);
        return $result;
    }
    //проверка на валидацию формы добавления новости
    public function validate()
    {
        if (!empty($_REQUEST['id']) || !empty($_POST['id_hidden'])) {
            $this->id = $_REQUEST['id_hidden'];
            if ($_POST['hidden'] == "Y" && !empty($_POST['id_hidden'])) {
                $this->title = $_POST['title'];
                $this->text = $_POST['text'];
                if ($this->updateNews($this->id, $this->title, $this->text)) {
                    $this->message = "Новость успешно обновлена";
                } 
            }
        } else {
            if ($_POST['hidden'] == "Y" && empty($_POST['id_hidden'])) {
                if (!empty($_POST['title']) && !empty($_POST['text'])) {
                    $this->title = $_POST['title'];
                    $this->text = $_POST['text'];
                    if ($this->addNews($this->title, $this->text)) {
                        $this->message = "Новость успешно добавлена";
                    }
                } else {
                    $this->error = "Поля не заполненны";
                }
            }
        }
    }

} 