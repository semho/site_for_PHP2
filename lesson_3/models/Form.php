<?php

require_once __DIR__ . '/../classes/DataBase.php';

abstract class Form
{
    protected $db;
    public $title;
    public $text;
    public $id;
    public $message;
    public $error;
    abstract protected function getTable();

    public function __construct()
    {
        $this->db = new DataBase();
    }

    //добавление новости
    public function addNews($title, $text)
    {
        $sql = "INSERT INTO " . $this->getTable() . " (title, text, data_a) VALUES ('$title', '$text', NOW())";
        $result = $this->db->dbCheckErrorByQuery($sql);
        return $result;
    }
    //обновление существующей новости
    public function updateNews($id, $title, $text){
        $sql = "UPDATE '" . $this->getTable() . "' SET title ='" . $title . "', text ='" . $text . "' WHERE id='" . $id. "'";
        $result = $this->db->dbCheckErrorByQuery($sql);
        return $result;
    }
    //проверка на валидацию формы добавления новости
   /* public function validate()
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
    }*/

} 