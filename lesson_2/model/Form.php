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
        $this->title = mysql_real_escape_string($title);
        $this->text = mysql_real_escape_string($text);
        $query = "INSERT INTO news (title, text, data_a) VALUES ('$this->title', '$this->text', NOW())";
        $result = mysql_query($query);
        if (!$result) {
            die(mysql_error());
        } else {
            return true;
        }
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
                } else {
                    $this->error = "Ошибка при обновлении";
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
    //обновление существующей новости
    public function updateNews($id, $title, $text){
        $sql = 'UPDATE news SET title =\'' . $title . '\', text =\'' . $text . '\' WHERE id=' . $id.';';
        $result = mysql_query($sql);
        if (!$result) {
            die(mysql_error());
        } else {
            return true;
        }
    }
} 