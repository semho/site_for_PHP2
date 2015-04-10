<?php
$db = new DateBase;
if ($_POST['hidden'] == "Y") {
    if(!empty($_POST['title']) && !empty($_POST['text'])){
        $title = $_POST['title'];
        $text = $_POST['text'];
        if($db->addNews($title, $text)){
            $message = "Новость успешно добавлена";
        }
    }else{
        $error = "Поля не заполненны";
    }

}