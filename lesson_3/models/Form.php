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

    //���������� �������
    public function addNews($title, $text)
    {
        $sql = "INSERT INTO " . $this->getTable() . " (title, text, data_a) VALUES ('$title', '$text', NOW())";
        $result = $this->db->dbCheckErrorByQuery($sql);
        return $result;
    }
    //���������� ������������ �������
    public function updateNews($id, $title, $text){
        $sql = "UPDATE '" . $this->getTable() . "' SET title ='" . $title . "', text ='" . $text . "' WHERE id='" . $id. "'";
        $result = $this->db->dbCheckErrorByQuery($sql);
        return $result;
    }
    //�������� �� ��������� ����� ���������� �������
   /* public function validate()
    {
        if (!empty($_REQUEST['id']) || !empty($_POST['id_hidden'])) {
            $this->id = $_REQUEST['id_hidden'];
            if ($_POST['hidden'] == "Y" && !empty($_POST['id_hidden'])) {
                $this->title = $_POST['title'];
                $this->text = $_POST['text'];
                if ($this->updateNews($this->id, $this->title, $this->text)) {
                    $this->message = "������� ������� ���������";
                }
            }
        } else {
            if ($_POST['hidden'] == "Y" && empty($_POST['id_hidden'])) {
                if (!empty($_POST['title']) && !empty($_POST['text'])) {
                    $this->title = $_POST['title'];
                    $this->text = $_POST['text'];
                    if ($this->addNews($this->title, $this->text)) {
                        $this->message = "������� ������� ���������";
                    }
                } else {
                    $this->error = "���� �� ����������";
                }
            }
        }
    }*/

} 