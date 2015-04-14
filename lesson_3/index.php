<?php

$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'news';
$ctrlClassName = ucfirst($ctrl) . 'Controller';

require __DIR__ . '/controllers/' . $ctrlClassName . '.php';

$controller = new $ctrlClassName;
$controller->setParams([
    "id_get" => $_GET['id'],
    "title_get" => $_GET['title'],
    "text_get" => $_GET['text'],
    "title_post" => $_POST['title'],
    "text_post" => $_POST['text'],
    "hidden_post" => $_POST['hidden'],
    "id_hidden_post" => $_POST['id_hidden']
    ]);
$controller->show();
